<?php

namespace App\Controllers;

use \Core\View;

    class Home extends \Core\Controller {

        protected function before() {
            // echo '(before)<br>';
            // return false;
        }

        protected function after() {
            // echo '<br>(after)';
        }

        public function indexAction() {
            // echo 'Hello from index action from Home controller.';
            View::render('Home/index.php', [
                'name'   => 'XYZ',
                'colours' => ['red', 'green', 'blue']
            ]);
            View::renderTemplate('Home/index.html', [
                'name'   => 'ABC',
                'colours' => ['yellow', 'black', 'green']
            ]);
        }

    }

?>