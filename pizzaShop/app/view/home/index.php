<?php
include VIEW . 'header.phtml';
?>

    <div class="jumbotron clearfix">

        <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Категория пици</a>
            <div class="dropdown-menu">
                <?php
                if (array_key_exists('cat', $this->view_data)){
                    $cat = $this->view_data['cat'];

               echo "<a class='dropdown-item' href='/home/''>Всички</a>";

               foreach ($cat as $data){
                   $categoria_pizza=$data["categoria_pizza"];
                   $id_categoria_pizza=$data["id_categoria_pizza"];
                   echo "<a class='dropdown-item' href='/home/index/$id_categoria_pizza''>$categoria_pizza</a>";
               }
                }
                ?>
            </div>
        </li>
        </ul>

    <div class="wop">
        <div class="card mb-3">
            <h3 class="card-header">Make your own pizza</h3>
            <img style="height: 200px; width: 100%; display: block;" src="https://thumbs.dreamstime.com/b/pizza-question-symbol-white-background-60632289.jpg" alt="Pizza image">
            <div class="card-body">
                <p class="card-text">Ingredients: whatever you choose</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Starts at 350 grams</li>
                <li class="list-group-item">Starts with no meat</li>
                <li class="list-group-item">Starts at 10 leva</li>
            </ul>
            <div class="card-body">
                <a href="/pizza/viewPizza/0">
                <button type="button" class="btn btn-outline-primary">Make one</button>
                </a>
            </div>
        </div>
    </div>

        <?php
if(array_key_exists('pizza',$this->view_data)){
    $i=0;
    $pizza=$this->view_data['pizza'];
    foreach ($pizza as $item) {
        $id = $item['pizza_id'];
        $pizza_name = $item['pizza_name'];
        $pizza_price = $item['pizza_price'];
        $pizza_weight = $item['pizza_weight'];
        $pizza_photo = $item['pizza_photo'];
        $categoria_pizza = $item['categoria_pizza'];
        if ($id != 0) {
            echo "
            <div class=\"wop\">
        <div class=\"card mb-3\">
            <h3 class=\"card-header\">$pizza_name</h3>
             <a href='/pizza/viewPizza/$id'>
            <img style=\"height: 200px; width: 100%; display: block;\" src='/pizzaPhoto/$pizza_photo'
                 alt=\"Pizza image\">
                 </a>
            <div class=\"card-body\">
                <p class=\"card-text\">Ingredients: cd</p>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">$pizza_weight гр.</li>
                <li class=\"list-group-item\">$categoria_pizza</li>
                <li class=\"list-group-item\">$pizza_price лв.</li>
            </ul>
            <div class=\"card-body\">
            <a href='/pizza/viewPizza/$id'>
                <button type=\"button\" class=\"btn btn-outline-primary\">Order</button>
                </a>
            </div>
                        
         <form method=\"post\" action=\" /cart/addPizzaInCart\">
                <input type=\"hidden\" name=\"id\"value='$id'>
                  <input type=\"hidden\" name=\"name\"value='$pizza_name'>
                  <input type=\"hidden\" name=\"price\"value='$pizza_price'>
                   <input type=\"hidden\" name=\"ingredients\"value=''>
                   <input type=\"hidden\" name=\"quantity\"value=1>

                <div class=\"card-body\">
                    <button type=\"submit\" class=\"btn btn-outline-primary\">добави</button>
                </div>
          </form>
        </div>
    </div>
        ";
        }
    }
}
        ?>

    </div>

<?php
include VIEW . 'footer.phtml';
?>