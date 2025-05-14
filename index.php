<?php

include "src/Entity/Author.php";
include "src/Repository/Db.php";
include "src/Entity/Book.php";
include "src/Repository/AuthorRepository.php";
include "src/Repository/BookRepository.php";

//$all = Author::findById(1);




//$book = new Book("Fantastic Mr. Dog","132782-5342345","Ein clever","2025-01-02",345,"Deutsch","Ergo","Fantasy",1.99,"ergo",0,1,5);

//$books = new BookRepository();

//$books = $book->getAuthor();
//var_dump($books);

//$authorsBooks = new Author("h","d","2025-03-02","eng",1);
//var_dump($authorsBooks->getBooks());


$author = new AuthorRepository();
$author = $author->findById(3);

$books = $author->getBooks();

var_dump($books);





