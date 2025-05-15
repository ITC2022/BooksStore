<?php
//namespace App\Repository;\
include_once "AbstractRepository.php";
class AuthorRepository extends AbstractRepository
{



    public  function findAll() :array | Author{
        $author = [];
        $dbcon = $this->getDbConnection();
        $stmnt = "SELECT * FROM authors";
        $request = $dbcon->prepare($stmnt);
        $request->execute();
        $requestStmnt = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($requestStmnt as $item) {
            $author =new Author($item['firstName'],$item['lastName'],$item['birthDate'], $item['nationality'],$item['id']);
            $authors[] = $author;

        }
        return $authors;


    }






    public function findById( $id): Author
    {
        $dbcon = $this->getDbConnection();
        $stmnt = "SELECT * FROM authors WHERE id = ?";
        $request = $dbcon->prepare($stmnt);
        $request->execute([$id]);
        $authorRequest= $request->fetch(PDO::FETCH_ASSOC);
        $author = new Author($authorRequest['firstName'],$authorRequest['lastName'],$authorRequest['birthDate'],$authorRequest['nationality'], $authorRequest['id']);
        return $author;


    }

    public function update(Author $author): Author
    {
        $id = $author->getId();
        $firstName= $author->getFirstName();
        $lastName = $author->getLastName();
        $birthDate= $author->getBirthDate()->format("Y-m-d");
        $nationality = $author->getNationality();


        $dbcon = $this->getDbConnection();
        $stmnt = "UPDATE authors SET  firstname=?, lastName=?, birthDate=?, nationality=? WHERE id=?" ;
        $request = $dbcon->prepare($stmnt);
        $request->execute([$firstName,$lastName,$birthDate,$nationality,$id]);
        return self::findById($id);
    }


    public function create(Author $author) : Author
    {

        $firstName= $author->getFirstName();
        $lastName = $author->getLastName();
        $birthDate= $author->getBirthDate()->format("Y-m-d");
        $nationality = $author->getNationality();
        $dbcon = $this->getDbConnection();
        $stmnt = "INSERT INTO authors (firstName, lastName, birthDate, nationality) VALUES (?,?,?,?)";
        $request = $dbcon->prepare($stmnt);
        $request->execute([$firstName,$lastName,$birthDate,$nationality]);
        $id = (int)$dbcon->lastInsertId();
        return self::findById($id);

    }

    public function delete(Author $author): bool
    {
        $id= $author->getId();
        $dbcon = $this->getDbConnection();
        $stmnt = "DELETE FROM authors WHERE id = ?";
        $request = $dbcon->prepare($stmnt);
        return $request->execute([$id]);

    }

}