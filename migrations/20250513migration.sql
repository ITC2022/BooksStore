CREATE DATABASE bookstoreDB;
USE bookstoreDB;


CREATE TABLE authors (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         firstName VARCHAR(100),
                         lastName VARCHAR(100),
                         birthDate DATE,
                         nationality VARCHAR(100)
);

CREATE TABLE books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255),
                       isbn VARCHAR(20) UNIQUE,
                       description TEXT,
                       publicationDate DATE,
                       pageCount INT,
                       language VARCHAR(50),
                       publisher VARCHAR(100),
                       category VARCHAR(100),
                       coverUrl VARCHAR(255),
                       binding bool,
                       authorId INT,
                       FOREIGN KEY (authorId) REFERENCES authors(id)
);
