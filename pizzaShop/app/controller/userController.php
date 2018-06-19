<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 2.5.2018 г.
 * Time: 20:17
 */

class userController extends Controller
{

    public function index()
    {
        echo "hi user" . "<br>";
    }
    public function isLogin(){
        session_start();
        if(!empty($_SESSION["email"])){
            header('Location: ' . '/home/');
        }
    }

    public function registration()
    {
        $this->isLogin();
        $this->view('user' . DIRECTORY_SEPARATOR . 'registration');
        $this->view->render();
    }

    public function registrationA()
    {
        $this->model('user');

        $user = new user();
        if (empty($_POST)) {
            header('Location: ' . 'registration/');
        }
        if (!$user->checkEmail($_POST['email'])) {
            $user = new user($_POST['username'], $_POST['email'], $_POST['password'], $_POST['address']);
            if ($user->save() === true) {
                header('Location: ' . 'login/');
            }
        } else {
            echo 'mail exists';
        }

    }

    public function login()
    {
        $this->isLogin();
        $this->view('user' . DIRECTORY_SEPARATOR . 'login');
        $this->view->render();
    }

    public function loginProcess()
    {
        $this->model('user');
        $email = $_POST["email"];
        $pass = $_POST["Password"];
        echo $email . " <-> " . $pass . "<br>";

        $user = new user();
        if ($user->login($email, $pass)) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["isAdmin"]=($user->isAdmin($email))?true:false;

            echo "login " . "<br>";
             header('Location: ' . '/');
        } else {
            echo "no login" . "<br>";
        }
    }

    public function logout()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        session_destroy();
        //$_SESSION["email"]=null;
       header('Location: ' . '/');
    }





public function mail(){
 $this->model('Mailer');
 $mail = $this->model;
 $mail->sendMail();
}

}