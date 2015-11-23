<?php
class Meeting extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}
	public function view()
	{
		$this->load->view('view');
	}
	public function other()
	{
		$this->load->view('other');
	}
}
?>