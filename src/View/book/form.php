<?php
/**
 * @var \App\Entity\Book|null $book
 * @var \App\Entity\Author[] $authors
 * @var string $action
 */
?>
<div class="py-4">
    <h1 class="h3 mb-4"><?= $book ? 'Edit book' : 'Add a new book' ?></h1>

    <form action="<?= e($action) ?>" method="post" class="col-lg-8">
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required
                   value="<?= e($book?->getTitle()) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required
                   value="<?= e($book?->getIsbn()) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= e($book?->getDescription()) ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" for="publication_date">Publication date</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date"
                       value="<?= e($book?->getPublicationDate()?->format('Y-m-d')) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" for="pages">Pages</label>
                <input type="number" min="1" class="form-control" id="pages" name="pages"
                       value="<?= e((string) $book?->getPages()) ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language"
                       value="<?= e($book?->getLanguage()) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher"
                       value="<?= e($book?->getPublisher()) ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category"
                       value="<?= e($book?->getCategory()) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" for="price">Price (€)</label>
                <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" required
                       value="<?= e((string) $book?->getPrice()) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cover_url">Cover image URL</label>
            <input type="url" class="form-control" id="cover_url" name="cover_url"
                   value="<?= e($book?->getCoverUrl()) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="author_id">Author</label>
            <select class="form-select" id="author_id" name="author_id" required>
                <option value="">-- select an author --</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?= $author->getId() ?>" <?= $book?->getAuthorId() === $author->getId() ? 'selected' : '' ?>>
                        <?= e($author->getFullName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox" class="form-check-input" id="hardcover" name="hardcover"
                   <?= $book?->isHardcover() ? 'checked' : '' ?>>
            <label class="form-check-label" for="hardcover">Hardcover</label>
        </div>

        <button type="submit" class="btn btn-dark">Save</button>
        <a href="/books" class="btn btn-link">Cancel</a>
    </form>
</div>
