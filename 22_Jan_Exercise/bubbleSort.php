<?php

    // Write a Program for Bubble sorting in PHP.

    $numbers = [5, 8, 2, 7, 3];

    for ($j = 0; $j < sizeof($numbers) - 1; $j++) { 

        for ($i = 0; $i < sizeof($numbers) - 1; $i++) {

            if ($numbers[$i] > $numbers[$i+1]) {
                $temp = $numbers[$i];
                $numbers[$i] = $numbers[$i+1];
                $numbers[$i+1] = $temp;
            }

        }

    }

?>