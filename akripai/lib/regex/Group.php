<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:33
 */

namespace lib\regex;


use lib\Helper;

abstract class Group
{
    protected $methodCount;

    public function getAll() {
        $data = array();
        $className = substr(strrchr(get_class($this), '\\'), 1);
        $groupName = substr($className, 5);

        for($i = 0; $i < $this->methodCount; $i++) {
            $data[] = call_user_func_array(array($this, $groupName.$i), []);
        }
        return $data;
    }

    protected function setRegexArgs($args) {
        $results = array();
        foreach($args as $arg) {
            $results[] = Helper::getRegexArgument($arg['type']);
        }
        return implode(',', $results);
    }
}