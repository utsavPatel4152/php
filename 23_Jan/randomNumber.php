<?php

    $random = rand();

    if (isset($_GET['roll'])) {
        $dice = rand(1, 6);
        echo $dice;
    }

?>

<form action="randomNumber.php" method="GET">
    <input type="submit" value="Roll Dice" name="roll">
</form>