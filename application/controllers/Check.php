<?php

class Check extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		//date_default_timezone_set('prc');
    }

    public function index()
    {
		if(isset($_POST) && isset($_POST['submit'])){
        $this->load->helper('form');

        $this->load->library('form_validation');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$code = $this->input->post('code');
		$code2 = strtolower($this->session->userdata('code'));
		$data['usererror'] = $data['codeerror'] = $data['requireerror'] = '';
		if(strtolower($code) != $code2){
		$data['codeerror'] = "<span class='label label-warning'>验证码错误</span>";
		$this->load->view('login',$data);
		}
		else{
			 if ($this->form_validation->run('login') == FALSE){
						$data['requireerror'] = "<span class='label label-warning'>用户名或密码不能为空</span>";
						$this->load->view('login',$data);
			 }
			else{
					$this->load->model('Admin_Model');
					$result=$this->Admin_Model->logincheck($username,$password);
					if(empty($result)){
						$data['usererror'] = "<span class='label label-warning'>用户名或密码错误</span>";
						$this->load->view('login',$data);
					}
				else{
					$time = $_SERVER['REQUEST_TIME']; 
					$ip=$_SERVER['REMOTE_ADDR'];
					$this->load->model('Admin_Model');
					$result=$this->Admin_Model->getdetail($username);
					$_SESSION['all']=$this->Admin_Model->joinercount();
					$_SESSION['yiqian']=count($this->Admin_Model->gainjoiner('1'));
					$_SESSION['weiqian']=count($this->Admin_Model->gainjoiner('0'));		
					$_SESSION['start_time']=$this->Admin_Model->getjointime();
					$_SESSION["username"]=$username;
					$_SESSION["time"]=$result['login_time'];
					$_SESSION["ip"]=$result['login_ip'];
					$_SESSION['auth']=$result['lock'];


					//echo $_SESSION['username'];

					$this->Admin_Model->detailinsert($username,$ip,$time);
					
					redirect('/admin');
					}
				}
		}
	 }
	}
	
	public function passchange()
	{
		if(isset($_POST) && isset($_POST['submit']) && $_SESSION['auth']==0){
		$username=$_SESSION['username'];
		$password=md5($this->input->post('password'));
		$newpassword=$this->input->post('newpassword');
		$passwordconf=$this->input->post('passwordconf');
		$code = $this->input->post('code');
		$code2 = strtolower($this->session->userdata('code'));
		$data['passerror'] = $data['codeerror'] = $data['requireerror'] = $data['conferror'] = '';
		$this->load->library('form_validation');
		if ($this->form_validation->run('passchange') == FALSE){
						$data['requireerror'] = "<span class='label label-warning'>密码不能为空</span>";
						$this->view($data,'passchange');
		}
		else{
		if(strtolower($code) != $code2){
		$data['codeerror'] = "<span class='label label-warning'>验证码错误</span>";
		$this->view($data,'passchange');
		}
		else{
		if($newpassword==$passwordconf){	
		$this->load->model('Admin_Model');
		$result=$this->Admin_Model->passcheck($username,$password);
		if(empty($result)){
			$data['passerror'] = "<span class='label label-warning'>原密码不正确</span>";
			$this->view($data,'passchange');
					}
		else{
		$newpassword=md5($newpassword);
		$this->Admin_Model->passchange($username,$newpassword);
		redirect('/admin');
		}
		}
		else{
		$data['conferror'] = "<span class='label label-warning'>密码不一致</span>";
		$this->view($data,'passchange');
		}
		    }
		}
		}
	}

	public function add(){
		if(isset($_POST) && isset($_POST['submit']) && $_SESSION['auth']==0){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$passwordconf = $this->input->post('passwordconf');
			$data['usererror'] = $data['codeerror'] = $data['requireerror'] = $data['conferror'] = $data['repeaterror'] = '';
			$data['lock']=$this->input->post('lock');
			$code = $this->input->post('code');
			$code2 = strtolower($this->session->userdata('code'));
			$this->load->library('form_validation');
			if ($this->form_validation->run('add') == FALSE){
						$data['requireerror'] = "<span class='label label-warning'>用户名或密码不能为空</span>";
						$this->view($data,'add');
		}
		else{
				if(strtolower($code) != $code2){
					$data['codeerror'] = "<span class='label label-warning'>验证码错误</span>";
					$this->view($data,'add');
				}
				else{
			if($password!=$passwordconf){
		$data['conferror'] = "<span class='label label-warning'>密码不一致</span>";
		$this->view($data,'add');
		}
			else{
				$this->load->model('Admin_Model');
				$result=$this->Admin_Model->check($username,'user','username');
				if(empty($result)){		
					$password = md5($password);
					$lock = $this->input->post('lock');
					$this->Admin_Model->add($username,$password,$lock);	
					redirect('/admin');		
					
				}
				else{
					$data['repeaterror']="<span class='label label-warning'>用户名已存在</span>";
					$this->view($data,'add');
				}
				}
			}
			}
		}
	}
	
	public function schooladd(){
		if(isset($_POST) && isset($_POST['submit']) && $_SESSION['auth']==0){
			$data['repeaterror']=$data['codeerror']=$data['requireerror']='';
			$school=$this->input->post('school');
			$code = $this->input->post('code');
			$code2 = strtolower($this->session->userdata('code'));
			$this->load->library('form_validation');
			if ($this->form_validation->run('schooladd') == FALSE){
				$data['requireerror'] = "<span class='label label-warning'>名称不能为空</span>";
				$this->view($data,'schooladd');
			}
			else{
				if(strtolower($code) != $code2){
					$data['codeerror'] = "<span class='label label-warning'>验证码错误</span>";
					$this->view($data,'schooladd');
				}
				else{
					$this->load->model('Admin_Model');
					$result=$this->Admin_Model->check($school,'school','school');	
					if(empty($result)){		
						$this->Admin_Model->schooladd($school);	
						redirect('/admin');		
				}
				else{
					$data['repeaterror']="<span class='label label-warning'>单位重复</span>";
					$this->view($data,'schooladd');
				}
				}
			}
		}
	}
	
		public function joineradd(){
		if(isset($_POST) && isset($_POST['submit']) && $_SESSION['auth']==0){
			$data['codeerror']=$data['requireerror']='';
			$this->load->model('Admin_Model');
			$data['school']=$this->Admin_Model->getschool();
			$name=$this->input->post('name');
			$school_id=$this->input->post('school_id');
			$code = $this->input->post('code');
			$code2 = strtolower($this->session->userdata('code'));
			$this->load->library('form_validation');
			if ($this->form_validation->run('joineradd') == FALSE){
				$data['requireerror'] = "<span class='label label-warning'>名称不能为空</span>";
				$this->view($data,'joineradd');
			}
			else{
				if(strtolower($code) != $code2){
					$data['codeerror'] = "<span class='label label-warning'>验证码错误</span>";
					$this->view($data,'joineradd');
				}
				else{
					$this->load->model('Admin_Model');	
					$result=$this->Admin_Model->joineradd($name,$school_id);
					if($result){
						redirect('/admin');	
					}
						
				}
			}
		}
	}
	
	public function timeselect(){
		if(isset($_POST) && isset($_POST['submit']) && isset($_SESSION['username'])){
			$data['codeerror'] = '';
			$this->load->model('Admin_Model');
			$data['time']=$this->Admin_Model->getjointime();
			$date=$this->input->post('date');
			$date = strtotime($date);
				//echo $date; die;
			$this->load->model('Admin_Model');
			$this->Admin_Model->dateadd($date);
			redirect('/admin/settime');
			}
		}
	
	public function do_upload(){
		if(isset($_POST) && isset($_POST['submit']) && $_SESSION['auth']==0){
			$data['codeerror'] = $data['uploaderror'] = '';
			$code = $this->input->post('code');
			$code2 = strtolower($this->session->userdata('code'));
			if(strtolower($code) != $code2){
				$data['codeerror']="<span class='label label-warning'>验证码错误</span>";
				$this->view($data,'upload');
			}
			else{
				$config['upload_path']      = './uploads/';
				$config['allowed_types']    = 'xls|xlsx';
				$config['file_name'] = time();
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload('userfile')){
						$data['uploaderror'] = "<span class='label label-warning'>格式错误</span>";
						$this->view($data,'upload');
				}
				else{
					$extension=$this->upload->data('file_ext');
					$filename=$this->upload->data('full_path');					
					$this->read_excel($filename, $extension);
					redirect('/admin');
				}
			}
		}
	}
	
	private function read_excel($filename,$extension){
		require("./././Class/PHPExcel.php");
		$PHPExcel = new PHPExcel();
		if($extension == '.xls'){
			require("./././Class/PHPExcel/Reader/Excel5.php");
			$PHPReader = new PHPExcel_Reader_Excel5();
		}
		elseif($extension == '.xlsx'){
			require("./././Class/PHPExcel/Reader/Excel2007.php");
			$PHPReader = new PHPExcel_Reader_Excel2007();
		}
		//读取excel文件
		$PHPExcel = $PHPReader->load($filename);
		//获取Sheet0中的数据
		$currentSheet = $PHPExcel->getSheet(0);
		//获取行数、列数
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		//循环遍历excel表格，重点是getCell和getValue方法
		for($currentRow = 1; $currentRow <= $allRow; $currentRow++){
			for($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++){
				$address = $currentColumn . $currentRow;
				$data[$currentRow][$currentColumn] = $currentSheet->getCell($address)->getValue();
			}
		}
		//循环所得数据插入数据库，至于从2开始嘛，执行var_dump($data)你就懂了
		//echo "<pre>";
		// var_dump($data);die;
		$this->load->model('Admin_Model');
					
		for ($i=2; $i <= count($data); $i++) {
			$school = $data[$i]['A'];

			$find=$this->Admin_Model->check($school,'school','school');

			if(!empty($find)){
				$school_id = $find['id'];
			}else{
				$school_id = $this->Admin_Model->schooladd($school);
			}

			$name=$data[$i]['B'];
			$this->Admin_Model->joineradd($name,$school_id);		
		}
			redirect('/admin');
	}
	
	private function view($data,$view){
					$this->load->view('admin_header');
					$this->load->view($view,$data);
					$this->load->view('admin_footer');
	}
	
	public function get_code(){
		$this->load->library('captcha');
		$code = $this->captcha->getCaptcha();
		$this->session->set_userdata('code', $code);
		$this->captcha->showImg();
 }
}
