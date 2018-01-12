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
use PhpParser\Skripsi\IExprOnlyExtractable;
use PhpParser\Skripsi\IMethodCall;
use PhpParser\Skripsi\IPartsExtractable;
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

    private function explore($node) {
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

        if ($node instanceof IMethodCall) {
            $extractedNode = $this->extractNode($node);
            $this->searchRegex($extractedNode);
        }

        if ($node instanceof IExprOnlyExtractable) {
            $result = $node->extract();
            if(is_array($result)) {
                foreach($result as $r) $this->explore($r);
            }
            else {
                $this->explore($result);
            }
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

    private function searchRegex($extractedNode)
    {
        $argQueue = new Queue();
        foreach($extractedNode['args'] as $arg) {
            if($arg['type'] === ClassConstant::FUNC_CALL) {
                $argQueue->add($arg);
            }
        }
        $filter = [
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
//            'argsTypeKey' => $this->setRegexParamType($extractedNode['args'])
        ];
        $result = $this->search($filter);
        Helper::prettyVarDump($result);

        while(!$argQueue->isEmpty()) {
            $data = $argQueue->pop();
            foreach($data['args'] as $arg) {
                if($arg['type'] === ClassConstant::FUNC_CALL) {
                    $argQueue->add($arg);
                }
            }

            $filter = [
                'type' => $data['type'],
                'name' => $data['name'],
//            'argsTypeKey' => $this->setRegexParamType($extractedNode['args'])
            ];
            $result = $this->search($filter);
            Helper::prettyVarDump($result);
        }
//        return $this->search($filter);
    }

    private function search($filter) {
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
        $_node = $node->extract();
        $extractedNode = array();
        $extractedNode['type'] = $_node['type'];
        $extractedNode['name'] = $_node['name'];
        $extractedNode['args'] = $this->extractArguments($_node);
        return $extractedNode;
    }

    private function extractArguments($node) {
        $extractedArgs = array();
        foreach($node['args'] as $arg) {
            $extractedArgs[] = $this->extractArgument($arg);
        }
        return $extractedArgs;
    }

    private function extractArgument($node)
    {
        $extractedArg = array();
        if ($node instanceof IPartsExtractable) {
            $result = $node->extract();
            $extractedArg['type'] = $result['type'];
            $extractedArg['parts'] = array();
            foreach ($result['parts'] as $part) {
                if ($part instanceof IMethodCall) {
                    $this->explore($part);
                }
                $extractedArg['parts'][] = $part->extract();
            }
        } else if ($node instanceof IMethodCall) {
            $result = $node->extract();
            $extractedArg['type'] = $result['type'];
            $extractedArg['name'] = $result['name'];
            $extractedArg['args'] = $this->extractArguments($result);
        } else if (array_key_exists('type', $node) && $node['type'] === ClassConstant::VARIABLE) {
            $extractedArg['type'] = $node['type'];
        } else {
            $result = $node->extract();
            if(is_array($result)) {
                foreach ($result as $key => $value) {
                    $extractedArg[$key] = $value;
                }
            }
        }
        return $extractedArg;
    }
}