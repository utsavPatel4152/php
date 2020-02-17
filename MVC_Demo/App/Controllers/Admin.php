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

}

?>