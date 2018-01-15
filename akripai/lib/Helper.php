<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/10/2017
 * Time: 9:48
 */

namespace lib;

use lib\regex\GroupA;

class Helper
{
    private static $startTime;
    private static $endTime;
    private static $regexA;

    public static function prettyVarDump($object) {
        echo '<pre>';
        var_dump($object);
        echo '</pre>';
    }

    public static function prettyPrintR($array) {
        echo '<pre>'; print_r($array); echo '</pre>';
    }

    public static function startTime() {
        self::$startTime = microtime(true);
    }

    public static function stop() {
        self::$endTime = microtime(true);
        echo 'Elapsed in '. (self::$endTime - self::$startTime).' secs<br/>';
    }

    public static function memory() {
        $mem_usage = memory_get_usage(false);

        if ($mem_usage < 1024)
            echo $mem_usage." bytes";
        elseif ($mem_usage < 1048576)
            echo round($mem_usage/1024,2)." kilobytes";
        else
            echo round($mem_usage/1048576,2)." megabytes";

        echo "<br/>";
    }

    public static function getRegexArgument($type) {
        if(self::$regexA === null) {
            self::$regexA = (new GroupA())->getAll();
        }
        foreach(self::$regexA as $regex) {
            if($regex['type'] === $type)
                return $regex['regex'];
        }
        return null;
    }
}