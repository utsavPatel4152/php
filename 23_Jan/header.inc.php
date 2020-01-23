<?php
$scipt_name = $_SERVER['SCRIPT_NAME'];
?>

<form action="<?php echo $scipt_name; ?>" method="POST">
    <input type="submit" value="Submit" name="submit">
</form>