<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 17:56
 */
include_once ROOT . '/models/Model_About.php';
include_once ROOT . '/controllers/Controller.php';

class AboutController extends Controller
{
    private $newsModel;

    function __construct()
    {
        parent::__construct();
        $this->newsModel = new Model_About();
    }
    public function actionAbout() {
        try {

            $this->view->offersNews = $this->newsModel->getOffers();
            $this->view->employeesNews = $this->newsModel->getEmployees();

            $this->view->generate('layouts/main_view.phtml', 'about/about.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}