<?php

$authoren = $data['authoren'];
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
<form action="index.php" method="POST">

    <input type="text" name="isbn" placeholder="ISBN" required><br>

    PubDate: <input type="date" name="publication_date" placeholder="publication_date" required><br>
    <input type="number" name="pages" placeholder="pages" required><br>
    <input type="text" name="title" placeholder="Name" required><br>
    <input type="number" name="price" placeholder="price" required><br>
    <input type="text" name="category" placeholder="category" required><br>




    Hardcover: <input type="checkbox" name="hardcover" placeholder="hardcover" required><br>
    <select name="authorId">
        <?php
        foreach ($authoren as $author){
            echo "<option value='".$author->getId()."' >".$author->getFirstName()." ".$author->getLastName()."</option>";
        }
        ?>

    </select><br>
    <input type="submit" value="Submit">



</form>
</body>
</html>
