<?php
class Controller
{
    public function sayHello(string $name)
    {
        return "Привет, $name";
    }

    public function sayBye(string $name)
    {
        return "Пока, $name";
    }
}