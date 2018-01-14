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
use PhpParser\Skripsi\IConditionExtractable;
use PhpParser\Skripsi\IExprOnlyExtractable;
use PhpParser\Skripsi\ILeftRightExtractable;
use PhpParser\Skripsi\IMethodCall;
use PhpParser\Skripsi\IPartsExtractable;
use PhpParser\Skripsi\IStatementExtractable;

class AstRegexMapper extends NodeVisitorAbstract
{
    private $regexes;
    private $regexCounter;

    public function __construct()
    {
        $this->regexes = (new DummyDataGenerator())->prepareRegexCounter();
    }

    public function getRegexes()
    {
        return $this->regexCounter;
    }

    public function beforeTraverse(array $nodes)
    {
        $this->regexCounter = $this->regexes;
    }

    public function enterNode(Node $node)
    {
        $this->explore($node);
        return NodeTraverser::DONT_TRAVERSE_CHILDREN;
    }

    private function explore($node)
    {

        if ($node instanceof IConditionExtractable) {
            $conditions = $node->getCondition();
            if (!is_array($conditions)) {
                $this->explore($conditions);
            } else {
                foreach ($conditions as $condition) {
                    $this->explore($condition);
                }
            }
        }

        if ($node instanceof IStatementExtractable) {
            $statements = $node->getStatements();
            foreach ($statements as $key => $statement) {
                if(!is_array($statement)) {
                    $this->explore($statement);
                }
                else {
                    if ($statement !== null) {
                        foreach ($statement as $nodeStmt) {
                            $this->explore($nodeStmt);
                        }
                    }
                }
            }
        }

        if ($node instanceof IExprOnlyExtractable) {
            $result = $node->extract();
            if (is_array($result)) {
                foreach ($result as $r) {
                    $this->explore($r);
                }
            } else {
                $this->explore($result);
            }
        }

        if ($node instanceof ILeftRightExtractable) {
            $this->explore($node->left);
            $this->explore($node->right);
        }

        if ($node instanceof IMethodCall) {
            $this->extractFunctionNode($node);
        }
//        if ($node instanceof IMethodCall) {
//            $extractedNode = $this->extractNode($node);
//            Helper::prettyVarDump($extractedNode);
//            $this->searchRegex($extractedNode);
//        }
    }

    private function extractFunctionNode($node)
    {
        $extractedNode = $node->extract();
        $_extractedNode = array();
        $_extractedNode['type'] = $extractedNode['type'];
        $_extractedNode['name'] = $extractedNode['name'];
        $_extractedNode['args'] = array();
        foreach ($extractedNode['args'] as $arg) {
            $extracted = $arg->extract();
            $_extractedArg = array();
            if ($arg instanceof Node\Expr\Variable) {
                $_extractedArg['type'] = $extracted['type'];
            }
            else {
                if (is_array($extracted)) {
                    foreach ($extracted as $key => $value) {
                        $_extractedArg[$key] = $value;
                    }
                }
            }
            $_extractedNode['args'][] = $_extractedArg;
        }

        $filter = [
            'type' => $_extractedNode['type'],
            'name' => $_extractedNode['name'],
//            'argsTypeKey' => $this->setRegexParamType($extractedNode['args'])
        ];

        $regex = $this->search($filter);
        if ($regex !== null) {
            if(array_key_exists($regex, $this->regexCounter)) {
                $this->regexCounter[$regex]++;
            }
        }

        // cek apakah args nya ada function call
        foreach ($extractedNode['args'] as $arg) {
            if ($arg instanceof IMethodCall) {
                $this->extractFunctionNode($arg);
            }
            else if($arg instanceof ILeftRightExtractable) {
                $this->explore($arg->left);
                $this->explore($arg->right);
            }
            else if($arg instanceof IPartsExtractable) {
                $result = $arg->extract();
                foreach ($result['parts'] as $part) {
                    $this->explore($part);
                }
            }
        }
    }

//    private function searchRegex($extractedNode)
//    {
//        $argQueue = new Queue();
//        foreach($extractedNode['args'] as $arg) {
//            if($arg['type'] === ClassConstant::FUNC_CALL) {
//                $argQueue->add($arg);
//            }
//        }
//        $filter = [
//            'type' => $extractedNode['type'],
//            'name' => $extractedNode['name'],
////            'argsTypeKey' => $this->setRegexParamType($extractedNode['args'])
//        ];
//        $result = $this->search($filter);
//        if($result !== null)
//            $this->regexes[] = $result;
//
//        while(!$argQueue->isEmpty()) {
//            $data = $argQueue->pop();
//            foreach($data['args'] as $arg) {
//                if($arg['type'] === ClassConstant::FUNC_CALL) {
//                    $argQueue->add($arg);
//                }
//            }
//
//            $filter = [
//                'type' => $data['type'],
//                'name' => $data['name'],
////            'argsTypeKey' => $this->setRegexParamType($extractedNode['args'])
//            ];
//            $result = $this->search($filter);
//            if($result !== null)
//                $this->regexes[] = $result;
//        }
//    }
//
    private function search($filter)
    {
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
//
//    private function extractNode($node) {
//        $_node = $node->extract();
//        $extractedNode = array();
//        $extractedNode['type'] = $_node['type'];
//        $extractedNode['name'] = $_node['name'];
//        $extractedNode['args'] = $this->extractArguments($_node);
//        return $extractedNode;
//    }
//
//    private function extractArguments($node) {
//        $extractedArgs = array();
//        foreach($node['args'] as $arg) {
//            $extractedArgs[] = $this->extractArgument($arg);
//        }
//        return $extractedArgs;
//    }
//
//    private function extractArgument($node)
//    {
//        $extractedArg = array();
//        if ($node instanceof IPartsExtractable) {
//            $result = $node->extract();
//            $extractedArg['type'] = $result['type'];
//            $extractedArg['parts'] = array();
//            foreach ($result['parts'] as $part) {
//                if ($part instanceof IMethodCall) {
//                    $this->explore($part);
//                }
//                $extractedArg['parts'][] = $part->extract();
//            }
//        }
//        else if ($node instanceof ILeftRightExtractable) {
//            $result = $node->extract();
//            $extractedArg['type'] = $result['type'];
//            $extractedArg['left'] = $this->extractArgument($result['left']);
//            $extractedArg['right'] = $this->extractArgument($result['right']);
//        }
//        else if ($node instanceof IMethodCall) {
//            $result = $node->extract();
//            $extractedArg['type'] = $result['type'];
//            $extractedArg['name'] = $result['name'];
//            $extractedArg['args'] = $this->extractArguments($result);
//        }
//        else if (array_key_exists('type', $node) && $node['type'] === ClassConstant::VARIABLE) {
//            $extractedArg['type'] = $node['type'];
//        }
//        else {
//            $result = $node->extract();
//            if(is_array($result)) {
//                foreach ($result as $key => $value) {
//                    $extractedArg[$key] = $value;
//                }
//            }
//        }
//        return $extractedArg;
//    }
}