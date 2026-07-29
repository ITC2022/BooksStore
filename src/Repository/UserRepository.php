<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Entity\User;

final class UserRepository extends AbstractRepository
{
    protected string $table = 'users';

    protected function hydrate(array $row): EntityInterface
    {
        return new User($row);
    }
}
