<?php
require_once 'db.php';

class ArticlesController
{
    public function show($id)
    {
        $article = getArticleById($id);
        
        if ($article === null) {
            return ['content' => '<h2>404</h2><p>Статья не найдена</p>', 'title' => 'Статья не найдена'];
        }
        
        $author = getUserById($article['author_id']);
        $authorName = $author ? $author['nickname'] : 'Неизвестный автор';
        
        $content = '
            <h2>' . htmlspecialchars($article['title']) . '</h2>
            <p>' . htmlspecialchars($article['text']) . '</p>
            <p><strong>Автор:</strong> ' . htmlspecialchars($authorName) . '</p>
            <p><a href="/article/' . $article['id'] . '/edit">Редактировать</a></p>
        ';
        
        return ['content' => $content, 'title' => $article['title']];
    }
    
    public function edit($id)
    {
        $article = getArticleById($id);
        
        if ($article === null) {
            return ['content' => '<h2>404</h2><p>Статья не найдена</p>', 'title' => 'Статья не найдена'];
        }
        
        $message = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articles = loadArticles();
            foreach ($articles as &$a) {
                if ($a['id'] == $id) {
                    $a['title'] = $_POST['title'];
                    $a['text'] = $_POST['text'];
                    break;
                }
            }
            file_put_contents(__DIR__ . '/articles.json', json_encode($articles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $message = '<p style="color: green;">Статья обновлена</p>';
            $article['title'] = $_POST['title'];
            $article['text'] = $_POST['text'];
        }
        
        $content = $message . '
            <h2>Редактирование статьи</h2>
            <form method="post">
                <p><label>Заголовок:<br><input type="text" name="title" value="' . htmlspecialchars($article['title']) . '" style="width: 100%; padding: 5px;"></label></p>
                <p><label>Текст:<br><textarea name="text" style="width: 100%; height: 150px; padding: 5px;">' . htmlspecialchars($article['text']) . '</textarea></label></p>
                <p><button type="submit" style="padding: 10px 20px; background: #003366; color: white; border: none; border-radius: 5px; cursor: pointer;">Сохранить</button></p>
            </form>
            <p><a href="/article/' . $id . '">← Назад к статье</a></p>
        ';
        
        return ['content' => $content, 'title' => 'Редактирование: ' . $article['title']];
    }
}