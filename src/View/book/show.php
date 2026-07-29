<?php
/** @var \App\Entity\Book $book */
$author = $book->getAuthor();
?>
<div class="py-4">
    <a href="/books" class="btn btn-link ps-0">&laquo; Back to books</a>

    <div class="row g-4 mt-1">
        <?php if ($book->getCoverUrl()): ?>
            <div class="col-md-4">
                <img src="<?= e($book->getCoverUrl()) ?>" class="img-fluid rounded shadow-sm" alt="Cover of <?= e($book->getTitle()) ?>">
            </div>
        <?php endif; ?>
        <div class="col-md-<?= $book->getCoverUrl() ? '8' : '12' ?>">
            <h1 class="h3"><?= e($book->getTitle()) ?></h1>
            <?php if ($author): ?>
                <p class="text-muted">by <a href="/authors/<?= $author->getId() ?>"><?= e($author->getFullName()) ?></a></p>
            <?php endif; ?>

            <?php if ($book->getDescription()): ?>
                <p><?= nl2br(e($book->getDescription())) ?></p>
            <?php endif; ?>

            <ul class="list-unstyled small text-muted">
                <li><strong>ISBN:</strong> <?= e($book->getIsbn()) ?></li>
                <?php if ($book->getPublicationDate()): ?>
                    <li><strong>Published:</strong> <?= e($book->getPublicationDate()->format('Y-m-d')) ?></li>
                <?php endif; ?>
                <?php if ($book->getPages()): ?>
                    <li><strong>Pages:</strong> <?= (int) $book->getPages() ?></li>
                <?php endif; ?>
                <?php if ($book->getLanguage()): ?>
                    <li><strong>Language:</strong> <?= e($book->getLanguage()) ?></li>
                <?php endif; ?>
                <?php if ($book->getPublisher()): ?>
                    <li><strong>Publisher:</strong> <?= e($book->getPublisher()) ?></li>
                <?php endif; ?>
                <?php if ($book->getCategory()): ?>
                    <li><strong>Category:</strong> <?= e($book->getCategory()) ?></li>
                <?php endif; ?>
                <li><strong>Binding:</strong> <?= $book->isHardcover() ? 'Hardcover' : 'Paperback' ?></li>
            </ul>

            <p class="fs-4 fw-bold"><?= number_format($book->getPrice(), 2) ?> €</p>

            <div class="d-flex gap-2">
                <a href="/books/<?= $book->getId() ?>/edit" class="btn btn-outline-secondary">Edit</a>
                <form action="/books/<?= $book->getId() ?>/delete" method="post" onsubmit="return confirm('Delete this book?');">
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
