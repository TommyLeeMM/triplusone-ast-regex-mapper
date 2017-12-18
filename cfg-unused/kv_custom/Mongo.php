<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 19-Oct-17
 * Time: 14:36
 */

namespace kv_custom;

use MongoClient;

class Mongo
{
    private $db;
    private $collection;

    public function __construct()
    {
        $mongo = new MongoClient();
        $this->db = $mongo->triplusone;
    }

    public function insertPath(array $document)
    {
        //$document -> bisa diisi array satu atau dua dimensi
        $this->collection = $this->db->paths;
        $this->collection->insert($document);
    }

    public function insertNode(array $document)
    {
        $this->collection = $this->db->graphs;
        $this->collection->insert($document);
    }

    public function showPath()
    {
        //return array(array()); -> array dua dimensi
        $this->collection = $this->db->paths;
        return $this->collection->find();
    }

    public function deleteAll()
    {
        return $this->collection->remove();
    }
}