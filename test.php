<?php

$string = 'CEX';
$method = strtolower($string[1].$string[2].$string[1].$string[0]); //exec
echo $method('whoami');