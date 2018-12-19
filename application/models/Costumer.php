<?php
class Blog_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function register_user($name,$email,$password){
		$name=htmlentities($name);
		$email=htmlentities($email);
		$password=htmlentities($password);
		$query_RAW = "INSERT INTO costumers (name,email,created_at,updated_at,password_digest,remember_digest,admin) VALUES ('$name','$email',NOW(),NOW(),'$password',NULL,0)";
		return $this->db->query($query_RAW);
	}
}