<?php
date_default_timezone_set('Europe/Moscow');

$currentTime = date("H:i:s");
$currentDate = date("d.m.Y");
$hour = date("H");
$minute = date("i");

if ($hour >= 5 && $hour < 12) {
    $greeting = "Доброе утро!";
} elseif ($hour >= 12 && $hour < 18) {
    $greeting = "Добрый день!";
} elseif ($hour >= 18 && $hour < 23) {
    $greeting = "Добрый вечер!";
} else {
    $greeting = "Доброй ночи!";
}

$days = [
    'Sunday' => 'Воскресенье',
    'Monday' => 'Понедельник',
    'Tuesday' => 'Вторник',
    'Wednesday' => 'Среда',
    'Thursday' => 'Четверг',
    'Friday' => 'Пятница',
    'Saturday' => 'Суббота'
];
$dayNameEn = date("l");
$dayOfWeek = $days[$dayNameEn];

$isWeekend = ($dayNameEn == 'Saturday' || $dayNameEn == 'Sunday');
$dayStatus = (date("j") % 2 == 0) ? "четное" : "нечетное";

$dayProgress = round((($hour * 60 + $minute) / 1440) * 100, 1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="logo.png" alt="Logo" class="logo">
    <h1><?php echo $greeting; ?></h1>
</header>

<main>
    <div class="info-block">
        <h2>Динамические данные</h2>
        <p>Время: <strong><?php echo $currentTime; ?></strong></p>
        <p>Дата: <strong><?php echo $currentDate; ?></strong> (<?php echo $dayOfWeek; ?>)</p>

        <p>Число месяца: <strong><?php echo $dayStatus; ?></strong></p>
        
        <div style="width: 200px; height: 20px; background: #eee; margin: 10px auto; border-radius: 10px; overflow: hidden; border: 1px solid #ccc;">
            <div style="width: <?php echo $dayProgress; ?>%; height: 100%; background: #004a99;"></div>
        </div>
    </div>
</main>

<footer>
    Задание для самостоятельной работы. <?php echo date("Y"); ?>
</footer>

</body>
</html>
