<?php

    $string = 'This is a string and it is an example';

    $offset = 0;
    $find = 'is';
    $find_length = strlen($find);

    echo strpos($string, 'is', 15).'<br>';

    while($stringPosition = strpos($string, $find, $offset)) {
        echo '<strong>'.$find.'</strong> at position: '.$stringPosition.'<br>';
        $offset = $stringPosition + $find_length;
    }

?>