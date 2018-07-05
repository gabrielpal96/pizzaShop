<?php
include VIEW . 'header.phtml';
?>

<div class="container jumbotron" style="margin-top: 100px" >
    <div style="width: 200px; margin: 0px auto;">
        <h1 style="margin-left: 30px">Admin</h1>

        <br>
        <br>
        <a href="/admin/viewAllIngredients"><button class="btn btn-lg btn-info">Всички съставки</button></a>
        <br>
        <br>
        <a href="/admin/addPizza"><button class="btn btn-lg btn-info" style="margin-left: 15px">Добави пица</button></a>
        <br>
        <br>
        <a href="/admin/orders"><button class="btn btn-lg btn-info" style="margin-left: 35px">Поръчки</button></a>
        <br>
        <br>
        <a href="/admin/deliverers"><button class="btn btn-lg btn-info" style="margin-left: 35px">Доставчици</button></a>

    </div>

</div>

<?php
include VIEW . 'footer.phtml';
?>