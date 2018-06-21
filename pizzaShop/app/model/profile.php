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

    public function getUserProfile(){
        $email=$_SESSION['email'];
        $sql = "SELECT `user`.`user_email`, `user`.`user_name`, `user`.`user_phone`, `user`.`user_address`\n"

            . "FROM `user`\n"

            . "WHERE (`user`.`user_email` =\"$email\") ORDER BY `user_id`  DESC";
        $address=$this->db->run($sql)->fetch_assoc();
        return $address;
    }
    public function getUser($email){
        $sql = "SELECT `user`.*\n"

            . "FROM `user`\n"

            . "WHERE (`user`.`user_email` =\"$email\") ORDER BY `user_id`  DESC";
       return $this->db->run($sql)->fetch_assoc();
    }
    public function editUserProfil($name,$phone,$address){

        $email=$_SESSION['email'];
        $sql = "SELECT `user`.`user_id`\n"

            . "FROM `user`\n"

            . "WHERE (`user`.`user_email` =\"$email\") ORDER BY `user_id`  DESC";
        $id=$this->db->run($sql)->fetch_assoc()['user_id'];

        $sql = "UPDATE `user` SET `user_name` = '$name', `user_phone` = '$phone', `user_address` = '$address' WHERE `user`.`user_id` = $id";
        $this->db->run($sql);
    }
}