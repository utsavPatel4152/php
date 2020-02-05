<?php require_once 'setData.php';
    if(isset($_GET['deleteBlogID'])) {
        deleteData('blog_spot', $_GET['deleteBlogID'], 'id_blogSpot');
    } 
    $fetchedData = fetchBlog(); 
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
        <title>Blog Posts</title>
    </head>

    <body>

        <input type="button" value="Manage Category" onclick="document.location.href='blogCategory.php'">&nbsp;
        <input type="button" value="My Profile">&nbsp;
        <input type="button" name="logout" value="Log Out" onclick="document.location.href='login.php'">

        <h2>Blog Posts</h2>
        <input type="button" value="Add Blog Spot" onclick="document.location.href='addBlogSpot.php'"><br><br>

        <table border="1px">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th colspan="2">Action</th>
                
            </tr>
            <?php foreach($fetchedData as $key):?>
                <tr>
                    <?php foreach($key as $field => $value):?>
                        <td><?php echo $value;?></td>
                    <?php endforeach;?>
                    <td><a href="addBlogSpot.php?updateBlogID=<?php echo $key['id_blogSpot'];?>">Edit</a>
                    <a href="blogPost.php?deleteBlogID=<?php echo $key['id_blogSpot'];?>">Delete</a></td>
                </tr>
            <?php endforeach;?>
        </table>

    </body>
</html>