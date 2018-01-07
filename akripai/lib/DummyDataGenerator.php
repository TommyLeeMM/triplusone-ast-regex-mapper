<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 26/12/2017
 * Time: 9:49
 */

namespace lib;

use lib\regex\GroupB;
use lib\regex\GroupC;
use lib\regex\GroupD;
use lib\regex\GroupE;
use lib\regex\GroupF;
use lib\regex\GroupG;
use lib\regex\GroupH;
use lib\regex\GroupI;


class DummyDataGenerator
{
    public function generate() {
        $groups = array();
//        $groups[] = (new GroupB())->getAll();
        $groups[] = (new GroupC())->getAll();
//        $groups[] = (new GroupD())->getAll();
//        $groups[] = (new GroupE())->getAll();
//        $groups[] = (new GroupF())->getAll();
//        $groups[] = (new GroupG())->getAll();
//        $groups[] = (new GroupH())->getAll();
//        $groups[] = (new GroupI())->getAll();
        return $groups;
    }

    // Group B - Start
    public function isCallableSystem(){
        $dummyData = array();
        $dummyData['regex'] = 'B0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'system';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isCallableShellExec(){
        $dummyData = array();
        $dummyData['regex'] = 'B1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'shell_exec';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isCallableExec(){
        $dummyData = array();
        $dummyData['regex'] = 'B2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'exec';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isCallablePassthru(){
        $dummyData = array();
        $dummyData['regex'] = 'B3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'passthru';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isCallableProcOpen(){
        $dummyData = array();
        $dummyData['regex'] = 'B4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'proc_open';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function procClose(){
        $dummyData = array();
        $dummyData['regex'] = 'B5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'proc_close';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isCallablePopen(){
        $dummyData = array();
        $dummyData['regex'] = 'B6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_callable';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'popen';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function pClose(){
        $dummyData = array();
        $dummyData['regex'] = 'B7';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'pclose';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function isFile(){
        $dummyData = array();
        $dummyData['regex'] = 'B8';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'is_file';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFopen(){
        $dummyData = array();
        $dummyData['regex'] = 'B9';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'fopen';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFclose(){
        $dummyData = array();
        $dummyData['regex'] = 'B10';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'fclose';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFwrite(){
        $dummyData = array();
        $dummyData['regex'] = 'B11';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'fwrite';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFputs(){
        $dummyData = array();
        $dummyData['regex'] = 'B12';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'fputs';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFileGetContents(){
        $dummyData = array();
        $dummyData['regex'] = 'B13';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'file_get_contents';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function functionExistsFread(){
        $dummyData = array();
        $dummyData['regex'] = 'B14';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'function_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $firstArg['name'] = 'fread';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }
    // Group B - End

    // Group C - Start
    public function base64Decode() {
        $dummyData = array();
        $dummyData['regex'] = 'C0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'base64_decode';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function gzinFlate(){
        $dummyData = array();
        $dummyData['regex'] = 'C1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzinflate';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['regex'] = 'C0';
        //$firstArg['type'] = 'Expr_FuncCall';
        //$firstArg['name'] = 'base64_decode';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function strRot13(){
        $dummyData = array();
        $dummyData['regex'] = 'C2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'str_rot13';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['regex'] = 'C0';
        // $firstArg['type'] = 'Expr_FuncCall';
        // $firstArg['name'] = 'base64_decode';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function gzinFlateStrRot13(){
        $dummyData = array();
        $dummyData['regex'] = 'C3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzinflate';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['regex'] = 'C2';
        // $firstArg['type'] = 'Expr_FuncCall';
        // $firstArg['name'] = 'str_rot13';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function strRot13ParamGzin(){
        $dummyData = array();
        $dummyData['regex'] = 'C4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzinflate';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['regex'] = 'C3';
        // $firstArg['type'] = 'Expr_FuncCall';
        // $firstArg['name'] = 'gzinflate';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }
    // Group C - End

    // Group D - Start
    public function unLink(){
        $dummyData = array();
        $dummyData['regex'] = 'D0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'unlink';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function openDir(){
        $dummyData = array();
        $dummyData['regex'] = 'D1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'opendir';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function readDir(){
        $dummyData = array();
        $dummyData['regex'] = 'D2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'readdir';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function closeDir(){
        $dummyData = array();
        $dummyData['regex'] = 'D3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'closedir';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function rmDir(){
        $dummyData = array();
        $dummyData['regex'] = 'D4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'rmdir';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function mkDir(){
        $dummyData = array();
        $dummyData['regex'] = 'D5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'mkdir';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function copyTwoParamConcat(){
        $dummyData = array();
        $dummyData['regex'] = 'D6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'copy';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Concat';
        $secondArg = array();
        $secondArg['type'] = 'Expr_BinaryOp_Concat';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function renameTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D7';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'rename';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function chmodTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D8';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'chmod';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function touchTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D9';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'touch';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function fopenTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D10';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'fopen';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $secondArg = array();
        $secondArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function fwriteTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D11';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'fwrite';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function fcloseOneParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D12';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'fclose';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function fputsTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D13';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'fputs';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function filePutContents(){
        $dummyData = array();
        $dummyData['regex'] = 'D14';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'file_put_contents';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function copyTwoParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D15';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'copy';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function htmlSpecialChars(){
        $dummyData = array();
        $dummyData['regex'] = 'D16';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'htmlspecialchars';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_FuncCall';
        $firstArg['name'] = 'fread';
        $firstArg['args'] = array();
        $lastFirstArg['type'] = 'Expr_Variable';
        $lastSecondArg['type'] = 'Expr_FuncCall';
        $lastSecondArg['name'] = 'filesize';
        $lastSecondArg['args'] = array();
        $tempArg['type'] = 'Expr_Variable';
        $lastSecondArg['args'][] = $tempArg;
        $firstArg['args'][] = $lastFirstArg;
        $firstArg['args'][] = $lastSecondArg;
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function unLinkConcatParam(){
        $dummyData = array();
        $dummyData['regex'] = 'D17';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'unlink';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Plus';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function renameTwoParamConcat(){
        $dummyData = array();
        $dummyData['regex'] = 'D18';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'rename';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_BinaryOp_Plus';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function fileExists(){
        $dummyData = array();
        $dummyData['regex'] = 'D19';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'file_exists';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }
    // Group D - End

    // Group E - Start
    public function evalParam(){
        $dummyData = array();
        $dummyData['regex'] = 'E0';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function evalParamConcat(){
        $dummyData = array();
        $dummyData['regex'] = 'E1';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Concat';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function systemOneParam(){
        $dummyData = array();
        $dummyData['regex'] = 'E2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'system';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function shell_exec(){
        $dummyData = array();
        $dummyData['regex'] = 'E3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'shell_exec';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function execTwoParameters() {
        $dummyData = array();
        $dummyData['regex'] = 'E4';
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

    public function passthru(){
        $dummyData = array();
        $dummyData['regex'] = 'E5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'passthru';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function procOpenMultiParameters(){
        $dummyData = array();
        $dummyData['regex'] = 'E6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'proc_open';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $thirdArg = array();
        $thirdArg['type'] = 'Expr_Variable';
        $fourthArg = array();
        $fourthArg['type'] = 'Expr_Variable';
        $fifthArg = array();
        $fifthArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        $dummyData['args'][] = $thirdArg;
        $dummyData['args'][] = $fourthArg;
        $dummyData['args'][] = $fifthArg;
        return $dummyData;
    }

    public function popenTwoParameters(){
        $dummyData = array();
        $dummyData['regex'] = 'E7';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'popen';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $secondArg = array();
        $secondArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function evalConcat(){
        $dummyData = array();
        $dummyData['regex'] = 'E8';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Plus';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function evalWithFunction(){
        $dummyData = array();
        $dummyData['regex'] = 'E9';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_FuncCall';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function evalBase64(){
        $dummyData = array();
        $dummyData['regex'] = 'E10';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Plus';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function evalStrRot13(){
        $dummyData = array();
        $dummyData['regex'] = 'E11';
        $dummyData['type'] = 'Expr_Eval';
        $dummyData['name'] = 'eval';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['regex'] = 'C4';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function win_shell_execute(){
        $dummyData = array();
        $dummyData['regex'] = 'E12';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'win_shell_execute';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $secondArg = array();
        $secondArg['type'] = 'Scalar_String';
        $thirdArg = array();
        $secondArg['type'] = 'Scalar_String';
        $fourthArg = array();
        $secondArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        $dummyData['args'][] = $thirdArg;
        $dummyData['args'][] = $fourthArg;
        return $dummyData;
    }
    // Group E - Start

    // Group F - Start
    public function mysqlQueryParam(){
        $dummyData = array();
        $dummyData['regex'] = 'F0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'mysql_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function queryFromObject(){
        $dummyData = array();
        $dummyData['regex'] = 'F1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function sqlsrvQuery(){
        $dummyData = array();
        $dummyData['regex'] = 'F2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'sqlsrv_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function mssqlQuery(){
        $dummyData = array();
        $dummyData['regex'] = 'F3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'mssql_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function pgQuery(){
        $dummyData = array();
        $dummyData['regex'] = 'F4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'pg_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function ociParse(){
        $dummyData = array();
        $dummyData['regex'] = 'F5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'oci_parse';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function ociExecute(){
        $dummyData = array();
        $dummyData['regex'] = 'F6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'oci_execute';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_FuncCall';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function sqlLiteQuery(){
        $dummyData = array();
        $dummyData['regex'] = 'F7';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'sqlite_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function odbcExec(){
        $dummyData = array();
        $dummyData['regex'] = 'F8';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'sqlite_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function mysqlQueryStringParam(){
        $dummyData = array();
        $dummyData['regex'] = 'F9';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'mysql_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function mysqlQueryConcat(){
        $dummyData = array();
        $dummyData['regex'] = 'F10';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'mysql_query';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_BinaryOp_Plus';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }
    // Group F - End

    // Group H - Start
    public function fileGetContents(){
        $dummyData = array();
        $dummyData['regex'] = 'H0';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'file_get_contents';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function curlInit(){
        $dummyData = array();
        $dummyData['regex'] = 'H1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_init';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function curlExec(){
        $dummyData = array();
        $dummyData['regex'] = 'H2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_exec';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function curlClose(){
        $dummyData = array();
        $dummyData['regex'] = 'H3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_close';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function curlSetOptReturn(){
        $dummyData = array();
        $dummyData['regex'] = 'H4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_setopt';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_ConstFetch';
        $secondArg['name'] = 'CURLOPT_RETURNTRANSFER';
        $thirdArg = array();
        $thirdArg['type'] = 'Expr_ConstFetch';
        $thirdArg['name'] = 'true';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        $dummyData['args'][] = $thirdArg;
        return $dummyData;
    }

    public function curlSetOptPost(){
        $dummyData = array();
        $dummyData['regex'] = 'H5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_setopt';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_ConstFetch';
        $secondArg['name'] = 'CURLOPT_CURLOPT_POST';
        $thirdArg = array();
        $thirdArg['type'] = 'Expr_ConstFetch';
        $thirdArg['name'] = 'true';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        $dummyData['args'][] = $thirdArg;
        return $dummyData;
    }

    public function curlSetOptPostFields(){
        $dummyData = array();
        $dummyData['regex'] = 'H6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'curl_setopt';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_ConstFetch';
        $secondArg['name'] = 'CURLOPT_POSTFIELDS';
        $thirdArg = array();
        $thirdArg['type'] = 'Scalar_String';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        $dummyData['args'][] = $thirdArg;
        return $dummyData;
    }
    // Group H - End

    // Group I - Start
    public function gzOpen(){
        $dummyData = array();
        $dummyData['regex'] = 'I1';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzopen';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function gzWrite(){
        $dummyData = array();
        $dummyData['regex'] = 'I2';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzwrite';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function gzClose(){
        $dummyData = array();
        $dummyData['regex'] = 'I3';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzclose';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function gzEncode(){
        $dummyData = array();
        $dummyData['regex'] = 'I4';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'gzencode';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function bzOpen(){
        $dummyData = array();
        $dummyData['regex'] = 'I5';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'bzopen';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function bzWrite(){
        $dummyData = array();
        $dummyData['regex'] = 'I6';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'bzwrite';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }

    public function bzClose(){
        $dummyData = array();
        $dummyData['regex'] = 'I7';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'bzclose';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        return $dummyData;
    }

    public function bzCompress(){
        $dummyData = array();
        $dummyData['regex'] = 'I8';
        $dummyData['type'] = 'Expr_FuncCall';
        $dummyData['name'] = 'bzcompress';
        $dummyData['args'] = array();
        $firstArg = array();
        $firstArg['type'] = 'Expr_Variable';
        $secondArg = array();
        $secondArg['type'] = 'Expr_Variable';
        $dummyData['args'][] = $firstArg;
        $dummyData['args'][] = $secondArg;
        return $dummyData;
    }
    // Group I - End
}