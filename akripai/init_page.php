<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 16/01/2018
 * Time: 5:01
 */

include_once 'bootstrap.php';

$generator = new \lib\DataGenerator();
$dictionary = $generator->generateDictionary();
$bulkWriter = new \MongoDB\Driver\BulkWrite();
foreach($dictionary as $group) {
    foreach($group as $item) {
        $bulkWriter->insert($item);
    }
}
\lib\DatabaseManager::getInstance()->deleteAll(\lib\DatabaseManager::ATTRIBUTES_COLLECTION);
\lib\DatabaseManager::getInstance()->deleteAll(\lib\DatabaseManager::DATA_COLLECTION);
\lib\DatabaseManager::getInstance()->executeBulkWrite(\lib\DatabaseManager::ATTRIBUTES_COLLECTION, $bulkWriter);

header('location: index.php');