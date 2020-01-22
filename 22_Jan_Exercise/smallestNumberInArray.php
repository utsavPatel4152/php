<?php

    // Write a Program for finding the smallest number in an array.

    $numbers = [5, 8, 2, 7, 3];
    $smallest = $numbers[0];

    for ($i = 1; $i < sizeof($numbers); $i++) { 
        if ($numbers[$i] < $smallest) {
            $smallest = $numbers[$i];
        }
    }

    echo $smallest;

?>