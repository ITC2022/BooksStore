<?php


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
        $html .= "    <p><a class='btn btn-secondary' href='#'>View details »</a></p>
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

<div class="container-fluid bg-secondary text-white">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4  "><a href="/"
                                                                           class="d-flex align-items-center mb-2 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="svgs/book-saved-svgrepo-com.svg" class="bi me-2" width="50" height="50" aria-hidden="true">


            <span class="fs-4">Readora</span> </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active bg-dark" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-black">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link  text-black">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link  text-black">FAQs</a></li>
            <li class="nav-item "><a href="#" class="nav-link text-black">About</a></li>
        </ul>
    </header>
</div>

<!--ende header-->


<!--hero start-->
<!--start hero-->

<div class="bg-light text-secondary px-4 py-5 text-center border-bottom">
    <div class="py-5"><h1 class="display-5 fw-bold text-dark">Meet Our Authors</h1>
        <div class="col-lg-6 mx-auto"><p class="fs-5 mb-4">Explore the brilliant minds behind our bestselling books.
                Dive into their stories, styles, and inspirations and find your next favorite read. Whether you're
                into fiction, history, or self-help, our diverse range of authors has something for everyone.</p>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href ="index.php?action=author"> <button type="button" class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Authors</button></a>
                <a href ="index.php?action=book">   <button type="button" class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Books</button></a>
            </div>
        </div>
    </div>
</div>


<!--end hero-->


<!--hero end-->
<!--carousel start-->

<div class="container marketing mt-5"> <!-- Three columns of text below the carousel -->
    <div class="row">
        <?php
        echo $html;
        ?>
<!--        <div class="col-lg-4">-->
<!--            <svg aria-label="Placeholder" class="bd-placeholder-img rounded-circle" height="140"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="140" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>-->
<!--            </svg>-->
<!--            <h2 class="fw-normal">Heading</h2>-->
<!--            <p>Some representative placeholder content for the three columns of text below the carousel. This is the-->
<!--                first column.</p>-->
<!--            <p><a class="btn btn-secondary" href="#">View details »</a></p>-->
<!--        </div> -->
<!-- /.col-lg-4 -->
<!--        <div class="col-lg-4">-->
<!--            <svg aria-label="Placeholder" class="bd-placeholder-img rounded-circle" height="140"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="140" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>-->
<!--            </svg>-->
<!--            <h2 class="fw-normal">Heading</h2>-->
<!--            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second-->
<!--                column.</p>-->
<!--            <p><a class="btn btn-secondary" href="#">View details »</a></p></div> -->
<!-- /.col-lg-4 -->
<!--        <div class="col-lg-4">-->
<!--            <svg aria-label="Placeholder" class="bd-placeholder-img rounded-circle" height="140"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="140" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>-->
<!--            </svg>-->
<!--            <h2 class="fw-normal">Heading</h2>-->
<!--            <p>And lastly this, the third column of representative placeholder content.</p>-->
<!--            <p><a class="btn btn-secondary" href="#">View details »</a></p></div> -->
<!-- /.col-lg-4 -->
    </div>
</div>
    <!-- /.row --> <!-- START THE FEATURETTES -->
<!--    <hr class="featurette-divider">-->
<!--    <div class="row featurette">-->
<!--        <div class="col-md-7"><h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span-->
<!--                        class="text-body-secondary">It’ll blow your mind.</span></h2>-->
<!--            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose-->
<!--                here.</p></div>-->
<!--        <div class="col-md-5">-->
<!--            <svg aria-label="Placeholder: 500x500"-->
<!--                 class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>-->
<!--                <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>-->
<!--            </svg>-->
<!--        </div>-->
<!--    </div>-->
<!--    <hr class="featurette-divider">-->
<!--    <div class="row featurette">-->
<!--        <div class="col-md-7 order-md-2"><h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span-->
<!--                        class="text-body-secondary">See for yourself.</span></h2>-->
<!--            <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this-->
<!--                layout would work with some actual real-world content in place.</p></div>-->
<!--        <div class="col-md-5 order-md-1">-->
<!--            <svg aria-label="Placeholder: 500x500"-->
<!--                 class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>-->
<!--                <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>-->
<!--            </svg>-->
<!--        </div>-->
<!--    </div>-->
<!--    <hr class="featurette-divider">-->
<!--    <div class="row featurette">-->
<!--        <div class="col-md-7"><h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span-->
<!--                        class="text-body-secondary">Checkmate.</span></h2>-->
<!--            <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really-->
<!--                intended to be actually read, simply here to give you a better view of what this would look like with-->
<!--                some actual content. Your content.</p></div>-->
<!--        <div class="col-md-5">-->
<!--            <svg aria-label="Placeholder: 500x500"-->
<!--                 class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500"-->
<!--                 preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg"><title>-->
<!--                    Placeholder</title>-->
<!--                <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>-->
<!--                <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>-->
<!--            </svg>-->
<!--        </div>-->
<!--    </div>-->
<!--    <hr class="featurette-divider"> -->
<!-- /END THE FEATURETTES  </div>-->

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
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top"><p><img
                        src="svgs/book-saved-svgrepo-com.svg" alt="Readora Logo a book logo" class="bi me-2" width="42"
                        height="38" aria-hidden="true">©
                2025 Readora, Inc.
                All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Instagram">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg>
                    </a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Facebook">
                        <svg class="bi" width="24" height="24" aria-hidden="true">
                            <use xlink:href="#facebook"></use>
                        </svg>
                    </a></li>
            </ul>
        </div>
    </footer>
</div>

<!--footer end-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">

</script>
</body>
</html>
