<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 12:34
 */

namespace lib\regex;


use lib\Helper;

class GroupB extends Group
{
    protected $methodCount = 5;

    public function B0() {
        $data = array();
        $args = array();

        $data['regex'] = 'B0';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'set_time_limit';

        $arg1 = array();
        $arg1['type'] = ClassConstant::SCALAR_LNUMBER;
        $arg1['value'] = 0;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B1() {
        $data = array();

        $data['regex'] = 'B1';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'htmlspecialchars';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function B2() {
        $data = array();

        $data['regex'] = 'B2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'htmlspecialchars';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function B3() {
        $data = array();

        $data['regex'] = 'B3';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'ini_set';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg1['value'] = 'max_execution_time';

        $arg2 = array();
        $arg2['type'] = ClassConstant::SCALAR_LNUMBER;
        $arg2['value'] = 0;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        return $data;
    }

    public function B4() {
        $data = array();

        $data['regex'] = 'B4';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'htmlspecialchars';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }
}