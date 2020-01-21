<?php

    $string = 'Check Length';

    echo strlen($string);

    echo '<br>'.strtolower($string);

    echo '<br>'.strtoupper($string);

    if(isset($_GET['user_name']) && !empty($_GET['user_name']) ) {
        $user_name_lowercase = strtoupper($_GET['user_name']);

        if($user_name_lowercase == 'hales') {
            echo 'This is lower case user name, '.$user_name_lowercase;
        }

        else {
            echo 'String not match.';
        }
    }

?>

<form action="stringFunctions2.php" method="GET">
    <br>Name: <input type="text" name="user_name"><br><br>
    <input type="submit" value="Submit">
</form>