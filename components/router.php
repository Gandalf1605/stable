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
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri); // получаем строку адреса в нужном нам виде
                //var_dump($internalRoute);die;
                $segments = explode('/', $internalRoute); // разбиваем строку адреса на части в массив

                $controllerName = ucfirst(array_shift($segments) . 'Controller'); // первый элемент массива берём в имя контроллера

                $actionName = 'action' . ucfirst(array_shift($segments)); // второй элемент массива берём в имя экшена-обработчика
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