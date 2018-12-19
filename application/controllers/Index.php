<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	error_reporting(E_ALL);
			ini_set('display_errors', 1);

	class Index extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			
			

			$this->load->model('product');
			$this->load->model('costumer');

			//$this->load->helper('url_helper');
			$this->load->helper('url');
			$this->load->library('session');

			
			//$this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
		}
		public function isloggedin(){
			return isset($this->session->userId)&&isset($this->session->user);
		}
		public function index(){
			$data['base_url'] = base_url();
			$data['products'] = $this->product->getProducts();
			$data['categories'] = $this->product->getCategories();
			$this->smarty->view('application/views/templates/index.tpl', $data);
			//$this->load->view('welcome_message');
		}

		public function register()
		{
			if($this->isloggedin())
				redirect('/');
			

            $this->form_validation->set_rules('name', 'Username', 'required|min_length[5]|max_length[12]|is_unique[costumers.name]', array('required' => 'You must provide a %s.' ,'is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[costumers.email]', array('required' => 'You must provide a %s.' ,'is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]', array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'required|matches[password]', array('required' => 'You must provide a %s.'));
			


			$data['base_url'] = base_url();
            if ($this->form_validation->run() == FALSE)
            {
            	$data['message'] = validation_errors(' ', '<br>');
            	
            	$data['name'] = set_value('name');
            	$data['email'] = set_value('email');
                $this->smarty->view('application/views/templates/register_template.tpl', $data);
            }
            else
            {
            	if($this->costumer->register_user( $_POST['name'], $_POST['email'], hash('sha512',$_POST['password']))==1){
               		$data['background']="success";
               		$name = $_POST['name'];
               		$data['message']="User $name created sucessfully";
               	}else{
               		$data['background']="danger";
               		$data['message']="An internal error has ocurred please try again at a later time";
               	}	
               	$data['loggedin']=false;
               	$this->smarty->view('application/views/templates/message_template.tpl', $data);
            }
		}
		
	}
?>