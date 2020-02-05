<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add New Blog Spot</title>
    </head>

    <?php require_once 'setData.php'; ?>

    <style>
        label{
            display: inline-block;
            width: 100px;
            margin: 5px;
        }
    </style>

    <body>
        <div class="main outer">
            <form method="POST">
                
                <h2>Add New Blog Spot</h2>
                <div>
                    <label>Title</label>
                        <input type="text" name="blog[title]"><br>
                    
                    <label>Content</label>
                        <input type="text" name="blog[content]"><br>

                    <label>URL</label>
                        <input type="text" name="blog[URL]"><br>

                    <label>Image</label>
                        <input type="file" name="blog[image]"><br>
                </div><br>
                    
                <lable>Category</lable>
                <?php $result = getParentCategory()?>
                <select name="category" multiple>
                    <?php while ($row = mysqli_fetch_assoc($result)):?>
                        <option value="<?php echo $row['parent_category_name']?>">
                            <?php echo $row['parent_category_name'];?>
                        </option>
                    <?php endwhile;?>
                </select><br><br>

                <input type="submit" value="SUBMIT" name="SubmitBlog">
                
            </form>
        </div><br>
    </body>
</html>