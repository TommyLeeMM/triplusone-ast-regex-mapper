<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/11/2017
 * Time: 14:04
 */

namespace kv_custom;


class Graph
{
    private $functionName;
    private $adjList;

    public function __construct($functionName, $adjList)
    {
        $this->functionName = $functionName;
        $this->adjList = $adjList;
    }

    public function toArray() {
        $graphArray = [];

        foreach($this->adjList as $row) {
            $nodeArray = $row['node']->toArray();
            $childrenArray = $this->convertChildrenToArray($row['children']);
            $graphArray[] = [
                'node' => $nodeArray,
                'children' => $childrenArray
            ];
        }
        return [
            'functionName' => $this->functionName,
            'graph' => $graphArray
        ];
    }

    private function convertChildrenToArray($children) {
        $childrenArray = [];
        foreach($children as $child) {
            $childrenArray[] = $child->toArray();
        }
        return $childrenArray;
    }

    public function getFunctionName()
    {
        return $this->functionName;
    }

    public function getAdjacencyList()
    {
        return $this->adjList;
    }

}