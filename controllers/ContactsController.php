<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 22.09.2018
 * Time: 23:45
 */
include_once ROOT . '/models/Model_Blog.php';
include_once ROOT . '/controllers/Controller.php';

class ContactsController extends Controller
{
    private $newsModel;

    function __construct()
    {
        parent::__construct();
        $this->newsModel = new Model_Blog();
    }
    public function actionContacts() {
        try {

            if (isset($_POST['submit']) && isset($_POST['author'])) {
                var_dump($_POST['author']);die;
            }



            $this->view->generate('layouts/main_view.phtml', 'contacts/contacts.phtml');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}