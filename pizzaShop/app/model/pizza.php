<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 25.4.2018 г.
 * Time: 11:57
 */

class pizza
{
    protected static $data_file;
    protected $inventroy=[];

    private  $db;


    public function __construct()
    {
        $this->db=new db();
    }

    private function load($sql){
        $db= new db();
        $pizza=$db->run($sql);
        return $pizza;
    }

    public function getPizza($id=0){
        $name=null;
        if($id==0){
        $sql="SELECT `pizza`.`pizza_id`, `pizza`.`pizza_name`, `pizza`.`pizza_price`, `pizza`.`pizza_weight`, `pizza`.`pizza_photo`, `categoria_pizza`.* FROM `categoria_pizza` 
              LEFT JOIN `pizza` ON `pizza`.`categoria_pizza` = `categoria_pizza`.`id_categoria_pizza`
";
        }else{

            $sql = "SELECT `pizza`.*, `categoria_pizza`.`categoria_pizza` FROM `pizza` LEFT JOIN `categoria_pizza` ON `pizza`.`categoria_pizza` = `categoria_pizza`.`id_categoria_pizza` 
                    WHERE (`pizza`.`categoria_pizza` =$id)";
        }
        $this->inventroy=$this->load($sql);
        $pizza=[];
        while ($data=$this->inventroy->fetch_assoc()){
        array_push($pizza,$data);
        }
        return $pizza;
    }
    public function viewPizza($id=null){

        if(!is_array($id)) {

            if ($id != null) {

                $this->inventroy = $this->load("SELECT * FROM `pizza` WHERE `pizza_id` =$id");

                return $this->inventroy->fetch_assoc();

            }

        }
    }
    public function getPizzaIngredients($id=null){
        if(!is_array($id) AND $id!=null){
            $this->inventroy=$this->load("SELECT `ingredients`.`ingredients_name` FROM `pizza` 
          LEFT JOIN `recipe_ingredients` ON `recipe_ingredients`.`rec_id` = `pizza`.`pizza_id` 
          LEFT JOIN `ingredients` ON `recipe_ingredients`.`ing_id` = `ingredients`.`ingredients_id` WHERE (`pizza`.`pizza_id` =$id)
");
            $str='';
            while ($data=$this->inventroy->fetch_assoc()){
               $str.=$data['ingredients_name'].' , ';
            }
            return $str;
        }
    }
    public function getIngredients(){
        $this->inventroy=$this->load('SELECT * FROM `ingredients` ORDER BY `ingredients`.`ingredients_category` ASC');
        $ingr=[];
        while ($data=$this->inventroy->fetch_assoc()){
            array_push($ingr,$data);
        }
        return $ingr;
    }
    public function getCategory_ingredients(){
        $this->inventroy=$this->load('SELECT * FROM `category_ingredients`');
        $cat=[];
        while ($data=$this->inventroy->fetch_assoc()){
            array_push($cat,$data);
        }
        return $cat;
    }
    public function getIngredientsPrice($id){
        $sql = "SELECT `ingredients`.`ingredients_price`\n"

            . "FROM `ingredients`\n"

            . "WHERE (`ingredients`.`ingredients_id` =$id) ORDER BY `ingredients_category` ASC";
        $data=$this->load($sql);

        return$data->fetch_assoc();
    }

    public function getCategoriaPizza(){
        $data=$this->load("SELECT * FROM `categoria_pizza`");
        $cat=[];
        while ($tmp=$data->fetch_assoc()){
            array_push($cat,$tmp);
        }
        return $cat;
    }
    public function getIngredient($id){
        $data=$this->load("SELECT * FROM `ingredients` WHERE `ingredients_id`=$id");
        $ingr=[];
        while ($tmp=$data->fetch_assoc()){
            array_push($ingr,$tmp);
        }
        return $ingr;
    }



}