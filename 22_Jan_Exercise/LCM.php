<?php

    // Program to find the LCM of two numbers.

    $number1 = 7;
    $number2 = 5;
    $counter = 1;
    $flag = 0;

    if ($number1 > $number2) {
        $largeNumber = $number1;
        $smallNumber = $number2;
    }
    else {
        $largeNumber = $number2;
        $smallNumber = $number1;
    }

    while ($flag == 0) {
        $answer = $counter * $smallNumber;

        if ($answer % $largeNumber == 0) {
            $flag = 1;
        }

        $counter++;
    }

    echo 'LCM of '.$number1.' and '.$number2.': '.$answer;

?>