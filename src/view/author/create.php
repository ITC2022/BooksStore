<?php

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

<?php include "nav.php" ?>
<div class="container">
    <main>
        <div class="py-5 text-center">
            <!--            <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg"-->
            <!--                                           alt="" width="72" height="57">-->
            <h1 class="h2">Create Author</h1>

        </div>
        <div class="row g-5">

            <div class="col-md-7 col-lg-8"><h4 class="mb-3">Author</h4>
                <form class="needs-validation" method="POST"  >
                    <div class="row g-3">
                        <div class="col-sm-6"><label for="firstName" class="form-label">First name</label> <input
                                    type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6"><label for="lastName" class="form-label">Last name</label> <input
                                    type="text" class="form-control" id="lastName" placeholder="" name="lastName" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>


                    </div>
                    <div class="col-12"><label for="address" class="form-label">Nationality</label> <input type="text"
                                                                                                           class="form-control"
                                                                                                           id="address"
                                                                                                           required="" name="nationality"
                                                                                                           value="">
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-3"><label for="zip" class="form-label">Birth Date</label> <input type="date"
                                                                                                        class="form-control"
                                                                                                        id="zip"
                                                                                                        placeholder=""
                                                                                                        required="" name="birthDate"
                                                                                                        value="">
                        <div class="invalid-feedback">
                            Date required.
                        </div>
                    </div>
            </div>

            <button class="w-100 btn btn-success btn-lg " type="submit">Continue to Create</a></button>

            <!--            <a href="/BooksStoreManuelAnpassungen/author" style="text-decoration: none; color: white">-->
            </form>
<!--            <form method="POST" action="/BooksStoreManuelAnpassungen/delete/">-->
<!--                <button class="w-100 btn btn-danger btn-lg" type="submit">Delete</a></button>-->
<!--            </form>-->

        </div>
</div>
</main>
<footer class="my-5 pt-5 text-body-dark text-center text-small pl-5"><p class="mb-1"></p>
    <?php include "footer.php" ?>
</footer>
</div>
</body>
</html>