<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/01/2018
 * Time: 19:06
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
\lib\DatabaseManager::getInstance()->executeBulkWrite(\lib\DatabaseManager::ATTRIBUTES_COLLECTION, $bulkWriter);