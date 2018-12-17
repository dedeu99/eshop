<?php
class Products extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function getProducts()
	{
		return  $this->db->query("SELECT * FROM products")->result_array();
	}
	public function getProduct($product_id)
	{
		
	}


}
?>