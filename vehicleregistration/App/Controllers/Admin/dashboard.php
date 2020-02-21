<?php

namespace App\Controllers\Admin;

use App\Models\dbOperations;
use \Core\View;

class dashboard extends \Core\Controller
{
    public function showTable()
    {
        $getData = dbOperations::getAll('service_registrations');
        View::renderTemplate("admin.html", [
                'userData'=>$getData ]);
    }

    public function deleteRequest()
    {
        $id = $_GET['id'];

        $check = dbOperations::deleteData('service_registrations','service_id', $id);

        if ($check) {
            header("Location: http://localhost/cybercom/php/vehicleregistration/public/admin/dashboard/showTable");
        }
        else {
            echo 'Record not deleted';
        }
    }

    public function editRequest()
    {
        $id = $_GET['id'];
        $serviceData = dbOperations::getData('`service_registrations`','`service_id`',$id);
        // echo '<pre>';
        // print_r($serviceData);
        // echo '</pre>';
        View::renderTemplate("updateService.html", [
            'serviceData'=>$serviceData ]);
    }

    public function updateService()
    {
        $id = $_GET['id'];
        $updateData = $_POST['service'];
        $count = dbOperations::updateData('service_registrations','service_id', $id, $updateData);
        if($count == 1) {
            echo "Data updated Successfully!";
        }
        View::renderTemplate('updateService.html');
    }
    
}

?>