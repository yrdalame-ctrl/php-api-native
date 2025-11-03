<?php
namespace Src;

class Router {
    private array $routes = [];

    public function add(string $method, string $path, callable $handler) {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function run() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = str_replace('\\', '/', $uri);
        $uri = preg_replace('#/+#', '/', $uri);

        $basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        $basePath = rtrim($basePath, '/');

        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        if ($uri === '' || $uri === false) {
            $uri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                call_user_func($route['handler']);
                return;
            }
        }

        // 🔍 DEBUG DI SINI
        header('Content-Type: text/plain');
        var_dump([
            'REQUEST_URI' => $_SERVER['REQUEST_URI'],
            'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'],
            'dirname(SCRIPT_NAME)' => dirname($_SERVER['SCRIPT_NAME']),
            'uri_akhir_dibaca' => $uri,
            'basePath' => $basePath
        ]);
        die();
    }
}
