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
    protected $methodCount = 37;

    public function F0() {
        return parent::setNode([
            'regex' => 'F0',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysql_query'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F1() {
        return parent::setNode([
            'regex' => 'F1',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysql_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F2() {
        return parent::setNode([
            'regex' => 'F2',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysql_query'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F3() {
        return parent::setNode([
            'regex' => 'F3',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysql_query'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F4() {
        return parent::setNode([
            'regex' => 'F4',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysqli_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F5() {
        return parent::setNode([
            'regex' => 'F5',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysqli_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F6() {
        return parent::setNode([
            'regex' => 'F6',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysqli_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F7() {
        return parent::setNode([
            'regex' => 'F7',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mysqli_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F8() {
        return parent::setNode([
            'regex' => 'F8',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlsrv_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F9() {
        return parent::setNode([
            'regex' => 'F9',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlsrv_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F10() {
        return parent::setNode([
            'regex' => 'F10',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlsrv_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F11() {
        return parent::setNode([
            'regex' => 'F11',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlsrv_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F12() {
        return parent::setNode([
            'regex' => 'F12',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mssql_query'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F13() {
        return parent::setNode([
            'regex' => 'F13',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mssql_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F14() {
        return parent::setNode([
            'regex' => 'F14',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mssql_query'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F15() {
        return parent::setNode([
            'regex' => 'F15',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mssql_query'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F16() {
        return parent::setNode([
            'regex' => 'F16',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'pg_query'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F17() {
        return parent::setNode([
            'regex' => 'F17',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'pg_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F18() {
        return parent::setNode([
            'regex' => 'F18',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'pg_query'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F19() {
        return parent::setNode([
            'regex' => 'F19',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'pg_query'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F20() {
        return parent::setNode([
            'regex' => 'F20',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_parse'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F21() {
        return parent::setNode([
            'regex' => 'F21',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_parse'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F22() {
        return parent::setNode([
            'regex' => 'F22',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_parse'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F23() {
        return parent::setNode([
            'regex' => 'F23',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_parse'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F24() {
        return parent::setNode([
            'regex' => 'F24',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_execute'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F25() {
        return parent::setNode([
            'regex' => 'F25',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'oci_execute'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function F26() {
        return parent::setNode([
            'regex' => 'F26',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F27() {
        return parent::setNode([
            'regex' => 'F27',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F28() {
        return parent::setNode([
            'regex' => 'F28',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F29() {
        return parent::setNode([
            'regex' => 'F29',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function F30() {
        return parent::setNode([
            'regex' => 'F30',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F31() {
        return parent::setNode([
            'regex' => 'F31',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F32() {
        return parent::setNode([
            'regex' => 'F32',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'sqlite_query'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F33() {
        return parent::setNode([
            'regex' => 'F33',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'odbc_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function F34() {
        return parent::setNode([
            'regex' => 'F34',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'odbc_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function F35() {
        return parent::setNode([
            'regex' => 'F35',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'odbc_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function F36() {
        return parent::setNode([
            'regex' => 'F36',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'odbc_exec'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }
}