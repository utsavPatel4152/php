<?php

    //Write a program in PHP to print Fibonacci series . 0, 1, 1, 2, 3, 5, 8, 13, 21, 34

    $first = 0;
    $second = 1;
    $count = 1;
    echo $first.', '.$second;
    
    while($count <= 8) {
        $next = $first + $second;
        echo ', '.$next;
        $first = $second;
        $second = $next;
        $count++;
    }

?>