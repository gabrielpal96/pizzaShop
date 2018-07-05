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
		<form action="/checkout/handleOrder" method="post" id="form">
			<?php
					$totalPrice=0;
					$table = '<table name="summary" class="table table-hover table-sm">';
					$table .='<thead class="thead-light">
					<tr>';
					$table .='<th>Пица</th>';
					$table .='<th>Цена</th>';
					$table .='<th>добавки</th>';
					$table .='<th>количество</th>';
					$table .='
						</tr>
            </thead>
            <tbody>';
					foreach ($_SESSION['cart'] as $key=>$item){
						$ingredients =  $item["ingredients"];
						$array = explode(' ', $ingredients);
						$table .= '<tr>';
						$table .= '<td><p name="name">'.$item["name"].'</p>'.
						 '<input type=hidden name="item[name][]" value='.$item["name"].'>
						</td>';
						$table .= '<td><p name="price">'.$item["price"].' лв.'.'</p>'.
						 '<input type=hidden name="item[price][]" value='.$item["price"].'>
						</td>';
						$totalPrice+=intval($item["price"])*intval($item["quantity"]);
						$table .= '<td><p name="ingredients">'.$item["ingredients"].'</p>'.
						 '<input type=hidden name="item[ingredients][]" value='.json_encode($array).'>
						</td>';
						$table .= '<td><p name="quantity">'.$item["quantity"].'</p>'.
						 '<input type=hidden name="item[quantity][]" value='.$item["quantity"].'>
						</td>';
						$table .= '</tr>';
					}
					$table .= '
        </tbody>
        </table>';

					echo $table;
					echo '<p class="total">Общо: '.$totalPrice.' лв.</p>';
			?>
			<div class="form-group">
				<label for="email">Email</label>
				<p><?php echo $this->view_data['data']['user_email']?></p>
				<input type=hidden name="user_email" value="<?php echo $this->view_data['data']['user_email']?>">
				<small id="emailHelp" class="form-text text-muted">We'll send order details to this email.</small>
				<label for="email">Recipient name</label>
				<p><?php echo $this->view_data['data']['user_name']?>
					<input type=hidden name="user_name" value="<?php echo $this->view_data['data']['user_name']?>">
				<small id="nameHelp" class="form-text text-muted">We need to know who to look for.</small>
				<label for="text">Delivery address</label>
				<p><?php echo $this->view_data['data']['user_address']?></p>
				<input type=hidden name="user_address" value="<?php echo $this->view_data['data']['user_address']?>">
				<small id="addressHelp" class="form-text text-muted">Our delivery man needs to know where to deliver the pizza, before it gets cold!</small>
				<label for="phone">Phone number</label>
				<p><?php echo $this->view_data['data']['user_phone']?></p>
				<input type=hidden name="user_phone" value="<?php echo $this->view_data['data']['user_phone']?>">
				<small id="phoneHelp" class="form-text text-muted">Our deliveryman will give you a call when he is nearby.</small>
			</div>

			<div class="form-group">
				<p>Payment method: </p> <span><?php echo $this->view_data['data']['payment']?></span>
				<input type=hidden name="payment" value=<?php echo $this->view_data['data']['payment']?>>
			</div>
			<div class="form-group">
				<button type="button" name="back" class="btn btn-default" onclick="window.history.go(-2);">Cancel order</button>
				<button type="submit" name="continue" class="btn btn-default">Confirm order</button>
			</div>
		</form>
	</div>


<?php
	include VIEW . 'footer.phtml';
?>