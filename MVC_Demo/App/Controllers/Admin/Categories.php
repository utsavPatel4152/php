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
        View::renderTemplate('Admin/Category/addCategory.html');
    }

    public function addCategoryToDB()
    {
        extract($_POST['category']);

        $check = dbOperations::insertData($_POST['category'], 'categories');

        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/categories/category");
        }
        else {
            echo 'Record not inserted';
            View::renderTemplate('Admin/Category/addCategory.html');    
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

        $categories = dbOperations::getData('`categories`','`categoryId`',$id);
        array_push($categories[0],'update');
    
        View::renderTemplate('Admin/Category/addCategory.html',['category'=>$categories[0]]);

    }

    public function updateCategory()
    {
        $id = $_GET['id'];
        extract($_POST['category']);

        $check = dbOperations::updateData('categories', 'categoryId', $id, $_POST['category']);
    
        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/categories/category");
        }
        else{
            echo 'Not updated';
            View::renderTemplate('Admin/Category/addCategory.html');
        }
    }

}

?>