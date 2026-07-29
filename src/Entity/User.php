<?php

declare(strict_types=1);

namespace App\Entity;

final class User implements EntityInterface
{
    private ?int $id;
    private string $username;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int) $data['id'] : null;
        $this->username = $data['username'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function mapToArray(): array
    {
        return [
            ':username' => $this->username,
            ':id' => $this->id,
        ];
    }
}
