<?php
    
    //Write a program to print Factorial
    
    $number = 4;
    $factorial = 1;

    while ($number > 0) {
        $factorial = $factorial * $number;
        $number--;
    }

    echo 'Factorial is: '.$factorial;

?>