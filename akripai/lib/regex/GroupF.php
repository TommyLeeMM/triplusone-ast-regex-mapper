<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 14:38
 */

namespace lib\regex;


class GroupF extends Group
{
    protected $methodCount = 11;

    public function F0() {
        $data = array();
        $args = array();

        $data['regex'] = 'F0';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'mysql_query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F1() {
        $data = array();
        $args = array();

        $data['regex'] = 'F1';
        $data['type'] = ClassConstant::$METHODCALL;
        $data['name'] = 'query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F2() {
        $data = array();
        $args = array();

        $data['regex'] = 'F2';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'sqlsrv_query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function F3() {
        $data = array();
        $args = array();

        $data['regex'] = 'F3';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'mssql_query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F4() {
        $data = array();
        $args = array();

        $data['regex'] = 'F4';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'pg_query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F5() {
        $data = array();
        $args = array();

        $data['regex'] = 'F5';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'oci_parse';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function F6() {
        $data = array();
        $args = array();

        $data['regex'] = 'F6';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'oci_execute';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$FUNCCALL;
        $arg1['name'] = 'oci_parse';
        $arg1['args'] = array();

        $arg1arg1 = array();
        $arg1arg1['type'] = ClassConstant::$VARIABLE;

        $arg1arg2 = array();
        $arg1arg2 ['type'] = ClassConstant::$VARIABLE;

        $arg1['args'][] = $arg1arg1;
        $arg1['args'][] = $arg1arg2;
        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F7() {
        $data = array();
        $args = array();

        $data['regex'] = 'F7';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'sqlite_query';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function F8() {
        $data = array();
        $args = array();

        $data['regex'] = 'F8';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'odbc_exec';

        $arg1 = array();
        $arg1['type'] = ClassConstant::$VARIABLE;

        $arg2 = array();
        $arg2['type'] = ClassConstant::$VARIABLE;

        $args[] = $arg1;
        $args[] = $arg2;
        $data['args'] = $args;
        return $data;
    }

    public function F9() {
        $data = array();
        $args = array();

        $data['regex'] = 'F9';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'mysql_query';

        $arg1 = array();
        $arg1['type'] =  ClassConstant::$STRING;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }

    public function F10() {
        $data = array();
        $args = array();

        $data['regex'] = 'F10';
        $data['type'] = ClassConstant::$FUNCCALL;
        $data['name'] = 'mysql_query';

        $arg1 = array();
        $arg1['type'] =  ClassConstant::$CONCAT;

        $args[] = $arg1;
        $data['args'] = $args;
        return $data;
    }
}