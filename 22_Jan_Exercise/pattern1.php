<?php

    /*  

    Program to print the below format
    * * * * * * * * * * * * * * *
    * * * * * * * * * * * * *
    * * * * * * * * * * *
    * * * * * * * * *
    * * * * * * *
    * * * * *
    * * *
    *

    */ 

    $row = 5;
    $column = $row + ($row - 1);

    for ($i = $column; $i > 0; $i = $i - 2) { 
        for ($j = 0; $j < $i; $j++) { 
            echo '* ';
        }
        echo '<br>';
    }

?>