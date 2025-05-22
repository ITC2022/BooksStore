<?php

//include "AbstractController.php";

class AuthorController extends AbstractController
{
    private AuthorRepository $autors;
    public function show(int $id) : array
    {

        $author = new AuthorRepository();
        $author = $author->findById($id);
        if(!$author){
            http_response_code(400);
            include "error.php";
            exit;
        }

        include "src/view/author/show.php";


        return [$author];

    }


    public function index()
    {
        $authors = new AuthorRepository();
        $author = $authors->findAll();
        include "src/view/author/index.php";

        return $author;


    }
    public function remove(int $id) : void
    {
        $authors = new AuthorRepository();
        $author = $authors->findById($id);

        if (!$author) {
            echo "Autore non trovato.";
            return;
        }

        $authors->delete($author);

        // Redirect dopo delete
        header("Location: /BooksStore/author/index");
        exit;
    }




    public function edit($id)
    {





        $authorRepo = new AuthorRepository();
        $author = $authorRepo->findById($id);
        if (!$author) {
            header("Location: /BooksStore/error.php");
            exit;
        }

        if($_SERVER['REQUEST_METHOD']==="POST"){
            $author->setFirstName($_POST['firstName']);
            $author->setLastName($_POST['lastName']);
            $author->setBirthDate(new DateTime($_POST['birthDate']));
            $author->setNationality($_POST['nationality']);
            $authorRepo->update($author);
            header("Location: /BooksStore/author/index");
            exit;

        }$author = $authorRepo->findById($id);
        header("Location: /BooksStore/author/index");
        return $author;
        
        
    }

    public function new(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/author/create.php';
            return;
        }

        // Method POST -> Erstellt ein Author
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $birthDate = $_POST['birthDate'] ?? '';
        $nationality = $_POST['nationality'] ?? '';

        // Validierung von Usereingaben
        if (empty($firstName) || empty($lastName) || empty($birthDate) || empty($nationality)) {
            echo "Alle felder sind erfordelich.";
            return;
        }

        // Creazione dell'oggetto Author
        $author = new Author($firstName, $lastName, $birthDate, $nationality);

        // Inserimento nel DB
        $authorRepo = new AuthorRepository();
        $authorRepo->create($author);

        // Reindirizza alla lista
        header("Location: /BooksStore/author/index");
        exit;
    }




}