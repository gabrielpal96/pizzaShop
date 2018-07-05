<?php
include VIEW . 'header.phtml';
?>
    <h1 style="margin: 0 auto; width: 100px">Поръчки</h1>



    <?php
    if(array_key_exists('orders',$this->view_data)) {
        $orders = $this->view_data['orders'];

        foreach ($orders as $key=> $order ){
            echo "<div class='jumbotron'style='margin: 70px'>";
            echo "<table class='table table-hover table-bordered' style='border-radius: 20px'>";
            echo "<h2>"."поръчка номер: ".$key ."</h2>". "<br>";

            echo "
            <thead>
                <tr class='table-primary'>
                    <th scope='col'>пица</th>
                    <th scope='col'>добавки</th>
                    <th scope='col'>цена</th>
                </tr>
            </thead>
            <tbody>
           
        ";
            $sum=0;
            foreach ($order as $data){

                $order_id =$data["order_id"];
                $pizza_id =$data["pizza_id"];
                $pizza_name =$data["pizza_name"];
                $quantity =$data["quantity"];
                $price =$data["price"];
                $more_stuff_id =$data["more_stuff_id"];
                $note =$data["note"];
                $user_email =$data["user_email"];
                $user_address =$data["user_address"];
                $user_name =$data["user_name"];
                $user_phone =$data["user_phone"];
                $status =$data["status"];
                $deliverer=$data["deliverer"];

                echo '<tr class="table-light">';
                echo " <td>$pizza_name</td>";
                echo " <td>$more_stuff_id</td>";
                echo " <td>$price</td>";
                $sum+=$price;
                if($data===end($order)){

                    echo "<table class='table table-hover table-bordered'>";
                    echo "<br>";
                    echo "<br>";
                    echo '<tr class="table-primary">';
                    echo " <th>име </th>";
                    echo " <th>адрес </th>";
                    echo " <th>телефон </th>";
                    echo " <th>цена </th>";
                    echo " <th>статус </th>";
                    echo " <th>доставчик </th>";

                    echo " <th>изтрий </th>";
                    echo '</tr>';
                    echo '<tr class="table-light">';
                    echo " <td>$user_name </td>";
                    echo " <td>$user_address </td>";
                    echo " <td>$user_phone </td>";
                    echo " <th>$sum лв.</th>";
                    echo " <td>
 
 
                <form method='post' action='/admin/editStatus/$order_id'>
                        <select name='status' class='custom-select'>
                      <option value=\"pending\" "; if($status=="pending")echo "selected"; echo " >pending</option>
                      <option value=\"acknowledged\""; if($status=="acknowledged")echo "selected"; echo ">acknowledged</option>
                      <option value=\"delievered\""; if($status=="delievered")echo "selected"; echo ">delievered</option>
                    </select>
                    <input class='btn btn-success' style='margin: 5px' type='submit' value='запиши'>
                </form>
                </th>";
                    echo " <th>";
                    echo "
                <form method='post' action='/admin/editStatus/$order_id'>
                <select name='deliverer' class='custom-select'>
                <option value='NULL'></option>
                ";
                    foreach ($this->view_data["Deliverers"] as $data){
                        $deliverers_id=$data["deliverers_id"];
                        $deliverers_name=$data["deliverers_name"];
                        $deliverers_area=$data["deliverers_area"];
                        echo "
               <option value='$deliverers_id' "; if($deliverers_id==$deliverer)echo "selected"; echo ">$deliverers_name-$deliverers_area</option>
               ";
                    }
                    echo "
               <input class='btn btn-success' style='margin:5px' type='submit' value='запиши'>
            </select>
            </form>
                ";
                    echo "</th>";

                    echo " <th><a onclick='deleteOrder($order_id)'><button class='btn btn-success'>изтрий поръчката</button></a></th>";
                    echo '</tr>';
                    echo "</table>";
                }
            }

            echo "</tbody>";
            echo '</tr>';
            echo "" . "<br>";
            echo "</table>";
            echo "</div>";
        }
    }
    ?>



<?php
include VIEW . 'footer.phtml';
?>