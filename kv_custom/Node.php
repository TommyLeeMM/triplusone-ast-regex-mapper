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
    private $count;
    private $jumpIf;
    private $isReturnBlock;
    private $isJumpOnly;

    public function __construct($id, $block)
    {
        $this->id = $id;
        $this->block = $block;
        $this->count = 0;
        $this->jumpIf = null;
        $this->isReturnBlock = false;
        $this->setIsJumpOnly();
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

    public function setBlock($block)
    {
        $this->block = $block;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;
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

    public function increaseCount() {
        $this->count++;
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

}