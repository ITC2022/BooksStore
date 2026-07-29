<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AuthorRepository;
use DateTimeImmutable;

final class Book implements EntityInterface
{
    private ?int $id;
    private string $title;
    private string $isbn;
    private ?string $description;
    private ?DateTimeImmutable $publicationDate;
    private ?int $pages;
    private ?string $language;
    private ?string $publisher;
    private ?string $category;
    private float $price;
    private ?string $coverUrl;
    private bool $hardcover;
    private ?int $authorId;

    /** lazily loaded on first call to getAuthor() */
    private ?Author $author = null;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int) $data['id'] : null;
        $this->title = $data['title'];
        $this->isbn = $data['isbn'];
        $this->description = $data['description'] ?? null;
        $this->publicationDate = !empty($data['publication_date']) ? new DateTimeImmutable($data['publication_date']) : null;
        $this->pages = isset($data['pages']) ? (int) $data['pages'] : null;
        $this->language = $data['language'] ?? null;
        $this->publisher = $data['publisher'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->price = (float) ($data['price'] ?? 0);
        $this->coverUrl = $data['cover_url'] ?? null;
        $this->hardcover = (bool) ($data['hardcover'] ?? false);
        $this->authorId = isset($data['author_id']) ? (int) $data['author_id'] : null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPublicationDate(): ?DateTimeImmutable
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?DateTimeImmutable $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(?int $pages): void
    {
        $this->pages = $pages;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(?string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCoverUrl(): ?string
    {
        return $this->coverUrl;
    }

    public function setCoverUrl(?string $coverUrl): void
    {
        $this->coverUrl = $coverUrl;
    }

    public function isHardcover(): bool
    {
        return $this->hardcover;
    }

    public function setHardcover(bool $hardcover): void
    {
        $this->hardcover = $hardcover;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function getAuthor(): ?Author
    {
        if ($this->author === null && $this->authorId !== null) {
            $this->author = (new AuthorRepository())->findById($this->authorId);
        }

        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
        $this->authorId = $author->getId();
    }

    public function mapToArray(): array
    {
        return [
            ':title' => $this->title,
            ':isbn' => $this->isbn,
            ':description' => $this->description,
            ':publication_date' => $this->publicationDate?->format('Y-m-d'),
            ':pages' => $this->pages,
            ':language' => $this->language,
            ':publisher' => $this->publisher,
            ':category' => $this->category,
            ':price' => $this->price,
            ':cover_url' => $this->coverUrl,
            ':hardcover' => (int) $this->hardcover,
            ':author_id' => $this->authorId,
            ':id' => $this->id,
        ];
    }
}
