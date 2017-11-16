<?php

    $i = 0;
    $j = 0;
    $n = 4;
    while($i < $n-1) {
        $j = $i + 1;
        while($j < $n) {
            if($i < $j) {
                echo 'aaa';
            }
        }
        $i++;
    }