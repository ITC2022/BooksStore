<?php

declare(strict_types=1);

namespace App\Tests;

use App\Router;
use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase
{
    public function testDispatchesToTheMatchingHandler(): void
    {
        $router = new Router();
        $called = false;

        $router->get('/books', function () use (&$called): void {
            $called = true;
        });

        $router->dispatch('GET', '/books');

        self::assertTrue($called);
    }

    public function testExtractsNumericIdParameters(): void
    {
        $router = new Router();
        $captured = null;

        $router->get('/books/{id}', function (int $id) use (&$captured): void {
            $captured = $id;
        });

        $router->dispatch('GET', '/books/42');

        self::assertSame(42, $captured);
    }

    public function testIdParameterOnlyMatchesNumericSegments(): void
    {
        $router = new Router();
        $hit = null;

        $router->get('/books/create', function () use (&$hit): void {
            $hit = 'create';
        });
        $router->get('/books/{id}', function (int $id) use (&$hit): void {
            $hit = 'show:' . $id;
        });

        $router->dispatch('GET', '/books/create');

        self::assertSame('create', $hit);
    }

    public function testMethodMustMatch(): void
    {
        $router = new Router();
        $called = false;

        $router->post('/books', function () use (&$called): void {
            $called = true;
        });

        $router->dispatch('GET', '/books');

        self::assertFalse($called);
    }

    public function testUnknownRouteRendersNotFoundWithoutThrowing(): void
    {
        $router = new Router();

        ob_start();
        $router->dispatch('GET', '/does-not-exist');
        $output = ob_get_clean();

        self::assertSame(404, http_response_code());
        self::assertStringContainsString('404', $output);
    }
}
