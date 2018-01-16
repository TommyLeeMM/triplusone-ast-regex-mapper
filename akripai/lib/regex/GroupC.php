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
    protected $methodCount = 15;

    public function C0() {
        return parent::setNode([
            'regex' => 'C0',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'base64_decode'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function C1() {
        return parent::setNode([
            'regex' => 'C1',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'base64_decode'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function C2() {
        return parent::setNode([
            'regex' => 'C2',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'base64_decode'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function C3() {
        return parent::setNode([
            'regex' => 'C3',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'base64_decode'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function C4() {
        return parent::setNode([
            'regex' => 'C4',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'base64_decode'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function C5() {
        return parent::setNode([
            'regex' => 'C5',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'gzinflate'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function C6() {
        return parent::setNode([
            'regex' => 'C6',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'gzinflate'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function C7() {
        return parent::setNode([
            'regex' => 'C7',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'gzinflate'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function C8() {
        return parent::setNode([
            'regex' => 'C8',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'gzinflate'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function C9() {
        return parent::setNode([
            'regex' => 'C9',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'gzinflate'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function C10() {
        return parent::setNode([
            'regex' => 'C10',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'str_rot13'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function C11() {
        return parent::setNode([
            'regex' => 'C11',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'str_rot13'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function C12() {
        return parent::setNode([
            'regex' => 'C12',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'str_rot13'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function C13() {
        return parent::setNode([
            'regex' => 'C13',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'str_rot13'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function C14() {
        return parent::setNode([
            'regex' => 'C14',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'str_rot13'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }
}