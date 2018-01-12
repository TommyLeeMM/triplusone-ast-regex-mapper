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
    protected $methodCount = 5;

    public function C0() {
        $data = array();
        $args = array();

        $data['regex'] = 'C0';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'base64_decode';
        $data['argsTypeKey'] = ClassConstant::STRING.',';

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function C1() {
        $data = array();
        $args = array();

        $data['regex'] = 'C1';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'gzinflate';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function C2() {
        $data = array();
        $args = array();

        $data['regex'] = 'C2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'str_rot13';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function C3() {
        $data = array();
        $args = array();

        $data['regex'] = 'C3';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'gzinflate';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1['name'] = 'str_rot13';

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::VARIABLE;

        $arg1['args'][] = $arg1arg1;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function C4() {
        $data = array();
        $args = array();

        $data['regex'] = 'C4';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'str_rot13';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1['name'] = 'gzinflate';

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1arg1['name'] = 'str_rot13';

        $arg1arg1arg1 = array();
        $arg1arg1arg1['type'] = ClassConstant::VARIABLE;

        $arg1arg1['args'][] = $arg1arg1arg1;
        $arg1['args'][] = $arg1arg1;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

}