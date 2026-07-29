<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Book;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\View;

final class BookController extends AbstractController
{
    private BookRepository $books;
    private AuthorRepository $authors;

    public function __construct()
    {
        $this->books = new BookRepository();
        $this->authors = new AuthorRepository();
    }

    public function index(): void
    {
        View::render('book/index', ['books' => $this->books->findAll()]);
    }

    public function show(int $id): void
    {
        $book = $this->books->findById($id);

        if ($book === null) {
            $this->notFound();
            return;
        }

        View::render('book/show', ['book' => $book]);
    }

    public function create(): void
    {
        View::render('book/form', [
            'book' => null,
            'authors' => $this->authors->findAll(),
            'action' => '/books',
        ]);
    }

    public function store(): void
    {
        $book = new Book($this->fromRequest());
        $created = $this->books->create($book);

        $this->redirect('/books/' . $created->getId());
    }

    public function edit(int $id): void
    {
        $book = $this->books->findById($id);

        if ($book === null) {
            $this->notFound();
            return;
        }

        View::render('book/form', [
            'book' => $book,
            'authors' => $this->authors->findAll(),
            'action' => '/books/' . $id,
        ]);
    }

    public function update(int $id): void
    {
        $data = $this->fromRequest();
        $data['id'] = $id;

        $this->books->update(new Book($data));

        $this->redirect('/books/' . $id);
    }

    public function destroy(int $id): void
    {
        $book = $this->books->findById($id);

        if ($book !== null) {
            $this->books->remove($book);
        }

        $this->redirect('/books');
    }

    private function fromRequest(): array
    {
        $post = static fn (string $key): ?string => trim((string) ($_POST[$key] ?? '')) !== ''
            ? trim((string) $_POST[$key])
            : null;

        return [
            'title' => $post('title') ?? '',
            'isbn' => $post('isbn') ?? '',
            'description' => $post('description'),
            'publication_date' => $post('publication_date'),
            'pages' => $post('pages'),
            'language' => $post('language'),
            'publisher' => $post('publisher'),
            'category' => $post('category'),
            'price' => $post('price') ?? 0,
            'cover_url' => $post('cover_url'),
            'hardcover' => isset($_POST['hardcover']) ? 1 : 0,
            'author_id' => $post('author_id'),
        ];
    }
}
