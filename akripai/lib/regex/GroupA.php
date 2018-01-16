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
        return parent::setNode([
            'type' => ClassConstant::STRING,
            'regex' => 'A0'
        ], [], false);
    }

    public function A1() {
        return parent::setNode([
            'type' => ClassConstant::VARIABLE,
            'regex' => 'A1'
        ], [], false);
    }

    public function A2() {
        return parent::setNode([
            'type' => ClassConstant::ARRAY_DIM_FETCH,
            'regex' => 'A2'
        ], [], false);
    }

    public function A3() {
        return parent::setNode([
            'type' => ClassConstant::CONCAT,
            'regex' => 'A3'
        ], [], false);
    }

    public function A4() {
        return parent::setNode([
            'type' => ClassConstant::FUNC_CALL,
            'regex' => 'A4'
        ], [], false);
    }

    public function A5() {
        $data = array();
        $data['type'] = ClassConstant::ARRAY_;
        $data['regex'] = 'A5';
        return $data;
    }

    public function A6() {
        // contoh => "$var". Dianggap sama seperti string hardcode
        return parent::setNode([
            'type' => ClassConstant::SCALAR_ENCAPSED,
            'regex' => 'A0'
        ], [], false);
    }

    public function A7() {
        // contoh => "$var"."some text here". Dianggap sama seperti concat string hardcode
        return parent::setNode([
            'type' => ClassConstant::EXPR_BINARY_CONCAT,
            'regex' => 'A3'
        ], [], false);
    }

    public function A8() {
        // contoh => $this->attr. Dianggap sama seperti variable
        return parent::setNode([
            'type' => ClassConstant::PROPERTY_FETCH,
            'regex' => 'A1'
        ], [], false);
    }

    public function A9() {
        return parent::setNode([
            'type' => ClassConstant::SCALAR_LNUMBER,
            'regex' => 'A6'
        ], [], false);
    }
}