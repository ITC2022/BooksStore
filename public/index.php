<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\AuthorController;
use App\Controller\BookController;
use App\Controller\HomeController;
use App\Router;
use App\View;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($basePath !== '' && str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath));
}
$path = '/' . trim($path, '/');

$router = new Router();

$router->get('/', fn () => (new HomeController())->index());

$router->get('/books', fn () => (new BookController())->index());
$router->get('/books/create', fn () => (new BookController())->create());
$router->post('/books', fn () => (new BookController())->store());
$router->get('/books/{id}', fn (int $id) => (new BookController())->show($id));
$router->get('/books/{id}/edit', fn (int $id) => (new BookController())->edit($id));
$router->post('/books/{id}', fn (int $id) => (new BookController())->update($id));
$router->post('/books/{id}/delete', fn (int $id) => (new BookController())->destroy($id));

$router->get('/authors', fn () => (new AuthorController())->index());
$router->get('/authors/create', fn () => (new AuthorController())->create());
$router->post('/authors', fn () => (new AuthorController())->store());
$router->get('/authors/{id}', fn (int $id) => (new AuthorController())->show($id));
$router->get('/authors/{id}/edit', fn (int $id) => (new AuthorController())->edit($id));
$router->post('/authors/{id}', fn (int $id) => (new AuthorController())->update($id));
$router->post('/authors/{id}/delete', fn (int $id) => (new AuthorController())->destroy($id));

try {
    $router->dispatch($_SERVER['REQUEST_METHOD'], $path);
} catch (Throwable $e) {
    http_response_code(500);
    $debug = ($_ENV['APP_DEBUG'] ?? 'false') === 'true';
    View::render('errors/500', ['message' => $e->getMessage(), 'debug' => $debug]);
}
