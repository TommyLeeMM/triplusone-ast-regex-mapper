<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 22/09/2017
 * Time: 12:17
 */

namespace kv_custom;


class CFGPrinter extends \PHPCfg\Printer
{
    public function printScript(\PHPCfg\Script $script)
    {
        $output = '';
        $output .= $this->printFunc($script->main);
        return $output;
    }

    public function printFunc(\PHPCfg\Func $func)
    {
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

    public function renderScript($script)
    {
        $rendered = array();

        $rendered[] = $this->render($script->main);
        foreach ($script->functions as $function) {
            $result = $this->render($function);
            $rendered[] = $result;
        }
        return $rendered;
    }
}