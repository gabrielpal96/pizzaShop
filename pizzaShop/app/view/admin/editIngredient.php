<?php
include VIEW . 'header.phtml';
?>
    <form action="/admin/editIngredientAction" method="post">


<?php
echo "<br>" . "<br>";
if(array_key_exists('Ingredients',$this->view_data)){
    $data=$this->view_data["Ingredients"];
    $ingredients_id=$data[0]["ingredients_id"];
    $ingredients_name=$data[0]['ingredients_name'];
    $ingredients_category=$data[0]['ingredients_category'];
    $ingredients_price=$data[0]['ingredients_price'];
    echo "name: " ;
    echo " <input type=\"text\" name=\"name\" value='$ingredients_name'>" . "<br>". "<br>";
    echo "cena: " ;
    echo " <input type=\"text\" name=\"price\" value='$ingredients_price'>"." лв." . "<br>". "<br>";
}
?>
<!--        <select required name="categoria" >-->
<!--            --><?php
//            if(array_key_exists('AllIngredients',$this->view_data)){
//                $AllIngredients=$this->view_data["AllIngredients"];
//                foreach ($AllIngredients as $data){
//                    $tmp=$data['category_name'];
//                    echo "<option value=\"$tmp\">$tmp</option>" . "<br>";
//                }
//
//            }
//            ?>
<!--        </select>-->
        <br> <br> <br>
        <input type="hidden" value="<?php echo $ingredients_id;?>"name="id">
        <input type="submit">
    </form>
    <br/>
    <a href="/admin/viewAllIngredients"><button>отказ</button></a>
<?php
include VIEW . 'footer.phtml';
?>