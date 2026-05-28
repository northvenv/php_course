<?php

namespace Models;

use Services\Db;

class Article
{
    public static function all()
    {
        return Db::load('articles');
    }

    public static function find($id)
    {
        $articles = self::all();
        foreach ($articles as $a) {
            if ($a['id'] == $id) return $a;
        }
        return null;
    }

    public static function update($id, $data)
    {
        $articles = self::all();
        foreach ($articles as &$a) {
            if ($a['id'] == $id) {
                $a['title'] = $data['title'];
                $a['text'] = $data['text'];
                break;
            }
        }
        Db::save('articles', $articles);
    }
}
