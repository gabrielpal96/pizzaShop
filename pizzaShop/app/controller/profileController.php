<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 19.6.2018 г.
 * Time: 17:57
 */

class profileController extends Controller
{
    private function isLogin(){
        session_start();
        if(empty($_SESSION["email"])){
            header('Location: ' . '/home/');
        }
    }
    public function index(){
        $this->isLogin();
        $this->model('profile');
        $this->view('profile' . DIRECTORY_SEPARATOR . "index",["user"=>$this->model->getUser($_SESSION["email"])]);
        $this->view->render();
    }
    public function editProfile(){
        $this->isLogin();
        $this->model('profile');

        $this->view('profile' . DIRECTORY_SEPARATOR . "editProfile",["address"=>$this->model->getUserProfile()]);
        $this->view->render();
    }
    public function  editProfileAction(){
        $this->isLogin();
        $this->model('profile');
        $address=$_POST["address"];
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $profile=new profile();
        $profile->editUserProfil($name,$phone,$address);
        header('Location: ' . '/profile/');
    }

}