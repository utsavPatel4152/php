<?php

    /*  

    Write a program to print the below format : 
    1 5 9
    2 6 10
    3 7 11
    4 8 12

    */ 

    $row = 5;
    $column = $row - 1;
    $count = 1;

    for ($i = 1; $i <= $row; $i++) { 
        for ($j = 1; $j <= $column; $j++) { 
            echo $count.' ';
            $count = $count + $row;
        }
        $count = $i+1;
        echo '<br>';
    }

?>