<?php

require_once 'helpers.php';

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$goods_list = [
    ["name" => "2014 Rossignol District Snowboard", "category" => 0, "price" => 10999, "imgUrl" => "img/lot-1.jpg"],
    ["name" => "DC Ply Mens 2016/2017 Snowboard", "category" => 0, "price" => 159999, "imgUrl" => "img/lot-2.jpg"],
    ["name" => "Крепления Union Contact Pro 2015 года размер L/XL", "category" => 1, "price" => 8000, "imgUrl" => "img/lot-3.jpg"],
    ["name" => "Ботинки для сноуборда DC Mutiny Charcoal", "category" => 2, "price" => 10999, "imgUrl" => "img/lot-4.jpg"],
    ["name" => "Куртка для сноуборда DC Mutiny Charcoal", "category" => 3, "price" => 7500, "imgUrl" => "img/lot-5.jpg"],
    ["name" => "Маска Oakley Canopy", "category" => 5, "price" => 5400, "imgUrl" => "img/lot-6.jpg"],
];

function format_price(int $price): string
{
    return number_format(ceil($price), 0, '', ' ') . " ₽";
}

function esc(string $value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$title = 'Главна';
$content = include_template('main.php', ['categories' => $categories, 'goods_list' => $goods_list]);

$layout = include_template('layout.php', ['title' => $title, 'content' => $content]);

print($layout);
