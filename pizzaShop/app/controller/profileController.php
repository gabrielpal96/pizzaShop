<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 19.6.2018 г.
 * Time: 17:57
 */

class profileController extends Controller
{
    public function index(){
        $this->view('profile' . DIRECTORY_SEPARATOR . "index");
        $this->view->render();
    }
    public function editAddress(){
        $this->model('profile');

        $this->view('profile' . DIRECTORY_SEPARATOR . "editAddress",["address"=>$this->model->getAddress()]);
        $this->view->render();
    }
    public function editAddressAction(){
        $this->model('profile');
        $address=$_POST["address"];
        $profile=new profile();
        $profile->editAddress($address);
        header('Location: ' . '/profile/editAddress');
    }

}