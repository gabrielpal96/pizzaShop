<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 23.4.2018 г.
 * Time: 18:34
 */

class View
{
    protected $view_file;
    protected $view_data;
    public function __construct($view_file,$view_data)
    {
        $this->view_file=$view_file;
        $this->view_data=$view_data;
    }
    public function render(){
        $path=VIEW.$this->view_file.'.php';

        if(file_exists($path)){
            include $path;
        }
    }
    public function getAction(){
        return (explode('\\',$this->view_file))[1];
    }

}