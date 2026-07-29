<?php

declare(strict_types=1);

if (!function_exists('e')) {
    /**
     * Escape a value for safe HTML output.
     */
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}
