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
    protected $methodCount = 62;

    public function D0() {
        $data = array();

        $data['regex'] = 'D0';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rmdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D1() {
        $data = array();

        $data['regex'] = 'D1';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rmdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D2() {
        $data = array();

        $data['regex'] = 'D2';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rmdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D3() {
        $data = array();

        $data['regex'] = 'D3';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rmdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D4() {
        $data = array();

        $data['regex'] = 'D4';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'mkdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D5() {
        $data = array();

        $data['regex'] = 'D5';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'mkdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D6() {
        $data = array();

        $data['regex'] = 'D6';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'mkdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D7() {
        $data = array();

        $data['regex'] = 'D7';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'mkdir';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D8() {
        $data = array();

        $data['regex'] = 'D8';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D9() {
        $data = array();

        $data['regex'] = 'D9';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D10() {
        $data = array();

        $data['regex'] = 'D10';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D11() {
        $data = array();

        $data['regex'] = 'D11';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D12() {
        $data = array();

        $data['regex'] = 'D12';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D13() {
        $data = array();

        $data['regex'] = 'D13';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D14() {
        $data = array();

        $data['regex'] = 'D14';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D15() {
        $data = array();

        $data['regex'] = 'D15';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D16() {
        $data = array();

        $data['regex'] = 'D16';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D17() {
        $data = array();

        $data['regex'] = 'D17';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D18() {
        $data = array();

        $data['regex'] = 'D18';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;
        $arg2 = array();
        $arg2['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D19() {
        $data = array();

        $data['regex'] = 'D19';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D20() {
        $data = array();

        $data['regex'] = 'D20';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D21() {
        $data = array();

        $data['regex'] = 'D21';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D22() {
        $data = array();

        $data['regex'] = 'D22';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D23() {
        $data = array();

        $data['regex'] = 'D20';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'copy';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D24() {
        $data = array();

        $data['regex'] = 'D24';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D25() {
        $data = array();

        $data['regex'] = 'D25';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D26() {
        $data = array();

        $data['regex'] = 'D26';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D27() {
        $data = array();

        $data['regex'] = 'D27';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D28() {
        $data = array();

        $data['regex'] = 'D28';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D29() {
        $data = array();

        $data['regex'] = 'D29';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D30() {
        $data = array();

        $data['regex'] = 'D30';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D31() {
        $data = array();

        $data['regex'] = 'D31';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D32() {
        $data = array();

        $data['regex'] = 'D32';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'rename';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::CONCAT;
        $arg2 = array();
        $arg2['type'] = ClassConstant::CONCAT;

        $data['args'][] = $arg1;
        $data['args'][] = $arg2;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D33() {
        $data = array();

        $data['regex'] = 'D33';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'file_get_contents';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::STRING;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D34() {
        $data = array();

        $data['regex'] = 'D34';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'file_get_contents';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::VARIABLE;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D35() {
        $data = array();

        $data['regex'] = 'D35';
        $data['type'] = ClassConstant::FUNC_CALL;
        $data['name'] = 'file_get_contents';
        $data['args'] = array();

        $arg1 = array();
        $arg1['type'] = ClassConstant::ARRAY_DIM_FETCH;

        $data['args'][] = $arg1;
        $data['regexArgs'] = $this->setRegexArgs($data['args']);
        return $data;
    }

    public function D36() {
        return parent::setNode([
            'regex' => 'D36',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D37() {
        return parent::setNode([
            'regex' => 'D37',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }
}