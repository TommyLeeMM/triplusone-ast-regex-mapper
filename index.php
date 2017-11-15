<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 05/10/2017
 * Time: 12:57
 */

require __DIR__ . '/vendor/autoload.php';
require_once 'kv_custom/DirectoryScanner.php';
require_once 'kv_custom/CFGPrinter.php';
require_once 'kv_custom/Node.php';
require_once 'kv_custom/Graph.php';
require_once 'kv_custom/Parser.php';
require_once 'kv_custom/PathFinder.php';
require_once 'kv_custom/Helper.php';
require_once 'kv_custom/Mongo.php';

set_time_limit(0);

$parser = new \kv_custom\Parser();

//echo '<pre>';
//$parser->printBlockContents();
//echo '</pre>';

\kv_custom\Helper::startTime();

$directoryScanner = new \kv_custom\DirectoryScanner();
$filenames = $directoryScanner->scan("C:\\XAMPP\\XAMPP56\\htdocs\\triplusone\\test_codes");

$parseResults = [];
foreach($filenames as $filename) {
    $parseResults[$filename] = $parser->parse($filename);
}

foreach($parseResults as $filename => $parseResult) {
    $pathFinder = new \kv_custom\PathFinder($filename, $parseResult);
    $pathFinder->findAllPaths();
}

\kv_custom\Helper::stop();
\kv_custom\Helper::memory();