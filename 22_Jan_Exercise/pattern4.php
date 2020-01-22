<?php

    /*  

    Write a program to print below format
    1
    1 2
    1 2 3
    1 2 3 4
    1 2 3 4 5
    1 2 3 4 5 6
    1 2 3 4 5 6 7
    1 2 3 4 5 6 7 8

    */ 

    $number = 8;

    for ($i = 1; $i <= $number; $i++) { 
        for ($j = 1; $j <= $i; $j++) { 
            echo $j.' ';
        }
        echo '<br>';
    }

?>