<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 15.6.2018 г.
 * Time: 19:58
 */

class admin
{
    private  $db;

    public function __construct()
    {
        $this->db=new db();

    }
    public function saveIntg($cat,$intg,$price){
    $this->db=new db();
    return ($this->db->run("INSERT INTO `ingredients` (`ingredients_id`, `ingredients_name`, `ingredients_category`, `ingredients_price`) VALUES (NULL, '$intg', '$cat', '$price')"))?true:false;


    }
    public function deleteIngredient($id){

        if($this->db->run("DELETE FROM `ingredients` WHERE `ingredients`.`ingredients_id` = $id")){
                return true;
        }
        return false;
    }
    public function editIngredient($id,$name,$price){
      return  $this->db->run("UPDATE `ingredients` SET `ingredients_name` = '$name',`ingredients_price` = '$price' WHERE `ingredients`.`ingredients_id` = $id")?true:false;
    }
    public function addPizza($name=null,$price=null,$weight=null,$categoria=null,$pic=null,$intg=[]){
        $id=$this->db->run("SELECT MAX(pizza_id) FROM pizza");
        $id=intval($id->fetch_assoc()["MAX(pizza_id)"])+1;
        $sql = "INSERT INTO `pizza` (`pizza_id`, `pizza_name`, `pizza_price`, `pizza_weight`, `pizza_photo`, `categoria_pizza`) VALUES ('$id', '$name', '$price', '$weight', '$pic', '$categoria')";
        $this->db->run($sql);
        foreach ($intg as $data){
            $sql = "INSERT INTO `recipe_ingredients` (`rec_id`, `ing_id`) VALUES ('$id', '$data')";
            $this->db->run($sql);
        }
    }

    public function deletePizza($id){
        $this->db->run("DELETE FROM `recipe_ingredients` WHERE `recipe_ingredients`.`rec_id` = $id");
        $this->db->run("DELETE FROM `pizza` WHERE `pizza`.`pizza_id` = $id");
    }

    public function getOrders(){
        $orders=$this->db->run("SELECT `order_details`.`order_id`, `order_details`.`pizza_id`, `pizza`.`pizza_name`, `order_details`.`quantity`, `order_details`.`price`, `order_details`.`more_stuff_id`, `order_details`.`note`, `orders`.`user_email`, `orders`.`user_address`, `orders`.`user_name`, `orders`.`user_phone`, `orders`.`status`, `orders`.`deliverer`
FROM `pizza`
    INNER JOIN `order_details` ON `order_details`.`pizza_id` = `pizza`.`pizza_id`
    LEFT JOIN `orders` ON `order_details`.`order_id` = `orders`.`order_id`");

        $data=[];
    while ($tmp=$orders->fetch_assoc()){

//        if($tmp["status"]!="delievered"){

        if(array_key_exists($tmp["order_id"],$data)) {

            array_push($data[$tmp["order_id"]],$tmp);
        }else {
            $data[$tmp["order_id"]][] = $tmp;
        }
        }
//    }
    return $data;
    }

    /**
     * @param $id
     * @param $status
     */
public function editStatus ($id,$status_deliverer,$key){

    switch ($key){
        case "status":{
            $this->db->run("UPDATE `orders` SET `status` = '$status_deliverer' WHERE `orders`.`order_id` = $id;");
            break;
        }
        case "deliverer":{
            $this->db->run("UPDATE `orders` SET `deliverer` = $status_deliverer WHERE `orders`.`order_id` = $id");
            break;
        }
    }


}
    /**
     * @return array
     */
    public function getDeliverers(){
        $Deliverers=$this->db->run("SELECT * FROM `deliverers`");
        $deliveres=[];
        while ($data=$Deliverers->fetch_assoc()){
            array_push($deliveres,$data);
        }
        return$deliveres;
    }

    /**
     * @param $id
     * @return bool
     */
        public function deleteOrder($id){
       if( $this->db->run("DELETE FROM `order_details` WHERE `order_details`.`order_id` = $id")){
           $this->db->run("DELETE FROM `orders` WHERE `orders`.`order_id` = $id");
           return true;
       }else return false;

            }

        public function deliverers (){
            $deliverers= $this->db->run("SELECT * FROM `deliverers`");
            $data=[];
            while ($tmp=$deliverers->fetch_assoc()){

                array_push($data,$tmp);
            }
            return $data;
            }
    public function zones (){
        $zones= $this->db->run("SELECT * FROM `zones`");
        $data=[];
        while ($tmp=$zones->fetch_assoc()){

            array_push($data,$tmp);
        }
        return $data;
    }
        public function saveDelivererZone ($id,$zone){
            echo $id." = ".$zone;
                if($this->db->run("UPDATE `deliverers` SET `deliverers_area` = '$zone' WHERE `deliverers`.`deliverers_id` = $id")){
                    return true;
                }else return false;
            }

    public function addDeliverer ($name)
    {
        return $this->db->run("INSERT INTO `deliverers` (`deliverers_id`, `deliverers_name`, `deliverers_area`) VALUES (NULL, '$name', NULL)") ? true : false;
    }
        public function deleteDeliverer($id){
            return $this->db->run("DELETE FROM `deliverers` WHERE `deliverers`.`deliverers_id` = $id")?true:false;
        }

}