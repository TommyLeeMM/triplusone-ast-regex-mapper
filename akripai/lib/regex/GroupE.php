<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


class GroupE extends Group
{
    protected $methodCount = 15;

    public function E0() {
        $data = array();
        $args = array();

        $data['regex'] = 'E0';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1['name'] = 'base64_decode';
        $arg1['args'] = array();

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::VARIABLE;

        $arg1['args'][] = $arg1arg1;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E1() {
        $data = array();
        $args = array();

        $data['regex'] = 'E1';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E2() {
        $data = array();
        $args = array();

        $data['regex'] = 'E2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'system';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E3() {
        $data = array();
        $args = array();

        $data['regex'] = 'E3';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'shell_exec';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E4() {
        $data = array();
        $args = array();

        $data['regex'] = 'E4';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'exec';
        $data['argsTypeKey'] = ClassConstant::FUNC_CALL.','.ClassConstant::VARIABLE.',';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E5() {
        $data = array();
        $args = array();

        $data['regex'] = 'E5';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'passthru';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E6() {
        $data = array();
        $args = array();

        $data['regex'] = 'E6';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'proc_open';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $args[] = $arg1;
        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E7() {
        $data = array();
        $args = array();

        $data['regex'] = 'E7';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'popen';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;
        $arg2['value'] = 'r';

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function E8() {
        $data = array();
        $args = array();

        $data['regex'] = 'E8';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E9() {
        $data = array();
        $args = array();

        $data['regex'] = 'E9';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E10() {
        $data = array();
        $args = array();

        $data['regex'] = 'E10';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E11() {
        $data = array();
        $args = array();

        $data['regex'] = 'E11';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1['name'] = 'str_rot13';
        $arg1['args'] = array();

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1arg1['name'] = 'gzinflate';
        $arg1arg1['args'] = array();

        $arg1arg1arg1 = array();
        $arg1arg1arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1arg1arg1['name'] = 'str_rot13';
        $arg1arg1arg1['args'] = array();

        $arg1arg1arg1arg1 = array();
        $arg1arg1arg1arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1arg1arg1arg1['name'] = 'base64_decode';
        $arg1arg1arg1arg1['args'] = array();

        $arg1arg1arg1arg1arg1 = array();
        $arg1arg1arg1arg1arg1['type'] = ClassConstant::VARIABLE;

        $arg1arg1arg1arg1['args'][] = $arg1arg1arg1arg1arg1;
        $arg1arg1arg1['args'][] = $arg1arg1arg1arg1;
        $arg1arg1['args'][] = $arg1arg1arg1;
        $arg1['args'][] = $arg1arg1;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E12() {
        $data = array();
        $args = array();

        $data['regex'] = 'E12';
        $data['type'] = ClassConstant::METHOD_CALL;
        $data['name'] = 'win_shell_execute';

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $args[] = $arg1;
        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E13() {
        $data = array();
        $args = array();

        $data['regex'] = 'E13';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function E14() {
        $data = array();
        $args = array();

        $data['regex'] = 'E14';
        $data['type'] = ClassConstant::EVAL_;
        $data['name'] = 'eval';

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }
}