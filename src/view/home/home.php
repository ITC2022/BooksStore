<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

<?php include "nav.php" ?>


<!--hero start-->

<div class="px-4 py-5 my-5 text-center"><img class="d-block mx-auto mb-4"
                                             src="/BooksStore/svgs/book-saved-svgrepo-com.svg" alt="" width="72"
                                             height="57">
    <h1 class="display-5 fw-bold text-body-emphasis">Welcome to Readora</h1>
    <div class="col-lg-6 mx-auto"><p class="lead mb-4">Quickly design and customize responsive mobile-first sites with
            Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
            responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

            <a href="/BooksStore/book/index" class="btn btn-outline-dark btn-lg px-4 gap-3">All Books</a>
            <a href="/BooksStore/author/index" class="btn btn-outline-dark btn-lg px-4">All Authors</a>

        </div>
    </div>
</div>


<!--hero end-->


<footer>
    <?php include "footer.php" ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">

</script>
</body>
</html>
