<?php

    $string = 'This is php and it is an example.';

    $find = array('is', 'php', 'example');
    $replace = array('IS', 'PHP', 'EXAMple');

    echo substr_replace($string, 'name', 0, 4);
    echo '<br>'.$string;

    echo '<br>'.str_replace($find, $replace, $string);

?>