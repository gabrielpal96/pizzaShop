<?php

class Application
{
    protected $controller='homeController';
    protected $action='index';
    protected $prams=[];

    public function __construct()
    {
        $this->prepareURL();

    //  echo 'contro '.$this->controller , '<br>',$this->action, print_r($this->prams) ;

        if(file_exists(CONTROLLER. $this->controller. '.php')){

            $this->controller=new $this->controller;

            if(method_exists($this->controller,$this->action)){
                call_user_func_array([$this->controller,$this->action],$this->prams);
            }else{
                header('Location: ' . '/error/error404');
            }
        }

    }

    protected function prepareURL(){
        $request=trim($_SERVER["REQUEST_URI"],'/');


        if(!empty($request)){

            $url=explode('/',$request);

            $this->controller=isset($url[0]) ? $url[0].'Controller' : 'homeController';

            $this->action=isset($url[1]) ? $url[1] : 'index';

            unset($url[0],$url[1]);
            $this->prams = !empty($url) ? array_values($url) : [];

        }
    }
}