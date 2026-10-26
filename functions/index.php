<?php

declare(strict_types=1);

function format_price(int $price): string
{
    return number_format(ceil($price), 0, '', ' ') . " ₽";
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function get_time_remiaining(string $expiry_date): array
{
    $sec_diff = strtotime($expiry_date) - time();

    return [intdiv($sec_diff, 3600), intdiv($sec_diff, 60) % 60];
}
