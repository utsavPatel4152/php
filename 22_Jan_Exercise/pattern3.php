<?php

    /*  

    Program to print below format
    *
    * *
    * * *
    * * * *
    * * * * *
    * * * * * *
    * * * * * * *
    * * * * * * * *
    * * * * * * * * *

    */ 

    $number = 8;

    for ($i = 0; $i < $number; $i++) { 
        for ($j = 0; $j <= $i; $j++) { 
            echo '* ';
        }
        echo '<br>';
    }

?>