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
            <form method="POST">
                
                <h2>LOGIN</h2>
                <div>
                    <label>Email</label>
                        <input type="email" name="email" <?php $email = getValuesInSession('email'); ?>><br>
                    
                    <label>Password</label>
                        <input type="password" name="password" <?php $password = getValuesInSession('password')?>><br>
                </div><br>
                
                <input type="submit" value="LOGIN" name="login">
                <input type="button" value="REGISTER" name="register" onclick="document.location.href='register.php'">
                
            </form>
        </div><br>
    </body>
</html>