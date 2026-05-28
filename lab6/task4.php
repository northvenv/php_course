<?php

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Square implements CalculateSquare
{
    private $side;

    public function __construct(float $side)
    {
        $this->side = $side;
    }

    public function calculateSquare(): float
    {
        return $this->side * $this->side;
    }
}

class Circle implements CalculateSquare
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateSquare(): float
    {
        return pi() * $this->radius * $this->radius;
    }
}

class Triangle{}

function displayAreaInfo($object)
{
    $className = get_class($object);
    if ($object instanceof CalculateSquare) {
        echo "Это объект класса $className. Площадь: " . $object->calculateSquare() . '<br>';
    } else {
        echo "Объект класса $className не реализует интерфейс CalculateSquare.<br>";
    }
}

$square = new Square(5);
$circle = new Circle(3);
$triangle = new Triangle();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        .back-link { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <a href="index.php" class="back-link">&larr; Назад</a>
    <h1>Задание 4: Интерфейсы</h1>
    <div>
        <?php
        displayAreaInfo($square);
        displayAreaInfo($circle);
        displayAreaInfo($triangle);
        ?>
    </div>
</body>
</html>
