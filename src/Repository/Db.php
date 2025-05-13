<?php

class Db
{
 private PDO $dbcon;

 public static function getDbConnection() : PDO{
     $pdo = new PDO("mysql:host=localhost;dbname=bookstoredb;charset=utf8", "root", "");
     return $pdo;

 }



}