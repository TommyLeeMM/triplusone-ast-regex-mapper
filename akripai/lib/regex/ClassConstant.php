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
    const ARRAY_ = 'Expr_Array';
    const ARRAY_DIM_FETCH = 'Expr_ArrayDimFetch';
    const CONCAT = 'Expr_Concat';
    const CONST_FETCH = 'Expr_ConstFetch';
    const EXPR_BINARY_CONCAT = 'Expr_BinaryOp_Concat';
    const EVAL_ = 'Expr_Eval';
    const FUNC_CALL = 'Expr_FuncCall';
    const METHOD_CALL = 'Expr_MethodCall';
    const PROPERTY_FETCH = 'Expr_PropertyFetch';
    const SCALAR_ENCAPSED = 'Scalar_Encapsed';
    const SCALAR_LNUMBER = 'Scalar_LNumber';
    const STRING = 'Scalar_String';
    const VARIABLE = 'Expr_Variable';
}