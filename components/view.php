<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:39
 */
class View {
    private $content;

    public function __set($name, $value) {
        $this->{$name} = $value;
    }

    function generate($templateView, $mainView) {
        if (!$mainView) {
            echo 'Установите вид!'; die;
        }

        $this->content = $this->getRenderHTML('views/' . $mainView);


        include 'views/' . $templateView;

    }
    public function getRenderHTML($path) {
        //var_dump($path);die;
        ob_start();
        include ($path);
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }

}