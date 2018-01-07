<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


class GroupI extends Group
{
    protected $methodCount = 8;

    public function I0() {
        $data = array();
        $args = array();

        $data['regex'] = 'I0';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'gzopen';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I1() {
        $data = array();
        $args = array();

        $data['regex'] = 'I1';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'gzwrite';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I2() {
        $data = array();
        $args = array();

        $data['regex'] = 'I2';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'gzclose';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I3() {
        $data = array();
        $args = array();

        $data['regex'] = 'I3';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'gzencode';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I4() {
        $data = array();
        $args = array();

        $data['regex'] = 'I4';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'bzopen';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I5() {
        $data = array();
        $args = array();

        $data['regex'] = 'I5';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'bzwrite';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I6() {
        $data = array();
        $args = array();

        $data['regex'] = 'I6';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'bzclose';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I7() {
        $data = array();
        $args = array();

        $data['regex'] = 'I7';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'bzclose';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function I8() {
        $data = array();
        $args = array();

        $data['regex'] = 'I8';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'bzcompress';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }
}