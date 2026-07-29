<?php
/** @var \App\Entity\Author[] $authors */
?>
<div class="d-flex justify-content-between align-items-center py-4">
    <h1 class="h2">Authors</h1>
    <a href="/authors/create" class="btn btn-dark">+ Add author</a>
</div>

<?php if ($authors === []): ?>
    <p class="text-muted">No authors yet. <a href="/authors/create">Add the first one</a>.</p>
<?php endif; ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php foreach ($authors as $author): ?>
        <div class="col">
            <div class="card h-100 shadow-sm text-center p-3">
                <h2 class="h5 fw-normal mb-1"><?= e($author->getFullName()) ?></h2>
                <?php if ($author->getNationality()): ?>
                    <p class="text-muted small mb-3"><?= e($author->getNationality()) ?></p>
                <?php endif; ?>
                <a class="btn btn-sm btn-outline-secondary mt-auto" href="/authors/<?= $author->getId() ?>">View details &raquo;</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
