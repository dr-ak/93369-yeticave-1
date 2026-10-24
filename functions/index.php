<?php

function format_price(int $price): string
{
    return number_format(ceil($price), 0, '', ' ') . " ₽";
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
