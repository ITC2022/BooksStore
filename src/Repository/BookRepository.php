<?php
//namespace App\Repository;
include_once "AbstractRepository.php";

class BookRepository extends AbstractRepository
{

    protected string $tableName;

    public function __construct()
    {
        $this->tableName = str_replace("repository", "", strtolower(BookRepository::class)."s");
    }


    public function putElements($item): object
    {
        $book =new Book($item['title'],$item['isbn'],$item['description'],$item['publicationDate'], $item['pageCount'],$item['language'],$item['publisher'],$item['category'],$item['price'],$item['coverUrl'],$item['binding'],$item['authorId'],$item['id']);
        return $book;
    }


    public function getAuthor(Author $author) : array
    {
        $books =[];
        $stmnt = "SELECT * FROM books WHERE authorId = ? ";
        $id = $author->getId();
        $requeststmnt = $this->query($stmnt,[$id] );
        foreach ($requeststmnt as $item) {
            $books[] = (int)$item["id"];

        }
        return $books;
    }








}