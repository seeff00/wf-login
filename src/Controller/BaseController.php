<?php

namespace App\Controller;

abstract class BaseController {
    /**
     * Renders passed view file and accept as second parameter the data required in the view
     * @param $view
     * @param array $data
     * @return void
     */
    protected function render($view, array $data = []) {
        extract($data);

        include __DIR__ . "/../View/$view.php";
    }
}