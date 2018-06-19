<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 19.6.2018 г.
 * Time: 18:01
 */

class profile
{
    private $db;
    public function __construct()
    {
        $this->db=new db();
    }

    public function getAddress(){
        session_start();
        $email=$_SESSION['email'];
        $sql = "SELECT `user`.`user_address`\n"

            . "FROM `user`\n"

            . "WHERE (`user`.`user_email` =\"$email\") ORDER BY `user_id`  DESC";
        $address=$this->db->run($sql)->fetch_assoc();
        return $address;
    }
    public function editAddress($address){
        session_start();
        $email=$_SESSION['email'];
        $sql = "SELECT `user`.`user_id`\n"

            . "FROM `user`\n"

            . "WHERE (`user`.`user_email` =\"$email\") ORDER BY `user_id`  DESC";
        $id=$this->db->run($sql)->fetch_assoc()['user_id'];
        $sql = "UPDATE `user` SET `user_address` = '$address' WHERE `user`.`user_id` = $id";
        $this->db->run($sql);
    }
}