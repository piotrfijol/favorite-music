<?php

namespace Controllers;

use Utils\Controller;

class IndexController extends Controller {
    
    public function actionIndex() {
        $this->render('home');
    }
}