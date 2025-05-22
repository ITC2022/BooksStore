<?php

class User
{

    private ?int $id;
    private string $userName;

    /**
     * @param int $id
     * @param string $userName
     */
    public function __construct( string $userName, ?int $id= Null)
    {
        $this->id = $id;
        $this->userName = $userName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function objectElements(object $book) : array{
        $elements = ["userName"=>$this->getUserName()];
        return $elements;

    }


}