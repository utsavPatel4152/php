<?php

    // Program to find the LCM of two numbers.

    $number1 = 15;
    $number2 = 25;

    // if ($number1 > $number2) {
    //     $largeNumber = $number1;
    //     $smallNumber = $number2;
    // }
    // else {
    //     $largeNumber = $number2;
    //     $smallNumber = $number1;
    // }

    function hcf($) {
        $hcf = 1;
        for ($i = 2; $i < $number1 && $i < $number2 ; $i++) { 
            if ($number1 % $i == 0 && $number2 % $i == 0) {
                $hcf = $i;
            }
        }
        return $hcf;
    }

    for ($i = $largeNumber;  ; $i++) { 

        if ($number1 % $i == 0 && $number2 % $i == 0) {
            $hcf = $i;
            break;
        }

    }

    echo 'LCM of '.$number1.' and '.$number2.': ';

?>