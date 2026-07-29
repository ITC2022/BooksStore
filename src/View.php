<?php

declare(strict_types=1);

namespace App;

final class View
{
    public static function render(string $template, array $data = []): void
    {
        $base = __DIR__ . '/View';

        $render = static function (string $file, array $data) use ($base): void {
            extract($data, EXTR_SKIP);
            require $base . '/' . $file . '.php';
        };

        $render('layout/header', $data);
        $render($template, $data);
        $render('layout/footer', $data);
    }
}
