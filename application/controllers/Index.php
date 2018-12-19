<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	error_reporting(E_ALL);
			ini_set('display_errors', 1);

	class Index extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			
			

			$this->load->model('product');
			$this->load->model('customer');
			//$this->load->model('order');

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
			if($this->isloggedin()){
				$data['username'] = $this->session->user;
				$data['loggedin']=true;
			}
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
			

            $this->form_validation->set_rules('name', 'Username', 'required|min_length[5]|max_length[12]|is_unique[customers.name]', array('required' => 'You must provide a %s.' ,'is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customers.email]', array('required' => 'You must provide a %s.' ,'is_unique'     => 'This %s already exists.'));
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
            	if($this->customer->register_user( $_POST['name'], $_POST['email'], hash('sha512',$_POST['password']))==1){
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



		public function check_email_exists($email_check){
			$this->form_validation->set_message('check_email_exists' , 'This {field} does not exist please register first.');
			return $this->customer->email_exists($email_check)==0?false:true;
		}
		public function login()
		{
			if($this->isloggedin())
				redirect('/');


            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists', array('required' => 'You must provide a %s.' ));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]', array('required' => 'You must provide a %s.'));
			


			$data['base_url'] = base_url();
            if ($this->form_validation->run() == FALSE)
            {
            	$data['message'] = validation_errors(' ', '<br>');
            	
            	$data['email'] = set_value('email');
            	
                $this->smarty->view('application/views/templates/login_template.tpl', $data);
            }
            else
            {
            	
            	$user=$this->customer->validate_user( $_POST['email'], hash('sha512',$_POST['password']));
				if(is_null($user)){  		
               		$data['message']="The password entered does not match";
               		$data['email'] = set_value('email');
               		$this->smarty->view('application/views/templates/login_template.tpl', $data);
               	}else{
               		$data['background']="success";
               		$name = $user['name'];
               		$id = $user['id'];
               		$data['message']="User $name logged in sucessfully";

               		$this->session->user=$name;
               		$this->session->userId=$id;
               		$data['loggedin']=true;
               		$data['username'] = $this->session->user;




               		$this->smarty->view('application/views/templates/message_template.tpl', $data);
               	} 
            }    
		}

		public function logout(){
			if(!$this->isloggedin())
				redirect('/');

			$data['base_url'] = base_url();
	   		$data['background']="success";
	   		$name = $this->session->user;
	   		$data['message']="User $name logged out sucessfully";
	   		$data['loggedin']=false;
	   		$this->session->sess_destroy();
	   		
	   		$this->smarty->view('application/views/templates/message_template.tpl', $data);
			
		}

		public function cart()
		{
			$data['base_url'] = base_url();
			$data['cart']=isset($_SESSION['cart'])?$this->product->getProductsInfo($_SESSION['cart']):[];
			
			$i=0;
			foreach ($data['cart'] as $item) {
				if(isset($_SESSION['cart'][$item['id']]))
					$data['cart'][$i]['quantity']=isset($_SESSION['cart'][$item['id']]);
				++$i;
			}
			print_r($data['cart']);
			print_r($_SESSION['cart']);
			

			//var_dump($_SESSION['cart']);
			//var_dump($data['cart']);

			$this->smarty->view('application/views/templates/cart_template.tpl', $data);

		}
	}
?>