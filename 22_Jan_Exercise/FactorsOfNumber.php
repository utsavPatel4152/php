<?php

    // Write a program to find factor of any number.

    $number = 15;

    for ($i=1; $i <= $number ; $i++) { 
        if ($number % $i == 0) {
            echo $i.'<br>';
        }
    }

?>