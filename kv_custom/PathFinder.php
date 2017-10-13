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
    private $adjList;
    private $returnBlockIds;
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
            $neighbors = $this->adjList[$i]['childrenIds'];
            $source =  $this->adjList[$i]['id'];
            foreach($neighbors as $neighbor) {
                $keyPair = serialize(array($source, $neighbor));
                $this->transversedCount[$keyPair] = 0;
            }
        }
    }

    public function findAllPaths() {
        $this->initialize();
        $this->findRecursiveDFS(0, array(), 0, 0);
        return $this->paths;
    }

    private function findRecursiveDFS($start, $path, $pathIndex, $_source) {
        $sourceId = $this->adjList[$start]['id'];
        $path[$pathIndex] = $sourceId;
        $pathIndex++;

        if(in_array($sourceId, $this->returnBlockIds)) {
            $this->paths[] = $path;
        }
        else {
            for($i = 0; $i < count($this->adjList[$start]['childrenIds']); $i++) {
                $destinationId = $this->adjList[$start]['childrenIds'][$i];
                $pairKey = serialize(array($sourceId, $destinationId));
                if(array_key_exists($pairKey, $this->transversedCount))
                {
                    if($this->transversedCount[$pairKey] < 1) {
                        ++$this->transversedCount[$pairKey];
                        $this->findRecursiveDFS($destinationId-1, $path, $pathIndex, $sourceId);
                    }
                }
            }
        }

        $pathIndex--;
        $pairKey2 = serialize(array($_source, $sourceId));
        if(array_key_exists($pairKey2, $this->transversedCount))
            --$this->transversedCount[$pairKey2];
    }
}