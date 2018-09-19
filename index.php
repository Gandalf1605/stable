<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:31
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once (ROOT . '/components/router.php');
require_once (ROOT . '/components/db.php');
require_once (ROOT . '/components/view.php');

$router = new Router();
$router->run();