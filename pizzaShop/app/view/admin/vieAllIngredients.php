<?php
include VIEW . 'header.phtml';
?>
    <h1 style="width: 400px; margin: 100px auto">Всички съставки</h1>

    <div class="container">
    <a href="/admin/addIngredients"><button class="btn btn-outline-primary">Добави съставка</button></a>
<br>
    <br>

<?php

if(array_key_exists('viewAllIngredients',$this->view_data)){
    $all=$this->view_data["viewAllIngredients"];

    $table='<table border=1 class="table table-hover table-bordered">';
    $i=0;
    $table.='<tr class="table-info">';
    $table.= '<td>'.'id'. '</td>'.'<td>'.'categoria'. '</td>'.'<td>'.'systavka'. '</td>'.'<td>'.'cena'. '</td>'.'<td>'.'action'. '</td>';
    $table.='</tr>';
    foreach ($all as $data){
        $ingredients_id=$data["ingredients_id"];
        $ingredients_name=$data['ingredients_name'];
        $ingredients_category=$data['ingredients_category'];
        $ingredients_price=$data['ingredients_price'];
        $table .= '<tr>';
        $table .= '<td>' . $ingredients_id . '</td>' .
            '<td>' .$ingredients_name. '</td>' .
            '<td>' . $ingredients_category .  '</td>' .
            '<td>' . $ingredients_price.' лв'. '</td>' .
            '<td>' .'<a href="/admin/editIngredient/'.$ingredients_id.'">редактирай</a>'.'/'. '<a href="/admin/deleteIngredient/'.$ingredients_id.'">изтрий</a>' . '</td>' .'</tr>';

    }
    $table.='</table>';
    echo $table;
}
?>
<br><br>
<a href="/admin/"><button class="btn btn-outline-primary">Назад</button></a>
</div>
<?php
include VIEW . 'footer.phtml';
?>