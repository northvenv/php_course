<?php require_once 'logic.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Решение уравнений</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="logo.png" alt="Логотип МосПолитеха" class="logo">
    <h1>All Equations</h1>
</header>

<main>
    <div class="results-list">
        <?php
        $equations = getAllEquations();
        foreach ($equations as $index => $result) {
            echo "<div class='result'>";
            echo "<strong>Уравнение " . ($index + 1) . ":</strong> " . $result['equation'] . "<br>";
            echo "<strong>Ответ:</strong> X = " . (is_float($result['answer']) ? round($result['answer'], 2) : $result['answer']);
            echo "</div>";
        }
        ?>
    </div>
</main>

<footer>
    Задание для самостоятельной работы
</footer>

</body>
</html>
