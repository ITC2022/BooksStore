<?php
/** @var \App\Entity\Book[] $books */
?>
<div class="d-flex justify-content-between align-items-center py-4">
    <h1 class="h2">Books</h1>
    <a href="/books/create" class="btn btn-dark">+ Add book</a>
</div>

<?php if ($books === []): ?>
    <p class="text-muted">No books yet. <a href="/books/create">Add the first one</a>.</p>
<?php endif; ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php foreach ($books as $book): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <?php if ($book->getCoverUrl()): ?>
                    <img src="<?= e($book->getCoverUrl()) ?>" class="card-img-top" style="height: 320px; object-fit: cover;" alt="Cover of <?= e($book->getTitle()) ?>">
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title fw-bold"><?= e($book->getTitle()) ?></h6>
                    <p class="card-text text-muted small mb-1"><?= e($book->getAuthor()?->getFullName() ?? 'Unknown author') ?></p>
                    <div class="mt-auto d-flex justify-content-between align-items-center pt-2">
                        <a href="/books/<?= $book->getId() ?>" class="btn btn-sm btn-outline-info">Details</a>
                        <small class="text-body-secondary"><?= number_format($book->getPrice(), 2) ?> €</small>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
