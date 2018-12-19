<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	error_reporting(E_ALL);
			ini_set('display_errors', 1);

	class Index extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			
			

			$this->load->model('product');

			//$this->load->helper('url_helper');
			$this->load->helper('url');
			$this->load->library('session');

			
			//$this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
		}
		/*public function is_loggedin(){
			return isset($this->session->userId)&&isset($this->session->user);
		}*/
		public function index(){
			$data['base_url'] = base_url();
			$data['products'] = $this->product->getProducts();
			$data['categories'] = $this->product->getCategories();
			$this->smarty->view('application/views/templates/index.tpl', $data);
			//$this->load->view('welcome_message');
		}
		public function trys(){
			echo "watch me";
		}
	}
?>