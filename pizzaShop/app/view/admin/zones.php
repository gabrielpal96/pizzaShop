<?php
include VIEW . 'header.phtml';
?>

<?php
if(array_key_exists("zones",$this->view_data)){
$zones=$this->view_data['zones'];
echo " <div class=\"container\">";
    echo '<table border=1 class="table table-hover table-bordered">';
    echo '<tr class="table-info">';
    echo '<td>'.'зона'. '</td>'.'<td>'.'изтрий'. '</td>';
    echo '</tr>';
foreach ($zones as $zone){
$id=$zone["id_zones"];

$zone=$zone["zones_name"];

    echo '<tr>';
    echo '<td>'  .$zone. '</td>' .
        '<td>' ."<a href='/admin/zones/delete/$id'><button class=\"btn btn-outline-primary\">изтрий</button></a>". '</td>';
    echo '</tr>';
}



    echo '</table>';
    echo " </div>";
}
?>


        <h1 class="text-center">добави зона</h1>
        <div align="center">
            <form action="/admin/zones" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">зона</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1"  placeholder="зона" type="zone" name="name" >

                    </div>

                </div>
                <input type="submit" value="добави" class="btn btn-outline-primary">
            </form>
            <br>
            <a href="/admin/deliverers"><button class="btn btn-outline-primary">назад</button></a>
        </div>
<?php
include VIEW . 'footer.phtml';
?>