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
	public function schoolsearch($school=''){
		$this->load->model('Meeting_Model');
		
		$school = urldecode($school);

		$result=$this->Meeting_Model->schoolsearch($school);
		
		
		echo urldecode(json_encode($this->url_encode($result)));
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

	public function getname($school){
		$school = urldecode($school);
		$this->load->model('Meeting_Model');
		$result=$this->Meeting_Model->getname($school);
		$i=0;
		foreach($result as $row){
			
			$t['name']=$row['username'];
			$t['school']=$school;
			$t['time']=$row['time'];
			$json[$i]=$t;
			$i++;
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