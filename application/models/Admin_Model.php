<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	    public function __construct()
    {
		$this->load->database();
        // Call the CI_Model constructor
        parent::__construct();
    }
	function logincheck($username,$password) {
		$query = $this->db->select('*')->from('user')
		->group_start()
        ->where('username', $username)
        ->where('password', $password)
		->group_end()
		->get();
		return $query->result();
}
	function passchange($username,$password){
		$query = $this->db->set('password',$password)->where('username', $username)->update('user');
	}
	function detailinsert($username,$ip,$time){
		$data = array(
			'login_time' => $time,
			'login_ip' => $ip
		);
		$query = $this->db->set($data)->where('username', $username)->update('user');
	}
	function passcheck($username,$password){
		$query = $this->db->select('*')->from('user')
		->group_start()
        ->where('username', $username)
        ->where('password', $password)
		->group_end()
		->get();
		return $query->result();
	}
	function getdetail($username){
		$query = $this->db->select('login_time,login_ip')->from('user')
        ->where('username', $username)
		->get();
		return $query->row();
	}
	function add($username,$password,$lock){
		$data = array(
			'username' => $username,
			'password' => $password,
			'login_ip' => '',
			'login_time' => '',
			'lock'=>$lock
);
		$this->db->insert('user', $data);
	}
	function check($data,$table,$column){
		$query = $this->db->select('*')->from($table)
        ->where($column, $data)
		->get();
		return $query->result();	
	}
	
	function schooladd($school){
		$this->db->set('school', $school)->insert('school');
	}
	
	function getschool(){
		$query = $this->db->select('school,order_num,id')->from('school')
		->get();
		foreach ($query->result_array() as $row){
			$i=intval($row['order_num']);
			$school[$i]['name']=$row['school'];
			$school[$i]['id']=intval($row['id']);
			}
		return $school;
	}
	
		function joineradd($name,$school_id){
		$this->db->set(array('username'=>$name,'school_id'=>$school_id))->insert('joiner');
	}
	
	function getuser(){
		$query = $this->db->select('username,lock')->from('user')
		->get();
		return $query->result_array();
	}
	
	function clear(){
		$this->db->set(array('lock'=>0,'other'=>0,'login_time'=>NULL))->update('joiner');
	}
	
		function dateadd($date){
		$this->db->set('content', $date)->where('name','start_time')->update('config');
	}
}