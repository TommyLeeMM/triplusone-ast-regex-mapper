<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 19/12/2017
 * Time: 14:31
 */

namespace lib;


use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

class AstRegexMapper extends NodeVisitorAbstract
{
    public function enterNode(Node $node)
    {
        if($node instanceof Node\Expr\FuncCall) {
            $this->extractFuncCall($node);
        }
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    private function extractFuncCall($node) {
        
    }
}