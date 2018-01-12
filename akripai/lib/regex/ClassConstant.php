<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 13:55
 */

namespace lib\regex;


class ClassConstant
{
    const CONCAT = 'Expr_Concat';
    const CONST_FETCH = 'Expr_ConstFetch';
    const EVAL_ = 'Expr_Eval';
    const FUNC_CALL = 'Expr_FuncCall';
    const METHOD_CALL = 'Expr_MethodCall';
    const STRING = 'Scalar_String';
    const VARIABLE = 'Expr_Variable';
    const ARRAY_ = 'Expr_Array';
}