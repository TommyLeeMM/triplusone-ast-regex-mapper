<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 19/12/2017
 * Time: 14:31
 */

namespace lib;

use MongoDB\Driver\Query;
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
        if($node instanceof Node\Expr\FuncCall) {
            $extractedNode = $this->extractNode($node);
            Helper::prettyVarDump($extractedNode);
            $cursor = $this->searchRegex($extractedNode);
            $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
            $cursorArray = $cursor->toArray();
            if(!empty($cursorArray))
                echo '<h3>Regexnya: '. $cursorArray[0]['regex'] .'</h3><br/>';
        }
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    private function extractNode($node) {
        $extractedNode = array();
        $extractedNode['type'] = $node->getType();
        $extractedNode['name'] = $node->extractName();
        $extractedNode['args'] = array();
        foreach($node->args as $argObj) {
            $argValue = $argObj->value;
            $arg = array();
            $arg['type'] = $argValue->getType();
            $extractedNode['args'][] = $arg;
        }
        return $extractedNode;
    }

    private function searchRegex($extractedNode) {
        $filters = array(
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
            'args' => $extractedNode['args']
        );
        $options = array(
            'projection' => [
                '_id' => 0,
                'regex' => 1
            ],
            'limit' => 1
        );
        $query = new Query($filters, $options);
        return DatabaseManager::getInstance()->executeQuery($query);
    }
}