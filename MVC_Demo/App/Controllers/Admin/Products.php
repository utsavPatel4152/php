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
        View::renderTemplate('Admin/Product/addProduct.html');
    }

    public function addProductToDB()
    {
        extract($_POST['product']);

        $check = dbOperations::insertData($_POST['product'], 'products');

        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/products/product");
        }
        else {
            echo 'Record not inserted';
            View::renderTemplate('Admin/Product/addProduct.html');    
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

        $products = dbOperations::getData('`products`','`productId`',$id);
        array_push($products[0],'update');
    
        View::renderTemplate('Admin/Product/addProduct.html',['product'=>$products[0]]);

    }

    public function updateProduct()
    {
        $id = $_GET['id'];
        extract($_POST['product']);

        $check = dbOperations::updateData('products', 'productId', $id, $_POST['product']);
    
        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/products/product");
        }
        else{
            echo 'Not updated';
            View::renderTemplate('Admin/Product/addProduct.html');
        }
    }

}

?>