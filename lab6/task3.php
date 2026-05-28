<?php

class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function sayHello(): string
    {
        return "Привет, меня зовут " . $this->name . ". Мой цвет — " . $this->color . ".";
    }
}

$cat = new Cat('Борис', 'рыжий');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        .back-link { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <a href="index.php" class="back-link">&larr; Назад</a>
    <h1>Задание 3: Простой класс (Кот)</h1>
    <div>
        <?php echo $cat->sayHello(); ?>
    </div>
</body>
</html>
