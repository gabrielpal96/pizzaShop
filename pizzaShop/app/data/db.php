<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 27.4.2018 г.
 * Time: 14:02
 */

class db
{
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $db="pizzashop";

    public function __construct()
    {

    }

    private function con(){
        $con=mysqli_connect($this->servername,$this->username,$this->password,$this->db);
        return $con;
    }

    public function run($sql){
        $con=$this->con();
       // $con->query("SET CHARACTER SET utf8");
        $con->query("SET NAMES utf8");
       return $con->query($sql);
    }
    public function save($sql){
        $con=$this->con();
        $con->query("SET NAMES utf8");
        return ($con->query($sql))? true:false;
    }

}