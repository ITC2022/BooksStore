<?php

declare(strict_types=1);

/**
 * Seeds the database with a handful of real books fetched from the
 * Open Library API, so the app has something to show right after setup.
 *
 * Usage: composer seed   (or: php scripts/seed.php)
 */

require __DIR__ . '/../vendor/autoload.php';

use App\Entity\Author;
use App\Entity\Book;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$isbnList = [
    '9780140328721',
    '9780439554930',
    '9780061120084',
    '9780451524935',
    '9780743273565',
    '9780141439600',
];

$authorRepository = new AuthorRepository();
$bookRepository = new BookRepository();

$toDate = static function (?string $value): ?string {
    if (empty($value)) {
        return null;
    }
    $timestamp = strtotime($value);
    return $timestamp === false ? null : date('Y-m-d', $timestamp);
};

foreach ($isbnList as $isbn) {
    $bookJson = @file_get_contents("https://openlibrary.org/isbn/{$isbn}.json");
    if ($bookJson === false) {
        echo "Skipping {$isbn}: could not reach Open Library.\n";
        continue;
    }

    $data = json_decode($bookJson, true);

    $description = '';
    if (!empty($data['description'])) {
        $description = is_array($data['description']) ? $data['description']['value'] : $data['description'];
    }

    $authorId = null;
    if (!empty($data['authors'][0]['key'])) {
        $authorJson = @file_get_contents('https://openlibrary.org' . $data['authors'][0]['key'] . '.json');
        if ($authorJson !== false) {
            $authorData = json_decode($authorJson, true);
            $nameParts = explode(' ', $authorData['name'] ?? 'Unknown Author');
            $firstName = array_shift($nameParts);
            $lastName = implode(' ', $nameParts) ?: '—';
            $birthDate = $toDate($authorData['birth_date'] ?? null);

            $author = $authorRepository->findAll();
            $existing = array_values(array_filter(
                $author,
                fn (Author $a): bool => $a->getFirstName() === $firstName && $a->getLastName() === $lastName
            ));

            if ($existing !== []) {
                $authorId = $existing[0]->getId();
            } else {
                $created = $authorRepository->create(new Author([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'birth_date' => $birthDate,
                    'nationality' => null,
                ]));
                $authorId = $created->getId();
            }
        }
    }

    $format = strtolower($data['physical_format'] ?? '');

    $book = new Book([
        'title' => $data['title'] ?? 'Unknown title',
        'isbn' => $isbn,
        'description' => $description ?: null,
        'publication_date' => $toDate($data['publish_date'] ?? null),
        'pages' => $data['number_of_pages'] ?? null,
        'language' => !empty($data['languages'][0]['key']) ? str_replace('/languages/', '', $data['languages'][0]['key']) : null,
        'publisher' => $data['publishers'][0] ?? null,
        'category' => $data['subjects'][0] ?? null,
        'price' => round(mt_rand(500, 2500) / 100, 2),
        'cover_url' => "https://covers.openlibrary.org/b/isbn/{$isbn}-L.jpg",
        'hardcover' => str_contains($format, 'hardcover') ? 1 : 0,
        'author_id' => $authorId,
    ]);

    $bookRepository->create($book);
    echo "Seeded: {$data['title']}\n";
}

echo "Done.\n";
