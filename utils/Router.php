<?php

namespace Utils;

class Router {

    public function resolve() {

        $path = "";
        $controllerName = "";
        $actionName = "";

        if(key_exists("PATH_INFO", $_SERVER)) {

            preg_match_all('/\w+/', $_SERVER["PATH_INFO"], $res);
            $res = $res[0];

            $path = implode("\\", array_slice($res, 0, count($res) - 2));
            $controllerName = $res[count($res) - 2];
            $actionName = $res[count($res) - 1];

            $controllerName = ucfirst($controllerName);
            $actionName = ucfirst($actionName);

            $className = $this->controllerExists($path, $controllerName);
            if(class_exists($className)) {
                $controller = new $className;
                $controller->execute($actionName, $_SERVER["QUERY_STRING"] ?? NULL);
            } else if(class_exists($className = $this->controllerExists($path.($controllerName ? "\\".lcfirst($controllerName) : lcfirst($controllerName)), $actionName))) {
                $controller = new $className;
                $controller->execute("Index");
            } else {
                echo $className."<br>";
                echo "Error 404";
            }
        } else {
            $controllerName = "Index";
            $actionName = "Index";
            $className = $this->controllerExists("", $controllerName);
            $controller = new $className;
            $controller->execute($actionName);
        }

    }

    private function controllerExists($path, $controllerName) {
        if($path)
            $path = $path."\\";
            
        return "Controllers\\$path{$controllerName}Controller";
    }

}
