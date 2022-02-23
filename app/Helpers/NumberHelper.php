<?php
/**
 * Created by PhpStorm.
 * User: roboticsexpert
 * Date: 8/8/18
 * Time: 6:31 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class NumberHelper
{
    /**
     * @param int $number
     * @param bool $thousandSeparator
     * @param null $mod
     * @return string|string[]
     */
    public static function formatNumber($number, bool $thousandSeparator = true, $mod = null)
    {
        $numberFormat = number_format($number, 0, '', $thousandSeparator ? ',' : '');

        if (!$mod)
            $mod = config("app.locale");

        if ($mod == "fa") {
            return StringHelper::englishToPersian($numberFormat);
        }

        return $numberFormat;
    }

    /**
     * @param int $number
     * @return string|string[]
     */
    public static function formatDownloadCount(int $number)
    {
        return PriceHelper::formatDownloadCount($number);
    }

    /**
     * @param $string
     * @return string|string[]
     */
    public static function convertNumbersToEnglish($string)
    {
        $numbers = self::numbersToEnglishMap();
        return str_replace(array_keys($numbers), array_values($numbers), $string);
    }

    /**
     * @return array
     */
    public static function numbersToEnglishMap()
    {
        return [
            "\u{06F0}" => "\u{0030}",
            "\u{0660}" => "\u{0030}",
            "\u{06F1}" => "\u{0031}",
            "\u{0661}" => "\u{0031}",
            "\u{06F2}" => "\u{0032}",
            "\u{0662}" => "\u{0032}",
            "\u{06F3}" => "\u{0033}",
            "\u{0663}" => "\u{0033}",
            "\u{06F4}" => "\u{0034}",
            "\u{0664}" => "\u{0034}",
            "\u{06F5}" => "\u{0035}",
            "\u{0665}" => "\u{0035}",
            "\u{06F6}" => "\u{0036}",
            "\u{0666}" => "\u{0036}",
            "\u{06F7}" => "\u{0037}",
            "\u{0667}" => "\u{0037}",
            "\u{06F8}" => "\u{0038}",
            "\u{0668}" => "\u{0038}",
            "\u{06F9}" => "\u{0039}",
            "\u{0669}" => "\u{0039}",
        ];
    }

    public static function convertToEnNumber($input)
    {
        $input = self::persianNumber($input, 'en');
        $input = self::arabicNumber($input, 'en');
        return $input;
    }

    public static function persianNumber($input, $mod = 'fa', $colon = '.')
    {
        $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
        $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $colon);
        return ($mod == 'fa') ? str_replace($num_a, $key_a, $input) : str_replace($key_a, $num_a, $input);
    }

    public static function arabicNumber($input, $mod = 'ar', $colon = '.')
    {
        $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
        $key_a = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', $colon);
        return ($mod == 'ar') ? str_replace($num_a, $key_a, $input) : str_replace($key_a, $num_a, $input);
    }

    public static function localizeNumber($input,$colon='.'){
        return self::persianNumber($input,App::getLocale(),$colon);
    }
}
