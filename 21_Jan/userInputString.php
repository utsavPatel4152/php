<form action="userInputString.php" method="GET">
    <br><label>Enter String: </label><input type="text" name="main_string"><br>
    <br><label>Find: </label><input type="text" name="find_string"><br>
    <br><label>Replace with: </label><input type="text" name="replace_string"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<style>
    label{
        display:inline-block;
        width:100px;
    }
</style>

<?php

     //echo "<pre>";
     //print_r($_SERVER);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if( isset($_POST['find_string'], $_POST['replace_string'], $_POST['main_string']) ) {
            echo '<br>'.str_replace($_POST['find_string'], $_POST['replace_string'], $_POST['main_string']);
        }
        else {
            echo '<script>alert("Method must be POST")</script>';
        }
    }

?>