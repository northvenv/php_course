<?php
$url = 'https://httpbin.org/post';
$headers = get_headers($url);
$headersString = "";
if ($headers) {
    foreach ($headers as $header) {
        $headersString .= $header . "\n";
    }
} else {
    $headersString = "Не удалось получить заголовки.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заголовки страницы</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="logo.png" alt="Логотип МосПолитеха" class="logo">
    <h1>Feedback form - Страница 2</h1>
</header>

<main>
    <textarea class="headers" readonly><?php echo htmlspecialchars($headersString); ?></textarea>
    <br>
    <a href="index.php" class="btn-link">Назад к форме</a>
</main>

<footer>
    задание для самостоятельно работы
</footer>

</body>
</html>
