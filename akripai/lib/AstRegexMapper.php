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
            $extractedNode = $node->extract();
            $regex = $this->searchRegex($extractedNode);
            if($regex !== null)
                $this->regexes[] = $regex;
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

    private function searchRegex($node)
    {
        $extractedNode = $this->extractNode($node);
        $filter = [
            'type' => $extractedNode['type'],
            'name' => $extractedNode['name'],
            'args.type' => $extractedNode['args'][0]['type']
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
            $this->explore($node);
            $result = $node->extract();
            $extractedArg['type'] = $result['type'];
            $extractedArg['name'] = $result['name'];
            $extractedArg['args'] = $this->extractArguments($result);
        } else if (array_key_exists('type', $node) && $node['type'] === ClassConstant::$VARIABLE) {
            $extractedArg['type'] = $node['type'];
        } else {
            foreach ($node->extract() as $key => $value) {
                $extractedArg[$key] = $value;
            }
        }
        return $extractedArg;
    }
}