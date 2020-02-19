<?php

namespace App\Controllers;

use App\Models\dbOperations;
use \Core\View;

class Home extends \Core\Controller
{
    public function homeIndex() {
        $urlKey = $this->route_params['url'];
        $pageData = dbOperations::getAll('cms_pages', "urlKey='$urlKey'");
        $cmsData = dbOperations::getAll('cms_pages');
        $category = dbOperations::getAll('categories');
        View::renderTemplate("Home/$urlKey.html",['alldata'=>$cmsData,'cmsdata'=>$pageData[0],'categorydata'=>$category]);
    }
}

?>