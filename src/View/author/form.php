<?php
/**
 * @var \App\Entity\Author|null $author
 * @var string $action
 */
?>
<div class="py-4">
    <h1 class="h3 mb-4"><?= $author ? 'Edit author' : 'Add a new author' ?></h1>

    <form action="<?= e($action) ?>" method="post" class="col-lg-6">
        <div class="mb-3">
            <label class="form-label" for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required
                   value="<?= e($author?->getFirstName()) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required
                   value="<?= e($author?->getLastName()) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="birth_date">Birth date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date"
                   value="<?= e($author?->getBirthDate()?->format('Y-m-d')) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="nationality">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality"
                   value="<?= e($author?->getNationality()) ?>">
        </div>

        <button type="submit" class="btn btn-dark">Save</button>
        <a href="/authors" class="btn btn-link">Cancel</a>
    </form>
</div>
