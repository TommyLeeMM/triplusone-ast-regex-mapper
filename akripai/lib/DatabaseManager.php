<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 24/12/2017
 * Time: 20:58
 */

namespace lib;


use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class DatabaseManager
{
    private $manager;
    private static $instance;
    private $collectionNamespace = 'triplusone.attributes';

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

    public function insertDummyData() {
        $generator = new DummyDataGenerator();
        $bulkWriter = new BulkWrite();
        $bulkWriter->insert($generator->base64Decode());
        $bulkWriter->insert($generator->execTwoParameters());
        $this->executeBulkWrite($bulkWriter);
    }

    public function executeBulkWrite(BulkWrite $bulkWriter) {
        $this->manager->executeBulkWrite($this->collectionNamespace, $bulkWriter);
    }

    public function executeQuery(Query $query) {
        return $this->manager->executeQuery($this->collectionNamespace, $query);
    }
}