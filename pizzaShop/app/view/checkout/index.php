<?php
	$action = $this->getAction();
	if(!isset($_SESSION))
	{
		session_start();
	}

?>

	<!doctype html>
	<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="/css/style.css" rel="stylesheet" media="all" >
	<link href="/css/login.css" rel="stylesheet" media="all" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


	<title>
		<?php
			echo (isset($this->page_title) ? $this->page_title : "welcome to my site");
		?>
	</title>
</head>
<body>
<nav>
	<ul>
		<li>
			<a href="/home/index" <?php echo ($action=='index'?'class=active' : '');?> ><h1>Home</h1></a>
		</li>
</nav>

</body>
	<br>
	<hr>
	<div class="container">


		<?php
			if(!empty($_SESSION['cart'])){
				$totalPrice=0;
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

				foreach ($_SESSION['cart'] as $key=>$item){

					$table .= '<tr>';
					$table .= '<td>'.$item["name"].'</td>';
					$table .= '<td>'.$item["price"].' лв.'.'</td>';
					$totalPrice+=intval($item["price"])*intval($item["quantity"]);

					$table .= '<td>'.$item["ingredients"].'</td>';
					$table .= '<td>'.$item["quantity"]    .'</td>';
					$table .= '<td>'."<a href='/cart/deletePizzaFromCart/$key'> <button class='btn btn-default'>изтрий</button></a>".'</td>';
					$table .= '</tr>';
				}
				$table .= '
        </tbody>
        </table>';

				echo $table;
				echo "общо ".$totalPrice .' лв.'. "<br>";

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
		<form action="/cart/handleCart" method="post" id="form">
			<button type="submit" name="clear" class="btn btn-default">Clear cart</button>
			<button type="submit" name="checkout" class="btn btn-default">Checkout</button>
		</form>
	</div>


<?php
include VIEW . 'footer.phtml';
?>