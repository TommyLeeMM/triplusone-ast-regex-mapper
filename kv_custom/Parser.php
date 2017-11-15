<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 13/10/2017
 * Time: 15:01
 */

namespace kv_custom;


use PHPCfg\Op\Stmt\JumpIf;
use PHPCfg\Op\Terminal\Return_;

class Parser
{
    private $phpParser;
    private $phpCfgDumper;
    private $cfgPrinter;
    private $database;

    public function __construct()
    {
        $this->phpParser = new \PHPCfg\Parser((new \PhpParser\ParserFactory)->create(\PhpParser\ParserFactory::PREFER_PHP5));
        $this->phpCfgDumper = new \PHPCfg\Printer\Text();
        $this->cfgPrinter = new CFGPrinter();
        $this->database = new Mongo();
    }

    private function parseCode($filename) {
        $phpParserScript = $this->phpParser->parse(file_get_contents($filename), $filename);
        return $this->cfgPrinter->renderScript($phpParserScript);
    }

    public function parse($filename) {
        $renderedScripts = $this->parseCode($filename);
        $graphs = [];
        foreach($renderedScripts as $functionName => $script) {
            $graphs[] = $this->createGraph($functionName, $script);
        }
        $this->saveScript($filename, $graphs);
        return $graphs;
    }

    private function createGraph($functionName, $script) {
        $nodes = $this->createNodes($script);
        $adjList = [];
        foreach($script['blocks'] as $key => $block) {
            $blockId = $script['blockIds'][$block];
            $adjList[] = [
                'node' => $nodes[$blockId - 1],
                'children' => []
            ];
        }
        $graph = new Graph($functionName, $this->reverseEdges($script, $nodes, $adjList));
        return $graph;
    }

    private function createNodes($script) {
        $nodes = [];
        foreach($script['blocks'] as $key => $block) {
            $blockId = $script['blockIds'][$block];
            $node = new Node($blockId, $block);
            $statements = [];
            foreach($block->children as $childKey => $child) {
                $statement = [
                    'lineNumber' => $child->getLine()
                ];
                $statements[] = $statement;
                if($child instanceof Return_) {
                    $node->setIsReturnBlock(true);
                }
                else if($child instanceof JumpIf) {
                    $jumpIf = [
                        'true' => $script['blockIds'][$child->if],
                        'false' => $script['blockIds'][$child->else],
                        'condIdx' => $childKey
                    ];
                    $node->setJumpIf($jumpIf);
                }
            }
            $node->setStatements($statements);
            $nodes[] = $node;
        }
        return $nodes;
    }

    private function reverseEdges($script, $nodes, $graph) {
        foreach($script['blocks'] as $key => $block) {
            foreach ($block->parents as $prev) {
                if ($script['blocks']->contains($prev)) {
                    $parentBlockId = $script['blockIds'][$prev];
                    $currentBlockId = $script['blockIds'][$block];
                    $graph[$parentBlockId-1]['children'][] = $nodes[$currentBlockId-1];
                }
            }
        }
        return $graph;
    }

    private function saveScript($filename, $graphs) {
        $graphsArray = [];
        foreach ($graphs as $graph) {
            $graphsArray[] = $graph->toArray();
        }
        $this->database->insertNode([
            'filename' => $filename,
            'graphs' => $graphsArray
        ]);
    }
}