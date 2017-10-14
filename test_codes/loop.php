<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 22/09/2017
 * Time: 12:19
 */

$x = 0;
$y = 0;
$a = 5;
$b = 20;

if($a >= $b) {
    $x = 5;
    $y = 2;
}
else {
    while($a < $b) {
        $a++;
        while($a < 15) {
            $a++;
        }
        $x += 2;
    }
    $y = 10;
}