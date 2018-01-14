<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 19/12/2017
 * Time: 14:33
 */

include_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

error_reporting(E_ALL);
ini_set('display_errors', 1);