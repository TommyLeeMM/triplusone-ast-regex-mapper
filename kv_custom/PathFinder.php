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

    public function __construct($graphs)
    {
        $this->graphs = $graphs;
    }

    private function initialize() {
        $this->paths = [];
    }

    public function findAllPaths() {
        $this->initialize();
        $this->visited = [];
        foreach($this->graphs[0] as $graph) {
            $this->visited[] = false;
            $source = $graph['node'];
            $children = $graph['children'];
            foreach($children as $child) {
                $keyPair = serialize(array($source->getId(), $child->getId()));
                $this->transversedCount[$keyPair] = 0;
            }
        }
        $this->DFSRecursive($this->graphs[0][0], [], 0, 0);
    }

    private function DFSRecursive($start, $path, $pathIndex, $_source) {
        $startId = $start['node']->getId();
        $path[$pathIndex] = $startId;
        $pathIndex++;
        //        $this->visited[$startId-1] = true;

        if($start['node']->isReturnBlock()) {
            $this->paths[] = $path;
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
                        $this->DFSRecursive($this->graphs[0][$child->getId()-1], $path, $pathIndex, $startId);
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

    public function findAllPathsBFSPublic() {
        return $this->findAllPathsBFS($this->graphs[0][0]);
    }

    private function findAllPathsBFS($start) {
        $paths = [];
        $queue = [];
        $initStart = [];
        $initStart[] = $start;
        $queue[] = $initStart;

        while(count($queue) > 0) {
            $current = $queue[0];
            array_splice($queue, 0, 1);
            $current[count($current)-1]['node']->increaseCount();
            $last = $current[count($current)-1];
            if($last['node']->isReturnBlock()) {
                $paths[] = $current;
                continue;
            }

            for($i = 0, $count = count($last['children']); $i < $count; $i++) {
                $child = $last['children'][$i];
                if($last['node']->getCount() >= 2 && $child->getId() == $this->isPreviousNext($last, $current)) {
                    continue;
                }
                $newList = $current;
                $newList[] = $this->graphs[0][$child->getId()-1];
                $queue[] = $newList;
            }
        }
        return $paths;
    }

    private function isPreviousNext ($last, $list) {
        for($i = 0, $count = count($list)-1; $i < $count; $i++) {
            if($last['node']->getId() == $list[$i]['node']->getId()) {
                return $list[$i+1]['node']->getId();
            }
        }
        return -1;
    }
}