<?php
use PhpParser\ParserFactory;

require __DIR__ . "/vendor/autoload.php";

class MyPrinter extends \PHPCfg\Printer {
    public function printScript(\PHPCfg\Script $script) {
        $output = '';
        $output .= $this->printFunc($script->main);
//        foreach ($script->functions as $func) {
//            $name = $func->getScopedName();
//            $output .= "\nFunction $name():";
//            $output .= $this->printFunc($func);
//        }
        return $output;
    }
    public function printFunc(\PHPCfg\Func $func) {
        $rendered = $this->render($func);

        $output = '';
        foreach ($rendered['blocks'] as $block) {
            $ops = $rendered['blocks'][$block];
            $output .= "\nBlock#" . $rendered['blockIds'][$block];
            foreach ($block->parents as $prev) {
                if ($rendered['blockIds']->contains($prev)) {
                    $output .= $this->indent("\nParent: Block#" . $rendered['blockIds'][$prev]);
                }
            }
            foreach ($ops as $op) {
                $output .= $this->indent("\n" . $op['label']);
                foreach ($op['childBlocks'] as $child) {
                    $output .= $this->indent("\n" . $child['name'] . ": Block#" . $rendered['blockIds'][$child['block']], 2);
                }
            }
            $output .= "\n";
        }
        return $output;
    }
    public function renderScript($script) {
        $rendered = array();

        $rendered[] = $this->render($script->main);
        foreach($script->functions as $function) {
            $result = $this->render($function);
            $rendered[] = $result;
        }
        return $rendered;
    }
}


$parser = new PHPCfg\Parser(
    (new PhpParser\ParserFactory)->create(PhpParser\ParserFactory::PREFER_PHP7)
);
$script = $parser->parse(file_get_contents('samplecode/code.php'), 'code.php');
$dumper = new PHPCfg\Printer\Text();
$myDumper = new MyPrinter();

$rendered = $myDumper->renderScript($script);

/*
 * blocks => isi blocknya
 * blockIds => no block
 * ops => statement
 * varIds => id var
 */
//$keyIdx = 0;
echo '<pre>';
//echo $dumper->printScript($script);
//echo count($rendered[0]['blocks']).'<br>';
//foreach($rendered[$keyIdx]['blocks'] as $key => $block) {
//    if($key === 7) {
//		var_dump($rendered[$keyIdx]['blockIds']->offsetGet($block));
//        var_dump($rendered[$keyIdx]['blocks']->offsetGet($block)[3]);
//        $ops = $rendered[0]['blocks'][$block];
//    }
//}
echo '</pre>';

foreach($rendered[0]['blocks'] as $key => $block) {
    $isJumpOnly = false;
    foreach($rendered[0]['blocks']->offsetGet($block) as $children) {
//        echo 'Block '.($key+1).' instance of '. get_class($children['op']).'<br>';
        if($children['op'] instanceof \PHPCfg\Op\Stmt\Jump
            || $children['op'] instanceof \PHPCfg\Op\Terminal\Return_
            || $children['op'] instanceof \PHPCfg\Op\Phi) {
            if($children['op'] instanceof \PHPCfg\Op\Terminal\Return_) {
                echo 'Block Return di block '.($key+1).'<br>';
            }
            $isJumpOnly = true;
        }
        else {
            $isJumpOnly = false;
            break;
        }
    }
    if($isJumpOnly) {
        echo 'JumpOnly di block '.($key+1).'<br>';
    }
}

$list = array();
foreach($rendered[0]['blocks'] as $key => $block) {
    $blockId = $rendered[0]['blockIds'][$block];
    $list[] = [
        'id' => $blockId,
//        'block' => $block,
        'children' => []
    ];
}

foreach($rendered[0]['blocks'] as $key => $block) {
//    $ops = $rendered[0]['blocks'][$block];
    $blockId = $rendered[0]['blockIds'][$block];
    echo 'Block #'.$blockId;
    foreach($block->parents as $prev) {
        if($rendered[0]['blockIds']->contains($block)) {
            echo ' Parent : '.$rendered[0]['blockIds'][$prev];
            $list[$rendered[0]['blockIds'][$prev]-1]['children'][] = [
                'childId' => $blockId,
//                'block' => $block
            ];
        }
    }
    echo '<br/>';
}
echo '<pre>';
var_dump($list);
echo '</pre>';