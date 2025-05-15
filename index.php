<?php

include "src/Entity/Author.php";

include "src/Entity/Book.php";
include "src/Repository/AuthorRepository.php";
include "src/Repository/BookRepository.php";

//$all = Author::findById(1);

//// lädt fehlende Klassen automatisch nach, statt dem user Fehlermeldung anzuzeigen
//require 'autoload.php';
//
//use App\Entity\Author;
//use App\Repository\AuthorRepository;
//use App\Entity\Book;
//use App\Repository\BookRepository;



//$book = new Book("Fantastic Mr. Dog","132782-5342345","Ein clever","2025-01-02",345,"Deutsch","Ergo","Fantasy",1.99,"ergo",0,1,5);
//$books = new BookRepository();
//$books = $book->getAuthor();
//var_dump($books);
//$authorsBooks = new Author("h","d","2025-03-02","eng",1);
//var_dump($authorsBooks->getBooks());
//$author = new AuthorRepository();
//$authorId = $author->findById(2);
//var_dump($authorId);

$books = new BookRepository();

$books = $books->findAll();
//var_dump($books);
$html ="";
foreach ($books as $book){
    $html .= "<div class='col'>";
    $html .= "<div class='card shadow-sm'>";
//    $html.= "<h5 style='text-align: center'>".$book->getTitle()."</h5>";
    $html .= "<img src='" . $book->getCoverUrl() . "' class='bd-placeholder-img card-img-top' height='700' style='object-fit: cover;' alt='Copertina di " . htmlspecialchars($book->getTitle()) . "'>";
    $html .= "<div class='card-body'><h6 style='text-align: center' class='title'><strong>".$book->getTitle()."</strong></h6><p class='card-text' >".$book->getDescription()."</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                                <button type='button' class='btn btn-sm btn-outline-primary' >Show</button>
                                <button type='button' class='btn btn-sm btn-success'>Buy</button>
                            </div>
                            <small class='text-body-secondary'>9 mins</small></div>
                    </div>
                </div>
            </div>";


}









include "view/book/index.php";


