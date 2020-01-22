<?php

    /*  

    How to write a Floyd's Triangle? 
    1
    23
    456
    78910
    1112131415

    */ 

    $row = 5;
    $number = 1;

    for ($i = 1; $i <= $row; $i++) { 
        for ($j = 1; $j <= $i; $j++) { 
            echo $number.' ';
            $number++;
        }
        echo '<br>';
    }

?>