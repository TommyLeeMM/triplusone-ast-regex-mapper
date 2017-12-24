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
    private $arrayOfNodes;

    public function beforeTraverse(array $nodes)
    {
        $this->arrayOfNodes = array();
    }

    public function enterNode(Node $node)
    {
        $extractedNode = array();
        if($node instanceof Node\Expr\FuncCall) {
            $extractedNode['name'] = $node->extractName();
            $extractedNode['args'] = array();
            foreach($node->args as $argObj) {
                $argValue = $argObj->value;
                $arg = array();
                $arg['type'] = $argValue->getType();
                $extractedNode['args'][] = $arg;
            }
            Helper::prettyVarDump($extractedNode);
        }
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

}