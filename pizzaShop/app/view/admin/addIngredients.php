<?php
include VIEW . 'header.phtml';
?>
    <h1>add</h1>
<form method="post" action="/admin/addIngredientsAction">
    <select name="categoria">
<?php
if(array_key_exists('AllIngredients',$this->view_data)){
    $AllIngredients=$this->view_data["AllIngredients"];
    foreach ($AllIngredients as $data){
        $tmp=$data['category_name'];
        echo "<option value=\"$tmp\">$tmp</option>" . "<br>";
    }

}
?>
    </select>
    <p>съставка:</p>
    <input type="text" name="intg">
    <p>цена:</p>
    <input type="text" name="price">
    <br/><br/>
    <input type="submit" value="добави" >
</form>
    <br/>
<a href="/admin/viewAllIngredients"><button>отказ</button></a>
<?php
include VIEW . 'footer.phtml';
?>