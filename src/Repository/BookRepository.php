<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;
use App\Entity\EntityInterface;
use PDO;

final class BookRepository extends AbstractRepository
{
    protected string $table = 'books';

    /**
     * @return Book[]
     */
    public function findByAuthorId(int $authorId): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE author_id = :author_id ORDER BY title");
        $statement->execute([':author_id' => $authorId]);

        return array_map(
            fn (array $row): Book => new Book($row),
            $statement->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    protected function hydrate(array $row): EntityInterface
    {
        return new Book($row);
    }
}
