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
		<form action="/checkout/confirmation" method="post" id="details">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" id="email" name="user_email" <?php echo 'value="'.$this->view_data['data']['user_email'].'"';
					if(strlen($this->view_data['data']['user_email'])>1) echo 'readonly'?> >
				<small id="emailHelp" class="form-text text-muted">We'll send order details to this email.</small>
				<label for="email">Recipient name</label>
				<input type="text" class="form-control" id="name" name="user_name" value="<?php echo $this->view_data['data']['user_name']?>">
				<small id="nameHelp" class="form-text text-muted">We need to know who to look for.</small>
				<label for="text">Delivery address</label>
				<input type="text" class="form-control" id="address" name="user_address" value="<?php echo $this->view_data['data']['user_address']?>">
				<small id="addressHelp" class="form-text text-muted">Our delivery man needs to know where to deliver the pizza, before it gets cold!</small>
				<label for="phone">Phone number</label>
				<input type="text" class="form-control" id="phone" name="user_phone" value="<?php echo $this->view_data['data']['user_phone']?>">
				<small id="phoneHelp" class="form-text text-muted">Our deliveryman will give you a call when he is nearby.</small>
			</div>

			<div class="form-group">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="payment" id="cash" value="Cash" checked>
					<label class="form-check-label" for="cash">Cash</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="payment" id="card" value="Card" disabled>
					<label class="form-check-label" for="card">Card</label>
				</div>
			</div>
			<div class="form-group">
				<button type="button" name="back" class="btn btn-default" onclick="history.back();">Back</button>
				<button type="submit" name="continue" class="btn btn-default">Proceed to confirmation</button>
			</div>
		</form>
	</div>

<?php
	include VIEW . 'footer.phtml';
?>