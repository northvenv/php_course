<?php

namespace Services;

class Db
{
    private static function getFilePath($name)
    {
        return __DIR__ . '/../../data/' . $name . '.json';
    }

    public static function load($name)
    {
        $path = self::getFilePath($name);
        if (!file_exists($path)) return [];
        return json_decode(file_get_contents($path), true);
    }

    public static function save($name, $data)
    {
        $path = self::getFilePath($name);
        file_put_contents($path, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
