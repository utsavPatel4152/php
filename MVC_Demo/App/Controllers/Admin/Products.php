<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\dbOperations;

class Products extends \Core\Controller
{
    public function product()
    {
        $product = dbOperations::getAll('products');
        View::renderTemplate('Admin/Product/product.html', [
            'products' => $product
        ]);
    }

    public function addProduct()
    {
        $category = dbOperations::getAll('categories', 'parentCategory IS NOT NULL');
        View::renderTemplate('Admin/Product/addProduct.html', [
            'categories' => $category
        ]);
    }

    public function addProductToDB()
    {
        if(isset($_POST['product']))
        {
            $transitionData = [];
            $preparedProductData = $_POST['product'];
            $preparedProductData['image'] = $this->validateFile('productImage');
            $lastId = dbOperations::insertData('products', $preparedProductData);

            if($lastId != 0) {
                $transitionData['category_id'] = $_POST['categoryName'];
                $transitionData['product_id'] = $lastId;
                $lastId = dbOperations::insertData('products_categories', $transitionData);
                echo "Data inserted Succesfully!";
                View::renderTemplate("Admin/Product/addProduct.html");
            }
        }
    }

    public function deleteProduct()
    {
        $id = $_GET['id'];

        $check = dbOperations::deleteData('products','productId', $id);

        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/products/product");
        }
        else {
            echo 'Record not deleted';
            View::renderTemplate('Admin/Product/addProduct.html');    
        }
    }

    public function editProduct()
    {
        $id = $_GET['id'];
        $category = dbOperations::getAll('categories', 'parentCategory IS NOT NULL');
        $products = dbOperations::getData('`products`','`productId`',$id);
        array_push($products[0],'update');
    
        View::renderTemplate('Admin/Product/addProduct.html',['product'=>$products[0], 'categories'=>$category]);

    }

    public function updateProduct()
    {
        $productCategory = [];
        $id = $_GET['id'];
        extract($_POST['product']);

        $check = dbOperations::updateData('products', 'productId', $id, $_POST['product']);
    
        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/products/product");
        }
        $productCategory['product_id'] = $id;
        $productCategory['category_id'] = $_POST['categoryName'];
        $count = dbOperations::updateData('products_categories','product_id', $id, $productCategory);
        View::renderTemplate("Admin/Product/addProduct.html");
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