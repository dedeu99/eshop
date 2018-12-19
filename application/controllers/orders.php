<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	error_reporting(E_ALL);
			ini_set('display_errors', 1);

	class Orders extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('order');
			$this->load->library('session');
		}
		public function index(){
			echo "its here";
		}
		/*public function is_loggedin(){
			return isset($this->session->userId)&&isset($this->session->user);
		}*/
		public function order($productid=0,$quantity=0)
		{
			if(!isset($_SESSION['cart']))
				$_SESSION['cart']=[];
			if(isset($_SESSION['cart'][$productid]))
				$_SESSION['cart'][$productid]+=$quantity;
			else{
				$_SESSION['cart'][$productid]= $quantity;
			}

			var_dump($_SESSION['cart']);
		}
	}
?>