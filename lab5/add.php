<?php
require_once 'db.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $data = get_db_data();
    $new_item = [
        'id' => time(),
        'last_name' => $_POST['last_name'],
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'email' => $_POST['email'],
        'comment' => $_POST['comment']
    ];
    $data[] = $new_item;
    save_db_data($data);
    $message = '<p class="msg-success">Запись добавлена</p>';
}

echo $message;
?>
<form method="POST">
    <input type="hidden" name="action" value="add">
    <?php include 'form.php'; ?>
    <button type="submit">Добавить</button>
</form>
