<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 14.5.2018 г.
 * Time: 15:20
 */

class errorController extends Controller
{
    public function error404(){
        $this->view('error' . DIRECTORY_SEPARATOR . "error404");
        $this->view->render();
    }
}