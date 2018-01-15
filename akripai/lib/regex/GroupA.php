<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15/01/2018
 * Time: 17:14
 */

namespace lib\regex;


class GroupA extends Group
{
    protected $methodCount = 9;

    public function A0() {
        $data = array();
        $data['type'] = ClassConstant::STRING;
        $data['regex'] = 'A0';
        return $data;
    }

    public function A1() {
        $data = array();
        $data['type'] = ClassConstant::VARIABLE;
        $data['regex'] = 'A1';
        return $data;
    }

    public function A2() {
        $data = array();
        $data['type'] = ClassConstant::ARRAY_DIM_FETCH;
        $data['regex'] = 'A2';
        return $data;
    }

    public function A3() {
        $data = array();
        $data['type'] = ClassConstant::CONCAT;
        $data['regex'] = 'A3';
        return $data;
    }

    public function A4() {
        $data = array();
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['regex'] = 'A4';
        return $data;
    }

    public function A5() {
        $data = array();
        $data['type'] = ClassConstant::ARRAY_;
        $data['regex'] = 'A5';
        return $data;
    }

    public function A6() {
        // contoh => "$var". Dianggap sama seperti string hardcode
        $data = array();
        $data['type'] = ClassConstant::SCALAR_ENCAPSED;
        $data['regex'] = 'A0';
        return $data;
    }

    public function A7() {
        // contoh => "$var"."some text here". Dianggap sama seperti concat string hardcode
        $data = array();
        $data['type'] = ClassConstant::EXPR_BINARY_CONCAT;
        $data['regex'] = 'A3';
        return $data;
    }

    public function A8() {
        // contoh => $this->attr. Dianggap sama seperti variable
        $data = array();
        $data['type'] = ClassConstant::PROPERTY_FETCH;
        $data['regex'] = 'A1';
        return $data;
    }
}