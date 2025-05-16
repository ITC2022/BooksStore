<?php

abstract class AbstractRepository
{
    public function getDbConnection() : PDO{
        $pdo = new PDO("mysql:host=localhost;dbname=bookstoredb;charset=utf8", "root", "");
        return $pdo;
    }


    public function query($query, array $data) : array|bool|int
    {
        $dbcon = $this->getDbConnection();
        $stmnt = $dbcon->prepare($query);
        $success = $stmnt->execute($data);

        // wenn DELETE ist auf Position 0 gibt  execute() zurück die true oder false zurück gibt  wenn nicht wird den ein fetchAll() durchgeführt.
        if (stripos(trim($query), 'DELETE') === 0) {
            return $success;
        }elseif(stripos(trim($query), 'INSERT') === 0){
            $id = $dbcon->lastInsertId();
            return $id;

        }

        // Altrimenti (SELECT o altro), ritorna i risultati
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

}