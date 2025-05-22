<?php

$authorsRepo = new AuthorRepository();
$authors = $authorsRepo->findAll();



?>

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

<div class="container">

    <div class="container col-lg-10 ">
        <main>
            <div class="py-5 text-center">
                <!--            <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg"-->
                <!--                                           alt="" width="72" height="57">-->
                <h1 class="h2">Insert Book</h1>

            </div>
    <main>
        <div class="py-5 text-center">
<!--            <img class="d-block mx-auto mb-5" src=""-->
<!--                                           alt="" width="200" height="290">-->
            <h1 class="h2"></h1>
            <p class="lead" ></p> </div>

<!--        <div class="col-md-7 col-lg-8"><h4 class="mb-3">Create Book</h4>-->
            <form class="needs-validation" novalidate="" method="POST" action="/BooksStore/book/new/">
                <div class="row g-3">
                    <div class="col-sm-6"><label for="firstName" class="form-label">Title</label> <input
                                type="text" class="form-control" id="firstName" placeholder="" name="title" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-sm-6"><label for="lastName" class="form-label">ISBN </label> <input
                                type="text" class="form-control" id="lastName" placeholder="" name="isbn" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-12"><label for="username" class="form-label">Description</label>
                        <div class="input-group has-validation">
                            <textarea name="description" class="form-controll col-sm-12" ></textarea>


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
                                                                                       value="">
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
                                                                                                           value="">
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
                                                                                       value="">
                    </div>
                    <div class="col-md-5"><label for="publisher" class="form-label">Publisher</label> <input type="text"
                                                                                                             class="form-control"
                                                                                                             id="publisher"
                                                                                                             placeholder=""
                                                                                                             value=""
                                                                                                             name="publisher">
                        <div class="invalid-feedback">
                            Please select a valid publisher.
                        </div>
                    </div>
                    <div class="col-md-4"><label for="category" class="form-label">Category</label> <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="category"
                                                                                                        placeholder=""
                                                                                                        value=""
                                                                                                        name="category">
                        <div class="invalid-feedback">
                            Please provide a valid category.
                        </div>
                    </div>
                    <div class="col-md-3"><label for="price" class="form-label">Price</label> <input type="number"
                                                                                                     class="form-control"
                                                                                                     id="price"
                                                                                                     placeholder=""
                                                                                                     required=""
                                                                                                     value=" "
                                                                                                     name="price">

                        <div class="invalid-feedback">
                            Price code required.
                        </div>
                    </div>
                    <div class="col-md-3"><label for="authorId" class="form-label">Author</label>


                                <?php
                                $input = " <select class='form-control' id='authorId' name='authorId' required>";
                                foreach ($authors as $author){
                                    $input .= "<option    value=".$author->getId()."  >".$author->getFirstName()." ".$author->getLastName()."</option>";


                                }
                                $input .= "</select>";

                                echo $input;

                                ?>



                        <div class="invalid-feedback">
                            Author ID is required.
                        </div>
                    </div>
                    <div class="col-md-3"><label for="coverUrl" class="form-label">Cover Url</label>


                        <input type="text"
                                                                                                     class="form-control"
                                                                                                     id="coverUrl"
                                                                                                     placeholder=""
                                                                                                     required=""
                                                                                                     value=" "
                                                                                                     name="coverUrl">

                        <div class="invalid-feedback">
                            Cover Url required.
                        </div>
                    </div>
                    <div class="col-md-3"><label for="binding" class="form-label">Binding</label>

                        <select class='form-control' id='binding' name='binding' required>
                            <option value="true" selected="selected" >True</option>
                            <option value="false" selected="selected" >False</option>
                        </select>

<!--                        <input type="text"-->
<!--                                                                                                     class="form-control"-->
<!--                                                                                                     id="binding"-->
<!--                                                                                                     placeholder=""-->
<!--                                                                                                     required=""-->
<!--                                                                                                     value=" "-->
<!--                                                                                                     name="binding">-->

                        <div class="invalid-feedback">
                            Binding required.
                        </div>
                    </div>



                </div><div style="padding-top: 20px ">
                    <button class="col- w-100 btn btn-success btn-lg " type="submit" >Continue to Create</a></button></div>
            </form>
            <div style="height: 20px">

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