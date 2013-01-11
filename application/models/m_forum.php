<?php
class M_Forum extends CI_Model {  

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','form'));
	}
	function getThread(){
		$this->db->where('is_deleted',0);
		$this->db->order_by('modified_date','desc');
		$query = $this->db->get('thread',8);
		return $query;
	}
	
	function getThreadAdmin($num, $offset){
		$data = $this->db->get('thread', $num, $offset);

		return $data;
	}
	
	function getPostAdmin($num, $offset){
		$data = $this->db->get('post', $num, $offset);

		return $data;
	}
	function getSensorAdmin($num, $offset){
		$data = $this->db->get('sensor_word', $num, $offset);

		return $data;
	}
	function getPageThread($id, $num, $offset){
		$this->db->where('id_category',$id);		
		$this->db->order_by('modified_date','desc');
		$this->db->or_where('is_deleted',0);
		$data = $this->db->get('thread', $num, $offset);

		return $data;
	}
	
	function getThreadCount(){
		$query = $this->db->count_all('thread');
		//$query = $this->db->get('');
		return $query;
	}
	
	function getThreadById($id){
		$this->db->where('id_category',$id);		
		$this->db->order_by('modified_date','desc');
		$this->db->or_where('is_deleted',0);
		$query = $this->db->get('thread');
		return $query;
	}
	
	function getThreadPostById($id){
		$this->db->where('id',$id);
		$query = $this->db->get('thread');
		return $query;
	}
	
	function getPost(){		
		$this->db->where('is_deleted',0);
		$this->db->order_by('modified_date','desc');
		$query = $this->db->get('post',5);
		return $query;
	}
	
	function getPostById($id){
		$this->db->where('id_thread',$id);
		$query = $this->db->get('post',5);
		return $query;
	}
	
	function getPostCount(){
		//$this->db->where('id_thread',$id);
		$query = $this->db->count_all('post');
		//$query = $this->db->get('post');
		return $query;
	}
	
	function getCategory(){
		$this->db->distinct('category');
		$query = $this->db->get('thread_category');
		return $query;
		
	}	
	function getCategoryById($id){
		$this->db->where('id',$id);
		$query = $this->db->get('thread_category');
		return $query;	
	}
	
	function getThreadCategoryById($id){
		$this->db->where('id_category',$id);
		$query = $this->db->get('thread');
		return $query;
	}
	
	function updateViewed($id){
		
		$this->db->select('viewed');
		$this->db->where('id', $id);
		$query = $this->db->get('thread');
		
		foreach($query->result_array() as $viewed):
		$count = $viewed['viewed'];
		$count += 1;
		/*
		$data = array(
               'viewed' => $query = $query + 1
            );
		*/
		$this->db->where('id', $id);
		$this->db->update('thread', array('viewed' => $count ));	
		endforeach;
	}
	
	function insertThread($id) {
		// SENSOR KATA
		$sen = $this->db->get('sensor_word');
		$title = $this->input->post('title');
		$comments = $this->input->post('comments');
		foreach($sen->result_array() as $sensor):
			$title = ereg_replace ($sensor['word'],$sensor['sensored'],$title);
			$comments = ereg_replace ($sensor['word'],$sensor['sensored'],$comments);
		endforeach;
		// GENERATE ID THREAD
		$no = $this->db->count_all('thread');
		$no += 1;
		$depan = 'THR';
		$tengah = '000';
		$jadi = $depan.$tengah.$no;
		// GENERATE ID JAM
		$this->db->select('NOW() as jam');
		$waktu = $this->db->get();
		foreach($waktu->result_array() as $jam):
		$data = array(
		   'id' => $jadi,
		   'id_category' => $id,
		   'title' => $title,
		   'body' => $comments,
		   'viewed' => 0,
		   'inserted_by' => 'User',
		   'inserted_date' => $jam['jam'],
		   'modified_date' => $jam['jam'],
		   'is_deleted' => 0

		);
		endforeach;
		$this->db->insert('Thread', $data); 
	}
	
	function insertPost($id) {
		// SENSOR
		$sen = $this->db->get('sensor_word');
		$comments = $this->input->post('comments');
		foreach($sen->result_array() as $sensor):
			$comments = ereg_replace ($sensor['word'],$sensor['sensored'],$comments);
		endforeach;
		// GENERATE ID POST
		$no = $this->db->count_all('post');
		$no += 1;
		$depan = 'POS';
		$tengah = '000';
		$jadi = $depan.$tengah.$no;
		// GENERATE JAM
		$this->db->select('NOW() as jam');
		$waktu = $this->db->get();
		foreach($waktu->result_array() as $jam):
		$data = array(
		   'id' => $jadi,
		   'id_thread' => $id,
		   'post' => $comments,
		   'inserted_by' => 'User',
		   'inserted_date' => $jam['jam'],
		   'modified_date' => $jam['jam'],
		   'is_deleted' => 0

		);
		endforeach;
		$this->db->insert('post', $data); 
	}
	
	function insertSensor(){
		$data = array(
		   'word' => $this->input->post('word'),
		   'sensored' => $this->input->post('sensored'),
		   'inserted_by' => 'Admin',
		   'is_deleted' => 0
		);
		
		$this->db->insert('sensor_word', $data);
	}
	
	function searchThread($key){
	
		$this->db->like('title', $key);
		$this->db->or_like('body', $key);
		$this->db->or_like('inserted_by', $key);
		$query = $this->db->get('thread');
		
		return $query;
	
	}

	function searchPost($key){
		$this->db->like('id_thread', $key);
		$this->db->or_like('post', $key);
		$this->db->or_like('inserted_by', $key);
		$query = $this->db->get('post');
		
		return $query;
	}
	
	function searchSensor($key){
		$this->db->like('word', $key);
		$this->db->or_like('sensored', $key);
		$this->db->or_like('inserted_by', $key);
		$query = $this->db->get('sensor_word');
		
		return $query;
	}
	function update() {
		
	}
	
	function delete() {
		
	}
}
?>
