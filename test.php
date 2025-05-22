<?php

$pdo = new PDO("mysql:host=localhost;dbname=bookstoredb;charset=utf8", "root", "");

$isbnList = [
    "9780140328721", // Matilda
    "9780439554930", // Harry Potter and the Sorcerer's Stone
    "9780061120084", // To Kill a Mockingbird
    "9780451524935", // 1984
    "9780743273565", // The Great Gatsby
    "9780141439600", // Pride and Prejudice
    "9780307474278", // The Catcher in the Rye
    "9780140449136", // Crime and Punishment
    "9780142437230", // Moby-Dick
    "9780140449266", // The Brothers Karamazov
];
foreach ($isbnList as $isbn) {
    $bookUrl = "https://openlibrary.org/isbn/{$isbn}.json";
    $bookJson = @file_get_contents($bookUrl);
    if (!$bookJson) continue;

    $book = json_decode($bookJson, true);

    // 📖 Buchdaten
    $title = $book['title'] ?? 'Unknown';
    $description = '';
    if (!empty($book['description'])) {
        $description = is_array($book['description']) ? $book['description']['value'] : $book['description'];
    }

    $publicationDate = !empty($book['publish_date']) ? date('Y-m-d', strtotime($book['publish_date'])) : null;
    $pageCount = $book['number_of_pages'] ?? null;
    $language = !empty($book['languages'][0]['key']) ? str_replace('/languages/', '', $book['languages'][0]['key']) : null;
    $publisher = $book['publishers'][0] ?? null;
    $category = $book['subjects'][0] ?? null;
    $coverUrl = "https://covers.openlibrary.org/b/isbn/{$isbn}-L.jpg";

    // 📦 Binding (Hardcover?)
    $binding = 0;
    if (!empty($book['physical_format'])) {
        $format = strtolower($book['physical_format']);
        if (strpos($format, 'hardcover') !== false) {
            $binding = 1;
        }
    }

    // 👤 Autor
    $authorId = null;
    if (!empty($book['authors'])) {
        $authorKey = $book['authors'][0]['key'];
        $authorJson = @file_get_contents("https://openlibrary.org{$authorKey}.json");
        if ($authorJson) {
            $author = json_decode($authorJson, true);

            // Namen trennen
            $nameParts = explode(" ", $author['name']);
            $firstName = array_shift($nameParts);
            $lastName = implode(" ", $nameParts);
            $birthDate = !empty($author['birth_date']) ? date('Y-m-d', strtotime($author['birth_date'])) : null;
            $nationality = null; // 🔎 Nicht zuverlässig verfügbar

            // Autor einfügen oder ID holen
            $stmt = $pdo->prepare("SELECT id FROM authors WHERE firstName = ? AND lastName = ?");
            $stmt->execute([$firstName, $lastName]);
            $authorId = $stmt->fetchColumn();

            if (!$authorId) {
                $stmt = $pdo->prepare("INSERT INTO authors (firstName, lastName, birthDate, nationality) VALUES (?, ?, ?, ?)");
                $stmt->execute([$firstName, $lastName, $birthDate, $nationality]);
                $authorId = $pdo->lastInsertId();
            }
        }
    }

    // 📘 Buch in DB speichern
    $stmt = $pdo->prepare("INSERT IGNORE INTO books 
        (title, isbn, description, publicationDate, pageCount, language, publisher, category, coverUrl, binding, authorId) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $title, $isbn, $description, $publicationDate, $pageCount,
        $language, $publisher, $category, $coverUrl, $binding, $authorId
    ]);
}

echo "Import abgeschlossen!";

