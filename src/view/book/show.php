<?php

$id = $book->getId();
$title = $book->getTitle();
$isbn = $book->getIsbn();
$description = $book->getDescription();
$publication = $book->getPublicationDate();
$pageCount = $book->getPageCount();
$language = $book->getLanguage();
$publisher = $book->getPublisher();
$category = $book->getCategory();
$price = $book->getPrice();
$coverUrl = $book->getCoverUrl();
$binding = $book->getBinding();
$author = $book->getAuthor();

//var_dump($id);

$html = "<div class='col'>";
$html .= "<div class='card shadow-sm'>";
//    $html.= "<h5 style='text-align: center'>".$book->getTitle()."</h5>";
$html .= "<img src='" . $book->getCoverUrl() . "' class='bd-placeholder-img card-img-top' height='650' style='object-fit: cover;' alt='Copertina di " . htmlspecialchars($book->getTitle()) . "'>";
$html .= "<div class='card-body'><h6 style='text-align: center' class='title'><strong>" . $book->getTitle() . "</strong></h6><p class='card-text' >" . $book->getDescription() . "</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='btn-group'>
                            <a href=/BooksStore/book/index/" . $book->getId() . " class='btn btn-s btn-outline-info' >Show</a>
                                
                                <button type='button' class='btn btn-s btn-success'>Buy</button>
                            </div>
                            <small class='text-body-primary'>" . number_format($book->getPrice(), 2, '.') . " €</small></div>
                    </div>
                </div>
            </div>";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

<?php include "nav.php" ?>
<!--<div class="album px-5 bg-body-tertiary">-->
<!--    <div class="container">-->
<!--        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">-->
<!--            --><?php
//            echo $html;
//            ?>
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--to change-->


<div class="container">


    <main>
        <div class="py-5 text-center"><img class="d-block mx-auto mb-5" src="<?php echo $book->getCoverUrl() ?>"
                                           alt="" width="200" height="290">
            <h1 class="h2"><?php echo $title?></h1>
            <p class="lead" ></p> <?php echo $description?></div>

            <div class="col-md-7 col-lg-8"><h4 class="mb-3">Update Book</h4>
                <form class="needs-validation" novalidate="" method="POST" action="/BooksStore/book/edit/<?php echo $book->getId() ?>">
                    <div class="row g-3">
                        <div class="col-sm-6"><label for="firstName" class="form-label">Title</label> <input
                                    type="text" class="form-control" id="firstName" placeholder="" name="title" value="<?php echo $title?>" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6"><label for="lastName" class="form-label">ISBN </label> <input
                                    type="text" class="form-control" id="lastName" placeholder="" name="isbn" value="<?php echo $isbn ?>" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-12"><label for="username" class="form-label">Description</label>
                            <div class="input-group has-validation">
                                <textarea name="description" class="form-controll col-sm-12" ><?php echo $description; ?></textarea>

<!--                                <input-->
<!--                                         style="height: 150px; text-after-overflow: left; " type="text" pattern="[a-z]{4,8}"-->
<!---->
<!--                                         class="form-control text-lange" id="username" placeholder="Description" value="--><?php //echo $description?><!--"-->
<!--                                        required="">-->
                                <div class="invalid-feedback">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="col-12"><label for="email" class="form-label">Publication Date <span
                                        class="text-body-secondary"></span></label> <input type="date"
                                                                                                     class="form-control"
                                                                                                     id="email"
                                                                                                     placeholder=""
                                                                                           name="publicationDate"
                            value="<?php echo $publication->format("Y-m-d") ?>">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-2"><label for="pageCount" class="form-label">Page Count</label> <input type="number"
                                                                                                           class="form-control"
                                                                                                           id="pageCount"
                                                                                                           placeholder=""
                                                                                                           required=""
                                                                                                               name="pageCount"
                            value="<?php echo $pageCount ?>">
                            <div class="invalid-feedback">
                                Please enter the page count.
                            </div>
                        </div>
                        <div class="col-2"><label for="language" class="form-label">Language <span
                                        class="text-body-secondary"></span></label> <input type="text"
                                                                                                     class="form-control"
                                                                                                     id="language"
                                                                                                     placeholder=""
                                                                                           name="language"
                            value="<?php echo $language ?>">
                        </div>
                        <div class="col-md-5"><label for="publisher" class="form-label">Publisher</label> <input type="text"
                                                                                                               class="form-control"
                                                                                                               id="publisher"
                                                                                                               placeholder=""
                                                                                                               value="<?php echo $publisher ?>"
                            name="publisher">
                            <div class="invalid-feedback">
                                Please select a valid publisher.
                            </div>
                        </div>
                        <div class="col-md-4"><label for="category" class="form-label">State</label> <input type="text"
                                                                                                         class="form-control"
                                                                                                         id="category"
                                                                                                         placeholder=""
                                                                                                         value="<?php echo $category ?>"
                            name="category">
                            <div class="invalid-feedback">
                                Please provide a valid category.
                            </div>
                        </div>
                        <div class="col-md-3"><label for="price" class="form-label">Price</label> <input type="text"
                                                                                                     class="form-control"
                                                                                                     id="price"
                                                                                                     placeholder=""
                                                                                                     required=""
                            value="<?php echo number_format($price,2) ?> "
                            name="price">

                            <div class="invalid-feedback">
                                Price code required.
                            </div>
                        </div>
                        <input type="hidden" name="authorId" value="<?php echo $book->getAuthorId(); ?>">
                        <input type="hidden" name="coverUrl" value="<?php echo $book->getCoverUrl(); ?>">
                        <input type="hidden" name="binding" value="<?php echo $book->getBinding(); ?>">
                    </div><div style="padding-top: 20px ">
                        <button class="col- w-100 btn btn-success btn-lg " type="submit" >Continue to Update</a></button></div>
                </form>
                <div style="height: 20px">
                <form method="POST" action="/BooksStore/book/remove/<?php echo $id;?>">
                    <button class="w-100 btn btn-danger btn-lg" type="submit">Delete</a></button>
                </form>
            </div>
        </div>
    </main>


    <footer class="my-5 pt-5 text-body-secondary text-center text-small"><p class="mb-1"></p>
    <?php include "footer.php" ?>
    </footer>
</div>


<!--to change-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">

</script>
<script>

    // document.querySelector(".text-lange", function (){
    //     return document.querySelector(".text-lange").textContent.;
    // })


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