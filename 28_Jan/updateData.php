<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Form</title>

    <?php require_once 'connection.php'; ?>

</head>
<style>
    label{
        display: inline-block;
        width: 300px;
        margin: 5px;
    }
    .otherInformation{
        display: none;
    }
</style>

<body>
    <div class="main outer">
        <form action="ModifiedRegForm.php?updateID=<?php echo $_GET['updateID']; ?>" method="POST">
            
            <h2>YOUR ACCOUNT DETAILS</h2>
            <div class="accountDetails" name="account[]">

                <?php $prefix = ['Mr', 'Miss', 'Ms', 'Mrs', 'Dr']; ?>
                <label for="prefix">Prefix</label>
                <select name="account[prefix]">
                        <?php foreach ($prefix as $prefixValue) : ?>
                            <option value="<?php echo $prefixValue;?>" <?php if ($prefixValue == getDataFromDatabase('account','prefix')) {echo 'selected';}?>><?php echo $prefixValue;?></option>
                        <?php endforeach ?>
                </select><br>

                <label>First Name</label>
                    <input type="text" name="account[firstName]" value="<?php echo getDataFromDatabase('account','firstName')?>"><br>
                
                <label>Last Name</label>
                    <input type="text" name="account[lastName]" value="<?php echo getDataFromDatabase('account','lastName')?>"><br>
                
                <label>Date of Birth</label>
                    <input type="date" name="account[dob]" value="<?php echo getDataFromDatabase('account','dob')?>"><br>
                
                <label>Phone Number</label>
                    <input type="text" name="account[phoneNo]" value="<?php echo getDataFromDatabase('account','phoneNo')?>"><br>

                <label>Email</label>
                    <input type="text" name="account[email]" value="<?php echo getDataFromDatabase('account','email')?>"><br>
                
                <label>Password</label>
                    <input type="password" name="account[password]" value="<?php echo getDataFromDatabase('account','password')?>"><br>
                
                <label>Confirm Password</label>
                    <input type="password" name="account[confirmPassword]" value="<?php echo getDataFromDatabase('account','confirmPassword')?>"><br>

            </div>
            
            <h2>ADDRESS INFORMATION</h2>
            <div class="addressDetails" name="address[]">
                <label>Address Line 1</label>
                    <input type="text" name="address[Address1]" value="<?php echo getDataFromDatabase('address','Address1')?>"></textarea><br>

                <label>Address Line 2</label>
                    <input type="text" name="address[Address2]" value="<?php echo getDataFromDatabase('address','Address2')?>"></textarea><br>
    
                <label>Company</label>
                    <input type="text" name="address[Company]" value="<?php echo getDataFromDatabase('address','Company')?>"><br>
                
                <label>City</label>
                    <input type="text" name="address[City]" value="<?php echo getDataFromDatabase('address','City')?>"><br>

                <label>State</label>
                    <input type="text" name="address[State]" value="<?php echo getDataFromDatabase('address','State')?>"><br>
                
                <?php $Country = ['India', 'Japan', 'Korea', 'China', 'USA']; ?>
                    <label>Country</label>
                    <select name="address[Country]">
                        <?php foreach ($Country as $countryValue) : ?>
                            <option value="<?php echo $countryValue;?>" <?php if ($countryValue == getDataFromDatabase('address','Country')) {echo 'selected';}?>><?php echo $countryValue;?></option>
                        <?php endforeach ?>
                </select><br>
                
                <label>Postal Code</label>
                    <input type="text" name="address[Postal_Code]" value="<?php echo getDataFromDatabase('address','Postal_Code')?>"><br>
                
            </div>

            <br>
            <input type="checkbox" id="setbutton" name="information" onchange="showOtherInfo();">Check for other information<br>
            
            <div class="otherInformation" name="other[]" id="otherInformation">
                
                <h2>OTHER INFORMATION</h2>    
                <label>Describe Yourself</label>
                <textarea name="other[Describe_Yourself]" cols="30" rows="3"><?php echo implode(otherDataFromDatabase('other','Describe_Yourself'))?></textarea><br>
                
                <label>Profile Image</label>
                    <input type="file" name="other[Image]" value="<?php echo otherDataFromDatabase('other','Image')?>"><br>
                
                <label>Certificate Upload</label>
                    <input type="file" name="other[File]" value="<?php echo otherDataFromDatabase('other','File')?>"><br>
                
                <?php $Business = ['UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', 'OVER 10 YEARS']; ?>
                <label>How long have you been in business?</label>
                <?php foreach ($Business as $businessValue) : ?>
                        <input type="radio" name="other[Business]"  value="<?php echo $businessValue;?>"
                             <?php $check = array_intersect(otherDataFromDatabase('other', 'Business'), [$businessValue])
                            ? 'checked'
                            : '';
                            echo $check;?>>
                            <?php echo $businessValue;?>
                <?php endforeach ?><br>

                <?php $Client = ['1-5', '6-10', '11-15', '15+']; ?>
                <label>Number of unique clients you see each week?</label>
                <select name="other[Client]">
                    <?php foreach ($Client as $clientValue) : ?>
                        <option value="<?php echo $clientValue;?>" <?php $check = array_intersect(otherDataFromDatabase('other', 'Client'), [$clientValue])
                            ? 'selected'
                            : '';
                            echo $check;?>> <?php echo $clientValue?></option>
                    <?php endforeach ?>
                </select><br>
                
                <?php $getTouch = ['Post', 'Email', 'SMS', 'Phone']; ?>
                <label>How do you like us to get in touch with you?</label>
                <?php foreach ($getTouch as $getTouchValue) : 
                    $check = array_intersect(otherDataFromDatabase('other', 'getTouch'), [$getTouchValue])
                    ? 'checked'
                    : '';
                    ?>
                        <input type="checkbox" name="other[getTouch][]" value="<?php echo $getTouchValue;?>"
                            <?php echo $check; ?>><?php echo $getTouchValue;?>
                <?php endforeach ?><br>

                <?php $Hobbies = ['Listening to Music', 'Travelling', 'Blogging', 'Sports', 'Art']; ?>
                <label>Hobbies</label>
                <select name="other[Hobbies][]" multiple>
                    <?php foreach ($Hobbies as $hobbiesValue) : 
                        $select = array_intersect(otherDataFromDatabase('other','Hobbies'), [$hobbiesValue])
                        ? 'selected'
                        : '';
                        ?>
                        <option value="<?php echo $hobbiesValue;?>" <?php echo $select; ?>><?php echo $hobbiesValue?></option>
                    <?php endforeach ?>
                </select><br>
                
            </div><br>
            <input type="submit" value="Update" name="update">
        </form>
    </div><br>

    <script src="otherInfo.js"></script>
</body>
</html>