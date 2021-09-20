<?php

namespace Controllers;

use Utils\Controller;

class SearchController extends Controller {
    
    public function actionIndex() {
        $this->render('search');
    }
}