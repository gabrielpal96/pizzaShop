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
    private $con;

    public function __construct()
    {

    }

    private function con(){
        $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->db);
	      $this->con->set_charset("utf8");
        return  $this->con;
    }

    public function run($sql=null){
        if(!is_null($sql)){
            $con=$this->con();
            // $con->query("SET CHARACTER SET utf8");
            $con->query("SET NAMES utf8");
            return $con->query($sql);
        }else{
            echo "НЕ МОЖЕ ДА СЕ ИЗВЪРШЕ ЗАЯВКИТЕ" . "<br>";
        }

    }

    function lastId(){
	    return $this->con->insert_id;
    }

    function transaction(){
	    return $this->con()->begin_transaction();
    }
    function commit(){
	    return $this->con()->commit();
    }

	function rollback(){
		return $this->con()->rollback();
	}

		function prepare($stmt){
			return $this->con()->prepare($stmt);
		}

    public function save($sql){
        $con=$this->con();
        $con->query("SET NAMES utf8");
        return ($con->query($sql))? true:false;
    }

}