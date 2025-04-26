<?php

class Router {
    public static function route($url) {
        $parts = explode('/', trim($url, '/'));
        $controllerName = ucfirst($parts[0]) . 'Controller';
        $method = $parts[1] ?? 'index';

        if (!class_exists($controllerName)) {
            die("Controlador '$controllerName' no encontrado.");
        }

        $controller = new $controllerName();
        if (!method_exists($controller, $method)) {
            die("Método '$method' no encontrado en '$controllerName'.");
        }

        call_user_func_array([$controller, $method], array_slice($parts, 2));
    }
}
