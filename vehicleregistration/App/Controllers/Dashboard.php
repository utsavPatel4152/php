<?php

namespace App\Controllers;

use App\Models\dbOperations;
use \Core\View;

class Dashboard extends \Core\Controller
{
    public function serviceRequestForm()
    {
        View::renderTemplate("serviceForm.html");
    }

    public function vehicleService()
    {
        if(isset($_POST['service']))
        {
            $serviceData = $_POST['service'];
            $lastId = dbOperations::insertData('service_registrations', $serviceData);
        }
        if($lastId != 0) {
            $getData = dbOperations::getAll('service_registrations');
            View::renderTemplate("dashboard.html", [
                'userData'=>$getData
            ]);
        }
    }
}

?>