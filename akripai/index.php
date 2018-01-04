<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:40
 */

include_once 'bootstrap.php';

$parser = new \lib\Parser();
$result = $parser->parse('sample_malwares/code.php');

$mapper = new \lib\AstRegexMapper();

$traverser = new \PhpParser\NodeTraverser();
$traverser->addVisitor($mapper);

//$manager = \lib\DatabaseManager::getInstance();
//$manager->insertDummyData();

foreach($result as $filename => $ast) {
//    \lib\Helper::prettyVarDump($ast);
    $traverser->traverse($ast);
}