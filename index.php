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

set_time_limit(0);

$parser = new \kv_custom\Parser();

//echo '<pre>';
//$parser->printBlockContents();
//echo '</pre>';

$parseResult = $parser->parse();
$pathFinder = new \kv_custom\PathFinder($parseResult);

\kv_custom\Helper::startTime();
foreach($pathFinder->findAllPaths() as $path) {
    foreach($path as $node) {
        echo $node.' ';
    }
    echo '<br/>';
}
\kv_custom\Helper::stop();
\kv_custom\Helper::memory();

\kv_custom\Helper::startTime();
foreach($pathFinder->findAllPathsBFSPublic() as $path) {
    foreach($path as $node) {
        echo $node['node']->getId().' ';
    }
    echo '<br/>';
}
\kv_custom\Helper::stop();
\kv_custom\Helper::memory();