<?php

function getALterImTagen(string $birthDate) :int
{
    $datenow = date("Y-m-d");
    list($nowYear, $nowMonth, $nowDay ) = explode("-",$datenow);
    list($birthYear, $birthMonth, $birthDay ) = explode("-",$birthDate);

    $age = $nowYear -$birthYear;

    if ($nowMonth < $birthMonth || ($nowMonth == $birthMonth && $nowDay < $birthDay)) {
        $age--;
    }
    $ageInDays = $age * 365;
    return $ageInDays;

}


$authorsRepo = new AuthorRepository();

$authors = $authorsRepo->findAll();
$html = "";
foreach ($authors as $author){

    if($author->getNationality()=== "Deutsch"){
        $view = "style='background-color: yellow; width: 100%; height: 3em'";
    }elseif ($author->getNationality()=== "American"){
        $view = "style='background-color: blue; width: 100%; height: 3em'";
    }elseif ($author->getNationality()=== "Türkey"){
        $view = "style='background-color: red; width: 100%; height: 3em'";
    }else{
        $view = "style='background-color: white; width: 100%; height: 3em'";
    }

    $html .= "<a href=/BooksStore/viewAuthor/".$author->getId(). " style='color: black'>";
    $html .= "<div style='border: black solid; width: 15em'>";
    $html .= "<h1>".$author->getFirstname()." ".$author->getLastname()."</h1>";
    $html .= "<div>".$author->getNationality()."</div>";
    $html .= "<div>".$author->getBirthDate()->format("Y-m-d")."</div>";
    $html .= "<div $view></div>";
    $html .= "</div>";
    $html .= "<br>";
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authoren</title>
</head>
<body style="background-color: lightblue ">

<?php  echo $html;?>


</body>
</html>