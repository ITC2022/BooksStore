<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BookRepository;
use DateTimeImmutable;

final class Author implements EntityInterface
{
    private ?int $id;
    private string $firstName;
    private string $lastName;
    private ?DateTimeImmutable $birthDate;
    private ?string $nationality;

    /** @var Book[]|null lazily loaded on first call to getBooks() */
    private ?array $books = null;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int) $data['id'] : null;
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->birthDate = !empty($data['birth_date']) ? new DateTimeImmutable($data['birth_date']) : null;
        $this->nationality = $data['nationality'] ?? null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        return trim("{$this->firstName} {$this->lastName}");
    }

    public function getBirthDate(): ?DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setBirthDate(?DateTimeImmutable $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return Book[]
     */
    public function getBooks(): array
    {
        if ($this->books === null) {
            $this->books = $this->id !== null
                ? (new BookRepository())->findByAuthorId($this->id)
                : [];
        }

        return $this->books;
    }

    public function mapToArray(): array
    {
        return [
            ':first_name' => $this->firstName,
            ':last_name' => $this->lastName,
            ':birth_date' => $this->birthDate?->format('Y-m-d'),
            ':nationality' => $this->nationality,
            ':id' => $this->id,
        ];
    }
}
