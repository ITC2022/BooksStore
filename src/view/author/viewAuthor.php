<?php

function getALterImTagen(string $birthDate): int
{
    $datenow = date("Y-m-d");
    list($nowYear, $nowMonth, $nowDay) = explode("-", $datenow);
    list($birthYear, $birthMonth, $birthDay) = explode("-", $birthDate);

    $age = $nowYear - $birthYear;

    if ($nowMonth < $birthMonth || ($nowMonth == $birthMonth && $nowDay < $birthDay)) {
        $age--;
    }
    $ageInDays = $age * 365;
    return $ageInDays;

}

$authorRepo = new AuthorRepository();
$author = $authorRepo->findById($id);

if ($author->getNationality() === "Deutsch") {
    echo "<h1>" . $author->getFirstName() . " " . $author->getLastName() . "</h1>";
    echo "<div>" . $author->getNationality() . "</div>";
    echo "<div>" . getALterImTagen($author->getBirthDate()->format("Y-m-d")) . " Tagen Alt</div>";

    echo "<div style='background-color: black; width: 150px; height: 25px '> </div>";
    echo "<div style='background-color: #ec0808; width: 150px; height: 25px'> </div>";
    echo "<div style='background-color: #fff200; width: 150px; height: 25px'> </div>";


} elseif ($author->getNationality() === "Türkey") {
    echo "<h1>" . $author->getFirstName() . " " . $author->getLastName() . "</h1>";
    echo "<div>" . $author->getNationality() . "</div>";
    echo "<div>" . getALterImTagen($author->getBirthDate()->format("Y-m-d")) . " Tagen Alt</div>";

//    echo "<div style='background-color: #ffffff; width: 100px; height: 15px'>  </div>";
    echo "<div style='background-color: #ec0808; width: 150px; height: 80px; position: relative;'>  <div style='
        background-color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        left: 10px;
    '></div></div>";

} elseif ($author->getNationality() === "American") {
    echo "<h1>" . $author->getFirstName() . " " . $author->getLastName() . "</h1>";
    echo "<div>" . $author->getNationality() . "</div>";
    echo "<div>" . getALterImTagen($author->getBirthDate()->format("Y-m-d")) . " Tagen Alt</div>";



    echo "<div style='width: 200px; border: 1px solid #ccc; line-height: 0; position: relative; font-size: 0;'>
    <!-- Streifen -->    " . str_repeat("
    <div style='width: 100%; height: 10px; background-color: red;'></div>
    <div style='width: 100%; height: 10px; background-color: white;'></div>
    ", 6) . "
    <div style='width: 100%; height: 6px; background-color: red;'></div>    <!-- Sternenfeld -->
    <div style='position: absolute; top: 0; left: 0; width: 70px; height: 60px; background-color: navy; display: flex; flex-direction: column; justify-content: space-evenly; padding: 2px; font-size: 6px; color: white; line-height: 1;'>
        
        <div style='text-align: center;'>★  ★  ★  ★  ★</div>
        <div style='text-align: center;'> ★  ★  ★  ★ </div>
        <div style='text-align: center;'>★  ★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★</div>
        <div style='text-align: center;'>★  ★  ★  ★  ★</div>
    </div>";
}else{
    echo "<h1>" . $author->getFirstName() . " " . $author->getLastName() . "</h1>";
    echo "<div>" . $author->getNationality() . "</div>";
    echo "<div>" . getALterImTagen($author->getBirthDate()->format("Y-m-d")) . " Tagen Alt</div>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
