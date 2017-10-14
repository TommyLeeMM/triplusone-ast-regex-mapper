<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/10/2017
 * Time: 8:23
 */

namespace kv_custom;


class Node
{
    private $id;
    private $block;
    private $count;
    private $jumpIf;
    private $isReturnBlock;

    public function __construct($id, $block)
    {
        $this->id = $id;
//        $this->block = $block;
        $this->count = 0;
        $this->jumpIf = null;
        $this->isReturnBlock = false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return null
     */
    public function getJumpIf()
    {
        return $this->jumpIf;
    }

    /**
     * @param null $jumpIf
     */
    public function setJumpIf($jumpIf)
    {
        $this->jumpIf = $jumpIf;
    }

    /**
     * @return bool
     */
    public function isReturnBlock()
    {
        return $this->isReturnBlock;
    }

    /**
     * @param bool $isReturnBlock
     */
    public function setIsReturnBlock($isReturnBlock)
    {
        $this->isReturnBlock = $isReturnBlock;
    }

    public function increaseCount() {
        $this->count++;
    }

}