<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 15.6.2018 г.
 * Time: 17:54
 */

class adminController extends Controller
{

    public function isAdmin(){
        session_start();
        if(!$_SESSION["isAdmin"]){
            header('Location: ' . '/home/');
        }
    }

    public function index(){
        $this->isAdmin();
        $this->view('admin' . DIRECTORY_SEPARATOR . "index");
        $this->view->render();
    }

    public function addIngredients(){
        $this->isAdmin();
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "addIngredients",['AllIngredients'=>$this->model->getCategory_ingredients()]);
        $this->view->render();
    }
    public function addIngredientsAction(){
        $this->isAdmin();
        $this->model('admin');
            echo "<pre>";
            print_r($_POST);
            echo"</pre>";
            $admin=new admin();
            if($admin->saveIntg($_POST["categoria"],$_POST["intg"],$_POST["price"])){
                header('Location: ' . '/admin/viewAllIngredients');
            }
    }

    public function viewAllIngredients(){
        $this->isAdmin();
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "vieAllIngredients",["viewAllIngredients"=>$this->model->getIngredients()]);
        $this->view->render();
    }
    public function deleteIngredient($id){
        $this->isAdmin();
        $this->model("admin");
        $admin=new admin();
        if ($admin->deleteIngredient($id)){
            header('Location: ' . '/admin/viewAllIngredients');
        }
    }
    public function editIngredient($id=null){
        $this->isAdmin();
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "editIngredient",["Ingredients"=>$this->model->getIngredient($id),'AllIngredients'=>$this->model->getCategory_ingredients()]);
        $this->view->render();
    }
    public function editIngredientAction(){
        $this->isAdmin();
        $this->model("admin");
        $admin=new admin();
        if($admin->editIngredient($_POST["id"],$_POST["name"],$_POST["price"])){
            header('Location: ' . '/admin/viewAllIngredients');
        }


    }
    public function addPizza(){
        $this->isAdmin();
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "addPizza",["pizzaCategory"=>$this->model->getCategoriaPizza(),'AllIngredients'=>$this->model->getIngredients(),
            'category'=>$this->model->getCategory_ingredients()]);
        $this->view->render();
    }
    public function addPizzaAction(){
        $this->isAdmin();
        $this->model("admin");
        $name=current($_POST);
        $price=next($_POST);
        $weight=next($_POST);
        $categoria=next($_POST);

        $pic=  $this->uploadPhoto();
        $ingr=[];
        foreach ($_POST as $key=>$data){
            if(is_int(($key))){
            array_push($ingr,$key);
            }
        }
        $admin=new admin();
        $admin->addPizza($name,$price,$weight,$categoria,$pic,$ingr);
        header('Location: ' . '/home/');
    }

    public function uploadPhoto(){
        $this->isAdmin();
       if(isset($_FILES['image'])){
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

          $expensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }

          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }

          if(empty($errors)==true){
             move_uploaded_file($file_tmp,"pizzaPhoto/".$file_name);
                return $_FILES['image']['name'];
          }else{
             print_r($errors);
          }
       }
    }
    public function deletePizza($id=nul){
        $this->model("admin");
        $this->model->deletePizza($id);
       header('Location: ' . '/home/');
    }
    public function orders(){
        $this->isAdmin();
        $this->model("admin");
        $this->view('admin' . DIRECTORY_SEPARATOR . "orders",['orders'=>$this->model->getOrders(),"Deliverers"=>$this->model->getDeliverers()]);
        $this->view->render();

    }
    public function editStatus($id){
        $this->isAdmin();
        $this->model("admin");

        switch (key($_POST)){
            case "deliverer":{
                if($_POST["deliverer"]=="NULL"){
                    $this->model->editStatus($id,"NULL",key($_POST));
                    header('Location: ' . '/admin/orders');
                }else {
                    $this->model->editStatus($id, $_POST["deliverer"], key($_POST));
                    header('Location: ' . '/admin/orders');
                }
        break;
            }
            case "status":{
                $status=$_POST["status"];
                $this->model->editStatus($id,$status,key($_POST));
                header('Location: ' . '/admin/orders');
                break;
            }

        }

    }
        public function deleteOrder ($id){
            $this->isAdmin();
            $this->model("admin");
            if($this->model->deleteOrder($id)){
                header('Location: ' . '/admin/orders');
            }else{
                echo "<h1> НЕ е изтрита поръчката</h1>" . "<br>";
            }

        }
        public function deliverers(){
            $this->isAdmin();
            $this->model("admin");
            $this->view('admin' . DIRECTORY_SEPARATOR . "deliverers",['deliverers'=>$this->model->deliverers(),"zones"=>$this->model->zones()]);
            $this->view->render();

        }
    public function deliverersAction(){
        $this->isAdmin();
        $this->model("admin");
        if(!empty($_POST)){
            if($this->model->saveDelivererZone($_POST["id"],$_POST["zone"])){
                $_SESSION["ms"]='променихте успешно зоната';
                header('Location: ' . '/admin/deliverers');
            }else{
                echo "vyznikna greshka";
            }
        }
    }
        public function addDeliverer (){
            $this->isAdmin();
            $this->model("admin");
            $this->view('admin' . DIRECTORY_SEPARATOR . "addDeliverer");
            $this->view->render();
            if(!empty($_POST)){
                if($_POST["name"]!=null) {


                    if ($this->model->addDeliverer($_POST["name"])) ;
                    {
                        $_SESSION["ms"] = 'успешно довавихте доставчик';
                        echo "<pre>post=";
                        var_dump($_POST);
                        echo "</pre>";
                        header('Location: ' . '/admin/deliverers');
                    }
                }else{
                    echo "<script>  alert(\"не можете да изтриете зоната, защото тя се използва от доставчик\"); </script>";
                }
            }
            }

            public function deleteDeliverer($id){
                $this->isAdmin();
                $this->model("admin");
                if(!$this->model->deleteDeliverer($id)){
                    $_SESSION["ms"]='Не може да се изтрие доставчика защото е приел доставка за доставяне';
                }else{
                    $_SESSION["ms"]='изтрихте доставчика';
                }
                header('Location: ' . '/admin/deliverers');
            }

            public function zones($detele=null,$id=null){
                $this->isAdmin();
                $this->model("admin");
                $this->view('admin' . DIRECTORY_SEPARATOR . "zones",['zones'=>$this->model->zones()]);
                $this->view->render();
                $model=new admin();
                if(!empty($_POST)){
                    if($model->addZone($_POST["name"])){
                        $_POST["name"]=array();

                    }

                }
                if($detele!=null  AND $detele="delete" AND $id!=null){
                    if($model->deleteZone($id)){
                        echo "<script> window.location = \"/admin/zones\"; </script>";
                    }else{
                        echo "<script>  alert(\"не можете да изтриете зоната, защото тя се използва от доставчик\"); </script>";
                        echo "<script> window.location = \"/admin/zones\"; </script>";
                    }
                }
            }

}