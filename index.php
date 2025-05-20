<?php

include "src/Entity/Author.php";

include "src/Entity/Book.php";
include "src/Repository/AuthorRepository.php";
include "src/Repository/BookRepository.php";
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = str_replace('/BooksStore', '', $path);
var_dump($path);
$path = trim($path, '/');
var_dump($path);
$view = match($path) {
    "index.php"=>"view/book/index.php",
    'author' => 'view/author/index.php',
    'book' => 'view/book/index.php',

};


//var_dump($view);
//$all = Author::findById(1);





//$book = new Book("Fantastic Mr. Dog","132782-5342345","Ein clever","2025-01-02",345,"Deutsch","Ergo","Fantasy",1.99,"ergo",0,1,5);
//$books = new BookRepository();
//$books = $book->getAuthor();
//var_dump($books);
//$authorsBooks = new Author("h","d","2025-03-02","eng",1);
//var_dump($authorsBooks->getBooks());
//$author = new AuthorRepository();
//$authorId = $author->findById(2);
//var_dump($authorId);
//$berto = new Book("Barto",'14345',"sdf","2025-01-12",98,'en','verdi','Verdi',92.2,'https',1,2, 18);
$booksen = new BookRepository();
//$bookse = $books->findById([2]);
//var_dump($bookse);
$books = $booksen->findAll();
//var_dump($booksen->delete($berto));

//var_dump($books);






include $view;






