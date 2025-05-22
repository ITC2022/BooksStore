<?php

abstract class AbstractRepository
{
    public function getDbConnection(): PDO
    {
        $pdo = new PDO("mysql:host=localhost;dbname=bookstoredb;charset=utf8", "root", "");
        return $pdo;
    }
    abstract public function putElements ($item) : object;
    public function query($query, array $data): array|bool|int
    {
        $dbcon = $this->getDbConnection();
        $stmnt = $dbcon->prepare($query);
        $success = $stmnt->execute($data);

        // wenn DELETE auf Position 0  ist, gibt  execute() zurueck die true oder false zurueck gibt  wenn nicht wird den ein fetchAll() durchgeführt.
        if (stripos(trim($query), 'DELETE') === 0) {
            return $success;

        } elseif (stripos(trim($query), 'INSERT') === 0) { // wenn INSERT auf Position 0 ist, gibt  lastInsertId() zurueck die true oder false zurueck gibt  wenn nicht wird den ein fetchAll() durchgeführt.
            $id = $dbcon->lastInsertId();
            return $id;

        }

        // Sonst wenn es SELECT oder was anders ist, gibt ein Associatives Array zurueck
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }
    public  function findAll() :array | object
    {
        $authors = [];
        $stmnt = "SELECT * FROM ".$this->tableName ;

        $requestStmnt=  $this->query($stmnt , $authors);
        foreach ($requestStmnt as $item) {
            $authors[] = $this->putElements($item);

        }
        return $authors;
    }
    public function findById(int $id): object |null
    {
        $stmnt = "SELECT * FROM $this->tableName WHERE id = ?";
        $authorRequest = $this->query($stmnt, [$id]);

        if(empty($authorRequest)){
            return null;
        }
        $authorRequest = $authorRequest[0];
        $author = $this->putElements($authorRequest);
        return $author;

    }
    public function update(object $classname): object
    {


        $id = $classname->getId();
        $data = $classname->objectElements($classname);
        $keys = array_keys($data);
        $values = array_values($data);
        $params = implode(', ', array_map(fn($item) => "$item = ?", $keys));
        $values[]= $id;


        $stmnt = 'UPDATE '.$this->tableName.' SET '.$params .'WHERE id=?';

        $rowsAffected = $this->query($stmnt,$values);
        if ($rowsAffected === 0) {
            header('Location: /error.php');
            exit;
        }

        $updateObjekt = self::findById($id);
        if (!$updateObjekt) {
            header('Location: /error.php');
            exit;
        }return $updateObjekt;


    }
    public function create(object $classname) : object
    {


        function placeholdersFromArray(array $element): string {
            return implode(', ', array_fill(0, count($element), '?'));
        }
        $data = $classname->objectElements($classname);
        $keys = array_keys($data);
        $values = array_values($data);
        $params = '(' . implode(', ', $keys) . ')';
        $placeholders = placeholdersFromArray($values);




        $stmnt = "INSERT INTO ".$this->tableName. $params."  VALUES  (".$placeholders.")";

        $id = (int)$this->query($stmnt,$values);
        var_dump($id);
        return self::findById($id);

    }
    public function delete(object $object): bool
    {
        $stmnt = "DELETE FROM ". $this->tableName ." WHERE id = ?";
        $id= (int)$object->getId();
        if($this->query($stmnt,[$id])){
            return true;
        }else{
            return false;
        }

    }

}