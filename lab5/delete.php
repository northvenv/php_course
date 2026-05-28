<?php
require_once 'db.php';

$data = get_db_data();
$msg = "";

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $new_data = [];
    $deleted_name = "";
    foreach ($data as $row) {
        if ($row['id'] == $id) {
            $deleted_name = $row['last_name'];
        } else {
            $new_data[] = $row;
        }
    }
    save_db_data($new_data);
    $data = $new_data;
    $msg = '<p class="msg-success">Запись с фамилией '.$deleted_name.' удалена</p>';
}

echo $msg;

foreach ($data as $row) {
    $initials = mb_substr($row['first_name'], 0, 1) . '.' . mb_substr($row['middle_name'], 0, 1) . '.';
    echo '<a href="index.php?page=delete&del_id='.$row['id'].'" class="list-item">'.$row['last_name'].' '.$initials.'</a>';
}
?>
