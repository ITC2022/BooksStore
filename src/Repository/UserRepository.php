<?php
include_once "AbstractRepository.php";
class UserRepository extends AbstractRepository
{
    protected string $tableName;
    public function __construct()
    {
        $this->tableName = str_replace("repository", "", strtolower(UserRepository::class)."s");
    }


    public function putElements($item): object
    {
        $author = new User($item['userName'],$item['id']);
        return $author;
    }
}