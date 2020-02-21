<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    public function login()
    {
        View::renderTemplate("login.html");
    }

    public function registration()
    {
        View::renderTemplate("registration.html");
    }

}

?>