<?php
    $string = 'This is php tutorial.';
    $word_count = str_word_count($string, 1, '.');
    print_r($word_count);

    $string = 'abcd123';
    $shuffled_string = str_shuffle($string);
    echo "<br>".$shuffled_string;

    echo "<br>".strlen($string);

    echo "<br>".substr($string, 3, strlen($string)/2);

    echo "<br>".strrev($string);

    $string1 = "This is computer. I will discuss about it.";
    $string2 = "Many people are living ";

    similar_text($string1, $string2, $result);
    echo "<br>Similarity in Percentage : ".$result;

    $string = "\t\tThis is trim function.";
    echo "<br>".$string;
    echo "<br>".strlen($string);
    var_dump($string);
    
    $answer = trim($string);
    var_dump($answer);
    
    echo "<br> Trimmed string length: ".strlen($answer);

    $string = 'This is a <anyHTMLTag src="anyProperty"> string.';
    $string_slashes = htmlentities(addslashes($string));
    echo "<br>".$string_slashes;
?>