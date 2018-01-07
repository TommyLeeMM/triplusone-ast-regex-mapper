<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


class GroupH extends Group
{
    protected $methodCount = 7;

    public function H0() {
        $data = array();
        $args = array();

        $data['regex'] = 'H0';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'file_get_contents';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function H1() {
        $data = array();
        $args = array();

        $data['regex'] = 'H1';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_init';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function H2() {
        $data = array();
        $args = array();

        $data['regex'] = 'H2';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_exec';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function H3() {
        $data = array();
        $args = array();

        $data['regex'] = 'H3';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_close';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function H4() {
        $data = array();
        $args = array();

        $data['regex'] = 'H4';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_setopt';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$CONSTFETCH;
        $arg2['name'] = 'CURLOPT_RETURNTRANSFER';

        $arg3 = array();
        $arg3['type'] = ClassConstant::$CONSTFETCH;
        $arg3['name'] = 'true';

        $args[] = $arg1;
        $args[] = $arg2;
        $args[] = $arg3;
        $data['args'] = $args;
        return $data;
    }

    public function H5() {
        $data = array();
        $args = array();

        $data['regex'] = 'H5';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_setopt';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$CONSTFETCH;
        $arg2['name'] = 'CURLOPT_CURLOPT_POST';

        $arg3 = array();
        $arg3['type'] = ClassConstant::$CONSTFETCH;
        $arg3['name'] = 'true';

        $args[] = $arg1;
        $args[] = $arg2;
        $args[] = $arg3;
        $data['args'] = $args;
        return $data;
    }

    public function H6() {
        $data = array();
        $args = array();

        $data['regex'] = 'H6';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'curl_setopt';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$CONSTFETCH;
        $arg2['name'] = 'CURLOPT_POSTFIELDS';

        $arg3 = array();
        $arg3['type'] = ClassConstant::$STRING;

        $args[] = $arg1;
        $args[] = $arg2;
        $args[] = $arg3;
        $data['args'] = $args;
        return $data;
    }
}