<?php
include "../src/Entity/Author.php";
include "../src/Entity/Book.php";
include "../src/Repository/UserRepository.php";
include "../src/Entity/User.php";
include "../src/Repository/AuthorRepository.php";
include "../src/Repository/BookRepository.php";

//$authores = new BookRepository();
//$tbName = strtolower(AuthorRepository::class);
//
//$tbName =str_replace("repository","",$tbName);
//var_dump($tbName);
//for($x = 9; $x <= 25; $x++){
//$author = new Author("Leon", "Nanni", "1967-02-14","DE", $x );
//    var_dump($authores->delete($author));
//}


//$authors = new BookRepository();
//$author =  new Book("The Count of Monte Manto", "12345", "The story of the adventurous knight-errant and his squire Sancho Panzo, who set out to right the wrongs of the world.","2025-05-15", 1276, "eng" , "Penguin Books", "Pirates -- Fiction",12.70, "https://covers.openlibrary.org/b/isbn/9780140449266-L.jpg", 0,8,24 );
////$author = new Author("Leonino", "Nanni", "1967-02-14","DE", 27);
//$author = $authors->delete($author);
//var_dump($author);

$users = new UserRepository();
$lollo = new User("Mirco",3);
$user = $users->delete($lollo);

var_dump($user);

