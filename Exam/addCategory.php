<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add New Category</title>
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
                
                <h2>Add New Category</h2>
                <div>
                    <label>Title</label>
                        <input type="text" name="category[title]"><br>
                    
                    <label>Content</label>
                        <input type="text" name="category[content]"><br>

                    <label>URL</label>
                        <input type="text" name="category[URL]"><br>

                    <label>Meta Title</label>
                        <input type="text" name="category[metaTitle]"><br>
                        
                    <label>Parent Category</label>
                    <?php $result = getParentCategory()?>
                        <select name="category[id_parent_category]">
                        <?php while ($row = mysqli_fetch_assoc($result)):?>
                            <option value="<?php echo $row['id_parent_category']?>">
                            <?php echo $row['parent_category_name'];?>
                            </option>
                        <?php endwhile;?>
                    </select><br>

                    <label>Image</label>
                        <input type="file" name="image"><br>
                </div><br>
                
                <input type="submit" value="SUBMIT" name="SubmitCategory" onclick="document.location.href='blogCategory.php'">
                
            </form>
        </div><br>
    </body>
</html>