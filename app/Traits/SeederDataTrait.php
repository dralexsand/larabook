<?php


namespace App\Traits;

trait SeederDataTrait
{

    public static function lisTypes()
    {
        return [
            'list', 'list_plus_open', 'list_open',
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

}
