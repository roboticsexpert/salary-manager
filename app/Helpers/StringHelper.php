<?php
/**
 * Created by PhpStorm.
 * User: roboticsexpert
 * Date: 8/8/18
 * Time: 6:31 PM
 */

namespace App\Helpers;

class StringHelper
{
    public static function englishToPersian($input, $colon = ',')
    {
        $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
        $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $colon);
        return str_replace($num_a, $key_a, $input);
    }

    public static function escapeUnicode($input)
    {
        return self::persianToEnglish(self::arabicToPersian($input));
    }

    public static function persianToEnglish($input, $colon = ',')
    {
        $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
        $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $colon);
        return str_replace($key_a, $num_a, $input);
    }

    public static function arabicToPersian($input)
    {
        $characters = [
            'ك' => 'ک',
            'دِ' => 'د',
            'بِ' => 'ب',
            'زِ' => 'ز',
            'ذِ' => 'ذ',
            'شِ' => 'ش',
            'سِ' => 'س',
            'ى' => 'ی',
            'ي' => 'ی',
            '١' => '۱',
            '٢' => '۲',
            '٣' => '۳',
            '٤' => '۴',
            '٥' => '۵',
            '٦' => '۶',
            '٧' => '۷',
            '٨' => '۸',
            '٩' => '۹',
            '٠' => '۰',
        ];

        return str_replace(array_keys($characters), array_values($characters), $input);
    }

    public static function separateEnglishPersian($input, $singleLine = false)
    {


        $englishLines = [];
        $persianLines = [];
        $lines = explode("\n", $input);

        if (count($lines) == 1 && $singleLine) {
            $line = $lines[0];

            $separators = ['|'];

            $splited = [];
            foreach ($separators as $separator) {
                $splited = explode($separator, $line);
                if (count($splited) == 2) {
                    break;
                }
            }

            if (count($splited) == 2) {
                $lines = $splited;
            }
        }

        foreach ($lines as $line) {
            $isEnglish = null;
            if ($line) {
                $english = preg_replace('/[^\w]/', '', $line);


                $isEnglish = !(
                    strlen($english) == 0
                    ||
                    $line[0] != $english[0]
                );
            }
            if ($isEnglish === true) {
                $englishLines[] = $line;
            } elseif ($isEnglish === false) {
                $persianLines[] = $line;
            }
        }
        $english = trim(implode("\n", $englishLines));
        $persian = trim(implode("\n", $persianLines));


        return [$english, $persian];
    }

    public static function normalizeVoucherCode($code)
    {
        $code = strtolower($code);
        $code = str_replace("_", "-", $code);
        return $code;
    }


    public static function normalizeString($string)
    {
        if (empty($string))
            return null;
        $string = NumberHelper::convertNumbersToEnglish($string);
        $characters = self::arabicLetterToPersianMap() + NumberHelper::numbersToEnglishMap() + ['‌' => ' '];
        return str_replace(array_keys($characters), array_values($characters), $string);
    }

    public static function arabicLetterToPersianMap()
    {
        return [
            //persian be
            "\u{0628}" => "\u{0628}",
            "\u{067B}" => "\u{0628}",
            //persian te
            "\u{062B}" => "\u{062A}",
            "\u{0679}" => "\u{062A}",
            "\u{067A}" => "\u{062A}",
            "\u{067C}" => "\u{062A}",
            "\u{067D}" => "\u{062A}",
            //persian s̱e
            "\u{067F}" => "\u{062B}",
            //persian fe
            "\u{06A1}" => "\u{0641}",
            "\u{06A2}" => "\u{0641}",
            "\u{06A3}" => "\u{0641}",
            "\u{06A5}" => "\u{0641}",
            "\u{06A4}" => "\u{0641}",
            //persian q̈e
            "\u{06A8}" => "\u{0642}",
            "\u{06A7}" => "\u{0642}",
            //persian kâf
            "\u{063B}" => "\u{06A9}",
            "\u{063C}" => "\u{06A9}",
            "\u{0643}" => "\u{06A9}",
            "\u{06AA}" => "\u{06A9}",
            "\u{06AB}" => "\u{06A9}",
            "\u{06AC}" => "\u{06A9}",
            "\u{06AD}" => "\u{06A9}",
            "\u{06AE}" => "\u{06A9}",
            //persian gâf
            "\u{06B4}" => "\u{06AF}",
            "\u{06B3}" => "\u{06AF}",
            "\u{06B2}" => "\u{06AF}",
            "\u{06B1}" => "\u{06AF}",
            "\u{06B0}" => "\u{06AF}",
            //persian lâm
            "\u{06B5}" => "\u{0644}",
            "\u{06B6}" => "\u{0644}",
            "\u{06B7}" => "\u{0644}",
            "\u{06B8}" => "\u{0644}",
            //persian nun
            "\u{06BD}" => "\u{0646}",
            "\u{06BC}" => "\u{0646}",
            "\u{06BB}" => "\u{0646}",
            "\u{06BA}" => "\u{0646}",
            "\u{06B9}" => "\u{0646}",
            //persian vav
            "\u{0624}" => "\u{0648}",
            "\u{066F}" => "\u{0648}",
            "\u{0676}" => "\u{0648}",
            "\u{0677}" => "\u{0648}",
            "\u{06C4}" => "\u{0648}",
            "\u{06C5}" => "\u{0648}",
            "\u{06C6}" => "\u{0648}",
            "\u{06C7}" => "\u{0648}",
            "\u{06C8}" => "\u{0648}",
            "\u{06C9}" => "\u{0648}",
            "\u{06CA}" => "\u{0648}",
            "\u{06CB}" => "\u{0648}",
            "\u{06CF}" => "\u{0648}",
            //persian heh
            "\u{06D5}" => "\u{0647}",
            "\u{06C2}" => "\u{0647}",
            "\u{06C1}" => "\u{0647}",
            "\u{06C0}" => "\u{0647}",
            "\u{0629}" => "\u{0647}",
            //persian ye
            "\u{0626}" => "\u{06CC}",
            "\u{063D}" => "\u{06CC}",
            "\u{063E}" => "\u{06CC}",
            "\u{063F}" => "\u{06CC}",
            "\u{0649}" => "\u{06CC}",
            "\u{064A}" => "\u{06CC}",
            "\u{0678}" => "\u{06CC}",
            "\u{06CD}" => "\u{06CC}",
            "\u{06CE}" => "\u{06CC}",
            "\u{06D0}" => "\u{06CC}",
            "\u{06D1}" => "\u{06CC}",
            "\u{06D2}" => "\u{06CC}",
            "\u{06D3}" => "\u{06CC}",

            //special chars
            "!" => "",
            "\"" => "",
            "'" => "",
            "#" => "",
            "$" => "",
            "%" => "",
            "&" => "",
            "(" => "",
            ")" => "",
            "*" => "",
            "+" => "",
            "," => "",
            "-" => "",
            "." => "",
            "/" => "",
            ":" => "",
            ";" => "",
            "<" => "",
            "=" => "",
            ">" => "",
            "?" => "",
            "@" => "",
            "[" => "",
            "\\" => "",
            "]" => "",
            "^" => "",
            "_" => "",
            "`" => "",
            "{" => "",
            "|" => "",
            "}" => "",
            "~" => "",
        ];
    }

    public static function generateUniqueStrings($count, $length = 10)
    {
        $strings = [];
        while (count($strings) < $count) {
            $string = StringHelper::generateRandomString($length);
            $strings[$string] = $string;
        }

        return array_values($strings);
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function isPersian($input)
    {

        $persianRegex='/^[\u0621-\u0628\u062A-\u063A\u0641-\u0642\u0644-\u0648\u064E-\u0651\u0655\u067E\u0686\u0698\u0020\u2000-\u200F\u2028-\u202F\u06A9\u06AF\u06BE\u06CC\u0629\u0643\u0649-\u064B\u064D\u06D5\s]+$/';


        return preg_match($persianRegex, $input) ? false : true;
    }


    public static function filterEmail($email)
    {
        return str_replace("@", " [ a ] ", $email);
    }
}
