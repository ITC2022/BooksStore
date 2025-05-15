<?php
//namespace App\Repository;
include_once "AbstractRepository.php";

class BookRepository extends AbstractRepository
{


    public function findAll(): array
    {
        $books =[];
        $dbcon = $this->getDbConnection();
        $stmnt = "SELECT * FROM books";
        $request = $dbcon->prepare($stmnt);
        $request->execute();
        $requeststmnt = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($requeststmnt as $item) {
            $book =new Book($item['title'],$item['isbn'],$item['description'],$item['publicationDate'], $item['pageCount'],$item['language'],$item['publisher'],$item['category'],$item['price'],$item['coverUrl'],$item['binding'],$item['authorId'],$item['id']);
            $books[] = $book;

        }
        return $books;
    }




    public function findById( $id): Book
    {
        $dbcon = $this->getDbConnection();
        $stmnt = "SELECT * FROM books WHERE id = ?";
        $request = $dbcon->prepare($stmnt);
        $request->execute([$id]);
        $bookRequest= $request->fetch(PDO::FETCH_ASSOC);
        $book =new Book($bookRequest['title'],$bookRequest['isbn'], $bookRequest['description'],$bookRequest['publicationDate'], $bookRequest['pageCount'],$bookRequest['language'],$bookRequest['publisher'],$bookRequest['category'],$bookRequest['price'],$bookRequest['coverUrl'],$bookRequest['binding'],$bookRequest['authorId'],$bookRequest['id']);
        return $book;


    }

    public function update(Book $book) :Book
    {

        $title= $book->getTitle();
        $isbn=$book->getIsbn();
        $description = $book->getDescription();
        $publicationDate= $book->getPublicationDate()->format("Y-m-d");
        $pageCount = $book->getPageCount();
        $language = $book->getLanguage();
        $publisher = $book->getPublisher();
        $category = $book->getCategory();
        $price = $book->getPrice();
        $coverUrl = $book->getCoverUrl();
        $binding = $book->getBinding();
        $authorId = $book->getAuthorId();
        $id = $book->getId();


        $dbcon = $this->getDbConnection();
        $stmnt = "UPDATE books SET  title=?, isbn=?, description=?, publicationDate=?, pageCount=?, language=?, publisher=?, category=?, price=?, coverUrl=?, binding=?, authorId=? WHERE id=?" ;
        $request = $dbcon->prepare($stmnt);
        $request->execute([$title,$isbn,$description,$publicationDate,$pageCount,$language,$publisher,$category,$price,$coverUrl,$binding,$authorId,$id]);
        return self::findById($id);
    }

    public function create(Book $book) : Book
    {

        $title= $book->getTitle();
        $isbn=$book->getIsbn();
        $description = $book->getDescription();
        $publicationDate= $book->getPublicationDate()->format("Y-m-d");
        $pageCount = $book->getPageCount();
        $language = $book->getLanguage();
        $publisher = $book->getPublisher();
        $category = $book->getCategory();
        $price = $book->getPrice();
        $coverUrl = $book->getCoverUrl();
        $binding = $book->getBinding();
        $authorId = $book->getAuthorId();


        $dbcon = $this->getDbConnection();
        $stmnt = "INSERT INTO books (title, isbn, description, publicationDate, pageCount, language, publisher, category, price, coverUrl, binding, authorId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $request = $dbcon->prepare($stmnt);
        $request->execute([$title,$isbn,$description,$publicationDate,$pageCount,$language,$publisher,$category,$price,$coverUrl,$binding,$authorId]);
        $id = (int)$dbcon->lastInsertId();
        return self::findById($id);

    }

    public function delete(Book $book): bool
    {
        $id= $book->getId();
        $dbcon = $this->getDbConnection();
        $stmnt = "DELETE FROM books WHERE id = ?";
        $request = $dbcon->prepare($stmnt);
        return $request->execute([$id]);

    }
    public function getAuthor(Author $author) : array
    {
        $books =[];
        $id = $author->getId();

        $dbcon = $this->getDbConnection();
        $stmnt = "SELECT * FROM books WHERE authorId = ? ";
        $request = $dbcon->prepare($stmnt);
        $request->execute([$id]);
        $requeststmnt = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($requeststmnt as $item) {
          // $book =new Book($item['title'],$item['isbn'],$item['description'],$item['publicationDate'], $item['pageCount'],$item['language'],$item['publisher'],$item['category'],$item['price'],$item['coverUrl'],$item['binding'],$item['authorId'],$item['id']);
            $books[] = $item["id"];

        }
        return $books;
    }








}