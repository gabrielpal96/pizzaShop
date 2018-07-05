<?php
include VIEW . 'header.phtml';
?>
    <div class="jumbotron jumbotron-fluid">
        <h1 class="text-center">добави пица</h1>
        <div align="center">
            <form action="/admin/addPizzaAction" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">име</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1"  placeholder="име" type="name" name="name" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">цена</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1"  placeholder="цена в лева" type="price" name="price" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">грамаш</label>
                    <div class="wop1">
                        <input class="form-control" id="exampleInputEmail1"  placeholder="грамаш" type="weight" name="weight" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">категория</label>
                    <div class="wop1">
                        <select name="categoria">
                        <?php

                        $category=$this->view_data["pizzaCategory"];
                        foreach ($category as $data){
                            $id_categoria_pizza=$data["id_categoria_pizza"];
                            $categoria_pizza=$data["categoria_pizza"];
                            echo "<option value=\"$id_categoria_pizza\">$categoria_pizza</option>" . "<br>";
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">dobavi snimka</label>
                    <div class="wop1">
                        <input type="file" name="image" />
                    </div>
                </div>

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
            </div>
    ";
                        }
                        ?>
                    <button type="submit" class="btn btn-outline-primary">добави пица</button>

            </form>
            <br>
            <a  href="/admin"><button class="btn btn-outline-primary">отказ</button></a>
        </div>

    </div>
<?php
include VIEW . 'footer.phtml';
?>