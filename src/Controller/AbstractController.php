<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;

/**
 * Contract shared by every CRUD resource controller (Book, Author): each
 * concrete controller implements the same set of actions, mapped one-to-one
 * to the routes declared in public/index.php. The redirect/notFound helpers
 * are shared behaviour, not part of the contract, so they live here as
 * concrete protected methods instead of being duplicated in every subclass.
 */
abstract class AbstractController
{
    abstract public function index(): void;

    abstract public function show(int $id): void;

    abstract public function create(): void;

    abstract public function store(): void;

    abstract public function edit(int $id): void;

    abstract public function update(int $id): void;

    abstract public function destroy(int $id): void;

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }

    protected function notFound(): void
    {
        http_response_code(404);
        View::render('errors/404');
    }
}
