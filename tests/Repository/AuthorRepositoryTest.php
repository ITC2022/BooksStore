<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use App\Tests\Support\InMemoryDatabase;
use PHPUnit\Framework\TestCase;

final class AuthorRepositoryTest extends TestCase
{
    private AuthorRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new AuthorRepository(InMemoryDatabase::create());
    }

    public function testCreateAndFindById(): void
    {
        $created = $this->repository->create(new Author([
            'first_name' => 'Roald',
            'last_name' => 'Dahl',
            'birth_date' => '1916-09-13',
            'nationality' => 'British',
        ]));

        self::assertNotNull($created->getId());

        $found = $this->repository->findById($created->getId());

        self::assertNotNull($found);
        self::assertSame('Roald Dahl', $found->getFullName());
        self::assertSame('British', $found->getNationality());
        self::assertSame('1916-09-13', $found->getBirthDate()?->format('Y-m-d'));
    }

    public function testFindByIdReturnsNullWhenMissing(): void
    {
        self::assertNull($this->repository->findById(999));
    }

    public function testFindAllReturnsEveryRow(): void
    {
        $this->repository->create(new Author(['first_name' => 'A', 'last_name' => 'One', 'birth_date' => null, 'nationality' => null]));
        $this->repository->create(new Author(['first_name' => 'B', 'last_name' => 'Two', 'birth_date' => null, 'nationality' => null]));

        self::assertCount(2, $this->repository->findAll());
    }

    public function testUpdatePersistsChanges(): void
    {
        $author = $this->repository->create(new Author([
            'first_name' => 'Jo',
            'last_name' => 'Rowling',
            'birth_date' => null,
            'nationality' => null,
        ]));

        $author->setNationality('British');
        $this->repository->update($author);

        $reloaded = $this->repository->findById($author->getId());

        self::assertSame('British', $reloaded->getNationality());
    }

    public function testRemoveDeletesTheRow(): void
    {
        $author = $this->repository->create(new Author([
            'first_name' => 'Temp',
            'last_name' => 'Author',
            'birth_date' => null,
            'nationality' => null,
        ]));

        self::assertTrue($this->repository->remove($author));
        self::assertNull($this->repository->findById($author->getId()));
    }
}
