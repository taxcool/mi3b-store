<?php

class Admin extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('m_forum');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('smiley');
		$this->load->library('table');
		$this->load->library('pagination');
		
		$this->load->database();		
		//$this->load->library('grocery_CRUD');
	}


	public function index()
	{
		$this->load->view('admin/index');
	}
	
	function forum($id = null ){
		if($id == 1){
			$ud = $this->uri->segment(4);
			$jml = $this->db->get('thread');

			//pengaturan pagination
			 $config['base_url'] = base_url().'index.php/admin/forum/1';
			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = 5;

			//inisialisasi config
			 $this->pagination->initialize($config);

			//buat pagination
			 $data['links'] = $this->pagination->create_links();

			//tamplikan data
			 $data['thread'] = $this->m_forum->getThreadAdmin($config['per_page'], $ud);

			$this->load->view('admin/thread', $data);	
		}elseif($id == 2){
			try{				
				$ud = $this->uri->segment(4);
				$jml = $this->db->get('post');

				//pengaturan pagination
				 $config['base_url'] = base_url().'index.php/admin/forum/2';
				 $config['total_rows'] = $jml->num_rows();
				 $config['per_page'] = 5;

				//inisialisasi config
				 $this->pagination->initialize($config);

				//buat pagination
				 $data['links'] = $this->pagination->create_links();

				//tamplikan data
				 $data['post'] = $this->m_forum->getPostAdmin($config['per_page'], $ud);
				$this->load->view('admin/post',$data);
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
			}	
		}elseif($id == 3){
			$stat = $this->uri->segment(4);
			if($stat == 'add'){
				$this->load->view('admin/add_sensor');
			}else
			try{				
				$ud = $this->uri->segment(4);
				$jml = $this->db->get('sensor_word');

				//pengaturan pagination
				 $config['base_url'] = base_url().'index.php/admin/forum/3';
				 $config['total_rows'] = $jml->num_rows();
				 $config['per_page'] = 5;

				//inisialisasi config
				 $this->pagination->initialize($config);

				//buat pagination
				 $data['links'] = $this->pagination->create_links();

				//tamplikan data
				 $data['sensor'] = $this->m_forum->getSensorAdmin($config['per_page'], $ud);
				$this->load->view('admin/sensor',$data);
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
			}	
		}elseif($id == null ){
		
			$this->load->view('admin/forum');
			
		}elseif($id == 'search'){
			$search = $this->uri->segment(4);
			if($search == 1){
				$data['key'] = $this->input->post('search');
				$key = $this->input->post('search');
				$data['query'] = $this->m_forum->searchThread($key);	
				
				$this->load->view('admin/search_forum',$data);
			}
			elseif($search == 2){
				$data['key'] = $this->input->post('search');
				$key = $this->input->post('search');
				$data['query'] = $this->m_forum->searchPost($key);	
				
				$this->load->view('admin/search_post',$data);
			}
			elseif($search == 3){
				$data['key'] = $this->input->post('search');
				$key = $this->input->post('search');
				$data['query'] = $this->m_forum->searchSensor($key);	
				
				$this->load->view('admin/search_word',$data);
			}
		}
	}
	
	function addSensor(){
		$this->m_forum->insertSensor();
		redirect('admin/forum/3');
	}
		
}

?>
