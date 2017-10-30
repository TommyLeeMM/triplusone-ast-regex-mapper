<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 05/10/2017
 * Time: 12:57
 */

require __DIR__ . "/vendor/autoload.php";
require_once 'kv_custom/CFGPrinter.php';
require_once 'kv_custom/Node.php';
require_once 'kv_custom/Parser.php';
require_once 'kv_custom/PathFinder.php';
require_once 'kv_custom/Helper.php';
require_once 'kv_custom/Mongo.php';

set_time_limit(0);

$parser = new \kv_custom\Parser();
//$mongo = new \kv_custom\Mongo();

echo '<pre>';
$parser->printBlockContents();
echo '</pre>';

$parseResult = $parser->parse();
//print_r($parser->parse());
$pathFinder = new \kv_custom\PathFinder($parseResult);
unset($parser);
unset($parseResult);

$pathFinder->findAllPaths();
// \kv_custom\Helper::startTime();
// foreach($pathFinder->findAllPaths() as $path) {
//    $string = '';
//    foreach($path as $node) {
//        echo $node.' ';
//        $string .= $node." ";
//    }
//    echo '<br/>';
// }
// \kv_custom\Helper::stop();
// \kv_custom\Helper::memory();

//\kv_custom\Helper::startTime();
//foreach($pathFinder->findAllPathsBFSPublic() as $path) {
//    foreach($path as $node) {
//        echo $node['node']->getId().' ';
//    }
//    echo '<br/>';
//}
//\kv_custom\Helper::stop();
//\kv_custom\Helper::memory();