<?php
class Meeting extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}

	public function other()
	{
		$this->load->view('other');
	}
}
?>