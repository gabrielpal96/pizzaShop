<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 2.6.2018 г.
 * Time: 18:13
 */

class cartController extends Controller{

    public function index(){
        if(!isset($_SESSION))
        {
            session_start();
        }
        $this->view('cart'.DIRECTORY_SEPARATOR.'index');
        $this->view->render();

    }

    /**
     * добавя пиците в количката от основното меню
     *
     */
    public function addPizzaInCart(){
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!empty($_POST)) {
        switch(key($_POST)){
            case 'id':{
                $flag=true;
                if($_SESSION['cart'] != null){
                    foreach ($_SESSION["cart"] as $k=>$data){
                        if($data['id']==$_POST['id']){
                            $_SESSION['cart'][$k]['quantity']=intval($data['quantity'])+1;
                            $flag=false;
                            break;
                        }
                    }
                    var_dump($flag);
                }
                if($flag) {

                    ($_SESSION['cart'] == null) ? $_SESSION['cart'][0] = $_POST : array_push($_SESSION['cart'], $_POST);
                }
                $_SESSION["ms"]='добавихте успешно пица в количката';
                break;
            }
            case "idPizza":{
                $post=$_POST;
                $this->model('pizza');
                $pizza=new pizza();
                $sum=0;
                $ingredients="";

                foreach ($post as $key=>$data){
                    if(is_int($key)){
                        $sum+=(intval($pizza->getIngredientsPrice("$key")['ingredients_price']));
                        (end($post)==$data)? $ingredients.=$data: $ingredients.=$data.", ";
                    }
                }

                echo "<pre>";
                var_dump(substr($ingredients,0,-1));
                echo"</pre>";
                $viewPizza=$pizza->viewPizza($post['idPizza']);
                $this->addSession($viewPizza['pizza_id'],$viewPizza['pizza_name'],$viewPizza['pizza_price']+$sum,$ingredients);
                $_SESSION["ms"]='добавихте успешно пица в количката';
                break;
            }
        }
        }

      header('Location: ' . '/home/');
    }

    /**
     * изтрива цялата количка
     */
    public function handleCart(){
        if(!isset($_SESSION))
        {
            session_start();
        }
       if(isset($_POST['clear'])){
	       $_SESSION['cart'] = null;
	       header('Location: ' . '/cart/');
       }
       if(isset($_POST['checkout'])){
        	if($_SESSION['cart'] === null){
		        header('Location: ' . '/home/');
	        }
	        else{
		        header('Location: ' . '/checkout/');
	        }
       }
    }
    /**
     *добавя в сесията пиците с попълнителни продукти
     *
     */
    private function addSession($id,$name,$price,$ingr){
        if(!isset($_SESSION))
        {
            session_start();
        }
        if($_SESSION['cart']==null){
            $_SESSION["cart"]=[];
        }
        array_push($_SESSION["cart"],["id"=>$id,"name"=>$name,"price"=>$price,"ingredients"=>$ingr,"quantity"=>1]);

    }

    /**
     * @param $id
     * изтрива избраната пица в зависимост от $id
     */
    public function deletePizzaFromCart($id){
        if(!isset($_SESSION))
        {
            session_start();
        }
        unset($_SESSION['cart'][$id]);
        header('Location: ' . '/cart/');

    }

    public function updateCart(){
	    if(!isset($_SESSION))
	    {
		    session_start();
	    }
	    $cartItem = $_POST['index']-1;
	    $quantity = $_POST['quantity'];
	    $oldQuantity =  $_SESSION['cart'][$cartItem]['quantity'];
	    if($oldQuantity === $quantity) return;
	    $_SESSION['cart'][$cartItem]['quantity'] = $quantity;
	    $newTotal = (float)$_POST['total'] + ((float)$quantity - (float)$oldQuantity) * (float)$_POST['price'];
			echo $newTotal;

    }

}