<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

		public function index()
		{
			$this->load->view('welcome_message');
		}
		
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