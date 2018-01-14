<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/01/2018
 * Time: 11:59
 */

namespace lib;


use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;

class Trainer
{
    private $positiveData, $negativeData;
    private $dbManager;

    public function __construct()
    {
        $this->dbManager = DatabaseManager::getInstance();
        $this->initialize();
    }

    private function initialize() {
        $dataQuery = new Query([]);
        $cursor = $this->dbManager->executeQuery(DatabaseManager::DATA_COLLECTION, $dataQuery);
        $cursor->setTypeMap([
            'root' => 'array',
            'document' => 'array',
            'array' => 'array'
        ]);
        $cursorArray = $cursor->toArray();
        if(count($cursorArray) === 0) {
            $generator = new DataGenerator();
            $regexCounter = $generator->prepareRegexCounter();
            $this->positiveData = $this->negativeData = $regexCounter;

            $data = array();
            $data['positive'] = $this->positiveData;
            $data['negative'] = $this->negativeData;
            $bulkWriter = new BulkWrite();
            $bulkWriter->insert($data);
            $this->dbManager->executeBulkWrite(DatabaseManager::DATA_COLLECTION, $bulkWriter);
        }
        else {
            $this->positiveData = $cursorArray[0]['positive'];
            $this->negativeData = $cursorArray[0]['negative'];
        }
    }

    public function train($regexMap, $label) {
        foreach($regexMap as $regexes) {
            $this->calculateRegexCount($regexes, $label);
        }
        $this->save();
    }

    private function calculateRegexCount($regexes, $label) {
        if($label === 'Y') {
            $data = $this->positiveData;
        }
        else {
            $data = $this->negativeData;
        }

        foreach($regexes as $regex => $count) {
            $data[$regex] += $count;
        }

        if($label === 'Y') {
            $this->positiveData = $data;
        }
        else {
            $this->negativeData = $data;
        }
    }

    private function save() {
        $data = array();
        $data['positive'] = $this->positiveData;
        $data['negative'] = $this->negativeData;
        $bulkWriter = new BulkWrite();
        $bulkWriter->update([], $data);
        $this->dbManager->executeBulkWrite(DatabaseManager::DATA_COLLECTION, $bulkWriter);
    }
}