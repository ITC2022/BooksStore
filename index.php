<?php

include "src/Entity/Author.php";
include "src/Repository/Db.php";
include "src/Entity/Book.php";
include "src/Repository/AuthorRepository.php";

//$all = Author::findById(1);



//var_dump($all);

$authorTest = new AuthorRepository();


var_dump($authorTest->findById(2));

