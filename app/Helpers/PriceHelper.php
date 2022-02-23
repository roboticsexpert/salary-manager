<?php
/**
 * bahadorbabazadeh
 * 10/19/20 23:51
 */

namespace App\Helpers;



class PriceHelper
{

    public static function formatDiscount($price, $currency = null)
    {
        if ($price == 0 || $price == null) {
            return '-';
        }
        return self::formatMoney($price, $currency);
    }

    public static function formatMoney($price, $currency = null)
    {
        if (!$price) {
            $price = 0;
        }
        if (!$currency)
            $currency = config("app.currency");


        return NumberHelper::formatNumber($price) . ' تومان';
    }

    public static function formatMoneyWithFree($price, $currency = null)
    {
        if ($price == 0 || $price == null) {
            return __("general.free");
        }
        return self::formatMoney($price, $currency);
    }

    public static function formatDownloadCount(int $number)
    {
        if ($number < 10) {
            return NumberHelper::formatNumber($number);
        }
        return '+' . NumberHelper::formatNumber(round($number, max(-(strlen($number) - 2), -3), PHP_ROUND_HALF_DOWN));
    }

    public static function roundPrice(int $price)
    {
        return round($price, -2);
    }
}
