<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	error_reporting(E_ALL);
			ini_set('display_errors', 1);

	class Products extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('product');
		}
		public function getProductsByCategory($cat_id){
			return json_encode($this->product->getProductsByCategory($cat_id));
		}
	}
?>