<?php
include VIEW . 'header.phtml';
?>
<div class="jumbotron" style="width:100%">

<?php

if(array_key_exists('pizza',$this->view_data)){
    $pizza=$this->view_data['pizza'];
     $name=$pizza["pizza_name"];
        $pic=$pizza['pizza_photo'];
        echo "
        <h1 class=\"text-center\">$name</h1>
        <img src=\" /pizzaPhoto/$pic \" class=\"rounded mx-auto d-block\" alt=\"Alps\">
        ";
    if($pizza['pizza_id']!=0){
        $ingredients=$this->view_data['ingredients'];
        $id=$pizza['pizza_id'];
        $pricePizza=$pizza['pizza_price'];
        $weight=$pizza['pizza_weight'];
        echo "
         <h6 class=\"text-center\">$ingredients</h6>
         <h6 class=\"text-center\">Грамаж: $weight гр.</h6>
        ";




    }


}
?>

<fieldset>
<form method="post" action="/cart/addPizzaInCart">

    <input type="hidden" value="<?php echo $pizza['pizza_id']?>"name="idPizza">
    <input type="hidden" value="1"name="quantity">
<?php

if(array_key_exists('AllIngredients',$this->view_data)){
    $ingr=$this->view_data['AllIngredients'];
    echo "
     <div class='divider'>
    ";
    foreach ($this->view_data{'category'} as $cat){
        $category=$cat['category_name'];
        echo "<legend>$category</legend>";
        echo "<div class=\"form-group\">";
        foreach ($ingr as $data){

            if($cat['category_name']==$data['ingredients_category']){
                $name=$data['ingredients_name'];
                $id=$data['ingredients_id'];
                $price=$data['ingredients_price'];

                echo "
                                    <div class=\"custom-control custom-checkbox\">
                        <input class=\"custom-control-input\" name='$id' value='$name' id=\"$name\" unchecked=\"\" type=\"checkbox\">
                        <label class=\"custom-control-label\" for=\"$name\">$name</label>
                    </div>

                    
                ";

             //   echo "    <input type=\"checkbox\" value=\"$name\"  name=\"$id\" >$name".' +'.$data['ingredients_price'] . "<br>";


            }
        }
        echo "</div>";



    }
    echo "</div>";
    echo "
                <div class='divider'>
                <h4 class=\"text-center\">Цена: $pricePizza лв.</h4>
                <button type=\"submit\" class=\"btn btn-outline-primary\">добави</button>
            </div>
    ";
}

?>
</form>
    </fieldset>
    </div>




<?php

include VIEW . 'footer.phtml';
?>