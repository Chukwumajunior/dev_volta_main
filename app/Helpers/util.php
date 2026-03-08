<?php

function get_currency()
{
    return '₦';
}

function to_amount($amount)
{
    return get_currency() . ' ' . number_format($amount, );
}

function to_acc_amount($amount)
{
    $currency = get_currency();

    if ($amount < 0) {
        return $currency . ' ' . number_format($amount, );
    }

    return $currency . ' ' . number_format($amount, );
}
