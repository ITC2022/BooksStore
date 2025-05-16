<?php
//namespace App\Entity;
class Book
{

    private ?int $id;
    private string $title;
    private string $isbn;
    private string $description;
private DateTime $publicationDate;
private int $pageCount;
private string $language;
private string $publisher;
private string $category;
private float $price;
private string $coverUrl;
private bool $binding;
private int $authorId;

private Author $author;

    /**
     * @param string $title
     * @param string $description
     * @param DateTime $publicationDate
     * @param int $pageCount
     * @param string $language
     * @param string $publisher
     * @param string $category
     * @param float $price
     * @param string $coverUrl
     * @param bool $binding
     * @param int $authorId
     */
    public function __construct(string $title,string $isbn, string $description, string $publicationDate, int $pageCount, string $language, string $publisher, string $category, float $price, string $coverUrl, bool $binding, int $authorId, ?int $id=null)
    {
        $this->title = $title;
        $this->isbn = $isbn;
        $this->description = $description;
        $this->publicationDate = new DateTime($publicationDate);
        $this->pageCount = $pageCount;
        $this->language = $language;
        $this->publisher = $publisher;
        $this->category = $category;
        $this->price = $price;
        $this->coverUrl = $coverUrl;
        $this->binding = $binding;
        $this->authorId = $authorId;
        $this->id = $id;
        $repo = new AuthorRepository();
        $this->author = $repo->findById($authorId);
    }

    public function getId(): int
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPublicationDate(): DateTime
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(DateTime $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function setPageCount(int $pageCount): void
    {
        $this->pageCount = $pageCount;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
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

    public function getCoverUrl(): string
    {
        return $this->coverUrl;
    }

    public function setCoverUrl(string $coverUrl): void
    {
        $this->coverUrl = $coverUrl;
    }

    public function getBinding(): bool
    {
        return $this->binding;
    }

    public function setBinding(bool $binding): void
    {
        $this->binding = $binding;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    public function objectElements(object $book) : array
    {
        $elements= ["title"=>$book->getTitle(),
        "isbn"=>$book->getIsbn(),
         "description"=>$book->getDescription(),
        "publicationDate"=>$book->getPublicationDate()->format("Y-m-d"),
            "pageCount"=>$book->getPageCount(),
            "language"=>$book->getLanguage(),
            "publisher"=>$book->getPublisher(),
            "category"=>$book->getCategory(),
            "price"=>$book->getPrice(),
            "coverUrl"=>$book->getCoverUrl(),
        "binding"=>$book->getBinding(),
        "authorId"=>$book->getAuthorId()];
        return $elements;
    }




}