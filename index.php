<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 05/10/2017
 * Time: 12:57
 */

require __DIR__ . "/vendor/autoload.php";
require_once 'kv_custom/CFGPrinter.php';
require_once 'kv_custom/Parser.php';
require_once 'kv_custom/PathFinder.php';

function prettyPrint($object) {
    echo '<pre>'; var_dump($object); echo '</pre>';
}

$startTime = microtime(true);

$parser = new \kv_custom\Parser();
$parseResult = $parser->parse();
$pathFinder = new \kv_custom\PathFinder($parseResult);
$paths = $pathFinder->findAllPaths();

echo 'Available paths:<br/>';
foreach($paths as $key => $path) {
    echo ($key+1).'##<br/>';
    foreach($path as $id) {
        echo $id.'<br/>';
        if(array_key_exists('jumpIf', $parseResult['adjList'][$id-1])) {
            echo 'Condition exists in statement index no:'.$parseResult['adjList'][$id-1]['jumpIf']['cond'].'<br/>';
            echo 'True condition to block:'.$parseResult['adjList'][$id-1]['jumpIf']['true'].'<br/>';
            echo 'False condition to block:'.$parseResult['adjList'][$id-1]['jumpIf']['false'].'<br/>';
        }
    }
    echo '<br>';
}
$parser->printBlockContents();

$endTime = microtime(true);
echo 'Elapsed in '.($endTime - $startTime). ' seconds.';