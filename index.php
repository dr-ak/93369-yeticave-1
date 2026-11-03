<?php

declare(strict_types=1);

require_once 'helpers.php';
require_once 'functions/index.php';
require_once 'const.php';
require_once 'db.php';

$link = mysqli_connect(...$config);

if (!$link) {
    die("Error db connection: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8mb4");

$sql = "SELECT * FROM categories";
$result = mysqli_query($link, $sql);
$categories = [];

if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$sql = "SELECT title, image_url, start_price, expiry_date, name AS category_name
        FROM lots
        JOIN categories ON lots.category_id = categories.id
        WHERE expiry_date > ?";

$stmt = db_get_prepare_stmt($link, $sql, [date('Y-m-d H:i:s')]);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $lots_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_stmt_close($stmt);

$title = 'Главная';
$content = include_template('main.php', compact('categories', 'lots_list'));

$layout = include_template('layout.php', compact('title', 'content', 'categories'));

print($layout);
