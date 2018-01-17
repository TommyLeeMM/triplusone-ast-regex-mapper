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
    protected $methodCount = 85;

    public function D0() {
        return parent::setNode([
            'regex' => 'D0',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rmdir'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D1() {
        return parent::setNode([
            'regex' => 'D1',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rmdir'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D2() {
        return parent::setNode([
            'regex' => 'D2',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rmdir'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D3() {
        return parent::setNode([
            'regex' => 'D3',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rmdir'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D4() {
        return parent::setNode([
            'regex' => 'D4',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mkdir'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D5() {
        return parent::setNode([
            'regex' => 'D5',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mkdir'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D6() {
        return parent::setNode([
            'regex' => 'D6',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mkdir'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D7() {
        return parent::setNode([
            'regex' => 'D7',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'mkdir'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D8() {
        return parent::setNode([
            'regex' => 'D8',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D9() {
        return parent::setNode([
            'regex' => 'D9',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D10() {
        return parent::setNode([
            'regex' => 'D10',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D11() {
        return parent::setNode([
            'regex' => 'D11',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D12() {
        return parent::setNode([
            'regex' => 'D12',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D13() {
        return parent::setNode([
            'regex' => 'D13',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D14() {
        return parent::setNode([
            'regex' => 'D14',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D15() {
        return parent::setNode([
            'regex' => 'D15',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D16() {
        return parent::setNode([
            'regex' => 'D16',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D17() {
        return parent::setNode([
            'regex' => 'D17',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D18() {
        return parent::setNode([
            'regex' => 'D18',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D19() {
        return parent::setNode([
            'regex' => 'D19',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D20() {
        return parent::setNode([
            'regex' => 'D20',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D21() {
        return parent::setNode([
            'regex' => 'D21',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D22() {
        return parent::setNode([
            'regex' => 'D22',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D23() {
        return parent::setNode([
            'regex' => 'D23',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'copy'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D24() {
        return parent::setNode([
            'regex' => 'D24',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D25() {
        return parent::setNode([
            'regex' => 'D25',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D26() {
        return parent::setNode([
            'regex' => 'D26',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D27() {
        return parent::setNode([
            'regex' => 'D27',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D28() {
        return parent::setNode([
            'regex' => 'D28',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D29() {
        return parent::setNode([
            'regex' => 'D29',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D30() {
        return parent::setNode([
            'regex' => 'D30',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D31() {
        return parent::setNode([
            'regex' => 'D31',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D32() {
        return parent::setNode([
            'regex' => 'D32',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D33() {
        return parent::setNode([
            'regex' => 'D33',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D34() {
        return parent::setNode([
            'regex' => 'D34',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D35() {
        return parent::setNode([
            'regex' => 'D35',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D36() {
        return parent::setNode([
            'regex' => 'D36',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::CONCAT
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
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D38() {
        return parent::setNode([
            'regex' => 'D38',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D39() {
        return parent::setNode([
            'regex' => 'D39',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'rename'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D40() {
        return parent::setNode([
            'regex' => 'D40',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_get_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D41() {
        return parent::setNode([
            'regex' => 'D41',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_get_contents'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D42() {
        return parent::setNode([
            'regex' => 'D42',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_get_contents'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D43() {
        return parent::setNode([
            'regex' => 'D43',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_get_contents'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D44() {
        return parent::setNode([
            'regex' => 'D44',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_get_contents'
        ], [
            [
                'type' => ClassConstant::FUNC_CALL
            ]
        ]);
    }

    public function D45() {
        return parent::setNode([
            'regex' => 'D45',
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

    public function D46() {
        return parent::setNode([
            'regex' => 'D46',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D47() {
        return parent::setNode([
            'regex' => 'D47',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D48() {
        return parent::setNode([
            'regex' => 'D48',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D49() {
        return parent::setNode([
            'regex' => 'D49',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D50() {
        return parent::setNode([
            'regex' => 'D50',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D51() {
        return parent::setNode([
            'regex' => 'D51',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D52() {
        return parent::setNode([
            'regex' => 'D52',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D53() {
        return parent::setNode([
            'regex' => 'D53',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D54() {
        return parent::setNode([
            'regex' => 'D54',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D55() {
        return parent::setNode([
            'regex' => 'D55',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D56() {
        return parent::setNode([
            'regex' => 'D56',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D57() {
        return parent::setNode([
            'regex' => 'D57',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D58() {
        return parent::setNode([
            'regex' => 'D58',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D59() {
        return parent::setNode([
            'regex' => 'D59',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D60() {
        return parent::setNode([
            'regex' => 'D60',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'file_put_contents'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D61() {
        return parent::setNode([
            'regex' => 'D61',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fopen'
        ], [
            [
                'type' => ClassConstant::STRING
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D62() {
        return parent::setNode([
            'regex' => 'D62',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fopen'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D63() {
        return parent::setNode([
            'regex' => 'D63',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fwrite'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D64() {
        return parent::setNode([
            'regex' => 'D64',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fwrite'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D65() {
        return parent::setNode([
            'regex' => 'D65',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fwrite'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D66() {
        return parent::setNode([
            'regex' => 'D66',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fwrite'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D67() {
        return parent::setNode([
            'regex' => 'D67',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fputs'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D68() {
        return parent::setNode([
            'regex' => 'D68',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fputs'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D69() {
        return parent::setNode([
            'regex' => 'D69',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fputs'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D70() {
        return parent::setNode([
            'regex' => 'D70',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fputs'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D71() {
        return parent::setNode([
            'regex' => 'D71',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fclose'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D72() {
        return parent::setNode([
            'regex' => 'D72',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'fclose'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D73() {
        return parent::setNode([
            'regex' => 'D73',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'unlink'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D74() {
        return parent::setNode([
            'regex' => 'D74',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'unlink'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D75() {
        return parent::setNode([
            'regex' => 'D75',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'unlink'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D76() {
        return parent::setNode([
            'regex' => 'D76',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'unlink'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D77() {
        return parent::setNode([
            'regex' => 'D77',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'touch'
        ], [
            [
                'type' => ClassConstant::STRING
            ]
        ]);
    }

    public function D78() {
        return parent::setNode([
            'regex' => 'D78',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'touch'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D79() {
        return parent::setNode([
            'regex' => 'D79',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'touch'
        ], [
            [
                'type' => ClassConstant::ARRAY_DIM_FETCH
            ]
        ]);
    }

    public function D80() {
        return parent::setNode([
            'regex' => 'D80',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'touch'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ]
        ]);
    }

    public function D81() {
        return parent::setNode([
            'regex' => 'D81',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'chmod'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D82() {
        return parent::setNode([
            'regex' => 'D82',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'chmod'
        ], [
            [
                'type' => ClassConstant::VARIABLE
            ],
            [
                'type' => ClassConstant::SCALAR_LNUMBER
            ]
        ]);
    }

    public function D83() {
        return parent::setNode([
            'regex' => 'D83',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'chmod'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::VARIABLE
            ]
        ]);
    }

    public function D84() {
        return parent::setNode([
            'regex' => 'D84',
            'type' => ClassConstant::FUNC_CALL,
            'name' => 'chmod'
        ], [
            [
                'type' => ClassConstant::CONCAT
            ],
            [
                'type' => ClassConstant::SCALAR_LNUMBER
            ]
        ]);
    }
}