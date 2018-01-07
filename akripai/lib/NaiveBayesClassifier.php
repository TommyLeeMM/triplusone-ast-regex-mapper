<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 07/01/2018
 * Time: 20:18
 */

namespace lib;

use MongoDB\Driver\Query;

class NaiveBayesClassifier
{
    private $positiveGroups, $negativeGroups;
    private $positive, $negative;
    private $additiveValue = 1;
    private $labelCount = 2; // malware or not

    public function __construct()
    {
        $this->calculateBasedAppearance();
    }

    private function calculateBasedAppearance() {
        $generator = new DummyDataGenerator();
        $this->positiveGroups = $generator->generateRegexIsAppearOrNotPositiveCounter();
        $this->negativeGroups = $generator->generateRegexIsAppearOrNotNegativeCounter();

        $this->positive = $generator->prepareRegexCounter();
        $this->negative = $generator->prepareRegexCounter();

        foreach($this->positiveGroups as $positiveGroup) {
            foreach($positiveGroup as $key => $value) {
                $this->positive[$key] += $value;
            }
        }
        foreach($this->negativeGroups as $negativeGroup) {
            foreach($negativeGroup as $key => $value) {
                $this->negative[$key] += $value;
            }
        }

        // additive smoothing
        foreach($this->positive as $key => $item) {
            $this->positive[$key] += $this->additiveValue;
        }
        foreach($this->negative as $key => $item) {
            $this->negative[$key] += $this->additiveValue;
        }
    }

    private function calculateBasedApperanceCount() {
        $generator = new DummyDataGenerator();
        $this->positiveGroups = $generator->generateRegexAppearanceCountPositiveCounter();
        $this->negativeGroups = $generator->generateRegexAppearanceCountNegativeCounter();

        $this->positive = $generator->prepareRegexCounter();
        $this->negative = $generator->prepareRegexCounter();

        foreach($this->positiveGroups as $positiveGroup) {
            foreach($positiveGroup as $key => $value) {
                $this->positive[$key] += $value;
            }
        }
        foreach($this->negativeGroups as $negativeGroup) {
            foreach($negativeGroup as $key => $value) {
                $this->negative[$key] += $value;
            }
        }

//        $positivePropertyCount = 0;
//        $negativePropertyCount = 0;
//        foreach($this->positive as $key => $item) {
//            $positivePropertyCount += $item;
//        }
//        foreach($this->neg as $key => $item) {
//            $positivePropertyCount += $item;
//        }

        // additive smoothing
        foreach($this->positive as $key => $item) {
            $this->positive[$key] += $this->additiveValue;
        }
        foreach($this->negative as $key => $item) {
            $this->negative[$key] += $this->additiveValue;
        }
    }

    public function classify($dataset) {
        return $this->classifyBasedAppearance($dataset);
    }

    private function classifyBasedAppearance($dataset) {
        $count = count($this->positiveGroups) + count($this->negativeGroups);

        $positiveValues = array();
        foreach($dataset as $key => $value) {
            $positiveValues[] = $this->positive[$key] / (count($this->positiveGroups)+$this->additiveValue);
        }
        $positiveValues[] = (count($this->positiveGroups)+$this->additiveValue) / ($count + ($this->additiveValue * $this->labelCount));

        $negativeValues = array();
        foreach($dataset as $key => $value) {
            $negativeValues[] = $this->negative[$key] / (count($this->negativeGroups)+$this->additiveValue);
        }
        $negativeValues[] = (count($this->negativeGroups)+$this->additiveValue) / ($count + ($this->additiveValue * $this->labelCount));

        $positiveValue = array_product($positiveValues);
        $negativeValue = array_product($negativeValues);

        echo ($positiveValue >= $negativeValue) ? 'Positive' : 'Negative';
        echo '<br/>';
        echo $positiveValue . ' ### '. $positiveValue/ ($positiveValue + $negativeValue) * 100;
        echo '<br/>';
        echo $negativeValue . ' ### '. $negativeValue/ ($positiveValue + $negativeValue) * 100;
        echo '<br/>';
        return ($positiveValue >= $negativeValue) ? $positiveValue : $negativeValue;
    }
}