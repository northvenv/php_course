<?php

//php -S localhost:8000 router.php

require_once 'Controller.php';
require_once 'ArticlesController.php';

$controller = new Controller();
$articlesController = new ArticlesController();
$content = '';
$title = 'Мой блог';

$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');
$parts = explode('/', $path);

if (isset($parts[0]) && $parts[0] === 'hello' && isset($parts[1])) {
    $name = urldecode($parts[1]);
    $content = '<h2>' . $controller->sayHello($name) . '</h2>';
    $title = 'Страница приветствия';
} elseif (isset($parts[0]) && $parts[0] === 'bye' && isset($parts[1])) {
    $name = urldecode($parts[1]);
    $content = '<h2>' . $controller->sayBye($name) . '</h2>';
    $title = 'Страница прощания';
} elseif (isset($parts[0]) && $parts[0] === 'article' && isset($parts[1])) {
    $result = $articlesController->show($parts[1]);
    $content = $result['content'];
    $title = $result['title'];
} elseif ($path === '' || $path === 'index.php') {
    $articles = loadArticles();
    $content = '';
    foreach ($articles as $article) {
        $content .= '<h2><a href="/article/' . $article['id'] . '">' . htmlspecialchars($article['title']) . '</a></h2>';
        $content .= '<p>' . htmlspecialchars($article['text']) . '</p><hr>';
    }
} elseif ($path === 'about-me') {
    $content = '<h2>Обо мне</h2><p>Это страница обо мне</p>';
    $title = 'Обо мне';
} else {
    $content = '<h2>404</h2><p>Страница не найдена</p>';
    $title = 'Страница не найдена';
}

require_once 'main.php';