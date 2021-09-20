<?php

namespace Utils;

class View {

    private string $viewName;
    private array $data;

    public function __construct($viewName, $data = []) {
        $this->viewName = $viewName;
        $this->data = $data;
    }

    public function render() {
        include_once "../layout/main.php";
    }

    public function renderBody() {
        include_once "../views/{$this->viewName}.php";
    }
}