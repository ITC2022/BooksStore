<?php
//namespace App\Entity;
class Author
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private DateTime $birthDate;
    private string $nationality;
    private array $books;

    function __construct(  string $firstName, string $lastName, string $birthDate, string $nationality, ?int $id=null)
    {

        if($id !== NULL){
            $this->id = $id;

            $bookrepo = new BookRepository();
            $this->books = $bookrepo->getAuthor($this);
        }else{
            $this->books = [];
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = new DateTime($birthDate);
        $this->nationality= $nationality;






    }



    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

    public function objectElements(object $author) : array
    {
        $elements= ["firstname"=>$author->getFirstName(),
            "lastname"=>$author->getLastName(),
            "birthDate"=>$author->getBirthDate()->format("Y-m-d"),
            "nationality"=>$author->getNationality()];
        return $elements;
    }

}