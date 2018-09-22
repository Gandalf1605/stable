<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:38
 */
class Router {

    private $routes;

    public function __construct() {
        $routePath = ROOT . '/config/routes.php';
        $this->routes = include($routePath);
    }

    private function getUri() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    function run() {
        $uri = $this->getUri();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //var_dump($internalRoute);die;
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments) . 'Controller');
                //var_dump($controllerName);die;
                $actionName = 'action' . ucfirst(array_shift($segments));
                //var_dump($actionName);die;
                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result != NULL) {
                    break;
                }
            }
        }

    }

}