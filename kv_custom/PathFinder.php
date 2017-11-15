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

    public function __construct($graphs)
    {
        $this->graphs = $graphs;
        $this->database = new Mongo();
    }

    private function initialize() {
        $this->paths = [];
    }

    public function findAllPaths() {
        $this->initialize();
        $this->visited = [];
        Helper::prettyVarDump($this->graphs);
//        foreach($this->graphs[0] as $graph) {
//            $this->visited[] = false;
//            $source = $graph['node'];
//            $children = $graph['children'];
//            foreach($children as $child) {
//                $keyPair = serialize(array($source->getId(), $child->getId()));
//                $this->transversedCount[$keyPair] = 0;
//            }
//        }
//        $this->DFSRecursive($this->graphs[0][0], [], 0, 0,[]);
        // return $this->paths;
    }

    private function DFSRecursive($start, $path, $pathIndex, $_source, $pathNode) {
        $startId = $start['node']->getId();
        $path[$pathIndex] = $startId;
        $pathNode[$pathIndex] = $start['node'];
        $pathIndex++;
        //        $this->visited[$startId-1] = true;

        if($start['node']->isReturnBlock()) {
            //$this->paths[] = $path;
            $string = [];
            foreach($pathNode as $node) {
                $string[] = $node->toArray();
            }
            $this->database->insertPath(array("path"=>$string));
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
                        $this->DFSRecursive($this->graphs[0][$child->getId()-1], $path, $pathIndex, $startId, $pathNode);
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