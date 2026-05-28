<?php
require_once 'db.php';

$data = get_db_data();
usort($data, function($a, $b) {
    if ($a['last_name'] == $b['last_name']) return strcmp($a['first_name'], $b['first_name']);
    return strcmp($a['last_name'], $b['last_name']);
});

$selected_id = $_GET['id'] ?? ($data[0]['id'] ?? null);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['id'];
    foreach ($data as &$row) {
        if ($row['id'] == $id) {
            $row['last_name'] = $_POST['last_name'];
            $row['first_name'] = $_POST['first_name'];
            $row['middle_name'] = $_POST['middle_name'];
            $row['gender'] = $_POST['gender'];
            $row['birth_date'] = $_POST['birth_date'];
            $row['phone'] = $_POST['phone'];
            $row['address'] = $_POST['address'];
            $row['email'] = $_POST['email'];
            $row['comment'] = $_POST['comment'];
            break;
        }
    }
    save_db_data($data);
    echo '<p class="msg-success">Запись обновлена</p>';
}

foreach ($data as $row) {
    $selClass = ($row['id'] == $selected_id) ? 'selected' : '';
    echo '<a href="index.php?page=edit&id='.$row['id'].'" class="list-item '.$selClass.'">'.$row['last_name'].' '.$row['first_name'].'</a>';
}

$item = null;
foreach ($data as $row) {
    if ($row['id'] == $selected_id) { $item = $row; break; }
}

if ($item) {
    echo '<form method="POST" style="margin-top:20px;">';
    echo '<input type="hidden" name="action" value="edit">';
    echo '<input type="hidden" name="id" value="'.$item['id'].'">';
    include 'form.php';
    echo '<button type="submit">Сохранить</button>';
    echo '</form>';
}
?>
