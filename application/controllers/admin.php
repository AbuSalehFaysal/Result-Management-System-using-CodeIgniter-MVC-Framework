<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('edu-admin/index');
	}

	public function signup()
	{
		$this->load->view('edu-admin/signup');
	}

	public function dashboard()
	{
		$this->load->view('edu-admin/dashboard');
	}

	public function logout()
	{
		$this->load->view('edu-admin/logout');
	}

	public function all_students()
	{
		$this->load->view('edu-admin/all_students');
	}

	public function add_new_student()
	{
		$this->load->view('edu-admin/add_new_student');
	}

	public function add_result()
	{
		$this->load->view('edu-admin/add_result');
	}

	public function update_result()
	{
		$this->load->view('edu-admin/update_result');
	}

	public function delete_student()
	{
		$this->load->view('edu-admin/delete_student');
	}
}
