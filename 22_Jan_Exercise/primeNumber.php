<?php

    //To check whether a number is Prime or not.

    $number = 15;
    $flag = 0;

    for($i = 2; $i < $number; $i++) {
        if($number % $i == 0) {
            $flag = 1;
            break;
        }
    }

    if($flag == 1) {
        echo 'Not Prime Number';
    }
    else {
        echo 'Prime Number';
    }

?>