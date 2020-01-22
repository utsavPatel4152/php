<?php

    //Program to find whether a year is LEAP year or not.

    $year = 1900;

    if($year % 4 == 0) {
        if($year % 100 == 0) {    
            if($year % 400 == 0){
                echo $year.' is leap year.';
            }
            else {
                echo $year.' is not leap year.';
            }
        }
        else {
            echo $year.' is leap year.';
        }
    }
    else {
        echo $year.' is not leap year.';
    }

?>