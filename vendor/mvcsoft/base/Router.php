<?php
namespace vendor\mvcsoft\base;

use controllers\IndexController;

class Router {

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    public static function run() {
        $url = trim($_SERVER['QUERY_STRING'], '/');
        $url = self::removeQueryString($url);

        if(self::matchRoute($url)) {
            $controller = '\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(!class_exists($controller)) {
                throw new \Exception("Контроллер {$controller} не найден", 404);
            }
            $controllerObj = new $controller(self::$route);

            $action = self::$route['action']. 'Action';
            if(!method_exists($controllerObj, $action)) {
                throw new \Exception("Метод {$controller}::{$action} не найден", 404);
            }
            $controllerObj->$action();
        } else {
            throw new \Exception('Страница не найдена', 404);
        }
    }

    public static function matchRoute($url) {

        foreach (self::$routes as $pattern => $route) {
            if(preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if(is_string($key)) {
                        $route[$key] = $value;
                    }
                }

                $route['controller'] = self::upperCamelCase($route['controller']);

                if(empty($route['action'])) {
                    $route['action'] = 'show';
                }
                $route['action'] = lcfirst(self::upperCamelCase($route['action']));

                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'].= '\\';
                }

                self::$route = $route;
                return TRUE;
            }
        }
        return FALSE;
    }

    protected static function removeQueryString($url) {
        if(!$url) return $url;
        $params = explode('&', $url, 2);
        if(strpos($params[0], '=') === false) {
            return rtrim($params[0], '/');
        }

        return '';

    }

    protected static function upperCamelCase($name) {
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        return str_replace(' ', '', $name);
    }
}