<?php
include VIEW . 'header.phtml';
?>
    <h1 style="width: 400px; margin: 100px auto">Всички съставки</h1>

    <div class="container">
    <a href="/admin/addDeliverer"><button class="btn btn-outline-primary">Добави доставчик</button></a>
    <br>
    <br>
        <?php
        if(!empty($_SESSION["ms"])){

            echo "
            <div class=\"alert alert-info\">
            <strong> ";
            echo $_SESSION["ms"] . "<br>";
            echo $_SESSION["ms"]="";
            echo "</strong></div> ";
        }
        ?>
<?php



if(array_key_exists('deliverers',$this->view_data)){

    $deliverers=$this->view_data["deliverers"];
    $zones=$this->view_data["zones"];
     echo '<table border=1 class="table table-hover table-bordered">';
    echo '<tr class="table-info">';
    echo '<td>'.'id'. '</td>'.'<td>'.'доставчик'. '</td>'.'<td>'.'зона'. '</td>'.'<td>'.'изтрий'. '</td>';
    echo '</tr>';

    foreach ($deliverers as $data){
        $deliverers_id=$data["deliverers_id"];
        $deliverers_area=$data["deliverers_area"];
        $deliverers_name=$data["deliverers_name"];

        echo '<tr>';
        echo '<td>'  .$deliverers_id. '</td>' .
            '<td>' .$deliverers_name. '</td>' .
            '<td>';
        echo "<form method='post'action='/admin/deliverersAction'>";
        echo "<input type='hidden' name='id' value='$deliverers_id'> ";
        echo "  <select name=\"zone\">";
        echo "<option value='NULL'></option>";

            foreach ($zones as $zone){
               $zones_name= $zone["zones_name"];
              echo "<option value='$zones_name'"; if($zones_name==$deliverers_area)echo "selected";  echo">$zones_name</option>";

            }
        echo "</select>";
            echo "<input type='submit' value='запиши' class='btn btn-success'>";
            echo "</form>";
        echo '</td>' ;
        echo "<td><a onclick='deleteDeliverer($deliverers_id)'><button class='btn btn-success'>Изтрий</button></a></td>" ;
    }

    echo '</table>';

}

?>
        <br><br>
        <a href="/admin/"><button class="btn btn-outline-primary" class='btn btn-success'>Назад</button></a>
    </div>
<?php
include VIEW . 'footer.phtml';
?>