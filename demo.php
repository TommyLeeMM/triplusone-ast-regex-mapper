<?php

require __DIR__ . "/vendor/autoload.php";
require_once 'kv_custom/CFGPrinter.php';
require_once 'kv_custom/Stack.php';

$parser = new PHPCfg\Parser((new PhpParser\ParserFactory)->create(PhpParser\ParserFactory::PREFER_PHP7));
$script = $parser->parse(file_get_contents('test_codes/loop.php'), 'code.php');
$dumper = new PHPCfg\Printer\Text();

$myDumper = new kv_custom\CFGPrinter();
$rendered = $myDumper->renderScript($script);

echo '<pre>';
echo $dumper->printScript($script);
echo '</pre>';

##### Block Content
/*
 * blocks => isi blocknya
 * blockIds => no block
 * ops => statement
 * varIds => id var
 */
//$keyIdx = 0;
//echo '<pre>';
//echo $dumper->printScript($script);
//echo count($rendered[0]['blocks']).'<br>';
//foreach($rendered[$keyIdx]['blocks'] as $key => $block) {
//    if($key === 7) {
//		var_dump($rendered[$keyIdx]['blockIds']->offsetGet($block));
//        var_dump($rendered[$keyIdx]['blocks']->offsetGet($block)[3]);
//        $ops = $rendered[0]['blocks'][$block];
//    }
//}
//echo '</pre>';
##### End Block Content

###### Check Empty
//$jumpOnlyBlocks = [];
//foreach($rendered[0]['blocks'] as $key => $block) {
//    $isJumpOnly = false;
//    foreach($rendered[0]['blocks']->offsetGet($block) as $children) {
////        echo 'Block '.($key+1).' instance of '. get_class($children['op']).'<br>';
//        if($children['op'] instanceof \PHPCfg\Op\Stmt\Jump
//            || $children['op'] instanceof \PHPCfg\Op\Terminal\Return_
//            || $children['op'] instanceof \PHPCfg\Op\Phi) {
//            if($children['op'] instanceof \PHPCfg\Op\Terminal\Return_) {
//                echo 'Block Return di block '.($key+1).'<br>';
//            }
//            $isJumpOnly = true;
//        }
//        else {
//            $isJumpOnly = false;
//            break;
//        }
//    }
//    if($isJumpOnly) {
//        $jumpOnlyBlocks[] = $rendered[0]['blockIds'][$block];
//        echo 'JumpOnly di block '.$rendered[0]['blockIds'][$block].'<br>';
//    }
//}
###### End Check Empty Block

###### DFS
$adjList = array();
$returnBlocks = array();
$visited = array();

foreach($rendered[0]['blocks'] as $key => $block) {
    $blockId = $rendered[0]['blockIds'][$block];
    $adjList[] = [
        'id' => $blockId,
        'block' => $rendered[0]['blocks'][$block],
        'children' => []
    ];
    $visited[] = false;
}

foreach($rendered[0]['blocks'] as $key => $block) {
    $ops = $rendered[0]['blocks'][$block];
    $blockId = $rendered[0]['blockIds'][$block];
    foreach($ops as $op) {
        if($op['op'] instanceof \PHPCfg\Op\Terminal\Return_) {
            $returnBlocks[] = $blockId;
            break;
        }
    }
    foreach($block->parents as $prev) {
        if($rendered[0]['blockIds']->contains($block)) {
            $adjList[$rendered[0]['blockIds'][$prev]-1]['children'][] = [
                'childId' => $blockId,
            ];
        }
    }
}

###### DFS Stack
//$stack = new \kv_custom\Stack();
//$stack->push($adjList[0]);
//while(!$stack->isEmpty()) {
//    $top = $stack->top();
//    echo $top['id'].'<br/>';
//    $stack->pop();
//    if(in_array($top['id'], $returnBlocks)) {
//        echo 'Ketemu end!<br/>';
//    }
//    else {
//        foreach($top['children'] as $child) {
//            $stack->push($adjList[$child['childId']-1]);
//        }
//    }
//}
###### End DFS Stack

###### DFS Recursive
$paths = [];
function dfs($start, $end, $visited, $adjList) {
    $pathIndex = 0;
    $path = [];
    dfsRecursive($start, $end, $visited, $path, $pathIndex, $adjList);
}
function dfsRecursive($start, $end, $visited, $path, $pathIndex, $adjList) {
    echo $adjList[$start]['id'].'<br>';
    $visited[$start] = true;
    $path[$pathIndex] = $adjList[$start]['id'];
    $pathIndex++;

    if(in_array($adjList[$start]['id'], $end)) {
        global $paths;
        $paths[] = $path;
        for($i = 0; $i < $pathIndex; $i++) {
            echo $path[$i].' ';
        }
        echo '<br/>';
    }
    else {
        for($i = 0; $i < count($adjList[$start]['children']); $i++) {
            if(!$visited[$adjList[$start]['children'][$i]['childId']-1]) {
                dfsRecursive($adjList[$start]['children'][$i]['childId']-1, $end, $visited, $path, $pathIndex, $adjList);
            }
        }
    }
    $pathIndex--;
    $visited[$start] = false;
}
dfs(0, $returnBlocks, $visited, $adjList);
###### End DFS Recursive

//$block = $adjList[0]['block'];
//foreach($block as $key => $op) {
//    if($op['op'] instanceof \PhpParser\Node\Stmt\If_
//        ||
//        $op['op'] instanceof \PHPCfg\Op\Stmt\JumpIf
//    ) {
////        echo '<pre>';
////        var_dump( $op['op']->cond);
////        echo '</pre>';
//        echo $key;
//    }
//}

//foreach($paths as $key => $path) {
//    foreach($path as $blockId) {
//        $block = $adjList[$blockId-1]['block'];
//        foreach($block as $op) {
//            if($op['op'] instanceof \PhpParser\Node\Stmt\If_
//                ||
//                $op['op'] instanceof \PHPCfg\Op\Stmt\JumpIf
//            ) {
//                echo '<pre>';
////                var_dump( $op['op']->cond);
//                echo '</pre>';
//                echo 'Ada if disini '.$blockId;
//            }
//        }
//    }
//    echo '<br>';
//}

###### END DFS