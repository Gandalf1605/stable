<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:55
 */
include_once ROOT . '/models/Model_News.php';
include_once ROOT . '/controllers/Controller.php';

class IndexController extends Controller {
    private $newsModel;

    function __construct()
    {
        parent::__construct();
        $this->newsModel = new Model_News();
    }

    public function actionIndex() {
        try {
            $this->view->topNews = $this->newsModel->getTopNews();
            $this->view->lastNews = $this->newsModel->getLastNews();
            $this->view->commentNews = $this->newsModel->getNewsComments();
            $this->view->generate('template_view.phtml', 'layouts/main_view.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}