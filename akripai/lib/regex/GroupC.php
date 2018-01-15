<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 12:34
 */

namespace lib\regex;


class GroupC extends Group
{
    protected $methodCount = 3;

    public function C0() {
        $data = array();

        $data['regex'] = 'C0';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'base64_decode';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function C1() {
        $data = array();

        $data['regex'] = 'C1';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'exec';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function C2() {
        $data = array();

        $data['regex'] = 'C2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'base64_decode';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

}