<?php

spl_autoload_register(function ($className) {
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

use Controllers\MainController;

$controller = new MainController();

$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');
$parts = explode('/', $path);

if ($path === '' || $path === 'index.php') {
    $controller->index();
} elseif ($parts[0] === 'article' && isset($parts[1])) {
    $id = (int)$parts[1];
    if (isset($parts[2])) {
        if ($parts[2] === 'edit') $controller->editArticle($id);
        elseif ($parts[2] === 'comments') $controller->addComment($id);
        else $controller->error404();
    } else {
        $controller->article($id);
    }
} elseif ($parts[0] === 'comment' && isset($parts[1]) && isset($parts[2]) && $parts[2] === 'edit') {
    $controller->editComment((int)$parts[1]);
} elseif ($parts[0] === 'calculator') {
    $controller->calculator();
} elseif ($parts[0] === 'about-me') {
    $controller->render('about', ['title' => 'Обо мне']);
} else {
    $controller->error404();
}
