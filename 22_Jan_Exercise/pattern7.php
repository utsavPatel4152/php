<?php

    /*  

    How to print this Pattern:
    *0
    ***00
    ******000
    **********0000
    ***************00000

    */ 

    $row = 5;
    $result = 1;

    for ($i = 1; $i <= $row; $i++) { 
        for ($j = 1; $j <= $result; $j++) { 
            echo '*';
        }
        for ($k = 1; $k <= $i; $k++) {
            echo '0';
        }
        $result = $result + $i+1;
        echo '<br>';
    }

?>