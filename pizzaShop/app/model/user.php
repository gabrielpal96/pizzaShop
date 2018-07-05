<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 2.5.2018 г.
 * Time: 20:17
 */

class user
{
    protected $name='';
    protected $email='';
    protected $pas='';
    protected $adr='';
    protected $phone='';
    /**
     * user constructor.
     * @param string $n
     * @param string $e
     * @param string $p
     * @param string $a
     */
    public function __construct($n="",$e="",$p="",$a="",$phone="")
    {
        $this->name=$n;
        $this->email=$e;
        $this->pas=$p;
        $this->adr=$a;
        $this->phone=$phone;

    }

    /**
     * @return string
     */
    public function save(){
        $db=new db();
        $email=$this->email;
        $pas=$this->pas;
        $new_password = password_hash($pas, PASSWORD_DEFAULT);
        $adr=$this->adr;
        $name=$this->name;
        $phone=$this->phone;
     try{
         $sql = "INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_phone`, `user_address`) VALUES (NULL, '$email', '$name', '$new_password', '$phone', '$adr');";

         if($db->save($sql)){
             return true;
         }else{
             echo false;
         }
     }catch (Exception $e){
         echo $e->getMessage();
     }

    }

    /**
     * @param $email
     * @return bool
     */
    public function checkEmail($email){
        $db=new db();
        $sql="SELECT `user_email` FROM `user` WHERE `user_email`=\"$email\"";
        $check=$db->run($sql);
       return $check->fetch_assoc()? true : false;
    }

    public function login($email,$pass){
        $db=new db();
        /**
         * заявката беше грешна
         */
        $sql="SELECT `user`.`user_pass`, `user`.`user_email` FROM `user` WHERE (`user`.`user_email` =\"$email\")";
        $result=$db->run($sql);
        echo "<pre>";
        var_dump($result);
        echo"</pre>";
        $login =$result->fetch_assoc();
        $this->isAdmin($email);
        if($result->num_rows == 1 && password_verify($pass, $login['user_pass'])){
        	$_SESSION['email'] =  $login['user_email'];
        	return true;
        }
        return false;
    }

    public function isAdmin($email){
        $db=new db();
        $sql = "SELECT `admin_email` FROM `admin_user` WHERE `admin_email`='$email'";
        $result= $db->run($sql);
        return (!empty($result->fetch_assoc()))?true:false;
    }

    public function fetchUser($user){
	    $db=new db();
	    $sql="SELECT user_email, user_name, user_phone,user_address FROM `user` WHERE `user_email`=\"$user\"";
	    $result= $db->run($sql);
	    return $result->fetch_assoc();
    }
}