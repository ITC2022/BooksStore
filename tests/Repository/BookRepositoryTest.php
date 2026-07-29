<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Database;
use App\Entity\Author;
use App\Entity\Book;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Tests\Support\InMemoryDatabase;
use PDO;
use PHPUnit\Framework\TestCase;

final class BookRepositoryTest extends TestCase
{
    private PDO $pdo;
    private BookRepository $books;
    private AuthorRepository $authors;

    protected function setUp(): void
    {
        $this->pdo = InMemoryDatabase::create();
        // Book::getAuthor() and Author::getBooks() lazily create their own
        // repository instances, so they resolve through the shared singleton.
        Database::setConnection($this->pdo);

        $this->books = new BookRepository($this->pdo);
        $this->authors = new AuthorRepository($this->pdo);
    }

    public function testCreateAndFindById(): void
    {
        $author = $this->authors->create(new Author([
            'first_name' => 'Harper',
            'last_name' => 'Lee',
            'birth_date' => null,
            'nationality' => null,
        ]));

        $created = $this->books->create(new Book([
            'title' => 'To Kill a Mockingbird',
            'isbn' => '9780061120084',
            'price' => 10.99,
            'author_id' => $author->getId(),
        ]));

        $found = $this->books->findById($created->getId());

        self::assertNotNull($found);
        self::assertSame('To Kill a Mockingbird', $found->getTitle());
        self::assertSame(10.99, $found->getPrice());
    }

    public function testGetAuthorLazilyResolvesTheRelatedEntity(): void
    {
        $author = $this->authors->create(new Author([
            'first_name' => 'George',
            'last_name' => 'Orwell',
            'birth_date' => null,
            'nationality' => null,
        ]));

        $book = $this->books->create(new Book([
            'title' => '1984',
            'isbn' => '9780451524935',
            'price' => 8.5,
            'author_id' => $author->getId(),
        ]));

        self::assertSame('George Orwell', $book->getAuthor()?->getFullName());
    }

    public function testFindByAuthorIdReturnsOnlyThatAuthorsBooks(): void
    {
        $author = $this->authors->create(new Author([
            'first_name' => 'Jane',
            'last_name' => 'Austen',
            'birth_date' => null,
            'nationality' => null,
        ]));
        $otherAuthor = $this->authors->create(new Author([
            'first_name' => 'Other',
            'last_name' => 'Author',
            'birth_date' => null,
            'nationality' => null,
        ]));

        $this->books->create(new Book(['title' => 'Pride and Prejudice', 'isbn' => '1', 'price' => 5, 'author_id' => $author->getId()]));
        $this->books->create(new Book(['title' => 'Emma', 'isbn' => '2', 'price' => 5, 'author_id' => $author->getId()]));
        $this->books->create(new Book(['title' => 'Unrelated', 'isbn' => '3', 'price' => 5, 'author_id' => $otherAuthor->getId()]));

        $result = $this->books->findByAuthorId($author->getId());

        self::assertCount(2, $result);
        self::assertContainsOnlyInstancesOf(Book::class, $result);
    }
}
