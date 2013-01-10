<?php

class Ecommerce extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('index');
	}
	
	function produk(){
	$this->load->view('user/products');
	}
	
	function news(){
	$this->load->view('user/news');
	}
	function forum(){
	$this->load->view('user/forum');
	}
	function caratransaksi(){
	$this->load->view('user/caratransaksi');
	}
	function contact(){
	$this->load->view('user/contact');
	}
	function detail(){
	$this->load->view('user/productdetail');
	}
	function cart(){
	$this->load->view('user/shoppingcart');
	}
	function admin(){
	$this->load->view('admin/index');
	}
	function produk_admin(){
	$this->load->view('admin/produk_admin');
	}
	function kategori_admin(){
	$this->load->view('admin/kategori_admin');
	}
	function merk_admin(){
	$this->load->view('admin/merk_admin');
	}
	function forum_admin(){
	$this->load->view('admin/forum_admin');
	}
	function news_admin(){
	$this->load->view('admin/news_admin');
	}
	function manajemen_user(){
	$this->load->view('admin/manajemen_user');
	}
	function message_admin(){
	$this->load->view('admin/message_admin');
	}
	function list_order(){
	$this->load->view('admin/list_order');
	}
	
}

?>
