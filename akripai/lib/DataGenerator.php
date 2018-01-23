<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/01/2018
 * Time: 11:53
 */

namespace lib;

use lib\regex\GroupA;
use lib\regex\GroupB;
use lib\regex\GroupC;
use lib\regex\GroupD;
use lib\regex\GroupE;
use lib\regex\GroupF;
use lib\regex\GroupG;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;

class DataGenerator
{
    public function generateDictionary() {
        $groups = array();
//        $groups[] = (new GroupA())->getAll();
        $groups[] = (new GroupB())->getAll();
        $groups[] = (new GroupC())->getAll();
        $groups[] = (new GroupD())->getAll();
        $groups[] = (new GroupE())->getAll();
        $groups[] = (new GroupF())->getAll();
        $groups[] = (new GroupG())->getAll();
        return $groups;
    }

    public function getSavedRegex() {
        $regexes = array();
        $query = new Query([], [
            'projection' => [
                '_id' => 0,
                'regex' => 1
            ]
        ]);
        $cursor = DatabaseManager::getInstance()->executeQuery(DatabaseManager::ATTRIBUTES_COLLECTION, $query);
        foreach($cursor as $document) {
            $regexes[] = $document->regex;
        }
        return $regexes;
    }

    public function prepareRegexCounter() {
        $regexes = $this->getSavedRegex();

        $data = array();
        foreach($regexes as $regex) {
            $data[$regex] = 0;
        }
        return $data;
    }

    public function initSettings() {
        $setting = array();
        $setting['sender'] = 'email@domain.com';
        $setting['intervalDays'] = 1;
        $setting['timeExecution'] = '17:00:00';
        $setting['path'] = '/var/www/target_folder';
        $setting['lastExecutionTime'] = time();
        $bulk = new BulkWrite();
        $bulk->insert($setting);
        DatabaseManager::getInstance()->executeBulkWrite(DatabaseManager::SETTING_COLLECTION, $bulk);
    }

    public function initAll() {
        DatabaseManager::getInstance()->deleteAll(\lib\DatabaseManager::ATTRIBUTES_COLLECTION);
        DatabaseManager::getInstance()->deleteAll(\lib\DatabaseManager::DATA_COLLECTION);
        DatabaseManager::getInstance()->deleteAll(\lib\DatabaseManager::SETTING_COLLECTION);

        $dictionary = $this->generateDictionary();
        $bulkWriter = new \MongoDB\Driver\BulkWrite();
        foreach($dictionary as $group) {
            foreach($group as $item) {
                $bulkWriter->insert($item);
            }
        }

        DatabaseManager::getInstance()->executeBulkWrite(\lib\DatabaseManager::ATTRIBUTES_COLLECTION, $bulkWriter);
        $this->initSettings();
    }
}