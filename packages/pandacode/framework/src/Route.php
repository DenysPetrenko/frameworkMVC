<?php

namespace Petrenko\Framework;

use Pandacode\Logger\Logger;

class Route
{
    /**
     * @var array
     */
    protected static array $routes = [];
    /**
     * @var array
     */
    protected static array $route = [];

    /**
     * @param string $url
     * @param array $route
     * @return void
     */
    public static function add(string $url, array $route = []): void
    {
        self::$routes[$url] = $route;
    }

    /**
     * @param string $url
     * @return void
     */
    public static function dispatch(string $url): void
    {

        if (self::matchRoute($url)) {
            $controller = (string)self::$route[0];
            if (class_exists($controller)) {
                $obj = new $controller(self::$route);
                $action = self::$route[1];
                if (method_exists($obj, $action)) {
                    $obj->$action();
                } else {
                    echo 'method ' . $action . ' not found';
                }
            } else {
                echo 'Controller' . $controller . 'not found';
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    /**
     * @param string $url
     * @return bool
     */
    public static function matchRoute(string $url): bool
    {
        $path = parse_url($url, PHP_URL_PATH);
        if (isset(self::$routes[$path])) {
            self::$route = self::$routes[$path];
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public static function gerRoutes(): array
    {
        return self::$routes;
    }
}
