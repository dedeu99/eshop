<?php
class Order extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function createOrder($customer_id,$total,$produts)
	{
		$customer_id=htmlentities($customer_id);
		$total=htmlentities($total);
		//$this->db->insert_id();
		$this->db->query("INSERT INTO orders (customer_id,created_at,status,total) VALUES('$customer_id',NOW(),1,'$total')");
		$orderId=$this->db->insert_id();
		var_dump($orderId);
		foreach ($products as $product ) {
			$pid=$product['id'];
			$pqnt=$product['quantity'];
			$this->db->query("INSERT INTO order_items (order_id,product_id,quantity) VALUES('$orderId','$pid','$pqnt')");
		}
	}
	public function getOrders($customer_id)
	{
		$customer_id=htmlentities($customer_id);
		
		return  $this->db->query("SELECT * FROM orders where customer_id='$customer_id'")->result_array();	
	}

	public function getOrder_items($customer_id)
	{
		$order_id=htmlentities($order_id);
		return  $this->db->query("SELECT * FROM orders_items where order_id='$order_id'")->result_array();		
	}
}
?>