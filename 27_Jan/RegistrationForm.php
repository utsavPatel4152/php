<?php

    session_start();
    extract($_POST);

    if(isset($submit)) {

        if (empty($firstname) || empty($lastname) || empty($dob) || empty($phoneno) 
        || empty($email) || empty($password) || empty($confirmpassword) || empty($add1)
        || empty($add2) || empty($company) || empty($city) || empty($state) || empty($country) || empty($postalcode)) {
            echo 'All fields are required!';
        }

        else if (isset($prefix) && isset($firstname) && isset($lastname) && isset($dob) && isset($phoneno)
        && isset($email) && isset($password) && isset($confirmpassword)
        && isset($add1) && isset($add2) && isset($company) && isset($city) && isset($state)
        && isset($country) && isset($postalcode)) {

            if (!preg_match("/^[a-zA-Z]/",$firstname)) {
                echo 'Invalid First Name!';
            }

            else if (!preg_match("/^[a-zA-Z]/",$lastname)) {
                echo 'Invalid Last Name!';
            }

            else if (!preg_match("/^[2-9]\d{2}\d{3}\d{4}$/",$phoneno)) {
                echo 'Invalid Phone number!';
            }

            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Invalid Email Format!';
            }

            else if ($password != $confirmpassword) {
                echo 'Password not matched!';
            }

            else if (!preg_match("/^[0-9]{6}$/",$postalcode)) {
                echo 'Invalid Postal Code!';
            }

            else {
                $_SESSION['prefix'] = $prefix;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['dob'] = $dob;
                $_SESSION['phoneno'] = $phoneno;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['confirmpassword'] = $confirmpassword;
                $_SESSION['add1'] = $add1;
                $_SESSION['add2'] = $add2;
                $_SESSION['company'] = $company;
                $_SESSION['city'] = $city;
                $_SESSION['state'] = $state;
                $_SESSION['country'] = $country;
                $_SESSION['postalcode'] = $postalcode;
                $_SESSION['discribeYourself'] = $discribeYourself;
                $_SESSION['business'] = $business;
                $_SESSION['client'] = $client;
                $_SESSION['hobbies'] = $hobbies;

                // $getTouch = [];
                // foreach ($getTouch as $value) {
                //     array_push($getTouch, $value);
                // }
                // $_SESSION['getTouch'] = $getTouch;

                // if(isset($post)) {
                //     $_SESSION['post'] = "checked";
                // }
                // if(isset($emailckeckbox)) {
                //     $_SESSION['emailckeckbox'] = "checked";
                // }
                // if(isset($sms)) {
                //     $_SESSION['sms'] = "checked";
                // }
                // if(isset($phone)) {
                //     $_SESSION['phone'] = "checked";
                // }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration Form</title>
    </head>
    <body>
        <h2 align="center">Registration Form</h2>
        <form action="RegistrationForm.php" method="POST">
    
            <br>
            <fieldset>

                <legend>YOUR ACCOUNT DETAILS</legend>
                <select name="prefix">
                    <option value="Mr" <?php if($_SESSION['prefix'] == "Mr") {echo 'selected';}?>>Mr</option>
                    <option value="Miss" <?php if($_SESSION['prefix'] == "Miss") {echo 'selected';}?>>Miss</option>
                    <option value="Ms" <?php if($_SESSION['prefix'] == "Ms") {echo 'selected';}?>>Ms</option>
                    <option value="Mrs" <?php if($_SESSION['prefix'] == "Mrs") {echo 'selected';}?>>Mrs</option>
                    <option value="Dr" <?php if($_SESSION['prefix'] == "Dr") {echo 'selected';}?>>Dr</option>
                </select><br><br>
                <label>First Name: </label>
                    <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"><br><br>
                <label>Last Name: </label>
                    <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>"><br><br>
                <label>Date of Birth: </label>
                    <input type="date" name="dob" value="<?php echo $_SESSION['dob']; ?>"><br><br>
                <label>Phone Number: </label>
                    <input type="text" name="phoneno" value="<?php echo $_SESSION['phoneno']; ?>"><br><br>
                <label>Email: </label>
                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
                <label>Password: </label>
                    <input type="password" name="password" value="<?php echo $_SESSION['password']; ?>"><br><br>
                <label>Confirm Password: </label>
                    <input type="password" name="confirmpassword" value="<?php echo $_SESSION['confirmpassword']; ?>"><br><br>
    
            </fieldset><br>

            <fieldset>

            <legend>ADDRESS INFORMATION</legend>
            <label>Address line 1: </label>
                <input type="text" name="add1" value="<?php echo $_SESSION['add1']; ?>"><br><br>
            <label>Address line 2: </label>
                <input type="text" name="add2" value="<?php echo $_SESSION['add2']; ?>"><br><br>
            <label>Company: </label>
                <input type="text" name="company" value="<?php echo $_SESSION['company']; ?>"><br><br>
            <label>City: </label><input type="text" name="city" value="<?php echo $_SESSION['city']; ?>"><br><br>
            <label>State: </label>
                <input type="text" name="state" value="<?php echo $_SESSION['state']; ?>"><br><br>
            <label>Country</label>

            <select name="country">
                <option value="india" <?php if($_SESSION['country'] == "india") {echo 'selected';}?>>india</option>
                <option value="usa" <?php if($_SESSION['country'] == "usa") {echo 'selected';}?>>usa</option>
                <option value="uk" <?php if($_SESSION['country'] == "uk") {echo 'selected';}?>>uk</option>
                <option value="canada" <?php if($_SESSION['country'] == "canada") {echo 'selected';}?>>canada</option>
                <option value="china" <?php if($_SESSION['country'] == "china") {echo 'selected';}?>>china</option>
            </select><br><br>

            <label>Postal Code: </label>
                <input type="text" name="postalcode" value="<?php echo $_SESSION['postalcode']; ?>"><br><br>
            </fieldset>

            <br><input type="checkbox" value="information" id="setbutton" name="information">
                Check for other information&nbsp;<br><br>
        
            <fieldset id="set3">
                <legend>OTHER INFORMATION</legend>
                <label>Discribe Yourself: </label>
                    <textarea row="6" cols="30" name="discribeYourself"><?php echo $_SESSION['discribeYourself']; ?></textarea><br><br>
                <label>Profile Image: </label>
                    <input type="file" name="image" accept="image/*"><br><br>
                <label>Certificate Upload: </label>
                    <input type="file" name="file" accept=".pdf"><br><br>

                <label>How long have you been in business?</label>
                    <input type="radio" name="business" value="Under 1 year" <?php if($_SESSION['business'] == "Under 1 year"){echo "checked";}?>>under 1 year&nbsp;
                    <input type="radio" name="business" value="1-2 Years" <?php if($_SESSION['business'] == "1-2 Years"){echo "checked";}?>>1-2 Years&nbsp;
                    <input type="radio" name="business" value="2-5 Years" <?php if($_SESSION['business'] == "2-5 Years"){echo "checked";}?>>2-5 Years&nbsp;
                    <input type="radio" name="business" value="5-10 Years" <?php if($_SESSION['business'] == "5-10 Years"){echo "checked";}?>>5-10 Years&nbsp;
                    <input type="radio" name="business" value="Over 10 Years" <?php if($_SESSION['business'] == "Over 10 Years"){echo "checked";}?>>Over 10 Years&nbsp;<br><br>

                <label>Number of unique clients you see each week?</label>
                <select name="client">
                    <option value="1-5" <?php if($_SESSION['client'] == "1-5") {echo 'selected';}?>>1-5</option>
                    <option value="6-10" <?php if($_SESSION['client'] == "6-10") {echo 'selected';}?>>6-10</option>
                    <option value="11-15" <?php if($_SESSION['client'] == "11-15") {echo 'selected';}?>>11-15</option>
                    <option value="15+" <?php if($_SESSION['client'] == "15+") {echo 'selected';}?>>15+</option>
                </select><br><br>

                <label>How do you like us to get in touch with you?</label>
                <input type="checkbox" value="post" name="getTouch">Post&nbsp;
                <input type="checkbox" value="emailckeckbox" name="getTouch">Email&nbsp;
                <input type="checkbox" value="sms" name="getTouch">SMS&nbsp;
                <input type="checkbox" value="phone" name="getTouch">Phone&nbsp;<br><br>

                <label>Hobbies</label>
                <select name="hobbies" multiple>
                    <option value="listening music" <?php if($_SESSION['hobbies'] == "listening music") 
                        { echo 'selected'; }?> name="hobbies">Listening to Music</option>
                    <option value="travelling" <?php if($_SESSION['hobbies'] == "travelling") 
                        { echo 'selected'; }?> name="hobbies">Travelling</option>
                    <option value="blogging" <?php if($_SESSION['hobbies'] == "blogging") 
                        { echo 'selected'; }?> name="hobbies">Blogging</option>
                    <option value="sport" <?php if($_SESSION['hobbies'] == "sport") 
                        { echo 'selected'; }?> name="hobbies">Sports</option>
                    <option value="art" <?php if($_SESSION['hobbies'] == "art") 
                        { echo 'selected'; }?> name="hobbies">Art</option>
                </select><br><br>
        
            </fieldset>

            <input type="submit" value="Submit" name="submit">
        </form>
    </body>

    <script> 
        document.getElementById("setbutton").addEventListener('change', function() {
            if(document.getElementById("setbutton").checked) {
                document.getElementById("set3").style.display = "block";
        }
            else {
                document.getElementById("set3").style.display = "none";
            }
        });
    </script>

</html>

<style>
    label {
        display: inline-block;
        width: 300px;
    }
    #set3 {
        display: none;
        margin: 10px;
    }
</style>

<?php

    foreach ($_SESSION as $fieldname => $value) {
        echo '<br>'.$fieldname.' : '.$value.'<br>';
    }

?>