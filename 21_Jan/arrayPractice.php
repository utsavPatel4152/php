<?php

    $food = array('Pizza', 'Salad', 'Vegetables');
    echo $food[2]."<br>";
    
    print_r($food);
    echo $food."<br>";

    $food[3] = 'New added';
    print_r($food);

    $food = array('Pizza'=>100, 'Salad'=>200, 'Vegetables'=>300);
    print_r($food);
    echo '<br>'.$food['Salad']."<br>";

    $food = array('Healthy'=>array('Salad', 'Vegetables', 15),
                'Unhealthy'=>array('Pizza','Burger','Popcorn', 'Wafers'));

    echo $food['Healthy'][2];
    echo '<br>'.$food['Unhealthy'][1].'<br>';

    foreach($food as $elements => $inner_array) {
        echo '<strong>'.$elements.'</strong><br>';

        foreach($inner_array as $items) {
            echo $items.'<br>';
        }
    }
?>