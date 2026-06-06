<?php

namespace Models;

use Services\Db;

class Comment
{
    public static function all()
    {
        return Db::getInstance()->query("SELECT * FROM comments");
    }

    public static function getByArticle($articleId)
    {
        return Db::getInstance()->query("SELECT * FROM comments WHERE article_id = :article_id", ['article_id' => $articleId]);
    }

    public static function find($id)
    {
        $result = Db::getInstance()->query("SELECT * FROM comments WHERE id = :id", ['id' => $id]);
        return $result ? $result[0] : null;
    }

    public static function add($data)
    {
        Db::getInstance()->execute(
            "INSERT INTO comments (article_id, author_id, text, date) VALUES (:article_id, :author_id, :text, :date)",
            [
                'article_id' => $data['article_id'],
                'author_id' => $data['author_id'],
                'text' => $data['text'],
                'date' => date('Y-m-d H:i:s')
            ]
        );
        return Db::getInstance()->getLastInsertId();
    }

    public static function update($id, $text)
    {
        Db::getInstance()->execute(
            "UPDATE comments SET text = :text WHERE id = :id",
            [
                'id' => $id,
                'text' => $text
            ]
        );
    }
}
