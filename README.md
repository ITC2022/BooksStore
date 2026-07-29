# Readora — BooksStore

![PHP](https://img.shields.io/badge/PHP-%3E%3D8.1-777bb4)
![License](https://img.shields.io/badge/license-MIT-blue)
![Tests](https://img.shields.io/badge/tests-PHPUnit-6a9955)

A small **framework-free PHP** application for managing a catalogue of books and authors —
built to practice core backend fundamentals (OOP, PDO, MVC, routing, testing) without
hiding them behind a framework.

No Laravel, no Symfony: the router, the ORM-ish repository layer and the view renderer
are all hand-written, on purpose, to demonstrate how these pieces work under the hood.

## Features

- Full CRUD for **Books** and **Authors**, with a lazily-loaded relationship between them
  (a book resolves its author, and an author resolves their books, only when actually asked for)
- A minimal hand-rolled **router** (`App\Router`) mapping `METHOD /path/{id}` patterns to closures
- A generic **Repository** layer (`App\Repository\AbstractRepository`) built on PDO prepared
  statements — no raw string interpolation of user input anywhere
- Environment-based configuration via `.env` (no credentials committed to the repo)
- A seed script that pulls real book data from the [Open Library API](https://openlibrary.org/developers/api)
- A PHPUnit test suite covering the router and the repositories (against an in-memory SQLite DB)

## Tech stack

PHP 8.1+ · PDO (MySQL) · Composer (PSR-4 autoloading) · [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) ·
PHPUnit 10 · Bootstrap 5 (CDN, view layer only)

## Project structure

```
public/            front controller (public/index.php) — the only web-exposed directory
src/
  Controller/       HTTP request handling, one class per resource
  Entity/           plain PHP objects (Book, Author, User)
  Repository/        PDO-backed persistence layer
  View/              PHP templates (layout, book/, author/, errors/)
  Router.php         tiny pattern-based router
  View.php           template renderer
  Database.php        lazy, shared PDO connection built from environment variables
migrations/
  schema.sql          MySQL schema (tables: authors, books, users)
scripts/
  seed.php            fetches sample data from Open Library and inserts it
tests/                PHPUnit tests (SQLite in-memory, no real DB needed)
```

## Getting started

### Requirements

- PHP 8.1+ with the `pdo_mysql` extension
- Composer
- A MySQL (or MariaDB) server

### Setup

```bash
composer install
cp .env.example .env      # then edit DB_* to match your local MySQL setup
mysql -u root -p < migrations/schema.sql
composer seed              # optional: populate the catalogue with real book data
composer serve              # starts php -S localhost:8000 -t public
```

Visit `http://localhost:8000`.

### Running the tests

```bash
composer test
```

The test suite doesn't touch your real database — repositories are tested against a
throwaway SQLite in-memory connection created per test.

## Routes

| Method | Path                 | Action              |
|--------|----------------------|----------------------|
| GET    | `/`                  | Home                 |
| GET    | `/books`             | List books           |
| GET    | `/books/create`      | New book form        |
| POST   | `/books`             | Create book          |
| GET    | `/books/{id}`        | Book detail          |
| GET    | `/books/{id}/edit`   | Edit book form        |
| POST   | `/books/{id}`        | Update book          |
| POST   | `/books/{id}/delete` | Delete book          |
| GET    | `/authors`           | List authors          |
| GET    | `/authors/create`    | New author form       |
| POST   | `/authors`           | Create author         |
| GET    | `/authors/{id}`      | Author detail + books |
| GET    | `/authors/{id}/edit` | Edit author form       |
| POST   | `/authors/{id}`      | Update author         |
| POST   | `/authors/{id}/delete` | Delete author        |

## Design notes

- **Why no framework?** This project exists to show the mechanics that frameworks usually
  hide: routing, dependency wiring, escaping output, preparing SQL. It's intentionally small
  in scope so those parts stay readable end to end.
- **Repository pattern**: `AbstractRepository` implements `findAll`/`findById`/`create`/`update`/`remove`
  generically from an entity's `mapToArray()` representation; each concrete repository only
  declares its table name and how to hydrate a row back into an entity.
- **Abstraction in the controller layer**: `AbstractController` declares the CRUD contract
  (`index`, `show`, `create`, `store`, `edit`, `update`, `destroy`) that `BookController` and
  `AuthorController` must implement, and hosts the behaviour they'd otherwise duplicate
  (`redirect()`, `notFound()`) as concrete protected methods.
- **Lazy relationships**: entities hold foreign keys (`author_id`) and resolve the related
  object only on first access (`Book::getAuthor()`, `Author::getBooks()`), instead of eagerly
  querying on every hydration.
- **All output is escaped** through a small `e()` helper (`htmlspecialchars` wrapper) in the views.

## Known limitations

This is a learning/portfolio project, not production software:

- No authentication — the `User` entity exists but isn't wired into any login flow yet
- No CSRF protection on forms
- No pagination on the book/author listings

## License

MIT — see [LICENSE](LICENSE).
