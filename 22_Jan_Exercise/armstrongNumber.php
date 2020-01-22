<?php

    //Write a program to find whether a number is Armstrong or not

    $number = 153;
    $temp = 153;
    $sum = 0;

    while($number != 0) {
        $digit = $number % 10;
        $sum = $sum + ($digit * $digit * $digit);
        $number = $number / 10;
    }

    if($temp == $sum) {
        echo 'Number is Armstrong.';
    }
    else {
        echo 'Number is not Armstrong.';
    }

?>