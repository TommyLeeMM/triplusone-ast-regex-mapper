<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 22/09/2017
 * Time: 12:20
 */

namespace kv_custom;


class Stack
{
    private $stack;
    public function __construct()
    {
        $this->stack = array();
    }
    public function push($item) {
        $this->stack[] = $item;
    }
    public function pop() {
        return array_pop($this->stack);
    }
    public function top() {
        return ($this->isEmpty() ? null : $this->stack[count($this->stack)-1]);
    }
    public function isEmpty() {
        return count($this->stack) == 0;
    }
}