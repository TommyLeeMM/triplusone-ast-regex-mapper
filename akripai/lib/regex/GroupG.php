<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


use function PHPSTORM_META\type;

class GroupG extends Group
{
    protected $methodCount = 8;

    public function G0() {
        return parent::setNode([
            'regex' => 'G0',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_init'
        ], []);
    }

    public function G1() {
        return parent::setNode([
            'regex' => 'G1',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function G2() {
        return parent::setNode([
            'regex' => 'G2',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_close'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function G3() {
        return parent::setNode([
            'regex' => 'G3',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_setopt'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'CURLOPT_RETURNTRANSFER'
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'true'
            ]
        ], false);
    }

    public function G4() {
        return parent::setNode([
            'regex' => 'G4',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_setopt'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'CURLOPT_POST'
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'true'
            ]
        ], false);
    }

    public function G5() {
        return parent::setNode([
            'regex' => 'G5',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_setopt'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'CURLOPT_POSTFIELDS'
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ], false);
    }

    public function G6() {
        return parent::setNode([
            'regex' => 'G6',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_setopt'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'CURLOPT_POSTFIELDS'
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ], false);
    }

    public function G7() {
        return parent::setNode([
            'regex' => 'G7',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'curl_setopt'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONST_FETCH,
                'value' => 'CURLOPT_POSTFIELDS'
            ],
            [
                'type' => ClassConstant::ARRAY_
            ]
        ], false);
    }
}