<?php

namespace App\Controllers;

use \Core\View;

class Category extends \Core\Controller
{
    public function category()
    {       
        View::renderTemplate('Category/category.html');
    }

}

?>