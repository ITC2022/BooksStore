<?php

spl_autoload_register(function ($classname){
//    echo $classname;
    $ordner = ['Entity', 'Repository'];
    foreach ($ordner as $od){
        if(file_exists("src/$od/$classname.php")){
            include "src/$od/$classname.php";
        }

    }

});



//index function

//$bookRepository = new BookRepository();
//$data = ["books"=>$bookRepository->findAll()];
//
//include"src/view/book/index.php";



//show function
//$books =  new BookRepository();
//$data = ["book"=>$books->findById(2)];





// delete function

$books =  new BookRepository();
$data = $books->findAll(); // hier wird den id von user gegeben
var_dump($data);
//$data = $books->delete($datas);
//$data = ["book"=>$books->findById(25)];



//create function
//$authors = new AuthorRepository();
//$data = ["authoren"=>$authors->findAll()];
//
//
//
//
//if($_SERVER['REQUEST_METHOD']=== "GET"){
//    include"src/view/book/create.php";
//}else{
//    $bookRepository = new BookRepository();
//    $book = new Book($_POST);
//    $bookRepository->delete($book);
//}


//include "src/Entity/Author.php";
//
//include "src/Entity/Book.php";
//include "src/Repository/AuthorRepository.php";
//include "src/Repository/BookRepository.php";
//$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//
//$path = str_replace('/BooksStore', '', $path);
//var_dump($path);
//$path = trim($path, '/');
//var_dump($path);
//$view = match($path) {
//    "index.php"=>"view/book/index.php",
//    'author' => 'view/author/index.php',
//    'book' => 'view/book/index.php',
//
//};


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
//$booksen = new BookRepository();
//$bookse = $books->findById([2]);
//var_dump($bookse);
//$books = $booksen->findAll();
//var_dump($booksen->delete($berto));

//var_dump($books);






//include $view;






