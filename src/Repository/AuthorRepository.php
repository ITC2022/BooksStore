<?php
//namespace App\Repository;\
include_once "AbstractRepository.php";
class AuthorRepository extends AbstractRepository
{



    public  function findAll() :array | Author
    {
        $authors = [];
        $stmnt = "SELECT * FROM authors";

        $requestStmnt=  $this->query($stmnt , $authors);
        foreach ($requestStmnt as $item) {
            $author =new Author($item['firstName'],$item['lastName'],$item['birthDate'], $item['nationality'],$item['id']);
            $authors[] = $author;

        }
        return $authors;


    }






    public function findById( $id): Author
    {




        $stmnt = "SELECT * FROM authors WHERE id = ?";
        $authorRequest = $this->query($stmnt, [$id]);
        $authorRequest = $authorRequest[0];
        $author = new Author($authorRequest['firstName'],$authorRequest['lastName'],$authorRequest['birthDate'],$authorRequest['nationality'], $authorRequest['id']);
        return $author;


    }

    public function update(Author $author): Author
    {


        $firstName= $author->getFirstName();
        $lastName = $author->getLastName();
        $birthDate= $author->getBirthDate()->format("Y-m-d");
        $nationality = $author->getNationality();
        $id = $author->getId();
        $stmnt = "UPDATE authors SET  firstname=?, lastName=?, birthDate=?, nationality=? WHERE id=?" ;
        $params = [$firstName,$lastName,$birthDate,$nationality,$id];

        $this->query($stmnt,$params);


//        $dbcon = $this->getDbConnection();
//
//        $request = $dbcon->prepare($stmnt);
//        $request->execute([$firstName,$lastName,$birthDate,$nationality,$id]);
        return self::findById($id);
    }


    public function create(Author $author) : Author
    {

        $firstName= $author->getFirstName();
        $lastName = $author->getLastName();
        $birthDate= $author->getBirthDate()->format("Y-m-d");
        $nationality = $author->getNationality();
        $stmnt = "INSERT INTO authors (firstName, lastName, birthDate, nationality) VALUES (?,?,?,?)";
        $params = [$firstName,$lastName,$birthDate,$nationality];


        $id = $this->query($stmnt, $params);
//        $dbcon = $this->getDbConnection();
//        $stmnt = "INSERT INTO authors (firstName, lastName, birthDate, nationality) VALUES (?,?,?,?)";
//        $request = $dbcon->prepare($stmnt);
//        $request->execute([$firstName,$lastName,$birthDate,$nationality]);
//        $id = (int)$this->getDbConnection()->lastInsertId();
        var_dump($id);
        return self::findById($id);


    }

    public function delete(Author $author): bool
    {
        $id= $author->getId();
        $stmnt = "DELETE FROM authors WHERE id = ?";
        return $this->query($stmnt,[$id]);

//        $dbcon = $this->getDbConnection();
//
//        $request = $dbcon->prepare($stmnt);
//        return $request->execute([$id]);

    }

}