<?php
	/**
	 * Created by PhpStorm.
	 * User: GreeN
	 * Date: 16/6/2018
	 * Time: 19:19
	 */

	class checkoutController extends Controller{
		public function index(){
			if(!isset($_SESSION))
			{
				session_start();
			}
			$data = array(
				'user_email' => '',
				'user_name' => '',
				'user_phone' => '',
				'user_address' =>''
			);
			if(isset($_SESSION['email'])) {
				$this->model('user');
				$data = $this->model->fetchUser($_SESSION['email']);
			}
			$this->view('checkout'.DIRECTORY_SEPARATOR.'index', ['data' => $data]);
			$this->view->render();
		}

		public function confirmation(){
			$this->view('checkout'.DIRECTORY_SEPARATOR.'confirm', ['data' => $_POST]);
			$this->view->render();
		}

		public function handleOrder(){
			$this->model('checkout');
			if($this->model->makeOrder($_POST)){
				$this->model('Mailer');
				$email = $_POST['user_email'];
				$subject = 'Successful order!';
				$body = 'Your order will be delivered to you shortly!';
				$this->model->sendMail($email, $subject, $body);
				$this->view('checkout'.DIRECTORY_SEPARATOR.'message', ['success' =>true ]);
				$this->view->render();
			}else{
				$this->view('checkout'.DIRECTORY_SEPARATOR.'message', ['success' => false ]);
				$this->view->render();
			}
		}
	}