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
        ';
        
        return ['content' => $content, 'title' => $article['title']];
    }
}