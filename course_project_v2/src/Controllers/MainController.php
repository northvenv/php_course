<?php

namespace Controllers;

use Models\Article;
use Models\User;
use Models\Comment;

class MainController
{
    public function render($template, $vars = [])
    {
        extract($vars);
        ob_start();
        include __DIR__ . '/../../templates/' . $template . '.php';
        $content = ob_get_clean();
        include __DIR__ . '/../../templates/layout.php';
    }

    public function index()
    {
        $articles = Article::all();
        $this->render('home', [
            'title' => 'Главная - Блог Путешественника',
            'articles' => $articles
        ]);
    }

    public function article($id)
    {
        $article = Article::find($id);
        if (!$article) return $this->error404();

        $author = User::find($article['author_id']);
        $comments = Comment::getByArticle($id);

        $this->render('article_show', [
            'title' => $article['title'],
            'article' => $article,
            'author' => $author,
            'comments' => $comments
        ]);
    }

    public function editArticle($id)
    {
        $article = Article::find($id);
        if (!$article) return $this->error404();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Article::update($id, $_POST);
            header("Location: /article/$id");
            exit;
        }

        $this->render('article_edit', [
            'title' => 'Редактирование: ' . $article['title'],
            'article' => $article
        ]);
    }

    public function addComment($articleId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
            $id = Comment::add([
                'article_id' => $articleId,
                'author_id' => 1,
                'text' => $_POST['text']
            ]);
            header("Location: /article/$articleId#comment$id");
            exit;
        }
    }

    public function editComment($id)
    {
        $comment = Comment::find($id);
        if (!$comment) return $this->error404();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Comment::update($id, $_POST['text']);
            header("Location: /article/" . $comment['article_id'] . "#comment$id");
            exit;
        }

        $this->render('comment_edit', [
            'title' => 'Редактирование комментария',
            'comment' => $comment
        ]);
    }

    public function calculator()
    {
        $result = null;
        if (isset($_GET['days']) && isset($_GET['cost'])) {
            $result = (float)$_GET['days'] * (float)$_GET['cost'];
        }

        $this->render('calculator', [
            'title' => 'Калькулятор бюджета',
            'result' => $result
        ]);
    }

    public function error404()
    {
        $this->render('404', ['title' => '404 - Страница не найдена']);
    }
}
