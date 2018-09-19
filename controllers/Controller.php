<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:56
 */
class Controller
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }
}