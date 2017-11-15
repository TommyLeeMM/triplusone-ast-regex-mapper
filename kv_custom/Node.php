<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/10/2017
 * Time: 8:23
 */

namespace kv_custom;


use PHPCfg\Op\Stmt\Jump;

class Node 
{
    private $id;
    private $block;
    private $jumpIf;
    private $isReturnBlock;
    private $isJumpOnly;
    private $statements;

    public function __construct($id, $block)
    {
        $this->id = $id;
        //$this->block = $block;
        $this->jumpIf = null;
        $this->isReturnBlock = false;
        //$this->setIsJumpOnly();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBlock()
    {
        return $this->block;
    }

    public function getJumpIf()
    {
        return $this->jumpIf;
    }

    public function setJumpIf($jumpIf)
    {
        $this->jumpIf = $jumpIf;
    }

    public function isReturnBlock()
    {
        return $this->isReturnBlock;
    }

    public function setIsReturnBlock($isReturnBlock)
    {
        $this->isReturnBlock = $isReturnBlock;
    }

    public function isJumpOnly()
    {
        return $this->isJumpOnly;
    }

    public function setIsJumpOnly()
    {
        if(count($this->block->children) == 1
            && $this->block->children[0] instanceof Jump
            && count($this->block->phi) == 0 ) {
            $this->isJumpOnly = true;
        }
        else
            $this->isJumpOnly = false;
    }

    public function toArray(){
        return array(
            'id'=> $this->id,
            'statements'=> $this->statements,
            'jumpIf' => $this->jumpIf,
            'isReturnBlock' => $this->isReturnBlock,
            'isJumpOnly' => $this->isJumpOnly
        );
    }

    public function getStatements()
    {
        return $this->statements;
    }

    public function setStatements($statements)
    {
        $this->statements = $statements;
    }
}