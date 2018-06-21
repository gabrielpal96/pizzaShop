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

}