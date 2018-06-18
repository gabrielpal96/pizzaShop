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

    /**
     * user constructor.
     * @param string $n
     * @param string $e
     * @param string $p
     * @param string $a
     */
    public function __construct($n="",$e="",$p="",$a="")
    {
        $this->name=$n;
        $this->email=$e;
        $this->pas=$p;
        $this->adr=$a;

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

     try{
         $sql = "INSERT INTO `user` (`user_email`, `user_pass`, `user_address`) VALUES ('$email','$new_password', '$adr')";

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
        if($result->num_rows == 1 && password_verify($pass, $login['user_pass'])){
        	$_SESSION['user_address'] =  $login['user_address'];
        	return true;
        }
        return false;
    }


    public function test(){
        $db=new db();
        $sql="SELECT `systavki`.`sustavka`, `systavki`.* FROM `systavki`";
        $test=$db->run($sql);
        return $test->fetch_assoc();
    }
}