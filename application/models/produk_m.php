<?php
class produk_m extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	function getAll()
	{
	 
		$this->db->order_by('id','DESC');
		 
		$query = $this->db->get('produk',3);
		 
		return $query->result();
	 
	}
	
	function get_terkenal()
	{
	 
		$this->db->where('manufactur','LG');
		 
		$this->db->or_where('manufactur','samsung');
		 
		$query = $this->db->get('produk',3);
		 
		return $query->result();
	 
	}
	
	function get_slider()
	{
	 
		$this->db->order_by('id','DESC');
		 
		$query = $this->db->get('slider',2);
		 
		return $query->result();
	 
	}
	

}