<?php

include_once "AbstractRepository.php";
class AuthorRepository extends AbstractRepository
{

    protected string $tableName;

    public function __construct()
    {
        $this->tableName = str_replace("repository", "", strtolower(AuthorRepository::class)."s");
    }

    public function putElements($item) : Author
    {
        $author = new Author($item['firstName'],$item['lastName'],$item['birthDate'], $item['nationality'],$item['id']);
        return $author;
    }

}