<style>
    table, tr, td {
        border : 1px solid black;
        border-collapse : collapse;
    }
</style>

<?php

    $number = 6;

    echo '<table>';

    for ($i = 1; $i <= $number; $i++) { 

        echo '<tr>';

        for ($j = 1; $j <= 5; $j++) { 
            echo '<td>'.$i.' * '.$j.' = '.$i * $j.'</td>';
        }
        
        echo '</tr>';
    }

    echo '</table>';
?>