<?php
    if(1){
        echo "True";
    }
    else{
        echo "False";
    }

    if(1==1){
        echo "<br>Correct";
    }
    else{
        echo "<br>Incorrect";
    }

    $temp;

    if($temp == ''){
        echo "Empty";
    }

    else if($temp == 5){
        echo "<br>value of Temp = $temp";
    }
    else{
        echo "<br>Not number 5";
    }

    $str = 10;

    /*if($str == lang){
        echo "String = Number";
    }
    else{
        echo "Not matched";
    }
    */

    if($str == "10"){
        echo "<br>String = Number";
    }
    else{
        echo "<br>Not matched";
    }
?>