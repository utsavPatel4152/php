<form action="calender.php" method="POST">
    <label>Month : </label><input type="number" name="month"><br><br>
    <label>Year : </label><input type="number" name="year"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>

<?php

    session_start();

    if (isset($_POST['month']) && isset($_POST['year'])) {
        if(!empty($_POST['month']) && !empty($_POST['year'])) {

            $month = $_POST['month'];
            $year = $_POST['year'];

            $_SESSION['month'] = $month;
            $_SESSION['year'] = $year;
            
            if ($month < 1 || $month > 12 || strlen($year) != 4) {
                echo 'Invalid Month or Year';
            }
            
            else {
                calendar($month,$year);
            }
            
        }
        else {
            echo 'Fill the fields.';
        }
    }
    else{
        calendar($_SESSION['month'],$_SESSION['year']);
    }

    function calendar($month, $year){

        if ($month < 1 || $month > 12 || strlen($year) != 4) {
            echo 'Invalid Month or Year';
        }
        
        else {
            $rows = 1;
            $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $date = mktime(0, 0 ,0, $month, 1, $year);
            $offset = date("w", $date);

            echo '<table border="1">';
            echo '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';
            echo '<tr>';

            for($i = 0; $i < $offset; $i++) {
                echo '<td></td>';
            }
                
            for($day = 1; $day <= $totalDaysOfMonth; $day++) {
                if(($day + $offset - 1) % 7 == 0 && $day != 1) {
                    echo '</tr><tr>';
                    $rows++;
                }
                echo '<td>'.$day.'</td>';
            }

            while( ($day + $offset) <= $rows * 7) {
                echo '<td></td>';
                $day++;
            }

            echo '</tr></table>';
        }
    }
?>

<style>
    label {
        display : inline-block;;
        width : 70px;
    }
    td {
        text-align:center;
    }
</style>