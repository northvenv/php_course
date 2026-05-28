<?php
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);

if (preg_match('/\.(?:css|js|png|jpg|jpeg|gif|ico)$/', $path)) {
    return false;
}

require_once 'index.php';
