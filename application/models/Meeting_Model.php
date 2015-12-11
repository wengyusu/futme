<?php
class Meeting_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function schoolsearch($school){
		$sql = "SELECT school FROM star_school WHERE school LIKE '%".$school."%'";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function ifopen(){
		$query = $this->db->select('*')->from('config')->where('name','switch')
		->get();
		return $query->row_array();
	}
	
	public function getname($school){
		$query1=$this->db->select('*')->from('school')->where('school',$school)
		->get();
		$school_id=$query1->row_array();
		$school_id=$school_id['id'];
		$query2=$this->db->select('username,school_id,time')->from('joiner')->where('school_id',$school_id)
		->get();
		return $query2->result_array();
	}

	public function submit($data){
		$name=$data[0];
		$time=$data[1];
		$other=$data[2];
		$this->db->set(array('time'=>1,'login_time'=>$time,'other'=>$other))->where('username',$name)->update('joiner');
		$query=$this->db->select('username,school_id,time')->from('joiner')->where('username',$name)
		->get();
		return $query->row_array();
	}

	public function getschool(){
		$query=$this->db->select('school')->from('school')->get();
		return $query->result_array();
	}

	public function examine($name){
		$query=$this->db->select('time')->from('joiner')->where('username',$name)->get();
		return $query->row_array();
	}

}
?>