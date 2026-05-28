<?php

namespace Models;

use Services\Db;

class User
{
    public static function find($id)
    {
        foreach (Db::load('users') as $u) {
            if ($u['id'] == $id) return $u;
        }
        return ['id' => 0, 'nickname' => 'Аноним'];
    }
}
