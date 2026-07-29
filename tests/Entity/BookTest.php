<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

final class BookTest extends TestCase
{
    public function testMapToArrayRoundTripsAllFields(): void
    {
        $book = new Book([
            'id' => 7,
            'title' => '1984',
            'isbn' => '9780451524935',
            'description' => 'A dystopian classic.',
            'publication_date' => '1949-06-08',
            'pages' => 328,
            'language' => 'eng',
            'publisher' => 'Secker & Warburg',
            'category' => 'Fiction',
            'price' => 8.5,
            'cover_url' => 'https://example.test/cover.jpg',
            'hardcover' => 1,
            'author_id' => 3,
        ]);

        self::assertSame([
            ':title' => '1984',
            ':isbn' => '9780451524935',
            ':description' => 'A dystopian classic.',
            ':publication_date' => '1949-06-08',
            ':pages' => 328,
            ':language' => 'eng',
            ':publisher' => 'Secker & Warburg',
            ':category' => 'Fiction',
            ':price' => 8.5,
            ':cover_url' => 'https://example.test/cover.jpg',
            ':hardcover' => 1,
            ':author_id' => 3,
            ':id' => 7,
        ], $book->mapToArray());
    }

    public function testDefaultsAreAppliedForOptionalFields(): void
    {
        $book = new Book([
            'title' => 'Minimal Book',
            'isbn' => '000',
        ]);

        self::assertNull($book->getId());
        self::assertNull($book->getDescription());
        self::assertNull($book->getPublicationDate());
        self::assertFalse($book->isHardcover());
        self::assertSame(0.0, $book->getPrice());
    }
}
