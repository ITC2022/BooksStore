<?php

?>

<!doctype html>
<html lang="en"   >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>


<!--hier ist mein Header -->

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom "><a href="/"
                                                                                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="svgs/book-saved-svgrepo-com.svg" class="bi me-2" width="40" height="32" aria-hidden="true">


            <span class="fs-4">Bibliophile</span> </a>
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

<!--start hero-->

<div class="bg-light text-secondary px-4 py-5 text-center">
    <div class="py-5"><h1 class="display-5 fw-bold text-dark">Discover our authors</h1>
        <div class="col-lg-6 mx-auto"><p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites
                with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and
                mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-outline-dark btn-lg px-4 me-sm-3 fw-bold">Custom button</button>
                <button type="button" class="btn btn-outline-dark btn-lg px-4">Secondary</button>
            </div>
        </div>
    </div>
</div>


<!--end hero-->
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            echo $html;
            ?>
            <!--            <div class="col">-->
            <!--                <div class="card shadow-sm">-->
            <!--                    <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top" height="225"-->
            <!--                         preserveAspectRatio="xMidYMid slice" role="img" width="100%"-->
            <!--                         xmlns="http://www.w3.org/2000/svg"><title>Placeholder</title>-->
            <!--                        <rect width="100%" height="100%" fill="#55595c"></rect>-->
            <!--                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>-->
            <!--                    </svg>-->
            <!--                    <div class="card-body"><p class="card-text">This is a wider card with supporting text below as a-->
            <!--                            natural lead-in to additional content. This content is a little bit longer.</p>-->
            <!--                        <div class="d-flex justify-content-between align-items-center">-->
            <!--                            <div class="btn-group">-->
            <!--                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>-->
            <!--                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
            <!--                            </div>-->
            <!--                            <small class="text-body-secondary">9 mins</small></div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

        </div>
    </div>
</div>
</div>


<!--footer start-->
<div class="container">
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
                        src="svgs/book-saved-svgrepo-com.svg" class="bi me-2" width="40" height="32" aria-hidden="true">©
                2025 Bibliophile, Inc.
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
<script>
    const maxWords = 20; // Max number of words to find

    document.querySelectorAll(".card-text").forEach(p => {
        const words = p.textContent.trim().split(" ");
        if (words.length > maxWords) {
            p.textContent = words.slice(0, maxWords).join(" ") + "...";
        }
    });



</script>
</body>
</html>