<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add New Blog Spot</title>
    </head>

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
                        <input type="text" name="title"><br>
                    
                    <label>Content</label>
                        <input type="text" name="content"><br>

                    <label>URL</label>
                        <input type="text" name="URL"><br>

                    <label>Published At</label>
                        <input type="date" name="PublishedAt"><br>

                    <label>Image</label>
                        <input type="file" name="image"><br>
                </div><br>
                
                <input type="submit" value="SUBMIT" name="SubmitBlog">
                
            </form>
        </div><br>
    </body>
</html>