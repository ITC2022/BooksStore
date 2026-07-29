<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Author;
use App\Entity\EntityInterface;

final class AuthorRepository extends AbstractRepository
{
    protected string $table = 'authors';

    protected function hydrate(array $row): EntityInterface
    {
        return new Author($row);
    }
}
