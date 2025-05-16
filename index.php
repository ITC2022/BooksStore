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
$berto = new Book("Barto",'14345',"sdf","2025-01-12",98,'en','verdi','Verdi',92.2,'https',1,2, 18);
$booksen = new BookRepository();
//$bookse = $books->findById([2]);
//var_dump($bookse);
$books = $booksen->findAll();
//var_dump($booksen->delete($berto));

//var_dump($books);
$html ="";
foreach ($books as $book){
    $html .= "<div class='col'>";
    $html .= "<div class='card shadow-sm'>";
//    $html.= "<h5 style='text-align: center'>".$book->getTitle()."</h5>";
    $html .= "<img src='" . $book->getCoverUrl() . "' class='bd-placeholder-img card-img-top' height='650' style='object-fit: cover;' alt='Copertina di " . htmlspecialchars($book->getTitle()) . "'>";
    $html .= "<div class='card-body'><h6 style='text-align: center' class='title'><strong>".$book->getTitle()."</strong></h6><p class='card-text' >".$book->getDescription()."</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                                <button type='submit' class='btn btn-s btn-outline-info' >Show</button>
                                <button type='button' class='btn btn-s btn-success'>Buy</button>
                            </div>
                            <small class='text-body-primary'>".number_format($book->getPrice(), 2, '.')." €</small></div>
                    </div>
                </div>
            </div>";


}









include "view/book/index.php";


