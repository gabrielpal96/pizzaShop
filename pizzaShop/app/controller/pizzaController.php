<?php
/**
 * Created by PhpStorm.
 * User: Gabriel Palikarski
 * Date: 25.4.2018 г.
 * Time: 11:44
 */

class pizzaController extends Controller
{
    public function index()
    {
        echo "view pizza" . "<br>";

    }

    public function viewPizza($id=null){

        $this->model('pizza');
        $this->view('pizza'.DIRECTORY_SEPARATOR.'view',['pizza' => $this->model->viewPizza($id),'ingredients'=>$this->model->getPizzaIngredients($id),
            'AllIngredients'=>$this->model->getIngredients(),'category'=>$this->model->getCategory_ingredients()]);

        $this->view->render();
    }


}