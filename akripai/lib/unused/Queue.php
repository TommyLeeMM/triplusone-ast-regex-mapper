<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 11/01/2018
 * Time: 21:31
 */

namespace lib;


class Queue
{
    private $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function add($data) {
        $this->data[] = $data;
    }

    public function isEmpty() {
        return count($this->data) === 0;
    }

    public function pop() {
        if($this->isEmpty())
            return null;
        $returnedData = $this->data[0];
        unset($this->data[0]);
        $this->data = array_values($this->data);
        return $returnedData;
    }

    public function getData() {
        return $this->data;
    }
}