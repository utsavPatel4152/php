<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Product;

class Admin extends \Core\Controller
{
    public function login()
    {
        View::renderTemplate('Admin/index.html');

        if(isset($_POST['submit']))
        {
            if ($_POST['username'] === 'aaa' && $_POST['password'] === 'aaa') {
                header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/dashboard");
            }
            else {
                echo 'Invalid Username or Password';
            }
        }
    }

    public function dashboard(){
        View::renderTemplate('Admin/dashboard.html');
    }
    
    public function manageProduct() {
        $product = Dataoperation::getAllData('products'); 
        View::renderTemplate("Admin/Showproduct.html",['showproducts'=>$product]);   
    }

    public function manageCategory() {
        $category = Dataoperation::getAllData('categories'); 
        View::renderTemplate("Admin/Showcategory.html",['showcategories'=>$category]);   
    }

    public function manageCms() {
        $cms = Dataoperation::getAllData('cms_page');
        View::renderTemplate("Admin/Showcms.html",['showcmspage'=>$cms]);
    }

}

?>