<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 29/12/2017
 * Time: 16:31
 */

namespace lib;
include_once 'Helper.php';

class NaiveBayesClassifier
{
    private $positiveGroups, $negativeGroups;
    private $positives, $negatives, $data;

    public function __construct() {
        $this->prepare();
        $this->train();
    }

    private function train() {
        $this->positiveGroups = array();
        $this->negativeGroups = array();
        for($i = 0; $i < 5; $i++) {
            $this->positiveGroups[] = array();
            $this->negativeGroups[] = array();
        }

        foreach($this->positives as $positive) {
            foreach($positive as $key => $p) {
                if(array_key_exists($p, $this->positiveGroups[$key])) {
                    $this->positiveGroups[$key][$p]++;
                }
                else {
                    $this->positiveGroups[$key][$p] = 1;
                }
            }
        }
        foreach($this->negatives as $negative) {
            foreach($negative as $key => $p) {
                if(array_key_exists($p, $this->negativeGroups[$key])) {
                    $this->negativeGroups[$key][$p]++;
                }
                else {
                    $this->negativeGroups[$key][$p] = 1;
                }
            }
        }
    }

    private function prepare() {
        $this->data = [
            ['Sunny', 'Hot', 'High', 0, 'N'],
            ['Sunny', 'Hot', 'High', 1, 'N'],
            ['Overcast', 'Hot', 'High', 0, 'P'],
            ['Rain', 'Mild', 'High', 0, 'P'],
            ['Rain', 'Cool', 'Normal', 0, 'P'],
            ['Rain', 'Cool', 'Normal', 1, 'N'],
            ['Overcast', 'Cool', 'Normal', 1, 'P'],
            ['Sunny', 'Mild', 'High', 0, 'N'],
            ['Sunny', 'Cool', 'Normal', 0, 'P'],
            ['Rain', 'Mild', 'Normal', 0, 'P'],
            ['Sunny', 'Mild', 'Normal', 1, 'P'],
            ['Overcast', 'Mild', 'High', 1, 'P'],
            ['Overcast', 'Hot', 'Normal', 0, 'P'],
            ['Rain', 'Mild', 'High', 1, 'N']
        ];

        $this->positives = array();
        $this->negatives = array();
        foreach($this->data as $datum) {
            $this->positiveOrNegative($datum);
        }
    }

    private function positiveOrNegative($datum) {
        if($datum[4] === 'P') {
            $this->positives[] = $datum;
        }
        else {
            $this->negatives[] = $datum;
        }
    }

    public function classify(array $data) {
        $positive = array();
        $negative = array();
        foreach($data as $key => $datum) {
            if(array_key_exists($datum, $this->positiveGroups[$key]))
                $positive[] = $this->positiveGroups[$key][$datum] / count($this->positives);
            else
                $positive[] = 0;

            if(array_key_exists($datum, $this->negativeGroups[$key]))
                $negative[] = $this->negativeGroups[$key][$datum] / count($this->negatives);
            else
                $negative[] = 0;
        }
        $positive[] = count($this->positives) / count($this->data);
        $negative[] = count($this->negatives) / count($this->data);

        $positiveScore = array_product($positive);
        $negativeScore = array_product($negative);
        $totalScore = $positiveScore + $negativeScore;
        echo 'Positive: '.$positiveScore .'. Percentage: '. ($positiveScore/$totalScore*100).'%<br/>';
        echo 'Negative: '.$negativeScore .'. Percentage: '. ($negativeScore/$totalScore*100).'%<br/>';
        echo 'Result: ';
        echo ($positiveScore > $negativeScore) ? 'Positive' : 'Negative';
        echo '<br/>';
    }

    public function training($data) {
        $this->data[] = $data;
        $this->positiveOrNegative($data);
        $this->train();
    }
}

$classifier = new NaiveBayesClassifier();
$classifier->classify(['Rain', 'Mild', 'Normal', 1]);
$classifier->classify(['Overcast', 'Cool', 'High', 0]);
$classifier->training(['Overcast', 'Cool', 'High', 0, 'N']);
$classifier->training(['Overcast', 'Cool', 'High', 0, 'N']);
$classifier->training(['Overcast', 'Cool', 'High', 0, 'N']);
$classifier->training(['Overcast', 'Cool', 'High', 0, 'N']);
$classifier->classify(['Rain', 'Mild', 'Normal', 1]);
$classifier->classify(['Overcast', 'Cool', 'High', 0]);