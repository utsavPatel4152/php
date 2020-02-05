<?php require_once 'setData.php';
    if(isset($_GET['deleteCategoryID'])) {
        deleteData('category', $_GET['deleteCategoryID'], 'id_category');
    } 
    $fetchedData = fetchCategory();
?>

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
        <title>Blog Category</title>
    </head>

    <body>

        <input type="button" value="Manage Category" onclick="document.location.href='blogCategory.php'">&nbsp;
        <input type="button" value="My Profile">&nbsp;
        <input type="button" value="Log Out" onclick="document.location.href='login.php'">

        <h2>Blog Category</h2>
        <input type="button" value="Add Category" onclick="document.location.href='addCategory.php'"><br><br>

        <table border="1px">
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach($fetchedData as $key):?>
            <tr>
            <?php foreach($key as $field => $value):?>
            <td><?php echo $value;?></td>
            <?php endforeach;?>
            <td><a href="addCategory.php?updateCategoryID=<?php echo $key['id_category'];?>">Edit</a>
            <a href="blogCategory.php?deleteCategoryID=<?php echo $key['id_category'];?>">Delete</a></td>
            </tr>
        <?php endforeach;?>
    </table>

    </body>
</html>