<?php
    function myName () {
        echo "Utsav";
    }
    echo "My Name is: ";
    myName();


    function addNumbers ($number1, $number2) {
        return $number1 + $number2;
    }
    function divideNumbers ($number1, $number2) {
        return $number1 / $number2;
    }
    $answer = divideNumbers (addNumbers(10,20), addNumbers(7,3));
    echo $answer;


    function displayDate ($date, $month, $year) {
        return '<br>It\'s '.$date.' '.$month.' '.$year;
    }
    echo displayDate (20, 'January', 2020);

    
    function calculateAge ($yearOfBirth) {
        return (2020 - $yearOfBirth);
    }
    echo "<br>".calculateAge (1998);

    
    $user_ip = $_SERVER['REMOTE_ADDR'];
    function print_ip() {
        global $user_ip;
        $string = 'IP address is : '.$user_ip;
        echo $string;
    }
    print_ip();

?>