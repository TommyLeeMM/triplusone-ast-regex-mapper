<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 26/12/2017
 * Time: 9:49
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
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query;


class DummyDataGenerator
{
    public function generate() {
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

    public function generateSetting() {
        $setting = array();
        $setting['sender'] = 'email@domain.com';
        $setting['intervalDays'] = 1;
        $setting['timeExecution'] = '17:00:00';
        $setting['path'] = '/var/www/target_folder';
        $setting['lastExecutionTime'] = time();
        $bulk = new BulkWrite();
        $bulk->insert($setting);
        DatabaseManager::getInstance()->executeBulkWrite($bulk);
        Helper::prettyVarDump($setting);
    }

    public function insertDummyData() {
        $dbManager = DatabaseManager::getInstance();
        $dbManager->deleteAttributes();
        $bulkWriter = new BulkWrite();
        foreach($this->generate() as $groups) {
            foreach($groups as $item) {
                $bulkWriter->insert($item);
            }
        }
        $dbManager->executeBulkWrite(DatabaseManager::ATTRIBUTES_COLLECTION, $bulkWriter);
    }

    public function prepareRegexCounter() {
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

        $data = array();
        foreach($regexes as $regex) {
            $data[$regex] = 0;
        }
        return $data;
    }

    public function generateRegexIsAppearOrNotPositiveCounter() {
        $data = array();
        for($i = 0; $i < 8; $i++) {
            $data[] = $this->prepareRegexCounter();
        }

        $data[0]['E2'] = 1;
        $data[0]['E4'] = 1;
        $data[0]['E5'] = 1;
        $data[0]['E3'] = 1;
        $data[0]['D14'] = 1;
        $data[0]['D19'] = 1;
        $data[0]['D10'] = 1;
        $data[0]['D5'] = 1;
        $data[0]['D11'] = 1;
        $data[0]['D13'] = 1;

        $data[1]['E2'] = 1;
        $data[1]['E4'] = 1;
        $data[1]['E5'] = 1;
        $data[1]['E3'] = 1;
        $data[1]['D14'] = 1;
        $data[1]['D0'] = 1;
        $data[1]['D17'] = 1;
        $data[1]['F9'] = 1;
        $data[1]['F10'] = 1;
        $data[1]['H1'] = 1;
        $data[1]['H2'] = 1;
        $data[1]['H4'] = 1;
        $data[1]['H5'] = 1;
        $data[1]['H6'] = 1;
        $data[1]['H3'] = 1;
        $data[1]['D5'] = 1;
        $data[1]['D18'] = 1;
        $data[1]['D4'] = 1;

        $data[2]['D8'] = 1;
        $data[2]['D7'] = 1;
        $data[2]['D10'] = 1;
        $data[2]['D11'] = 1;
        $data[2]['D12'] = 1;
        $data[2]['D4'] = 1;
        $data[2]['D0'] = 1;

        $data[3]['E4'] = 1;
        $data[3]['E2'] = 1;
        $data[3]['E3'] = 1;
        $data[3]['E5'] = 1;
        $data[3]['E7'] = 1;
        $data[3]['B7'] = 1;
        $data[3]['E6'] = 1;
        $data[3]['E12'] = 1;
        $data[3]['B9'] = 1;
        $data[3]['B10'] = 1;
        $data[3]['D10'] = 1;
        $data[3]['B11'] = 1;
        $data[3]['D11'] = 1;
        $data[3]['D12'] = 1;
        $data[3]['E13'] = 1;
        $data[3]['F9'] = 1;
        $data[3]['D15'] = 1;
        $data[3]['D0'] = 1;
        $data[3]['B14'] = 1;
        $data[3]['D16'] = 1;
        $data[3]['D12'] = 1;

        $data[4]['E11'] = 1;

        $data[5]['E10'] = 1;

        $data[6]['E9'] = 1;

        $data[7]['B0'] = 1;
        $data[7]['E2'] = 1;
        $data[7]['B1'] = 1;
        $data[7]['E3'] = 1;
        $data[7]['B2'] = 1;
        $data[7]['E4'] = 1;
        $data[7]['B3'] = 1;
        $data[7]['E5'] = 1;
        $data[7]['B4'] = 1;
        $data[7]['E6'] = 1;
        $data[7]['B5'] = 1;
        $data[7]['B6'] = 1;
        $data[7]['E7'] = 1;
        $data[7]['B7'] = 1;
        $data[7]['D1'] = 1;
        $data[7]['D2'] = 1;
        $data[7]['D0'] = 1;
        $data[7]['D3'] = 1;
        $data[7]['D4'] = 1;
        $data[7]['D1'] = 1;
        $data[7]['D5'] = 1;
        $data[7]['D2'] = 1;
        $data[7]['D6'] = 1;
        $data[7]['D3'] = 1;
        $data[7]['E1'] = 1;
        $data[7]['E0'] = 1;
        $data[7]['E8'] = 1;
        $data[7]['D6'] = 1;
        $data[7]['B8'] = 1;
        $data[7]['D0'] = 1;
        $data[7]['D7'] = 1;
        $data[7]['D8'] = 1;
        $data[7]['F0'] = 1;
        $data[7]['F1'] = 1;
        $data[7]['F2'] = 1;
        $data[7]['F3'] = 1;
        $data[7]['F4'] = 1;
        $data[7]['F5'] = 1;
        $data[7]['F6'] = 1;
        $data[7]['F7'] = 1;
        $data[7]['F8'] = 1;
        $data[7]['D9'] = 1;
        $data[7]['D10'] = 1;
        $data[7]['D11'] = 1;
        $data[7]['D12'] = 1;

        return $data;
    }

    public function generateRegexIsAppearOrNotNegativeCounter() {
        $data = array();
        for($i = 0; $i < 4; $i++) {
            $data[] = $this->prepareRegexCounter();
        }

        $data[0]['F10'] = 1;
        $data[0]['B9'] = 1;
        $data[0]['B10'] = 1;
        $data[0]['B11'] = 1;
        $data[0]['B12'] = 1;
        $data[0]['B13'] = 1;
        $data[0]['B14'] = 1;

        $data[1]['D10'] = 1;
        $data[1]['D11'] = 1;
        $data[1]['D12'] = 1;
        $data[1]['D13'] = 1;
        $data[1]['D14'] = 1;
        $data[1]['B14'] = 1;
        $data[1]['F1'] = 1;
        $data[1]['F0'] = 1;
        $data[1]['H0'] = 1;

        $data[2]['H1'] = 1;
        $data[2]['H2'] = 1;
        $data[2]['H3'] = 1;
        $data[2]['H4'] = 1;
        $data[2]['H5'] = 1;
        $data[2]['H6'] = 1;

        $data[3]['H1'] = 1;
        $data[3]['H2'] = 1;
        $data[3]['H3'] = 1;
        $data[3]['H4'] = 1;
        $data[3]['H5'] = 1;
        $data[3]['H6'] = 1;
        $data[3]['B14'] = 1;
        $data[3]['F1'] = 1;
        $data[3]['F0'] = 1;
        $data[3]['H0'] = 1;
        $data[3]['F10'] = 1;

        return $data;
    }

    public function generateRegexAppearanceCountPositiveCounter() {
        $data = array();
        for($i = 0; $i < 8; $i++) {
            $data[] = $this->prepareRegexCounter();
        }

        $data[0]['E2'] = 2;
        $data[0]['E4'] = 2;
        $data[0]['E5'] = 2;
        $data[0]['E3'] = 2;
        $data[0]['D14'] = 1;
        $data[0]['D19'] = 1;
        $data[0]['D10'] = 1;
        $data[0]['D5'] = 1;
        $data[0]['D11'] = 1;
        $data[0]['D13'] = 1;

        $data[1]['E2'] = 1;
        $data[1]['E4'] = 1;
        $data[1]['E5'] = 1;
        $data[1]['E3'] = 1;
        $data[1]['D14'] = 1;
        $data[1]['D0'] = 1;
        $data[1]['D17'] = 1;
        $data[1]['F9'] = 1;
        $data[1]['F10'] = 1;
        $data[1]['H1'] = 1;
        $data[1]['H2'] = 1;
        $data[1]['H4'] = 1;
        $data[1]['H5'] = 1;
        $data[1]['H6'] = 1;
        $data[1]['H3'] = 1;
        $data[1]['D5'] = 1;
        $data[1]['D18'] = 1;
        $data[1]['D4'] = 1;

        $data[2]['D8'] = 1;
        $data[2]['D7'] = 1;
        $data[2]['D10'] = 1;
        $data[2]['D11'] = 1;
        $data[2]['D12'] = 1;
        $data[2]['D4'] = 1;
        $data[2]['D0'] = 1;

        $data[3]['E4'] = 1;
        $data[3]['E2'] = 1;
        $data[3]['E3'] = 1;
        $data[3]['E5'] = 1;
        $data[3]['E7'] = 1;
        $data[3]['B7'] = 1;
        $data[3]['E6'] = 1;
        $data[3]['E12'] = 1;
        $data[3]['B9'] = 2;
        $data[3]['B10'] = 2;
        $data[3]['D10'] = 3;
        $data[3]['B11'] = 1;
        $data[3]['D11'] = 1;
        $data[3]['B12'] = 1;
        $data[3]['B13'] = 1;
        $data[3]['D13'] = 1;
        $data[3]['D14'] = 1;
        $data[3]['D12'] = 4;
        $data[3]['E13'] = 1;
        $data[3]['F9'] = 1;
        $data[3]['D15'] = 1;
        $data[3]['D0'] = 1;
        $data[3]['B14'] = 1;
        $data[3]['D16'] = 1;

        $data[4]['E11'] = 1;

        $data[5]['E10'] = 1;

        $data[6]['E9'] = 1;

        $data[7]['B0']++;
        $data[7]['E2']++;
        $data[7]['B1']++;
        $data[7]['E3']++;
        $data[7]['B2']++;
        $data[7]['E4']++;
        $data[7]['B3']++;
        $data[7]['E5']++;
        $data[7]['B4']++;
        $data[7]['E6']++;
        $data[7]['B5']++;
        $data[7]['B6']++;
        $data[7]['E7']++;
        $data[7]['B7']++;
        $data[7]['D1']++;
        $data[7]['D2']++;
        $data[7]['D0']++;
        $data[7]['D3']++;
        $data[7]['D4']++;
        $data[7]['D1']++;
        $data[7]['D5']++;
        $data[7]['D2']++;
        $data[7]['D6']++;
        $data[7]['D3']++;
        $data[7]['E1']++;
        $data[7]['E0']++;
        $data[7]['E8']++;
        $data[7]['D6']++;
        $data[7]['B8']++;
        $data[7]['D0']++;
        $data[7]['D7']++;
        $data[7]['D8']++;
        $data[7]['F0']++;
        $data[7]['F1']++;
        $data[7]['F2']++;
        $data[7]['F3']++;
        $data[7]['F4']++;
        $data[7]['F5']++;
        $data[7]['F6']++;
        $data[7]['F7']++;
        $data[7]['F8']++;
        $data[7]['D9']++;
        $data[7]['D10']++;
        $data[7]['D11']++;
        $data[7]['D12']++;

        return $data;
    }

    public function generateRegexAppearanceCountNegativeCounter() {
        $data = array();
        for($i = 0; $i < 4; $i++) {
            $data[] = $this->prepareRegexCounter();
        }

        $data[0]['F10'] = 3;
        $data[0]['B9'] = 1;
        $data[0]['B10'] = 1;
        $data[0]['B11'] = 1;
        $data[0]['B12'] = 1;
        $data[0]['B13'] = 1;
        $data[0]['B14'] = 1;

        $data[1]['D10'] = 2;
        $data[1]['D11'] = 2;
        $data[1]['D12'] = 2;
        $data[1]['D13'] = 2;
        $data[1]['D14'] = 2;
        $data[1]['B14'] = 2;
        $data[1]['F1'] = 1;
        $data[1]['F0'] = 1;
        $data[1]['H0'] = 3;

        $data[2]['H1'] = 1;
        $data[2]['H2'] = 1;
        $data[2]['H3'] = 1;
        $data[2]['H4'] = 1;
        $data[2]['H5'] = 1;
        $data[2]['H6'] = 1;

        $data[3]['H1'] = 1;
        $data[3]['H2'] = 1;
        $data[3]['H3'] = 1;
        $data[3]['H4'] = 1;
        $data[3]['H5'] = 1;
        $data[3]['H6'] = 1;
        $data[3]['B14'] = 1;
        $data[3]['F1'] = 1;
        $data[3]['F0'] = 1;
        $data[3]['H0'] = 1;
        $data[3]['F10'] = 1;

        return $data;
    }
}