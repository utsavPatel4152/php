<?php

     if (isset($POST['day']) && isset($POST['date']) && isset($POST['month']) && isset($POST['year'])) {
        $day = $POST['day'];
        $date = $POST['date'];
        $month = $POST['month'];
        $year = $POST['year'];
        
        echo 'It\'s '.$day.' '.$date.' '.$month.' '.$year.' today.<br><br>';
     }

?>

<form action="VariablePOST2.php" method="POST">
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