<?php
require_once 'logic.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['expression'])) {
    $expr = $_POST['expression'];
    if (preg_match('/^[a-z0-9\+\-\*\/\(\)\.\^\, ]+$/', $expr)) {
        $result = evaluateExpression($expr);
    } else {
        $result = "Ошибка ввода";
    }
    header("Location: index.php?result=" . urlencode($result));
    exit;
}

$display = isset($_GET['result']) ? $_GET['result'] : "";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="logo.png" alt="Логотип МосПолитеха" class="logo">
    <h1>Calculator</h1>
</header>

<main>
    <form class="calculator" method="POST">
        <input type="text" name="expression" id="display" class="display" value="<?php echo htmlspecialchars($display); ?>" readonly>
        <div class="buttons">
            <button type="button" onclick="add('sqrt(')">√</button>
            <button type="button" onclick="add('log(')">log</button>
            <button type="button" onclick="add(',')">,</button>
            <button type="button" class="btn-clear" onclick="clearDisplay()">C</button>

            <button type="button" onclick="add('(')">(</button>
            <button type="button" onclick="add(')')">)</button>
            <button type="button" onclick="add('^')">^</button>
            <button type="button" onclick="add('/')">/</button>
            
            <button type="button" onclick="add('7')">7</button>
            <button type="button" onclick="add('8')">8</button>
            <button type="button" onclick="add('9')">9</button>
            <button type="button" onclick="add('*')">*</button>
            
            <button type="button" onclick="add('4')">4</button>
            <button type="button" onclick="add('5')">5</button>
            <button type="button" onclick="add('6')">6</button>
            <button type="button" onclick="add('-')">-</button>
            
            <button type="button" onclick="add('1')">1</button>
            <button type="button" onclick="add('2')">2</button>
            <button type="button" onclick="add('3')">3</button>
            <button type="button" onclick="add('+')">+</button>
            
            <button type="button" onclick="add('0')">0</button>
            <button type="button" onclick="add('.')">.</button>
            <button type="button" onclick="add('pi')">π</button>
            <button type="button" onclick="add('e')">e</button>

            <button type="submit" class="btn-submit" style="grid-column: span 4; margin-top: 5px;">=</button>
        </div>
    </form>
</main>

<footer>
    Задание для самостоятельной работы
</footer>

<script src="script.js"></script>
</body>
</html>
