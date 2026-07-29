<?php
/** @var \App\Entity\Author $author */
$books = $author->getBooks();
?>
<div class="py-4">
    <a href="/authors" class="btn btn-link ps-0">&laquo; Back to authors</a>

    <h1 class="h3 mt-2"><?= e($author->getFullName()) ?></h1>
    <ul class="list-unstyled text-muted">
        <?php if ($author->getBirthDate()): ?>
            <li><strong>Born:</strong> <?= e($author->getBirthDate()->format('Y-m-d')) ?></li>
        <?php endif; ?>
        <?php if ($author->getNationality()): ?>
            <li><strong>Nationality:</strong> <?= e($author->getNationality()) ?></li>
        <?php endif; ?>
    </ul>

    <div class="d-flex gap-2 mb-4">
        <a href="/authors/<?= $author->getId() ?>/edit" class="btn btn-outline-secondary">Edit</a>
        <form action="/authors/<?= $author->getId() ?>/delete" method="post" onsubmit="return confirm('Delete this author?');">
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>

    <h2 class="h5">Books by this author</h2>
    <?php if ($books === []): ?>
        <p class="text-muted">No books recorded for this author yet.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($books as $book): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/books/<?= $book->getId() ?>"><?= e($book->getTitle()) ?></a>
                    <span class="text-muted small"><?= number_format($book->getPrice(), 2) ?> €</span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
