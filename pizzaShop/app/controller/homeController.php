<?php

class homeController extends Controller
{

    public function index($id=null){
       // echo 'id is '.$id . " and name is : ".$name;
       $this->model('pizza');
//        echo "<pre>";
//        print_r(explode('/',$_SERVER['PATH_INFO'])[3]);
//        echo"</pre>";
        $this->view('home\index',['pizza' => $this->model->getPizza($id),"cat"=>$this->model->getCategoriaPizza()]);
        $this->view->page_title = "this is home";
        $this->view->render();
    }


}