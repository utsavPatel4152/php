<?php

    // Write a Program for finding the biggest number in an array without using any array functions.

    $numbers = [5, 8, 20, 7];
    $biggest = $numbers[0];

    for ($i = 1; $i < sizeof($numbers); $i++) { 
        if ($numbers[$i] > $biggest) {
            $biggest = $numbers[$i];
        }
    }

    echo $biggest;

?>