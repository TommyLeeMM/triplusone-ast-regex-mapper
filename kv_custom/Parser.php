<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 13/10/2017
 * Time: 15:01
 */

namespace kv_custom;


use PHPCfg\Op\Stmt\JumpIf;

class Parser
{
    private $phpParser;
    private $script;
    private $phpCfgDumper;
    private $renderedGraphs;

    private $adjList;
    private $returnBlockIds;

    public function __construct()
    {
        $this->phpParser = new \PHPCfg\Parser((new \PhpParser\ParserFactory)->create(\PhpParser\ParserFactory::PREFER_PHP7));
        $this->phpCfgDumper = new \PHPCfg\Printer\Text();
    }

    private function prettyPrint($object) {
        echo '<pre>'; var_dump($object); echo '</pre>';
    }

    private function initialize() {
        $this->adjList = $this->returnBlockIds = [];
        $this->parseCode();
    }

    private function parseCode() {
        $this->script = $this->phpParser->parse(file_get_contents('test_codes/loop.php'), 'code.php');
        $this->renderedGraphs = (new CFGPrinter())->renderScript($this->script);
    }

    private function createGraph() {
        $mainBlocks = $this->renderedGraphs[0];
        foreach($mainBlocks['blocks'] as $key => $block) {
            $blockId = $mainBlocks['blockIds'][$block];
            $condIdxNum = $trueDestId = $falseDestId = -1;
            foreach($block->children as $idx => $child) {
                if($child instanceof JumpIf) {
                    $condIdxNum = $idx;
                    $trueDestId = $mainBlocks['blockIds'][$child->if];
                    $falseDestId = $mainBlocks['blockIds'][$child->else];
                }
            }
            if($trueDestId != -1 && $falseDestId != -1) {
                $this->adjList[] = [
                    'id' => $blockId,
                    'block' => $block,
                    'childrenIds' => [],
                    'jumpIf' => [
                        'cond' => $condIdxNum-1,
                        'true' => $trueDestId,
                        'false' => $falseDestId
                    ]
                ];
            }
            else {
                $this->adjList[] = [
                    'id' => $blockId,
                    'block' => $block,
                    'childrenIds' => [],
                ];
            }

            $this->setReturnId($mainBlocks, $block);
        }
        $this->reverseEdges($mainBlocks);
    }

    private function setReturnId($blocks, $block) {
        foreach($blocks['blocks'][$block] as $op) {
            if($op['op'] instanceof \PHPCfg\Op\Terminal\Return_) {
                $this->returnBlockIds[] = $blocks['blockIds'][$block];
                break;
            }
        }
    }

    private function reverseEdges($blocks) {
        foreach($blocks['blocks'] as $key => $block) {
            foreach ($block->parents as $prev) {
                if ($blocks['blockIds']->contains($block)) {
                    $this->adjList[$blocks['blockIds'][$prev] - 1]['childrenIds'][] = $blocks['blockIds'][$block];
                }
            }
        }
    }

    public function parse() {
        $this->initialize();
        $this->createGraph();
        return [
            'adjList' => $this->adjList,
            'returnBlockIds' => $this->returnBlockIds
        ];
    }

    public function printBlockContents() {
        echo '<pre>'; echo $this->phpCfgDumper->printScript($this->script); echo '</pre>';
    }
}