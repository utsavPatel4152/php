<?php

    $match = 'pass123';
    
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if (!empty($password)) {

            if ($password === $match) {
                echo 'That is Correct';
            }
            else {
                echo 'That is Incorrect';
            }
            
        }
        else {
            echo 'Enter the password';
        }
    }
?>

<form action="VariablePOST.php" method="POST">
    <label>Password : </label><input type="password" name="password"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>