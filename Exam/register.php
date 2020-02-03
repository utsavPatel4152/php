<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration Form</title>
    </head>

    <?php require_once 'setData.php'; ?>

    <style>
        label{
            display: inline-block;
            width: 200px;
            margin: 5px;
        }
    </style>

    <body>
        <div class="main outer">
            <form action="register.php" method="POST">
                
                <h2>REGISTER</h2>
                <div>
                    <?php $prefix = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr']; ?>
                    <label for="prefix">Prefix</label>
                    <select name="prefix">
                            <?php foreach ($prefix as $prefixValue) : ?>
                                <option value="<?php echo $prefixValue;?>"><?php echo $prefixValue;?></option>
                            <?php endforeach ?>
                    </select><br>

                    <label>First Name</label>
                        <input type="text" name="firstName"><br>
                    
                    <label>Last Name</label>
                        <input type="text" name="lastName"><br>
                    
                    <label>Email</label>
                        <input type="email" name="email"><br>
                        
                    <label>Mobile Number</label>
                        <input type="number" name="mobileNo"><br>
                    
                    <label>Password</label>
                        <input type="password" name="password"><br>
                    
                    <label>Confirm Password</label>
                        <input type="password" name="confirmPassword"><br>
                        
                    <label>Information</label>
                        <input type="text" name="information"></textarea><br>
                </div><br>

                <input type="checkbox">Hereby, I Accept Terms & Conditions<br><br>
                <input type="button" name="Submit" value="Submit" onclick="document.location.href='blogPost.php'">
                
            </form>
        </div>
    </body>
</html>