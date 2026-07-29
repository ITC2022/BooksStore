<?php

declare(strict_types=1);

namespace App;

/**
 * Minimal hand-rolled router: maps "METHOD /path/{param}" patterns to a
 * callable. Deliberately dependency-free — this project has no framework.
 */
final class Router
{
    /** @var array<int, array{method: string, pattern: string, handler: callable}> */
    private array $routes = [];

    public function get(string $pattern, callable $handler): void
    {
        $this->routes[] = ['method' => 'GET', 'pattern' => $pattern, 'handler' => $handler];
    }

    public function post(string $pattern, callable $handler): void
    {
        $this->routes[] = ['method' => 'POST', 'pattern' => $pattern, 'handler' => $handler];
    }

    public function dispatch(string $method, string $path): void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            $params = $this->match($route['pattern'], $path);
            if ($params !== null) {
                ($route['handler'])(...array_values($params));
                return;
            }
        }

        http_response_code(404);
        View::render('errors/404');
    }

    /**
     * @return array<string, int|string>|null
     */
    private function match(string $pattern, string $path): ?array
    {
        $regex = preg_replace_callback(
            '#\{(\w+)\}#',
            static fn (array $m): string => $m[1] === 'id' ? '(?P<id>\d+)' : '(?P<' . $m[1] . '>[^/]+)',
            $pattern
        );

        if (!preg_match('#^' . $regex . '$#', $path, $matches)) {
            return null;
        }

        $params = array_filter($matches, static fn ($key): bool => is_string($key), ARRAY_FILTER_USE_KEY);

        return array_map(
            static fn (string $value): int|string => ctype_digit($value) ? (int) $value : $value,
            $params
        );
    }
}
