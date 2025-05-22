<?php

class BookController extends AbstractController
{

    public function show(int $id) : array
    {



        $books = new BookRepository();
        $book = $books->findById($id);
        if(!$book){
            http_response_code(400);
            include "error.php";
            exit;
        }
        include "src/view/book/show.php";


        return [$book];

    }


    function new(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/book/create.php';
            return;
        }

        // Method POST -> Erstellt ein Author
        $title = $_POST['title'] ?? '';
        $isbn = $_POST['isbn'] ?? '';
        $description = $_POST['description'] ?? '';
        $publicationDate = $_POST['publicationDate'] ?? '';
        $pageCount = $_POST['pageCount'] ?? '';
        $language = $_POST['language'] ?? '';
        $publisher = $_POST['publisher'] ?? '';
        $category = $_POST['category'] ?? '';
        $price = $_POST['price'] ?? '';
        $coverUrl = $_POST['coverUrl'] ?? '';
        $binding = $_POST['binding'] ?? '';
        $authorId = $_POST['authorId'] ?? '';

        // Validierung von Usereingaben
        if (
            empty($title) || empty($isbn) || empty($description) || empty($publicationDate) ||
            empty($pageCount) || empty($language) || empty($publisher) || empty($category) ||
            empty($price) || empty($coverUrl) || empty($binding) || empty($authorId)
        ) {
            echo "Alle felder sind erfordelich.";
            return;
        }

        // Creazione dell'oggetto Author
        $book = new Book(
            $title,
            $isbn,
            $description,
            $publicationDate,
            $pageCount,
            $language,
            $publisher,
            $category,
            $price,
            $coverUrl,
            $binding,
            $authorId
        );

        // Inserimento nel DB
        $bookRepo = new BookRepository();
        $bookRepo->create($book);

        // Reindirizza alla lista
        header("Location: /BooksStore/book/index");
        exit;



    }


        public function edit($id): void
    {
        $bookRepo = new BookRepository();
        $book = $bookRepo->findById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book->setTitle($_POST['title']);
            $book->setIsbn($_POST['isbn']);
            $book->setDescription($_POST['description']);
            $book->setPublicationDate(new DateTime($_POST['publicationDate']));
            $book->setPageCount((int)$_POST['pageCount']);
            $book->setLanguage($_POST['language']);
            $book->setPublisher($_POST['publisher']);
            $book->setCategory($_POST['category']);
            $book->setPrice((float)$_POST['price']);
            $book->setCoverUrl($_POST['coverUrl']);
            $book->setBinding(isset($_POST['binding']) ? (bool)$_POST['binding'] : false);
            $book->setAuthorId((int)$_POST['authorId']);

            $bookRepo->update($book);

            header("Location: /BooksStore/book/index");
            exit;
        }

//        // Se GET mostra il form di modifica con $book
//        include 'src/view/book/edit.php';
    }


    function index()
    {
        $books = new BookRepository();
        $book = $books->findAll();
        include "src/view/book/index.php";

        return $book;
    }

    function remove(int $id): void
    {
        $books= new BookRepository();
        $book = $books->findById($id);

        if (!$book) {
            echo "Autore non trovato.";
            return;
        }

        $books->delete($book);

        // Redirect dopo delete
        header("Location: /BooksStore/book/index");
        exit;
    }



}