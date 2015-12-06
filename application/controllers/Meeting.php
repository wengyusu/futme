<?php
class Meeting extends CI_Controller {
	public function index()
	{
		$this->load->model('Meeting_Model');
		$result=$this->Meeting_Model->ifopen();
		if($result['content']=='on'){
			$this->load->model('Admin_Model');
			$school=$this->Admin_Model->getschool();
			$data['school']=$school;
			$this->load->view('index_index',$data);
		}
		elseif($result['content']=='off'){
			echo "Close";
		}
	}
	public function getschool(){
		$this->load->model('Meeting_Model');
		$result=$this->Meeting_Model->getschool();
		$i=0;
		foreach($result as $row){
			$t['name']='';
			$t['school']=$row['school'];
			$t['time']='';
			$json[$i]=$t;
			$i++;
		}
		echo $this->json_encode_ex($json);
	}

	public function schoolsearch(){
		$school =  file_get_contents("php://input"); 
		$this->load->model('Meeting_Model');

		$result=$this->Meeting_Model->schoolsearch($school);
		if(!empty($result)){
		$i=0;
		foreach($result as $row){
			
			$t['name']='';
			$t['school']=$row['school'];
			$t['time']='';
			$json[$i]=$t;
			$i++;
		}
	}
		else{
			$json='';
		}
		
		echo $this->json_encode_ex($json);
	
}
	
      
    public function url_encode($str) {  
        if(is_array($str)) {  
            foreach($str as $key=>$value) {  
                $str[urlencode($key)] = $this->url_encode($value);  
            }  
        } 
		else {  
            $str = urlencode($str);  
        }  
          
        return $str;  
    }

	public function getname(){
		$school =  file_get_contents("php://input"); 
		$this->load->model('Meeting_Model');
		$result=$this->Meeting_Model->getname($school);
		if(!empty($result)){
			$i=0;
			foreach($result as $row){
				$t['name']=$row['username'];
				$t['school']=$school;
				$t['time']=$row['time'];
				$json[$i]=$t;
				$i++;
			}
		}
			else{
				$json='';
			} 
		//return json_encode($json);
		echo $this->json_encode_ex($json);


	}



	public function submit(){
		$data=  file_get_contents("php://input"); 
		$data=explode(",", $data);
		$this->load->model('Meeting_Model');
		$result=$this->Meeting_Model->submit($data);
		if(!empty($result)){
				$t['name']=$result['username'];
				$t['school']='';
				$t['time']=$result['time'];
				$json[0]=$t;
		}
			else{
				$json[0]['name']='';
				$json[0]['school']='';
				$json[0]['time']='';
			} 
		//return json_encode($json);
		echo $this->json_encode_ex($json);
	}

	private function json_encode_ex($value)
{
    if (version_compare(PHP_VERSION,'5.4.0','<'))
    {
        $str = json_encode($value);
        $str = preg_replace_callback(
                                    "#\\\u([0-9a-f]{4})#i",
                                    function($matchs)
                                    {
                                         return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
                                    },
                                     $str
                                    );
        return $str;
    }
    else
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
}
?>