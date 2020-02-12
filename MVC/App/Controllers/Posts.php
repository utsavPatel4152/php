<?php

namespace App\Controllers;

use \Core\View;

    class Posts extends \Core\Controller {

        public function index() {
            View::renderTemplate('Posts/index.html');
            echo 'Hello from index action from Posts controller.';
            // echo '<p>Query string parameters: <pre>' .
            // htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
        }

        public function addNew() {
            echo 'Hello from addNew action from Posts controller.';
        }

        public function edit() {
            echo 'Hello from edit action from Posts controller.';
            echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
        }
    }

?>