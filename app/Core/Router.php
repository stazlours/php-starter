<?php

namespace App\Core;

class Router
{
    protected static array $routes = [];

    public static function get(string $uri, string $action): void
    {
        self::$routes['GET'][$uri] = $action;
    }

    public static function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $action = self::$routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$controller, $method] = explode('@', $action);

        $controller = "App\\Controllers\\{$controller}";
        call_user_func([new $controller, $method]);
    }
}
