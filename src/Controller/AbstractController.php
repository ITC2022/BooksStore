<?php

//include "./src/Repository/AuthorRepository.php";

abstract class AbstractController
{
    abstract function show(int $id):array;
    abstract function new():void;
    abstract function edit(int $id);
    abstract function index();
    abstract function remove(int $id):void;


}