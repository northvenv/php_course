<?php

namespace Models;

use Services\Db;

class Article
{
    public static function all()
    {
        return Db::getInstance()->query("SELECT * FROM articles");
    }

    public static function find($id)
    {
        $result = Db::getInstance()->query("SELECT * FROM articles WHERE id = :id", ['id' => $id]);
        return $result ? $result[0] : null;
    }

    public static function update($id, $data)
    {
        Db::getInstance()->execute(
            "UPDATE articles SET title = :title, text = :text WHERE id = :id",
            [
                'id' => $id,
                'title' => $data['title'],
                'text' => $data['text']
            ]
        );
    }
}
