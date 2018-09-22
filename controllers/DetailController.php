<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 22.09.2018
 * Time: 22:00
 */
include_once ROOT . '/models/Model_Blog.php';
include_once ROOT . '/controllers/Controller.php';

class DetailController extends Controller
{
    private $newsModel;

    function __construct()
    {
        parent::__construct();
        $this->newsModel = new Model_Blog();
    }
    public function actionDetail($id) {
        try {

            $this->view->blogGet = $this->newsModel->getBlogById($id);



            $this->view->generate('layouts/main_view.phtml', 'detail/detail.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}