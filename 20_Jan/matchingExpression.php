<?php
    $string = 'This is matching expression';
    
    if (preg_match('/ssion/', $string)) {
        echo 'Match found.';
    }
    else {
        echo 'No match.';
    }

    if (preg_match('/  /', $string)) {
        echo 'Match found.';
    }
    else {
        echo 'No match.';
    }

    if (preg_match('/this /', $string)) {
        echo 'Match found.';
    }
    else {
        echo 'No match.';
    }
?>