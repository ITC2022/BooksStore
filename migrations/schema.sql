-- Readora / BooksStore schema.
-- Run with: mysql -u root -p < migrations/schema.sql
-- (adjust the database name below to match DB_NAME in your .env)

CREATE DATABASE IF NOT EXISTS bookstore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bookstore;

CREATE TABLE IF NOT EXISTS authors
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    first_name  VARCHAR(100) NOT NULL,
    last_name   VARCHAR(100) NOT NULL,
    birth_date  DATE         NULL,
    nationality VARCHAR(100) NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS books
(
    id                INT AUTO_INCREMENT PRIMARY KEY,
    title             VARCHAR(255)  NOT NULL,
    isbn              VARCHAR(20)   NOT NULL UNIQUE,
    description       TEXT          NULL,
    publication_date  DATE          NULL,
    pages             INT           NULL,
    language          VARCHAR(50)   NULL,
    publisher         VARCHAR(150)  NULL,
    category          VARCHAR(100)  NULL,
    price             DECIMAL(6, 2) NOT NULL DEFAULT 0,
    cover_url         VARCHAR(255)  NULL,
    hardcover         TINYINT(1)    NOT NULL DEFAULT 0,
    author_id         INT           NULL,
    CONSTRAINT fk_books_author FOREIGN KEY (author_id) REFERENCES authors (id) ON DELETE SET NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS users
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE
) ENGINE = InnoDB;
