<?php

    //Write a program to print Reverse of any number

    $number = 123;
    $sum = 0;

    while ($number > 1) {
        $sum = $sum * 10;
        $sum = $sum + ($number % 10);
        $number = $number / 10;
    }
    echo 'Reverse Number is: '.$sum;

?>