<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 22.09.2018
 * Time: 20:28
 */

include_once ROOT . '/models/Model_Blog.php';
include_once ROOT . '/controllers/Controller.php';

class BlogController extends Controller
{
    private $newsModel;

    function __construct()
    {
        parent::__construct();
        $this->newsModel = new Model_Blog();
    }
    public function actionBlog() {
        try {
            //$this->view->topNews = $this->newsModel->getTopNews();
            //$this->view->lastNews = $this->newsModel->getLastNews();
            //$this->view->commentNews = $this->newsModel->getNewsComments();
            $this->view->blogGet = $this->newsModel->getBlog();
            //$this->view->employeesNews = $this->newsModel->getEmployees();

            $this->view->generate('layouts/main_view.phtml', 'blog/blog.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
    public function actionDetail($id) {
        //var_dump($id);die;
        try {

            $this->view->blogGet = $this->newsModel->getBlogById($id);
            $this->newsModel->setView($id);


            $this->view->generate('layouts/main_view.phtml', 'detail/detail.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}