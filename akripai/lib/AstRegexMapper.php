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
        $this->extractNode($node);
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    private function extractNode(Node $node) {
        if($node instanceof IConditionExtractable) {
            $conditions = $node->getCondition();
            if(!is_array($conditions)) {
                $this->extractNode($conditions);
            }
            else {
                foreach($conditions as $condition) {
                    $this->extractNode($condition);
                }
            }
        }

        if ($node instanceof Node\Expr\FuncCall
                || $node instanceof Node\Expr\Eval_
                || $node instanceof Node\Expr\MethodCall) {
            $extractedNode = $node->extract();
            Helper::prettyVarDump($extractedNode);
            $result = $this->searchRegex($extractedNode);
            if($result !== null) {
                $regex = [];
                $regex['regex'] = $result;
                $regex['startLine'] = $node->getAttribute('startLine', -1);
                $regex['endLine'] = $node->getAttribute('endLine', -1);
                $this->regexes[] = $regex;
            }

        }
        else if ($node instanceof IStatementExtractable) {
            $statements = $node->getStatements();
            foreach($statements as $statement) {
                if($statement !== null) {
                    foreach($statement as $node) {
                        $this->extractNode($node);
                    }
                }
            }
        }
    }

    private function search($filters) {
        $options = array(
            'projection' => [
                '_id' => 0,
                'regex' => 1
            ],
            'limit' => 1
        );
        $query = new Query($filters, $options);
        $cursor = DatabaseManager::getInstance()->executeQuery($query);
        $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);
        return $cursor->toArray();
    }

    private function searchRegex($extractedNode)
    {
        $filters = array(
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
            'args' => $extractedNode['args']
        );
        $cursorArray = $this->search($filters);
        $result = null;
        if($cursorArray === null || count($cursorArray) === 0) {
            $result = $this->searchRegexOnlyParamType($extractedNode);
        }
        else {
            $result = $cursorArray[0]['regex'];
        }
        return $result;
    }

    private function searchRegexOnlyParamType($extractedNode) {
        $args = array();
        foreach($extractedNode['args'] as $arg) {
            if($arg['type'] !== ClassConstant::$VARIABLE &&
                $arg['type'] !== ClassConstant::$STRING) {
                $args[] = $arg;
            }
            else {
                $_arg = array();
                $_arg['type'] = $arg['type'];
                $args[] = $_arg;
            }
        }
        $filters = array(
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
            'args' => $args
        );
        $cursorArray = $this->search($filters);
        if($cursorArray === null || count($cursorArray) === 0) {
            return null;
        }
        return $cursorArray[0]['regex'];
    }
}