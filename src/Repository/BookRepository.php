<?php
//namespace App\Repository;
include_once "AbstractRepository.php";

class BookRepository extends AbstractRepository
{




    public function findAll(): array
    {
        $books =[];
        $requeststmnt= $this->query("SELECT * FROM books",$books);
        foreach ($requeststmnt as $item) {
            $book =new Book($item['title'],$item['isbn'],$item['description'],$item['publicationDate'], $item['pageCount'],$item['language'],$item['publisher'],$item['category'],$item['price'],$item['coverUrl'],$item['binding'],$item['authorId'],$item['id']);
            $books[] = $book;

        }
        return $books;
    }




    public function findById( $id): Book
    {

        $bookRequest= $this->query("SELECT * FROM books WHERE id = ?",[$id]);
        $bookRequest= $bookRequest[0];
        $book = new Book($bookRequest['title'],$bookRequest['isbn'], $bookRequest['description'],$bookRequest['publicationDate'], $bookRequest['pageCount'],$bookRequest['language'],$bookRequest['publisher'],$bookRequest['category'],$bookRequest['price'],$bookRequest['coverUrl'],$bookRequest['binding'],$bookRequest['authorId'],$bookRequest['id']);
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
        var_dump($id);
        $params = [$title,$isbn,$description,$publicationDate,$pageCount,$language,$publisher,$category,$price,$coverUrl,$binding,$authorId,$id] ;
        $query = "UPDATE books SET  title=?, isbn=?, description=?, publicationDate=?, pageCount=?, language=?, publisher=?, category=?, price=?, coverUrl=?, binding=?, authorId=? WHERE id=?";
        var_dump($params);
        $this->query($query, $params);


//        $dbcon = $this->getDbConnection();
//        $stmnt = "UPDATE books SET  title=?, isbn=?, description=?, publicationDate=?, pageCount=?, language=?, publisher=?, category=?, price=?, coverUrl=?, binding=?, authorId=? WHERE id=?" ;
//        $request = $dbcon->prepare($stmnt);
//        $request->execute([$title,$isbn,$description,$publicationDate,$pageCount,$language,$publisher,$category,$price,$coverUrl,$binding,$authorId,$id]);
        return $this->findById([$id]);
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
        $params = [$title,$isbn,$description,$publicationDate,$pageCount,$language,$publisher,$category,$price,$coverUrl,$binding,$authorId];
        $query ="INSERT INTO books (title, isbn, description, publicationDate, pageCount, language, publisher, category, price, coverUrl, binding, authorId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)" ;

        $this->query($query,$params);
        $id = (int)$this->getDbConnection()->lastInsertId();
        return self::findById($id);

    }

    public function delete(Book $book): bool
    {
        $stmnt = "DELETE FROM books WHERE id = ?";
        $id= $book->getId();
        if($this->query($stmnt,[$id])){
            return true;
        }else{
            return false;
        }

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
            $books[] = (int)$item["id"];

        }
        return $books;
    }








}