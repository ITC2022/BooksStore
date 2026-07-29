<?php

declare(strict_types=1);

namespace App\Entity;

interface EntityInterface
{
    public function getId(): ?int;

    /**
     * Maps the entity to a `:column => value` array ready to be bound
     * to a PDO prepared statement by AbstractRepository.
     *
     * @return array<string, mixed>
     */
    public function mapToArray(): array;
}
