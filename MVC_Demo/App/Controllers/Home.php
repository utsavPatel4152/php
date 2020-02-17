<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    public function index()
    {
        View::renderTemplate('Home/index.html');
    }

}

?>