<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 19/12/2017
 * Time: 14:31
 */

namespace lib;

use lib\regex\ClassConstant;
use MongoDB\Driver\Query;
use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use PhpParser\Skripsi\IConditionExtractable;
use PhpParser\Skripsi\IStatementExtractable;

class AstRegexMapper extends NodeVisitorAbstract
{
    private $regexes;

    public function getRegexes() {
        return $this->regexes;
    }

    public function beforeTraverse(array $nodes)
    {
        $this->regexes = array();
    }

    public function enterNode(Node $node)
    {
        $this->explore($node);
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    private function explore(Node $node) {
        if($node instanceof IConditionExtractable) {
            $conditions = $node->getCondition();
            if(!is_array($conditions)) {
                $this->explore($conditions);
            }
            else {
                foreach($conditions as $condition) {
                    $this->explore($condition);
                }
            }
        }

        if ($node instanceof Node\Expr\FuncCall || $node instanceof Node\Expr\MethodCall) {
            $extractedNode = $node->extract();
            $regex = $this->searchRegex($extractedNode);
            if($regex !== null)
                $this->regexes[] = $regex;
        }

        if ($node instanceof IStatementExtractable) {
            $statements = $node->getStatements();
            foreach($statements as $statement) {
                if($statement !== null) {
                    foreach($statement as $node) {
                        $this->explore($node);
                    }
                }
            }
        }
    }

    private function searchRegex($node)
    {
        $extractedNode = $this->extractNode($node);
        $filter = [
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
            'args' => $extractedNode['args']
        ];
        $options = [
            'limit' => 1,
            'projection' => [
                '_id' => 0,
                'regex' => 1
            ]
        ];
        $query = new Query($filter, $options);
        $cursor = DatabaseManager::getInstance()->executeQuery(DatabaseManager::ATTRIBUTES_COLLECTION, $query);
        $cursor->setTypeMap([
            'root' => 'array',
            'document' => 'array',
            'array' => 'array'
        ]);
        $cursorArray = $cursor->toArray();
        return (count($cursorArray) > 0) ? $cursorArray[0]['regex'] : null;
    }

    private function extractNode($node) {
        $extractedNode = array();
        $extractedNode['type'] = $node['type'];
        $extractedNode['name'] = $node['name'];
        $extractedNode['args'] = $this->extractArguments($node);
        return $extractedNode;
    }

    private function extractArguments($node) {
        $extractedArgs = array();
        foreach($node['args'] as $arg) {
            $extractedArg = array();
            if($arg['type'] === ClassConstant::$VARIABLE) {
                $extractedArg['type'] = $arg['type'];
            }
            else {
                foreach($arg as $key => $value) {
                    $extractedArg[$key] = $value;
                }
            }
            $extractedArgs[] = $extractedArg;
        }
        return $extractedArgs;
    }
}