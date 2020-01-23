<?php

     if (isset($_GET['day']) && isset($_GET['date']) && isset($_GET['month']) && isset($_GET['year'])) {
        $day = $_GET['day'];
        $date = $_GET['date'];
        $month = $_GET['month'];
        $year = $_GET['year'];
        
        echo 'It\'s '.$day.' '.$date.' '.$month.' '.$year.' today.<br><br>';
     }

?>

<form action="VariableGET.php" method="GET">
    <label>Day : </label><input type="text" name="day"><br><br>
    <label>Date : </label><input type="text" name="date"><br><br>
    <label>Month : </label><input type="text" name="month"><br><br>
    <label>Year : </label><input type="text" name="year"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>

<style>
    label{
        display : inline-block;;
        width : 70px;
    }
</style>