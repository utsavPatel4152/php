<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LOGIN</title>
    </head>

    <?php require_once 'GetSetData.php'; ?>
    <?php require_once 'setData.php'; ?>

    <style>
        label{
            display: inline-block;
            width: 100px;
            margin: 5px;
        }
    </style>

    <body>
        <div class="main outer" align="center">
            <form action="blogPost.php" method="POST">
                
                <h2>LOGIN</h2>
                <div>
                    <label>Email</label>
                        <input type="email" name="login[email]"><br>
                    
                    <label>Password</label>
                        <input type="password" name="login[password]"><br>
                </div><br>
                
                <input type="submit" value="LOGIN" name="login">
                
            </form><br>

            <form action="register.php" method="POST">
                <input type="submit" value="REGISTER" name="register">
            </form>

        </div><br>
    </body>
</html>