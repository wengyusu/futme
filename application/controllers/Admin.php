<?php
class Admin extends CI_Controller {
	public function __construct()
    {
    parent::__construct();
		$this->load->library('session');
		//date_default_timezone_set('prc');

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
		echo date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']); 
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
			$this->load->model('Admin_Model');
			$data['time']=$this->Admin_Model->getjointime();
			$this->load->view('admin_header');
			$this->load->view('settime',$data);
			$this->load->view('admin_footer');
		}
	}
	
	public function upload(){
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			$data['codeerror']=$data['uploaderror']='';
			$this->load->view('admin_header');
			$this->load->view('upload',$data);
			$this->load->view('admin_footer');
		}
	}
	
	public function export(){
		if(isset($_SESSION['username']) && $_SESSION['auth']==0){
			//导入所需要的类库
		require("./././Class/PHPExcel.php");
		require("./././Class/PHPExcel/Reader/Excel5.php");
		require("./././Class/PHPExcel/IOFactory.php");
		//获取当前日期作为文件名
		$date = date("Y_m_d", time());
		$fileName = "$date" . ".xls";
		//初始化输出类并进行配置
		$objPHPExcel = new PHPExcel();
		$objProps = $objPHPExcel->getProperties();
		//尤其是这个，设置对拿个Sheet输出
		$objPHPExcel->setActiveSheetIndex(0);
		$objActSheet = $objPHPExcel->getActiveSheet();
		//对输出Excel设置表头，内容因具体项目而定
		$objActSheet->setCellValue('A1', '姓名');
		$objActSheet->setCellValue('B1', '单位');
		$objActSheet->setCellValue('C1', '是否签到');
		$objActSheet->setCellValue('D1', '签到时间');
		//获取数据库中的信息条目数，并取出
		$this->load->model('Admin_Model');
		$count = $this->Admin_Model->joinercount();
		//echo $count; die;
		$cell = $this->Admin_Model->getjoiner();
		//var_dump($count); die;
		//$cell = M('joiner')->order('id')->select();
		//循环遍历，添加到Excel中，重点是setCellValue方法
		for($i = 1; $i<= $count; $i++){
			$objActSheet->setCellValue('A'.($i+1), $cell[$i-1]['username']);
			$data=$cell[$i-1]['school_id'];
			$school=$this->Admin_Model->check($data,'school','id');
			//$school = M('school')->find($cell[$i-1]['school_id']);
			$objActSheet->setCellValue('B'.($i+1), $school['school']);
			$starttime=$this->Admin_Model->getjointime();
			if($cell[$i-1]['time'] > 0 && $cell[$i-1]['login_time'] > $starttime){
				$objActSheet->setCellValue('C'.($i+1), '迟到');
			}else if($cell[$i-1]['time'] > 0){
				$objActSheet->setCellValue('C'.($i+1), '正常参会');
			}else{
				$objActSheet->setCellValue('C'.($i+1), '尚未签到');
			}
			if($cell[$i-1]['login_time'] != ''){
				$objActSheet->setCellValue('D'.($i+1), date('Y-m-d H:i:s', $cell[$i-1]['login_time']));
			}else{
				$objActSheet->setCellValue('D'.($i+1), '未签到');
			}
			
		}
		//文件名转换为gb2312编码，不然Windows下会乱码
		$fileName = iconv("utf-8", "gb2312", $fileName);
		//自定义http请求的返回内容
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename=\"$fileName\"");
		header('Cache-Control: max-age=0');
		//将抽象的PHPExcel对象输出为Excel文件
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
		}
		
	public function meetview(){
		if(isset($_SESSION['username'])){
			$this->load->model('Admin_Model');
			$data['data']=$this->Admin_Model->getjoiner();
			foreach ($data['data'] as &$row){
				$school = $this->Admin_Model->check($row['school_id'],'school','id');
				$row['school_id'] = $school['school'];
				if($row['time']=='0'){$row['time']='未签到';}
				if($row['time']=='1'){$row['time']='已签到';}
				if(!empty($row['login_time']))$row['login_time']=date('Y-m-d H:i:s',intval($row['login_time']));
			}
			//var_dump($data);
			$this->load->view('admin_header');
			$this->load->view('meetview',$data);
			$this->load->view('admin_footer'); 
		}
	}		
		
	public function doview($time){
		if(isset($_SESSION['username'])){
			$this->load->model('Admin_Model');
			$data['data']=$this->Admin_Model->gainjoiner($time);
			foreach ($data['data'] as &$row){
				$school = $this->Admin_Model->check($row['school_id'],'school','id');
				$row['school_id'] = $school['school'];
				if($row['time']=='0'){$row['time']='未签到';}
				if($row['time']=='1'){$row['time']='已签到';}
				if(!empty($row['login_time'])){$row['login_time']=date('Y-m-d H:i:s',intval($row['login_time']));}
			}
			$this->load->view('admin_header');
			$this->load->view('meetview',$data);
			$this->load->view('admin_footer'); 
		}
	}
	
	public function alter(){
		$this->load->model('Admin_Model');
		$this->Admin_Model->alter();
		redirect('/admin');
	}
		
	}
	
		
	
?>