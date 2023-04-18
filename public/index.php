<?php

require_once '../vendor/autoload.php';

$r = R::setup('mysql:host=localhost;dbname=dierendoos', 'bit_academy', 'bit_academy');

$path = getPath();

session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:../account/login');
} else {
    $controllerName = ucwords($path[0]) ?: 'Shop';
    $controller = $controllerName . 'Controller';
    $methodName = $path[1] ?? 'index';

    if (!isset($_POST['logout'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $methodName .= 'Post';
        } elseif ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $methodName .= $_SERVER['REQUEST_METHOD'];
        }
    }

    if (class_exists($controller)) {
        if (method_exists($controller, $methodName)) {
            $controller = new $controller($controllerName);
            $controller->$methodName();
        } else {
            error(404, 'Method not found');
        }
    } else {
        error(404, 'Controller not found');
    }
}

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
