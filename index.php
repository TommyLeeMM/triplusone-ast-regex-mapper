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

$parseResult = $parser->parse();
$pathFinder = new \kv_custom\PathFinder($parseResult);
$pathFinder->findAllPaths();

\kv_custom\Helper::stop();
\kv_custom\Helper::memory();