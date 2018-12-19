<?php 
class Product extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function getProducts()
	{
		return  $this->db->query("SELECT * FROM products")->result_array();
	}
	public function getProductsByCategory($cat_id)
	{	
		$cat_id=htmlentities($cat_id);
		var_dump($cat_id);
		var_dump($this->db->query("SELECT * FROM products where cat_id='$cat_id'")->result_array());
		return "a text message";
//		return  $this->db->query("SELECT * FROM products where cat_id='$cat_id'")->result_array();
	}
	public function getCategories()
	{	
		return $this->db->query("SELECT * FROM categories")->result_array();
	}
	public function getProduct($product_id)
	{
		$product_id=htmlentities($product_id);		
	}
}
?>