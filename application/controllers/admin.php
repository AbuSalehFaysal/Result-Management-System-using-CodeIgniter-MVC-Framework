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
}
