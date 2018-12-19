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
		public function index(){
			if(!function_exists('apache_get_modules') ){ phpinfo(); exit; }
 $res = 'Module Unavailable';
 if(in_array('mod_rewrite',apache_get_modules())) 
 $res = 'Module Available';

		echo $res;

		}
		public function getProductsByCategory($cat_id){
			
			echo json_encode($this->product->getProductsByCategory($cat_id));
		}
	}
?>