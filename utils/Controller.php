<?php

namespace Utils;

use Utils\View;


class Controller {
    
    protected $db;

    public function __construct() {
        include_once "D:\\php\\Final\\config\\db.php";
        $this->db = $dbh;
    }

    public function execute($actionName, $params = "") {
        $this->{"action$actionName"}($params);
    }

    public function render($viewName, $data = array()) {
        $view = new View($viewName, $data);
        $view->render();
    }
}