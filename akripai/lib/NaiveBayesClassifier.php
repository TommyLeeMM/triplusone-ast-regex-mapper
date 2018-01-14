<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 20:18
 */

namespace lib;

use MongoDB\Driver\Query;

class NaiveBayesClassifier
{
    private $positiveData, $negativeData;
    private $additiveValue = 1;
    private $labelCount = 2; // malware or not
    private $dbManager;
    private $positiveCallCount, $negativeCallCount;
    private $positiveProbability, $negativeProbability;
    private $regexes;

    public function __construct()
    {
        $this->dbManager = DatabaseManager::getInstance();
        $this->regexCounter = (new DataGenerator())->prepareRegexCounter();
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
            echo 'No data';
        }
        else {
            $this->positiveData = $cursorArray[0]['positive'];
            $this->negativeData = $cursorArray[0]['negative'];
            $this->prepareProbabilityMap();
        }
    }

    private function prepareProbabilityMap() {
        $this->positiveCallCount = array_sum($this->positiveData);
        $this->negativeCallCount = array_sum($this->negativeData);

        $this->positiveProbability = array();
        $this->negativeProbability = array();

        foreach($this->positiveData as $regex => $count) {
            $this->positiveProbability[$regex] = ($count + $this->additiveValue) / ($this->positiveCallCount + count($this->positiveData));
        }
        foreach($this->negativeData as $regex => $count) {
            $this->negativeProbability[$regex] = ($count + $this->additiveValue) / ($this->negativeCallCount + count($this->negativeData));
        }
    }

    public function classify($regexMap) {
        $data = array();
        foreach($regexMap as $filename => $regexes) {
            $data[$filename] = $this->calculateProbability($regexes);
        }
        return $data;
    }

    private function calculateProbability($regexes) {
        $regexCount = $this->calculateRegexCount($regexes);
        $positiveProb = $negativeProb = $this->regexCounter;

        foreach($regexCount as $regex => $count) {
            $positiveProb[$regex] = ($count === 0) ? 1 : ($count * $this->positiveProbability[$regex]);
        }
        foreach($regexCount as $regex => $count) {
            $negativeProb[$regex] = ($count === 0) ? 1 : ($count * $this->negativeProbability[$regex]);
        }

        $positiveThreshold = array_product($positiveProb) * ($this->additiveValue / $this->labelCount);
        $negativeThreshold = array_product($negativeProb) * ($this->additiveValue / $this->labelCount);
        return [
            'positiveThreshold' => $positiveThreshold,
            'negativeThreshold' => $negativeThreshold
        ];
    }

    private function calculateRegexCount($regexes) {
        $data = $this->regexCounter;
        foreach($regexes as $regex => $count) {
            $data[$regex] += $count;
        }
        return $data;
    }
}