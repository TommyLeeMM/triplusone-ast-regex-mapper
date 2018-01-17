<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 16/01/2018
 * Time: 5:01
 */

include_once 'bootstrap.php';

$generator = new \lib\DataGenerator();
$generator->initAll();

header('location: index.php');