<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'https://httpbin.org/post';
    
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    
    $response = curl_exec($ch);
    
    header('Content-Type: application/json');
    echo $response;
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="logo.png" alt="Логотип МосПолитеха" class="logo">
    <h1>Feedback form</h1>
</header>

<main>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label>Имя пользователя:</label>
            <input type="text" name="username" required>
        </div>
        <div class="form-group">
            <label>e-mail пользователя:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Тип обращения:</label>
            <select name="type">
                <option value="complaint">Жалоба</option>
                <option value="suggestion">Предложение</option>
                <option value="gratitude">Благодарность</option>
            </select>
        </div>
        <div class="form-group">
            <label>Текст обращения:</label>
            <textarea name="message" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Вариант ответа:</label>
            <input type="checkbox" name="reply[]" value="sms"> смс
            <input type="checkbox" name="reply[]" value="email"> e-mail
        </div>
        <button type="submit">Отправить</button>
    </form>
    
    <br>
    <a href="second.php" class="btn-link">Перейти на страницу 2</a>
</main>

<footer>
    Задание для самостоятельной работы
</footer>

</body>
</html>
