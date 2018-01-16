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
        return parent::setNode([
            'regex' => 'B0',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'set_time_limit'
        ], [
            [
                'type' => ClassConstant::SCALAR_LNUMBER,
                'value' => 0
            ]
        ], false);
    }

    public function B1() {
        return parent::setNode([
            'regex' => 'B1',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'htmlspecialchars'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function B2() {
        return parent::setNode([
            'regex' => 'B2',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'htmlspecialchars'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function B3() {
        return parent::setNode([
            'regex' => 'B3',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'ini_set'
        ], [
            [
                'type' => ClassConstant::STRING,
                'value' => 'max_execution_time'
            ],
            [
                'type' => ClassConstant::SCALAR_LNUMBER,
                'value' => 0
            ]
        ], false);
    }

    public function B4() {
        return parent::setNode([
            'regex' => 'B4',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'htmlspecialchars'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }
}