<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 05/10/2017
 * Time: 12:57
 */

require __DIR__ . "/vendor/autoload.php";
require_once 'kv_custom/CFGPrinter.php';
require_once 'kv_custom/Stack.php';

class Parser {
    private $phpParser;
    private $script;
    private $phpCfgDumper;
    private $renderedGraphs;

    private $adjList;
    private $returnBlockIds;

    public function __construct()
    {
        $this->phpParser = new PHPCfg\Parser((new PhpParser\ParserFactory)->create(PhpParser\ParserFactory::PREFER_PHP7));
        $this->phpCfgDumper = new PHPCfg\Printer\Text();
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
        $this->renderedGraphs = (new kv_custom\CFGPrinter())->renderScript($this->script);
    }

    private function createGraph() {
        $mainBlocks = $this->renderedGraphs[0];
        foreach($mainBlocks['blocks'] as $key => $block) {
            $blockId = $mainBlocks['blockIds'][$block];
            $this->adjList[] = [
                'id' => $blockId,
                'block' => $block,
                'children' => []
            ];
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
                    $this->adjList[$blocks['blockIds'][$prev] - 1]['children'][] = [
                        'childId' => $blocks['blockIds'][$block],
                    ];
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
}

class PathFinder {
    private $adjList;
    private $returnBlockIds;
    private $visited;
    private $paths;
    private $transversedCount;

    public function __construct($sources)
    {
        $this->adjList = $sources['adjList'];
        $this->returnBlockIds = $sources['returnBlockIds'];
    }

    private function prettyPrint($object) {
        echo '<pre>'; var_dump($object); echo '</pre>';
    }

    private function initialize() {
        $this->visited = $this->paths = $this->transversedCount = [];
        for($i = 0, $count = count($this->adjList); $i < $count; $i++) {
            $this->visited[] = false;
        }
    }

    public function setTransversedCount() {
        for($i = 0, $count = count($this->adjList); $i < $count; $i++) {
            $neighbors = $this->adjList[$i]['children'];
            $source =  $this->adjList[$i]['id'];
            foreach($neighbors as $neighbor) {
                $destination = $neighbor['childId'];
                $keyPair = serialize(array($source, $destination));
                $this->transversedCount[$keyPair] = 0;
            }
        }
    }

    public function findAllPaths() {
        $this->initialize();
        $this->setTransversedCount();
        $this->findRecursive(0, array(), 0, 0);
        return $this->paths;
    }

    private function findRecursive($start, $path, $pathIndex, $_source) {
//        $this->visited[$start] = true;
        $sourceId = $this->adjList[$start]['id'];
        $path[$pathIndex] = $sourceId;
        $pathIndex++;

        if(in_array($sourceId, $this->returnBlockIds)) {
            $this->paths[] = $path;
        }
        else {
            for($i = 0; $i < count($this->adjList[$start]['children']); $i++) {
                $destinationId = $this->adjList[$start]['children'][$i]['childId'];
                $pairKey = serialize(array($sourceId, $destinationId));
                if(array_key_exists($pairKey, $this->transversedCount))
                {
                    if($this->transversedCount[$pairKey] < 1) {
                        ++$this->transversedCount[$pairKey];
                        $this->findRecursive($this->adjList[$start]['children'][$i]['childId']-1, $path, $pathIndex, $sourceId);
                    }
                }
//                if(!$this->visited[$destinationId-1]) {
//                    $this->findRecursive($this->adjList[$start]['children'][$i]['childId']-1, $path, $pathIndex, $sourceId);
//                }
            }
        }

        $pathIndex--;
        $pairKey2 = serialize(array($_source, $sourceId));
        if(array_key_exists($pairKey2, $this->transversedCount))
            --$this->transversedCount[$pairKey2];

//        $this->visited[$start] = false;
    }
}

$parser = new Parser();
$pathFinder = new PathFinder($parser->parse());
$paths = $pathFinder->findAllPaths();
foreach($paths as $path) {
    foreach($path as $id) {
        echo $id.' ';
    }
    echo '<br>';
}