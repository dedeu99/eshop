<?php
class Customer extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function register_user($name,$email,$password){
		$name=htmlentities($name);
		$email=htmlentities($email);
		$password=htmlentities($password);
		$query_RAW = "INSERT INTO customers (name,email,created_at,updated_at,password_digest,remember_digest,admin) VALUES ('$name','$email',NOW(),NOW(),'$password',NULL,0)";
		return $this->db->query($query_RAW);
	}


	public function email_exists($email){
		$email=htmlentities($email);
		return $this->db->where('email',$email)->from("customers")->count_all_results();
	}

	public function validate_user( $email, $hashedpassword){
		$email=htmlentities($email);
		$query_RAW = "SELECT name,id FROM customers WHERE email = '$email' AND password_digest='$hashedpassword'";
		$query = $this->db->query($query_RAW);
		$arr=$query->result_array();
		if(count($arr)==1)
			return $arr[0];
		else	
			return NULL;	
	}

}