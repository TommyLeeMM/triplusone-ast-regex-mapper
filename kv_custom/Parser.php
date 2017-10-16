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
    private $phpParserScript;
    private $phpCfgDumper;
    private $renderedScripts;
    private $graphs;

    public function __construct()
    {
        $this->phpParser = new \PHPCfg\Parser((new \PhpParser\ParserFactory)->create(\PhpParser\ParserFactory::PREFER_PHP7));
        $this->phpCfgDumper = new \PHPCfg\Printer\Text();
        $this->parseCode();
    }

    public function printBlockContents() {
        echo '<pre>'; echo $this->phpCfgDumper->printScript($this->phpParserScript); echo '</pre>';
    }

    private function parseCode() {
        $this->phpParserScript = $this->phpParser->parse(file_get_contents('test_codes/priv.php'), 'code.php');
        $this->renderedScripts = (new CFGPrinter())->renderScript($this->phpParserScript);
    }

    public function parse() {
        $this->graphs = [];
        foreach($this->renderedScripts as $script) {
            $this->graphs[] = $this->createGraph($script);
        }
        unset($this->phpParserScript);
        unset($this->renderedScripts);
        return $this->graphs;
    }

    private function createNodes($script) {
        $nodes = [];
        foreach($script['blocks'] as $key => $block) {
            $blockId = $script['blockIds'][$block];
            $node = new Node($blockId, $block);
            foreach($block->children as $childKey => $child) {
                if($child instanceof Return_) {
                    $node->setIsReturnBlock(true);
                }
                else if($child instanceof JumpIf) {
                    $jumpIf = [
                        'true' => $script['blockIds'][$block][$child->if],
                        'false' => $script['blockIds'][$block][$child->else],
                        'condIdx' => $childKey-1
                    ];
                    $node->setJumpIf($jumpIf);
                }
            }
            $nodes[] = $node;
        }
        return $nodes;
    }

    private function createGraph($script) {
        $nodes = $this->createNodes($script);
        $adjList = [];
        foreach($script['blocks'] as $key => $block) {
            $blockId = $script['blockIds'][$block];
            $adjList[] = [
                'node' => $nodes[$blockId - 1],
                'children' => []
            ];
        }
        $adjList = $this->reverseEdges($script, $nodes, $adjList);
        return $adjList;
    }

    private function reverseEdges($script, $nodes, $adjList) {
        foreach($script['blocks'] as $key => $block) {
            foreach ($block->parents as $prev) {
                if ($script['blocks']->contains($prev)) {
                    $parentBlockId = $script['blockIds'][$prev];
                    $currentBlockId = $script['blockIds'][$block];
                    $adjList[$parentBlockId-1]['children'][] = $nodes[$currentBlockId-1];
                }
            }
        }
        return $adjList;
    }
}