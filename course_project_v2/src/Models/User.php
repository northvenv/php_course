<?php

namespace Models;

use Services\Db;

class User
{
    public static function find($id)
    {
        $result = Db::getInstance()->query("SELECT * FROM users WHERE id = :id", ['id' => $id]);
        return $result ? $result[0] : ['id' => 0, 'nickname' => 'Аноним'];
    }
}
