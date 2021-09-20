<?php

namespace Controllers;

use Utils\Controller;
use GuzzleHttp\Client;

class FavoriteController extends Controller {

    public function actionIndex() {
        $this->render('search');
    }

    public function actionSearch() {
        $this->render('search');
    }
}