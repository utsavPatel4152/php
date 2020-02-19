<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\dbOperations;

class CMS extends \Core\Controller
{
    public function cms()
    {
        $cms = dbOperations::getAll('cms_pages');
        View::renderTemplate('Admin/CMS/cms.html', [
            'cms_pages' => $cms
        ]);
    }

    public function addCMS()
    {
        View::renderTemplate('Admin/CMS/addCMS.html');
    }

    public function addCMSToDB()
    {
        if(isset($_POST['cms']))
        {
            $preparedCMSData = $_POST['cms'];
            $lastId = dbOperations::insertData('cms_pages', $preparedCMSData);
            if($lastId != 0) {
                echo "Data inserted Succesfully!";
            }
            View::renderTemplate("Admin/CMS/addCMS.html");
        }
    }

    public function deleteCMS()
    {
        $id = $_GET['id'];

        $check = dbOperations::deleteData('cms_pages','cmsId', $id);

        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/CMS/cms");
        }
        else {
            echo 'Record not deleted';
            View::renderTemplate('Admin/CMS/addCMS.html');    
        }
    }

    public function editCMS()
    {
        $id = $_GET['id'];

        $cms_pages = dbOperations::getData('`cms_pages`','`cmsId`',$id);
        array_push($cms_pages[0],'update');
    
        View::renderTemplate('Admin/CMS/addCMS.html',['cms'=>$cms_pages[0]]);

    }

    public function updateCMS()
    {
        $id = $_GET['id'];
        extract($_POST['cms']);

        $check = dbOperations::updateData('cms_pages', 'cmsId', $id, $_POST['cms']);
    
        if ($check) {
            header("Location: http://localhost/cybercom/php/MVC_Demo/public/admin/CMS/cms");
        }
        else{
            echo 'Not updated';
            View::renderTemplate('Admin/CMS/addCMS.html');
        }
    }

}

?>