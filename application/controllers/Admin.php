<?php
class Admin extends CI_Controller {
	public function __construct()
    {
    parent::__construct();
		$this->load->library('session');

		$this->load->helper('url');
    }
	public function index()
	{
		if(!isset($_SESSION['username'])){
			$this->login();
		}
		else{
			$this->load->view('admin_header');
			$this->load->view('admin_footer');
		}
	}
	public function login()
	{
		if(!isset($_SESSION['username'])){
		$data['usererror'] = $data['codeerror'] = $data['requireerror'] = '';
		echo date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']+28800); 
		$this->load->view('login',$data);
		}
		else{
			redirect('/admin');
		}
	}
	
	public function logout()
	{
		session_destroy();
			$this->login();

	}
	
	function preadd($lock){
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
		$data['usererror'] = $data['codeerror'] = $data['requireerror'] = $data['conferror'] = $data['repeaterror'] = '';
		$data['lock']=$lock;
		$this->load->view('admin_header');
		$this->load->view('add',$data);
		$this->load->view('admin_footer');
		}
	}
	
	public function change()
	{
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
		$data['passerror'] = $data['codeerror'] = $data['requireerror'] = $data['conferror'] = '';
		$this->load->view('admin_header');
		$this->load->view('passchange',$data);
		$this->load->view('admin_footer');
		}
	}
	public function schooladd()
	{
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			$data['repeaterror']=$data['codeerror']=$data['requireerror']='';
			$this->load->view('admin_header');
			$this->load->view('schooladd',$data);
			$this->load->view('admin_footer');
		}
	}


	public function joineradd()
		{
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			$this->load->model('Admin_Model');
			$school=$this->Admin_Model->getschool();

			$data['codeerror']=$data['requireerror']='';
			$data['school']=$school;
			$this->load->view('admin_header');
			$this->load->view('joineradd',$data);
			$this->load->view('admin_footer');
			}
		}
		
	public function showuser(){
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			$this->load->model('Admin_Model');
			$result=$school=$this->Admin_Model->getuser();
			$i=0;
			foreach ($result as $row){
				if(intval($row['lock'])==0){
					$admin[$i]=$row['username'];
					$i++;
				}
			}
			$i=0;
			foreach ($result as $row){
				if(intval($row['lock'])==2){
					$watcher[$i]=$row['username'];
					$i++;
				}
			}
			$data['admin']=$admin;
			$data['watcher']=$watcher;
			$this->load->view('admin_header');
			$this->load->view('showuser',$data);
			$this->load->view('admin_footer');
		}
	}
	
	public function clear(){
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			$this->load->model('Admin_Model');
			$this->Admin_Model->clear();
			redirect('/admin');				
		}
	}
	
	public function settime(){
		if(isset($_SESSION['username'])){
			$data['codeerror']='';
			$this->load->view('admin_header');
			$this->load->view('settime',$data);
			$this->load->view('admin_footer');
		}
	}
	
	public function upload(){
				if(isset($_SESSION['username'])){
			$data['codeerror']=$data['uploaderror']='';
			$this->load->view('admin_header');
			$this->load->view('upload',$data);
			$this->load->view('admin_footer');
		}
	}
		
	}
?>