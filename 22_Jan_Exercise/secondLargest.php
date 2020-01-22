<?php

    $numbers = [5, 8, 9, 7, 3, 8];
    $largest = $secondLargest = $numbers[0];

    for ($i = 1; $i < sizeof($numbers); $i++) {

        if ($numbers[$i] > $largest) {
            $secondLargest = $largest;
            $largest = $numbers[$i];
        }
        else if ($numbers[$i] > $secondLargest && $numbers[$i] < $largest) {
            $secondLargest = $numbers[$i];
        }

    }

    echo 'Largest Number: '.$largest.'<br>Second Largest Number: '.$secondLargest;

?>