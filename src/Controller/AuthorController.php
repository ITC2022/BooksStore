<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use App\View;

final class AuthorController extends AbstractController
{
    private AuthorRepository $authors;

    public function __construct()
    {
        $this->authors = new AuthorRepository();
    }

    public function index(): void
    {
        View::render('author/index', ['authors' => $this->authors->findAll()]);
    }

    public function show(int $id): void
    {
        $author = $this->authors->findById($id);

        if ($author === null) {
            $this->notFound();
            return;
        }

        View::render('author/show', ['author' => $author]);
    }

    public function create(): void
    {
        View::render('author/form', ['author' => null, 'action' => '/authors']);
    }

    public function store(): void
    {
        $author = new Author($this->fromRequest());
        $created = $this->authors->create($author);

        $this->redirect('/authors/' . $created->getId());
    }

    public function edit(int $id): void
    {
        $author = $this->authors->findById($id);

        if ($author === null) {
            $this->notFound();
            return;
        }

        View::render('author/form', ['author' => $author, 'action' => '/authors/' . $id]);
    }

    public function update(int $id): void
    {
        $data = $this->fromRequest();
        $data['id'] = $id;

        $this->authors->update(new Author($data));

        $this->redirect('/authors/' . $id);
    }

    public function destroy(int $id): void
    {
        $author = $this->authors->findById($id);

        if ($author !== null) {
            $this->authors->remove($author);
        }

        $this->redirect('/authors');
    }

    private function fromRequest(): array
    {
        $post = static fn (string $key): ?string => trim((string) ($_POST[$key] ?? '')) !== ''
            ? trim((string) $_POST[$key])
            : null;

        return [
            'first_name' => $post('first_name') ?? '',
            'last_name' => $post('last_name') ?? '',
            'birth_date' => $post('birth_date'),
            'nationality' => $post('nationality'),
        ];
    }
}
