<?php

function currency_format($quantity)
{
    $currency_symbol = "$";

    $format = $currency_symbol . num_format($quantity);
    return $format;
}

function num_format($quantity)
{
    $decimals = '0';
    $decimals_separator = ' ';
    $thousands_separator = '.';

    return number_format($quantity, $decimals, $decimals_separator, $thousands_separator);
}
