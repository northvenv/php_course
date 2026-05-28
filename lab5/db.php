<?php
function get_db_data() {
    $file = 'data.json';
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    return json_decode($content, true) ?: [];
}

function save_db_data($data) {
    file_put_contents('data.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}
?>
