<?php
require_once '../config.php';
require_once '../core/Router.php';
require_once '../core/Database.php';

function base_url($path = '') {
    return BASE_URL . '/' . ltrim($path, '/');
}


spl_autoload_register(function ($class) {
    foreach (['../app/controllers/', '../app/models/'] as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) require_once $file;
    }
});

$url = $_GET['url'] ?? 'home/index';
Router::route($url);
