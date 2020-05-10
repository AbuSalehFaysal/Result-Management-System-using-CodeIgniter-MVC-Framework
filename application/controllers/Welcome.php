<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('index');
	}

	public function search()
	{
		$this->load->view('search');
	}

	public function searchstudent()
	{
		$Board = $this->input->post('Board');
		$roll = $this->input->post('roll');
		$reg = $this->input->post('reg');
		$this->load->model('admin_model');
		
		$showResult = $this->admin_model->getStudentResult($Board, $roll, $reg);
		$this->load->view('search',['showResult'=>$showResult]);
		// $this->load->view('edu-admin/update_marks',['results'=>$results]);
	}
}
