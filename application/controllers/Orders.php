<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('order');
			$this->load->library('session');

			
		}
		public function index()
		{
			$this->load->view('welcome_message');
		}

		public function orderProduct($productid=-1,$quantity=-1)
		{

			if($quantity<=0)
				return;

			if(!isset($_SESSION['cart']))
				$_SESSION['cart']=[];

			if(isset($_SESSION['cart'][$productid]))
				$_SESSION['cart'][$productid]+=$quantity;
			else{
				$_SESSION['cart'][$productid]= $quantity;
			}
		}
		public function placeOrder(){
			

			createOrder($_SESSION['user_id'],$_SESSION['total'],$_SESSION['cart']);
			unset($_SESSION['cart']);
			$_SESSION['total']=0;
			showOrders();
		}
		public function showOrders(){
			
		}
	}
?>