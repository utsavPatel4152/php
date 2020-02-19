<?php

namespace App\Controllers;

use App\Models\dbOperations;
use \Core\View;

class FrontCategory extends \Core\Controller
{
    public function View() {
        $urlKey = $this->route_params['url'];
        $query = "SELECT
                    p.* 
                FROM products as p 
                INNER JOIN products_categories as pc 
                ON p.productId = pc.product_id
                INNER JOIN categories as c 
                ON c.categoryId = pc.category_id 
                 WHERE c.urlKey = '$urlKey'";

        $productData = dbOperations::queryData($query);
        $cmsData = dbOperations::getAll('cms_pages');
        $category = dbOperations::getAll('categories');
        View::renderTemplate("User/UserData.html", ['selectProduct'=>$productData, 
        'alldata'=>$cmsData, 'categorydata'=>$category]);
    }

    public function viewProduct() {
        $id = $this->route_params['id'];
        $productDetail = dbOperations::getAll('products', "productId = '$id'");
        $cmsData = dbOperations::getAll('cms_pages');
        $category = dbOperations::getAll('categories');
        View::renderTemplate("User/Showproductdetail.html",['productdetails'=>$productDetail[0]
        ,'alldata'=>$cmsData,'categorydata'=>$category]);
    }

}

?>