<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:40
 */

include_once('vendor/autoload.php');

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

error_reporting(E_ALL);
ini_set('display_errors', 1);

//header('Content-type:text/plain');

$parser = new \lib\Parser();
$result = $parser->parse('sample_malwares/code.php');
\lib\Helper::prettyVarDump($result[0]->getName());
//\lib\Helper::prettyVarDump($result);

