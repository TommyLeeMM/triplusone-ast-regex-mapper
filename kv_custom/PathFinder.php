<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 13/10/2017
 * Time: 15:01
 */

namespace kv_custom;

class PathFinder
{
    private $graphs;
    private $paths;
    private $visited;
    private $transversedCount;
    private $database;
    private $filename;

    public function __construct($filename, $graphs)
    {
        $this->filename = $filename;
        $this->graphs = $graphs;
        $this->database = new Mongo();
    }

    private function initialize() {
//        $this->paths = [];
        $this->transversedCount = [];
    }

    public function findAllPaths() {
        $this->initialize();
        $this->visited = [];

        foreach($this->graphs as $graph) {
//            $this->visited[] = false;
            $adjList = $graph->getAdjacencyList();
            foreach($adjList as $row) {
                $node = $row['node'];
                foreach($row['children'] as $child) {
                    $keyPair = serialize(array($node->getId(), $child->getId()));
                    $this->transversedCount[$keyPair] = 0;
                }
            }
            $this->DFSRecursive($adjList[0], [], 0, 0, [], $graph);
        }
        // return $this->paths;
    }

    private function DFSRecursive($start, $path, $pathIndex, $_source, $pathNode, $graph) {
        $startId = $start['node']->getId();
        $path[$pathIndex] = $startId;
        $pathNode[$pathIndex] = $start['node'];
        $pathIndex++;
        //        $this->visited[$startId-1] = true;

        if($start['node']->isReturnBlock()) {
            //$this->paths[] = $path;
            $foundPath = [];
            foreach($pathNode as $node) {
                $foundPath[] = $node->toArray();
            }
            $this->database->insertPath([
                'filename' => $this->filename,
                'functionName' => $graph->getFunctionName(),
                'path' => $foundPath
            ]);
        }
        else {
            for($i = 0, $childrenCount = count($start['children']); $i < $childrenCount; $i++) {
                $child = $start['children'][$i];
//                if(!$this->visited[$child->getId()-1]) {
//                    $this->DFSRecursive($this->graphs[0][$child->getId()-1], $path, $pathIndex, $_source);
//                }
                $pairKey = serialize(array($startId, $child->getId()));
                if(array_key_exists($pairKey, $this->transversedCount))
                {
                    if($this->transversedCount[$pairKey] < 1) {
                        ++$this->transversedCount[$pairKey];
                        $this->DFSRecursive($graph->getAdjacencyList()[$child->getId()-1], $path, $pathIndex, $startId, $pathNode, $graph);
                    }
                }
            }
        }

        $pathIndex--;
        $pairKey2 = serialize(array($_source, $startId));
        if(array_key_exists($pairKey2, $this->transversedCount))
            --$this->transversedCount[$pairKey2];
//        $this->visited[$startId-1] = false;
    }

}