<?php
//echo "hallo";

//$authorTest = new AuthorController();
//$authortest1 =$authorTest->show($id);

//$id = (int)$id;

//$authors = new AuthorRepository();
//$author = $authors->findById($id);
//$books = new BookRepository();

//$bookAuthor = $author->getBooks()[0];
//$book = $books->findById($bookAuthor);
$firstName = $author->getFirstName();
$lastName = $author->getLastName();
$nationality =$author->getNationality();
$bDate = $author->getBirthDate()->format("Y-m-d");



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Author</title>
</head>
<body>
<!--header start-->
<?php include "nav.php" ?>

<!--header end-->



<div class="container col-lg-10 ">
    <main>
        <div class="py-5 text-center">
<!--            <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg"-->
<!--                                           alt="" width="72" height="57">-->
            <h1 class="h2">Update Author</h1>

        </div>
        <div class="  row g-5">

            <div class="col-lg-12 col-lg-8">
<!--                <h4 class="mb-4">Author</h4>-->
                <form class="needs-validation" method="POST"  action="/BooksStore/author/edit/<?php echo $id;?>">
                    <div class="row g-3">
                        <div class="col-sm-6"><label for="firstName" class="form-label">First name</label> <input
                                    type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="<?php echo $firstName?>" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6"><label for="lastName" class="form-label">Last name</label> <input
                                    type="text" class="form-control" id="lastName" placeholder="" name="lastName" value="<?php echo $lastName ?>" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>


                        </div>
                        <div class="col-12"><label for="address" class="form-label">Nationality</label> <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="address"
                                                                                                           required="" name="nationality"
                            value="<?php echo $nationality ?>">
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4"><label for="zip" class="form-label">Birth Date</label> <input type="date"
                                                                                                     class="form-control"
                                                                                                     id="zip"
                                                                                                     placeholder=""
                                                                                                     required="" name="birthDate"
                            value="<?php echo $bDate ?>">
                            <div class="invalid-feedback">
                                Date required.
                            </div>
                        </div>
                    </div>
<div>
            <button class="w-100 btn btn-success btn-lg " type="submit">Continue to Update</a></button>

<!--            <a href="/BooksStoreManuelAnpassungen/author" style="text-decoration: none; color: white">-->
                </form>
    <div style="height: 2px"></div>
            <form method="POST" action="/BooksStore/author/remove/<?php echo $id;?>">
                <button class="w-100 btn btn-danger btn-lg" type="submit">Delete</a></button>
            </form>
</div>

            </div>
        </div>
    </main>

</div>
<?php include "footer.php" ?>
</body>
</html>