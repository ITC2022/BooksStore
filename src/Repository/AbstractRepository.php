<?php

declare(strict_types=1);

namespace App\Repository;

use App\Database;
use App\Entity\EntityInterface;
use PDO;

abstract class AbstractRepository
{
    protected PDO $pdo;
    protected string $table;

    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo ?? Database::connection();
    }

    /**
     * @return EntityInterface[]
     */
    public function findAll(): array
    {
        $statement = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id");

        return array_map(
            fn (array $row): EntityInterface => $this->hydrate($row),
            $statement->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    public function findById(int $id): ?EntityInterface
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $statement->execute([':id' => $id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row === false ? null : $this->hydrate($row);
    }

    public function create(EntityInterface $entity): EntityInterface
    {
        $data = $entity->mapToArray();
        unset($data[':id']);

        $columns = array_map(static fn (string $key): string => ltrim($key, ':'), array_keys($data));
        $placeholders = array_keys($data);

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->table,
            implode(', ', $columns),
            implode(', ', $placeholders)
        );

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        return $this->findById((int) $this->pdo->lastInsertId());
    }

    public function update(EntityInterface $entity): EntityInterface
    {
        $data = $entity->mapToArray();

        $assignments = [];
        foreach (array_keys($data) as $key) {
            if ($key === ':id') {
                continue;
            }
            $assignments[] = ltrim($key, ':') . ' = ' . $key;
        }

        $sql = sprintf('UPDATE %s SET %s WHERE id = :id', $this->table, implode(', ', $assignments));

        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        return $this->findById($entity->getId());
    }

    public function remove(EntityInterface $entity): bool
    {
        $statement = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");

        return $statement->execute([':id' => $entity->getId()]);
    }

    abstract protected function hydrate(array $row): EntityInterface;
}
