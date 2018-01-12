<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


class GroupD extends Group
{
    protected $methodCount = 20;

    public function D0() {
        $data = array();
        $args = array();

        $data['regex'] = 'D0';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'unlink';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D1() {
        $data = array();
        $args = array();

        $data['regex'] = 'D1';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'opendir';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D2() {
        $data = array();
        $args = array();

        $data['regex'] = 'D2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'readdir';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D3() {
        $data = array();
        $args = array();

        $data['regex'] = 'D3';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'closedir';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D4() {
        $data = array();
        $args = array();

        $data['regex'] = 'D4';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rmdir';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D5() {
        $data = array();
        $args = array();

        $data['regex'] = 'D5';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'mkdir';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D6() {
        $data = array();
        $args = array();

        $data['regex'] = 'D6';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D7() {
        $data = array();
        $args = array();

        $data['regex'] = 'D7';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D8() {
        $data = array();
        $args = array();

        $data['regex'] = 'D8';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'chmod';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D9() {
        $data = array();
        $args = array();

        $data['regex'] = 'D9';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'touch';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D10() {
        $data = array();
        $args = array();

        $data['regex'] = 'D10';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'fopen';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D11() {
        $data = array();
        $args = array();

        $data['regex'] = 'D11';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'fwrite';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D12() {
        $data = array();
        $args = array();

        $data['regex'] = 'D12';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'fclose';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D13() {
        $data = array();
        $args = array();

        $data['regex'] = 'D13';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'fputs';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D14() {
        $data = array();
        $args = array();

        $data['regex'] = 'D14';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'file_put_contents';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D15() {
        $data = array();
        $args = array();

        $data['regex'] = 'D15';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D16() {
        $data = array();
        $args = array();

        $data['regex'] = 'D16';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'htmlspecialchars';

        $arg1 = array();
        $arg1['type'] = ClassConstant::FUNC_CALL;
        $arg1['name'] = 'fread';

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::VARIABLE;
        $arg1arg2 = array();
        $arg1arg2['type'] = ClassConstant::FUNC_CALL;
        $arg1arg2['name'] = 'filesize';

        $arg1arg2arg1 = array();
        $arg1arg2arg1['type'] = ClassConstant::VARIABLE;
        $arg1arg2['args'][] = $arg1arg2arg1;

        $arg1['args'][] = $arg1arg1;
        $arg1['args'][] = $arg1arg2;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D17() {
        $data = array();
        $args = array();

        $data['regex'] = 'D17';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'unlink';

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function D18() {
        $data = array();
        $args = array();

        $data['regex'] = 'D18';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function D19() {
        $data = array();
        $args = array();

        $data['regex'] = 'D19';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'file_exists';

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }
}