<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 15.6.2018 г.
 * Time: 17:54
 */

class adminController extends Controller
{
    public function index(){
        $this->view('admin' . DIRECTORY_SEPARATOR . "index");
        $this->view->render();
    }

    public function addIngredients(){
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "addIngredients",['AllIngredients'=>$this->model->getCategory_ingredients()]);
        $this->view->render();
    }
    public function addIngredientsAction(){
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
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "vieAllIngredients",["viewAllIngredients"=>$this->model->getIngredients()]);
        $this->view->render();
    }
    public function deleteIngredient($id){
        $this->model("admin");
        $admin=new admin();
        if ($admin->deleteIngredient($id)){
            header('Location: ' . '/admin/viewAllIngredients');
        }
    }
    public function editIngredient($id=null){
        $this->model("pizza");
        $this->view('admin' . DIRECTORY_SEPARATOR . "editIngredient",["Ingredients"=>$this->model->getIngredient($id),'AllIngredients'=>$this->model->getCategory_ingredients()]);
        $this->view->render();
    }
    public function editIngredientAction(){
        $this->model("admin");
        $admin=new admin();
        if($admin->editIngredient($_POST["id"],$_POST["name"],$_POST["price"])){
            header('Location: ' . '/admin/viewAllIngredients');
        }


    }
}