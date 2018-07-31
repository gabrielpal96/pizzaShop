<?php
include VIEW . 'header.phtml';
?>
<div class="container jumbotron parralax-group" style="margin: 20px auto;width:100%">

<?php

if(array_key_exists('pizza',$this->view_data)){
    $pizza=$this->view_data['pizza'];
     $name=$pizza["pizza_name"];
        $pic=$pizza['pizza_photo'];
        echo "
        <h1 class=\"text-center\"><b>$name</b></h1>
       <br>
        <img  style='width: 500px' src=\" /pizzaPhoto/$pic \" class=\"back rounded mx-auto d-block\" alt=\"Alps\">
        ";
    $pricePizza=$pizza['pizza_price'];
    if($pizza['pizza_id']!=0){
        $ingredients=$this->view_data['ingredients'];
        $id=$pizza['pizza_id'];
        $pricePizza=$pizza['pizza_price'];
        $weight=$pizza['pizza_weight'];
        echo "<br>" . "<br>";
        echo "
         <h6 class=\"text-center\">съставки: $ingredients</h6>
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
     <div class=\"card text-white bg-primary mb-3\" style=\"width: 950px; height: 350px; margin: 0 auto\">
  <div class=\"card-header\"><b>Добавки</b></div>
  <div class=\"card-body\">
    
    ";

    foreach ($this->view_data{'category'} as $cat){
        $category=$cat['category_name'];


        echo "<div class='d-lg-inline-block' style='margin-left: 45px; '>";

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
                        <label class=\"custom-control-label\" for=\"$name\">$name  -  $price лв.</label>
                    </div>

                    
                ";

             //   echo "    <input type=\"checkbox\" value=\"$name\"  name=\"$id\" >$name".' +'.$data['ingredients_price'] . "<br>";


            }
        }
        echo "</div>";
echo"</div>";//back
    }
    echo "</div>";
    echo"</div>";
    echo"</div>";
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