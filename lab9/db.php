<?php
$articlesFile = __DIR__ . '/articles.json';
$usersFile = __DIR__ . '/users.json';

function loadArticles() {
    global $articlesFile;
    if (!file_exists($articlesFile)) {
        $data = [
            ['id' => 1, 'title' => 'Статья 1', 'text' => 'Всем привет, это текст первой статьи', 'author_id' => 1],
            ['id' => 2, 'title' => 'Статья 2', 'text' => 'Всем привет, это текст второй статьи', 'author_id' => 2],
        ];
        file_put_contents($articlesFile, json_encode($data, JSON_UNESCAPED_UNICODE));
    }
    return json_decode(file_get_contents($articlesFile), true);
}

function loadUsers() {
    global $usersFile;
    if (!file_exists($usersFile)) {
        $data = [
            ['id' => 1, 'nickname' => 'Сергей Уланов'],
            ['id' => 2, 'nickname' => 'Мария Уланова'],
        ];
        file_put_contents($usersFile, json_encode($data, JSON_UNESCAPED_UNICODE));
    }
    return json_decode(file_get_contents($usersFile), true);
}

function getArticleById($id) {
    $articles = loadArticles();
    foreach ($articles as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return null;
}

function getUserById($id) {
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}