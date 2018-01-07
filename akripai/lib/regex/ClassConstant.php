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
    public static $CONCAT = 'Expr_Concat';
    public static $CONSTFETCH = 'Expr_ConstFetch';
    public static $EVAL = 'Expr_Eval';
    public static $FUNCCALL = 'Expr_FuncCall';
    public static $METHODCALL = 'Expr_MethodCall';
    public static $STRING = 'Scalar_String';
    public static $VARIABLE = 'Expr_Variable';
}