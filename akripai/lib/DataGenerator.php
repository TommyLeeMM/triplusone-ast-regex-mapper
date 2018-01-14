<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/01/2018
 * Time: 11:53
 */

namespace lib;


use lib\regex\GroupB;
use lib\regex\GroupC;
use lib\regex\GroupD;
use lib\regex\GroupE;
use lib\regex\GroupF;
use lib\regex\GroupG;
use lib\regex\GroupH;
use lib\regex\GroupI;
use MongoDB\Driver\Query;

class DataGenerator
{
    public function generateDictionary() {
        $groups = array();
        $groups[] = (new GroupB())->getAll();
        $groups[] = (new GroupC())->getAll();
        $groups[] = (new GroupD())->getAll();
        $groups[] = (new GroupE())->getAll();
        $groups[] = (new GroupF())->getAll();
        $groups[] = (new GroupG())->getAll();
        $groups[] = (new GroupH())->getAll();
        $groups[] = (new GroupI())->getAll();
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
}