<?php
/** @var string $message */
/** @var bool $debug */
?>
<div class="text-center py-5">
    <h1 class="display-4">500</h1>
    <p class="lead">Something went wrong.</p>
    <?php if ($debug): ?>
        <pre class="text-start bg-light p-3 rounded"><?= e($message) ?></pre>
    <?php endif; ?>
    <a href="/" class="btn btn-dark">Back to home</a>
</div>
