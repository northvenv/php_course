<?php

require_once 'Controller.php';

$controller = new Controller();
$content = '';

$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');
$parts = explode('/', $path);

if (isset($parts[0]) && $parts[0] === 'hello' && isset($parts[1])) {
    $name = urldecode($parts[1]);
    $content = '<h2>' . $controller->sayHello($name) . '</h2>';
} elseif (isset($parts[0]) && $parts[0] === 'bye' && isset($parts[1])) {
    $name = urldecode($parts[1]);
    $content = '<h2>' . $controller->sayBye($name) . '</h2>';
} elseif ($path === '' || $path === 'index.php') {
    $content = '
        <h2>Статья 1</h2>
        <p>Всем привет, это текст первой статьи</p>
        <hr>
        <h2>Статья 2</h2>
        <p>Всем привет, это текст второй статьи</p>
    ';
} elseif ($path === 'about-me') {
    $content = '<h2>Обо мне</h2><p>Это страница обо мне</p>';
} else {
    $content = '<h2>404</h2><p>Страница не найдена</p>';
}

require_once 'main.php';