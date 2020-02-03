<?php
    session_start();

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blog Posts</title>
    </head>

    <?php require_once 'setData.php'; ?>

    <body>

        <input type="button" value="Manage Category" onclick="document.location.href='blogCategory.php'">&nbsp;
        <input type="button" value="My Profile">&nbsp;
        <input type="button" value="Log Out" onclick="document.location.href='login.php'">

        <h2>Blog Posts</h2>
        <input type="button" value="Add Blog Spot" onclick="document.location.href='addBlogSpot.php'">
    </body>
</html>