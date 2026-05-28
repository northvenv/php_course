<?php
require_once 'menu.php';
require_once 'viewer.php';

$page = $_GET['page'] ?? 'view';
$sort = $_GET['sort'] ?? 'id';
$p = $_GET['p'] ?? 1;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="../logo.png" alt="Логотип МосПолитеха" class="logo">
    <h1>Notebook</h1>
</header>

<main>
    <?php echo getMenu(); ?>

    <div class="content">
        <?php
        switch ($page) {
            case 'view':
                echo getViewer($sort, $p);
                break;
            case 'add':
                include 'add.php';
                break;
            case 'edit':
                include 'edit.php';
                break;
            case 'delete':
                include 'delete.php';
                break;
            default:
                echo getViewer('id', 1);
        }
        ?>
    </div>
</main>

<footer>
    задание для самостоятельной работы
</footer>

</body>
</html>
