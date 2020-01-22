<?php

    // Write a program to find HCF of two numbers.

    $number1 = 0;
    $number2 = 20;
    $hcf = 0;

    if ($number1 == 0) {
        $hcf = $number2;
    }

    elseif ($number2 == 0) {
        $hcf = $number1;
    }

    else {
        for ($i = 1; $i <= $number1 && $i <= $number2 ; $i++) { 
            if ($number1 % $i == 0 && $number2 % $i == 0) {
                $hcf = $i;
            }
        }
    }
    echo 'HCF of '.$number1.' and '.$number2.': '.$hcf;

?>