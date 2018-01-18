<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 18/01/2018
 * Time: 13:57
 */

include_once 'bootstrap.php';

$classify = new \lib\NaiveBayesClassifier();
\lib\Helper::prettyVarDump($classify->getProbabilityModel());