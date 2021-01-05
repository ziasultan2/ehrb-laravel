<?

namespace App\Common;

class Conversion {
    public static function textToJson($string)
    {
        $string = str_replace('\n', '', $string);
        $string = rtrim($string, ',');
        $json = json_decode($string, true);
        return $json;
    }
}