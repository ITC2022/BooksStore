<?php

spl_autoload_register(function($classname){
    $ordner = ["Entity","Repository","Controller"];
    foreach($ordner as $od){
        if(file_exists("src/$od/$classname.php")){
            include "src/$od/$classname.php";
        }
    }

});





//var_dump($_SERVER['REQUEST_URI']);
$url = explode('/', str_ireplace('/BooksStore/', '', $_SERVER['REQUEST_URI']));


$controllerName = ucfirst($url[0]).'Controller';
$method = $url[1];

$index = isset($url[2]) ? $url[2] : [];



if(!class_exists($controllerName)){
    header("Location: /BooksStore/error.php");
    exit;

    }

$controller = new $controllerName();


if (!method_exists($controller, $method)) {
    header("Location: /BooksStore/error.php");
    exit;
}


if ($method === "new"){
    call_user_func_array([$controller,$method],[]);
}elseif($method === "show"){
    if(!is_numeric($index) ){
        include 'error.php';
        exit;
    }call_user_func_array([$controller,$method],[$index]);


}else{
    call_user_func_array([$controller,$method],[$index]);
}








//$controllerName = ucfirst($url[0] ?? 'author') . 'Controller';  // es. AuthorController
//$method = $url[1] ?? 'index';
//
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $params[] = $_POST;  // append $_POST all'array dei parametri
//}
//
//// 5. Eseguo il controller
//$controller = new $controllerName();
//
//if (method_exists($controller, $method)) {
//    call_user_func_array([$controller, $method], $params);
//} else {
//    http_response_code(404);
//    echo "Errore 404: Metodo $method non trovato nel controller $controllerName.";
//}
