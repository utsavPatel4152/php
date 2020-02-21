<?php

namespace App\Controllers;

use App\Models\dbOperations;
use \Core\View;

class User extends \Core\Controller
{
    public function register()
    {
        if(isset($_POST['address']))
        {
            $addressData = $_POST['address'];
            $lastId = dbOperations::insertData('user_addresses', $addressData);
        }

        if(isset($_POST['users']))
        {
            $userData = $_POST['users'];
            $lastId = dbOperations::insertData('users', $userData);
        }

        if($lastId != 0) {
            View::renderTemplate("login.html");
        }
    }

    public function login()
    {
        if(isset($_POST['login']))
        {
            View::renderTemplate("dashboard.html");
        }
        
    }

}

?>