<?php
	/**
	 * Created by PhpStorm.
	 * User: GreeN
	 * Date: 24/6/2018
	 * Time: 21:15
	 */

	class checkout
	{
		private $db;

		public function __construct()
		{
			$this->db=new db();
		}

		public function makeOrder($details){
			try{
				if(!isset($_SESSION))
				{
					session_start();
				}
				$user = $_POST['user_email'];
				$name = $_POST['user_name'];
				$address = $_POST['user_address'];
				$phone = $_POST['user_phone'];
				$this->db->transaction();
				$sql = "INSERT INTO orders (user_email, user_name, user_address, user_phone) VALUES ('$user', '$name', '$address', '$phone')";
				$this->db->run($sql);
				$newest_id = $this->db->lastId();
				$data = [];
				for($i =0, $len = sizeof($_POST['item']['name']); $i < $len; $i++){
					$pizza = $_POST['item']['name'][$i];
					$sql = "SELECT pizza_id FROM pizza WHERE `pizza_name`=\"$pizza\"";
					$result = $this->db->run($sql);
					$data[$i]['pizza'] = $result->fetch_assoc()['pizza_id'];
					$data[$i]['price'] =  $_POST['item']['price'][$i];
					$data[$i]['ingredients'] = implode(' ', json_decode($_POST['item']['ingredients'][$i]));
					$data[$i]['quantity']  =  $_POST['item']['quantity'][$i];
				}
				$stmt = $this->db->prepare("INSERT INTO order_details(order_id, pizza_id, quantity, price, more_stuff_id) VALUES(?,?,?,?,?)");
				for($i =0, $len = sizeof($data); $i < $len; $i++){
					$id = $newest_id;
					$pizza = $data[$i]['pizza'];
					$quantity = $data[$i]['quantity'];
					$price = $data[$i]['price'];
					$ingredients = $data[$i]['ingredients'];
					$stmt->bind_param("sssss", $id, $pizza, $quantity, $price, $ingredients);
					$stmt->execute();
				}
				$_SESSION['cart'] = array();
				$this->db->commit();
				return true;
			}catch (Exception $e){
				$this->db->rollback();
				throw $e;
			}

		}

	}