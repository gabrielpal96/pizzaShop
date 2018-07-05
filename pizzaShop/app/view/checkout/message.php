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
		<?php
			if($this->view_data['success']) echo "<p>Thank you for your purchase. Etc, etc, etc, etc..</p> ";
			else echo "<p>Your order was not able to be processed at this time. Try again perhaps?</p> ";
		?>

	</div>

<?php
	include VIEW . 'footer.phtml';
?>