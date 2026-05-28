<?php

namespace Models;

use Services\Db;

class Comment
{
    public static function all()
    {
        return Db::load('comments');
    }

    public static function getByArticle($articleId)
    {
        $all = self::all();
        return array_filter($all, fn($c) => $c['article_id'] == $articleId);
    }

    public static function find($id)
    {
        foreach (self::all() as $c) {
            if ($c['id'] == $id) return $c;
        }
        return null;
    }

    public static function add($data)
    {
        $comments = self::all();
        $id = count($comments) > 0 ? max(array_column($comments, 'id')) + 1 : 1;
        $newComment = [
            'id' => $id,
            'article_id' => $data['article_id'],
            'author_id' => $data['author_id'],
            'text' => $data['text'],
            'date' => date('Y-m-d H:i:s')
        ];
        $comments[] = $newComment;
        Db::save('comments', $comments);
        return $id;
    }

    public static function update($id, $text)
    {
        $comments = self::all();
        foreach ($comments as &$c) {
            if ($c['id'] == $id) {
                $c['text'] = $text;
                break;
            }
        }
        Db::save('comments', $comments);
    }
}
