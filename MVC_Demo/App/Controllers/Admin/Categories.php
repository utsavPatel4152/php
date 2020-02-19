<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\dbOperations;

class Categories extends \Core\Controller
{
    public function category()
    {
        $category = dbOperations::getAll('categories');
        View::renderTemplate('Admin/Category/category.html', [
            'categories' => $category
        ]);
    }

    public function addCategory()
    {
        $parentCategory = dbOperations::getAll('categories', 'parentCategory IS NULL');
        View::renderTemplate('Admin/Category/addCategory.html', [
            'parentCategories'=>$parentCategory
        ]);
    }

    public function addCategoryToDB()
    {
        if(isset($_POST['category']))
        {
            $preparedCategoryData = $_POST['category'];
            $preparedCategoryData['image'] = $this->validateFile('categoryImage');
            $lastId = dbOperations::insertData('categories', $preparedCategoryData);
            if($lastId != 0) {
                echo "Data inserted Succesfully!";
            }
            View::renderTemplate("Admin/Category/addCategory.html");
        }
    }

    public function deleteCategory()
    {
        $id = $_GET['id'];

        $check = dbOperations::deleteData('categories','categoryId', $id);

        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/categories/category");
        }
        else {
            echo 'Record not deleted';
            View::renderTemplate('Admin/Category/addCategory.html');   
        }
    }

    public function editCategory()
    {
        $id = $_GET['id'];
        $parentCategory = dbOperations::getAll('categories', 'parentCategory IS NULL');
        $categories = dbOperations::getData('`categories`','`categoryId`',$id);
        array_push($categories[0],'update');
    
        View::renderTemplate('Admin/Category/addCategory.html',['parentCategories'=>$parentCategory, 'category'=>$categories[0]]);
    }

    public function updateCategory()
    {
        $id = $_GET['id'];
        $preparedCategoryData = $_POST['category'];
        $count = dbOperations::updateData('categories','categoryId', $id, $preparedCategoryData);
        if($count == 1) {
            echo "Data updated Successfully!";
        }
        View::renderTemplate('Admin/Category/addCategory.html');
    }

    public function validateFile($fieldName) {
        $uploadDir = '../public/uploads/';
        $uploadFile = $uploadDir . basename($_FILES[$fieldName]['name']);
        $acceptTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if(in_array($_FILES[$fieldName]['type'], $acceptTypes)) {
            move_uploaded_file($_FILES[$fieldName]['tmp_name'], $uploadFile);
            return $uploadDir . $_FILES[$fieldName]['name'];
        }
        else
            echo "<script> alert('please enter valid image $uploadFile'); </script>"; 
    }

}

?>