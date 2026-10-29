<?php

declare(strict_types=1);

function format_price(int $price): string
{
    return number_format(ceil($price), 0, '', ' ') . " &#8381;";
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function get_time_remiaining(string $expiry_date): array
{
    $sec_diff = strtotime($expiry_date) - time();

    return [
        HOURS   => intdiv($sec_diff, HOUR_IN_SECS),
        MINS => intdiv($sec_diff, MIN_IN_SECS) % HOUR_IN_MINS
    ];
}

function get_view_time(array $remaining_time): string
{
    $hours_str = str_pad((string)$remaining_time[HOURS], 2, "0", STR_PAD_LEFT);
    $mins_str = str_pad((string)$remaining_time[MINS], 2, "0", STR_PAD_LEFT);
    return $hours_str . " : " . $mins_str;
}
