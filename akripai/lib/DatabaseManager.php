<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 24/12/2017
 * Time: 20:58
 */

namespace lib;


use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Command;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class DatabaseManager
{
    private $manager;
    private static $instance;
    const SETTING_COLLECTION = 'triplusone.settings';
    const ATTRIBUTES_COLLECTION = 'triplusone.attributes';
    const DATA_COLLECTION = 'triplusone.data';

    private function __construct()
    {
        $this->manager = new Manager('mongodb://127.0.0.1/triplusone');
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new DatabaseManager();
        }
        return self::$instance;
    }

    public function executeBulkWrite($collectionName, BulkWrite $bulkWriter) {
        $this->manager->executeBulkWrite($collectionName, $bulkWriter);
    }

    public function executeQuery($collectionName, Query $query) {
        return $this->manager->executeQuery($collectionName, $query);
    }

    public function deleteAttributes() {
        $bulk = new BulkWrite();
        $bulk->delete([]);
        $this->manager->executeBulkWrite(self::ATTRIBUTES_COLLECTION, $bulk);
    }
}