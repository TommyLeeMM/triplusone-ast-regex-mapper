<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 12:34
 */

namespace lib\regex;


class GroupB extends Group
{
    protected $methodCount = 15;

    public function B0() {
        $data = array();
        $args = array();

        $data['regex'] = 'B0';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'system';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B1() {
        $data = array();
        $args = array();

        $data['regex'] = 'B1';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'shell_exec';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B2() {
        $data = array();
        $args = array();

        $data['regex'] = 'B2';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'exec';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B3() {
        $data = array();
        $args = array();

        $data['regex'] = 'B3';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'passthru';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B4() {
        $data = array();
        $args = array();

        $data['regex'] = 'B4';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'proc_open';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B5() {
        $data = array();
        $args = array();

        $data['regex'] = 'B5';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'proc_close';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B6() {
        $data = array();
        $args = array();

        $data['regex'] = 'B6';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_callable';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'popen';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B7() {
        $data = array();
        $args = array();

        $data['regex'] = 'B7';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'pclose';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B8() {
        $data = array();
        $args = array();

        $data['regex'] = 'B8';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'is_file';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B9() {
        $data = array();
        $args = array();

        $data['regex'] = 'B9';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'fopen';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B10() {
        $data = array();
        $args = array();

        $data['regex'] = 'B10';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'fclose';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B11() {
        $data = array();
        $args = array();

        $data['regex'] = 'B11';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'fwrite';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B12() {
        $data = array();
        $args = array();

        $data['regex'] = 'B12';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'fputs';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B13() {
        $data = array();
        $args = array();

        $data['regex'] = 'B13';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'file_get_contents';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function B14() {
        $data = array();
        $args = array();

        $data['regex'] = 'B14';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'function_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$STRING;
        $arg1['value'] = 'fread';

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }
}