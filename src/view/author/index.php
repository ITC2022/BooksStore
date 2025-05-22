<?php
//

$authorsall = new AuthorRepository();
$authors = $authorsall->findAll();
//var_dump($authors);
$html = "";
foreach ($authors as $author){
    $html .= " <div class='col-lg-3 '>";
    $html .= "<svg aria-label='Placeholder' class='bd-placeholder-img rounded-circle' height='140'
                 preserveAspectRatio='xMidYMid slice' role='img' width='140' xmlns='http://www.w3.org/2000/svg'><title>
    Placeholder</title>
                <rect width='100%' height='100%' fill='var(--bs-secondary-color)'></rect>
            </svg>";
    $html .= "  <h2 class='fw-normal'>".$author->getFirstName()." ".$author->getLastName()."</h2>";
    $html .= "<p>".$author->getNationality()."</p>";
//    $html .= "<form method='get' action='show.php'><input type='text' name='id' value=".$author->getId()."></form>";
        $html .= " <p><a class='btn btn-secondary' href='/BooksStore/author/show/{$author->getId()}'>Edit author »</a></p>
    </div>";






}



?>

<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<!--hier ist mein Header -->


<?php include "nav.php" ?>

<!--ende header-->



<!--carousel start-->

<div class="container marketing mt-5"> <!-- Three columns of text below the carousel -->
    <div class="row">
        <?php
        echo $html;
        ?>

    </div>
</div>

<!--carousel end-->


<!--footer start-->
<div class="container-fluid bg-secondary text-dark px-4 py-5 text-center">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3"><h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3"><h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3"><h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>
            <div class="col-md-5 offset-md-1 mb-3">
                <form><h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2"><label for="newsletter1"
                                                                                   class="visually-hidden">Email
                            address</label> <input id="newsletter1" type="email" class="form-control"
                                                   placeholder="Email address">
                        <button class="btn btn-dark" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include "footer.php" ?>

    </footer>
</div>

<!--footer end-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">

</script>
</body>
</html>
