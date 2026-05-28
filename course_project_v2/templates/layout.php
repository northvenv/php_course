<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Мой Блог' ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="/" class="logo"><i class="fas fa-plane-departure"></i> TravelNotes</a>
        <ul class="nav-links">
            <li><a href="/">Главная</a></li>
            <li><a href="/calculator">Калькулятор</a></li>
            <li><a href="/about-me">Обо мне</a></li>
        </ul>
    </div>
</nav>

<header class="hero">
    <div class="container">
        <h1><?= $title ?></h1>
    </div>
</header>

<main class="container content">
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container">
        <p>&copy; <?= date('Y') ?> Блог Путешественника</p>
    </div>
</footer>

<script src="/js/script.js"></script>
</body>
</html>
