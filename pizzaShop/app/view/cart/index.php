<?php
include VIEW . 'header.phtml';

if(!isset($_SESSION))
{
    session_start();
}
?>
<br>
<hr>
	<div class="container">
		<form action="/cart/handleCart" method="post" id="form">

	    <?php
		    if(!empty($_SESSION['cart'])){
		        $totalPrice=0;
			    $table = '<table class="table table-hover table-sm">';
			    $table .='<thead class="thead-light">
					<tr>';
			    $table .='<th>Пица</th>';
			    $table .='<th>Цена</th>';
                $table .='<th>добавки</th>';
                $table .='<th>количество</th>';
                $table .='<th></th>';
			    $table .='
						</tr>
            </thead>
            <tbody>';
			    foreach ($_SESSION['cart'] as $key=>$item){

				    $table .= '<tr>';
				    $table .= '<td>'.$item["name"].'</td>';
				    $table .= '<td>'.$item["price"].' лв.'.'</td>';
                    $totalPrice+=intval($item["price"])*intval($item["quantity"]);
                    $table .= '<td>'.$item["ingredients"].'</td>';
                    $table .= '<td><input class="quantity" type="number" value='.$item["quantity"].' min="1" max="10" step="1"/></td>';
                    $table .= '<td>'."<a href='/cart/deletePizzaFromCart/$key'> изтрий</a>".'</td>';
				    $table .= '</tr>';
			    }
			    $table .= '
        </tbody>
        </table>';

			    echo $table;
                echo '<p class="total">Общо: '.$totalPrice.'лв.</p>';

		    }else{
                $table = '<table class="table table-striped table-hover table-sm">';
                $table .='<thead class="thead-light">
					<tr>';
                $table .='<th>Пица</th>';
                $table .='<th>Цена</th>';
                $table .='<th>добавки</th>';
                $table .='<th>количество</th>';
                $table .='<th></th>';
                $table .='
						</tr>
            </thead>
             <tbody>';
                $table .= '
        </tbody>
        </table>';
                echo $table;
            }
	    ?>

            <button type="submit" name="clear" class="btn btn-default">Clear cart</button>
            <button type="submit" name="checkout" class="btn btn-default">Checkout</button>
        </form>
	</div>


<?php
include VIEW . 'footer.phtml';
?>