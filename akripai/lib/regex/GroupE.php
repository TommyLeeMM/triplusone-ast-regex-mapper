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
    protected $methodCount = 30;

    public function E0() {
        return parent::setNode([
            'regex' => 'E0',
            'type' => ClassConstant::EVAL_,
            'name' => 'eval'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E1() {
        return parent::setNode([
            'regex' => 'E1',
            'type' => ClassConstant::EVAL_,
            'name' => 'eval'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E2() {
        return parent::setNode([
            'regex' => 'E2',
            'type' => ClassConstant::EVAL_,
            'name' => 'eval'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function E3() {
        return parent::setNode([
            'regex' => 'E3',
            'type' => ClassConstant::EVAL_,
            'name' => 'eval'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function E4() {
        return parent::setNode([
            'regex' => 'E4',
            'type' => ClassConstant::EVAL_,
            'name' => 'eval'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function E5() {
        return parent::setNode([
            'regex' => 'E5',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'system'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E6() {
        return parent::setNode([
            'regex' => 'E6',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'system'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E7() {
        return parent::setNode([
            'regex' => 'E7',
            'type' => ClassConstant::EVAL_,
            'name' => 'system'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function E8() {
        return parent::setNode([
            'regex' => 'E8',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'system'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function E9() {
        return parent::setNode([
            'regex' => 'E9',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'system'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function E10() {
        return parent::setNode([
            'regex' => 'E10',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'exec'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E11() {
        return parent::setNode([
            'regex' => 'E11',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E12() {
        return parent::setNode([
            'regex' => 'E12',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'exec'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function E13() {
        return parent::setNode([
            'regex' => 'E13',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'exec'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function E14() {
        return parent::setNode([
            'regex' => 'E14',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'exec'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function E15() {
        return parent::setNode([
            'regex' => 'E15',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'passthru'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E16() {
        return parent::setNode([
            'regex' => 'E16',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'passthru'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E17() {
        return parent::setNode([
            'regex' => 'E17',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'passthru'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function E18() {
        return parent::setNode([
            'regex' => 'E18',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'passthru'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function E19() {
        return parent::setNode([
            'regex' => 'E19',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'passthru'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function E20() {
        return parent::setNode([
            'regex' => 'E20',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'shell_exec'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E21() {
        return parent::setNode([
            'regex' => 'E21',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'shell_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E22() {
        return parent::setNode([
            'regex' => 'E22',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'shell_exec'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function E23() {
        return parent::setNode([
            'regex' => 'E23',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'shell_exec'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function E24() {
        return parent::setNode([
            'regex' => 'E24',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'shell_exec'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function E25() {
        return parent::setNode([
            'regex' => 'E25',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'proc_open'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E26() {
        return parent::setNode([
            'regex' => 'E26',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'proc_open'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E27() {
        return parent::setNode([
            'regex' => 'E27',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'proc_close'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function E28() {
        return parent::setNode([
            'regex' => 'E28',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'popen'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function E29() {
        return parent::setNode([
            'regex' => 'E29',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'pclose'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }
}