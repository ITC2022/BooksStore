<?php

declare(strict_types=1);

namespace App\Tests\Support;

use PDO;

/**
 * Builds a throwaway SQLite in-memory database with the same shape as the
 * MySQL schema in migrations/schema.sql, so repositories can be tested
 * without a real MySQL server.
 */
final class InMemoryDatabase
{
    public static function create(): PDO
    {
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $pdo->exec('
            CREATE TABLE authors (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                first_name TEXT NOT NULL,
                last_name TEXT NOT NULL,
                birth_date TEXT,
                nationality TEXT
            )
        ');

        $pdo->exec('
            CREATE TABLE books (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                isbn TEXT NOT NULL UNIQUE,
                description TEXT,
                publication_date TEXT,
                pages INTEGER,
                language TEXT,
                publisher TEXT,
                category TEXT,
                price REAL NOT NULL DEFAULT 0,
                cover_url TEXT,
                hardcover INTEGER NOT NULL DEFAULT 0,
                author_id INTEGER
            )
        ');

        $pdo->exec('
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT NOT NULL UNIQUE
            )
        ');

        return $pdo;
    }
}
