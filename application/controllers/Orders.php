<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('order');
			$this->load->library('session');
			$this->load->helper('url');

			
		}

		public function isloggedin(){
			return isset($this->session->userId)&&isset($this->session->user);
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
			
			if(!$this->isloggedin())
				redirect('/');
			
			
			

			$this->order->createOrder($_SESSION['userId'],$_SESSION['total'],$_SESSION['cart']);
			//unset($_SESSION['cart']);
			//$_SESSION['total']=0;
			$this->showOrders();
		}
		public function showOrders(){
			if(!$this->isloggedin())
				redirect('/');
			

			$data['username'] = $this->session->user;
			$data['base_url'] = base_url();
			$data['orders'] = $arr=$this->order->getOrders($_SESSION['userId']);
		
		
			

			$this->smarty->view('application/views/templates/orders_template.tpl', $data);
		}
	}
?>