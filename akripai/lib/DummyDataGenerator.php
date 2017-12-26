<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 26/12/2017
 * Time: 9:49
 */

namespace lib;


class DummyDataGenerator
{
    public function base64Decode() {
        $dummyData = array();
        $dummyData['regex'] = 'E0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'base64_decode';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function execTwoParameters() {
        $dummyData = array();
        $dummyData['regex'] = 'E1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'exec';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }
}