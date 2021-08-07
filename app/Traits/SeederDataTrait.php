<?php


namespace App\Traits;

trait SeederDataTrait
{

    public static function lisTypes()
    {
        return [
            'checkbox', 'radio', 'open',
        ];
    }

    public static function getRandomValueFromObject($obj)
    {
        $length = count($obj);
        $arr = json_decode(json_encode($obj), true);
        return $arr[rand(0, $length - 1)];
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

    public static function generateRandomOnlyString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generatePhrase($count = 3)
    {
        $i = 1;
        $phrase_first = self::generateRandomOnlyString(8, 13);
        $phrase[] = ucfirst(mb_strtolower($phrase_first));

        while ($i < $count) {
            $phrase[] = mb_strtolower(self::generateRandomOnlyString(8, 13));
            $i++;
        }

        return implode(' ', $phrase);
    }


}
