<?php 

    
    require_once (APPPATH."libraries/function.php");


 ?>


<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$email = $this->input->post('email',true);
		$pass = $this->input->post('pass',true);
		$this->load->model('admin_model');


		$formArray = array();
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required');
		// $this->load->view('edu-admin/index');
		if ( $this->form_validation->run()==false ) {
			# code...
			$this->load->view('edu-admin/index');
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
		} else {
			# code...
			
			$result = $this->admin_model->signin($email, $pass);
			if ($result) {
			 	# code...
			 	$_SESSION['name'] = $result->name;
			 	redirect(base_url().'edu-admin/dashboard');
			 } else {
			 	# code...
			 	$this->session->set_flashdata('error', 'Wrong Email or Password!');
			 	$this->load->view('edu-admin/index');
			 	
			 }
			  



		}
		
	}

	

	public function signup()
	{
		$this->load->view('edu-admin/signup');	
	}

	public function admin_data()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pass','Password','required');
		if ($this->form_validation->run()==false) {
			# code...
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
			$this->load->view('edu-admin/signup');
			
		} else {
			# code...
			$this->admin_model->insert_admin_data();
			$this->session->set_flashdata('success', 'Congatulations, you can sign in now!');
			redirect(base_url().'edu-admin/signup');
		}
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
		$this->load->model('admin_model');
		$students = $this->admin_model->getStudentinfo();
		$this->load->view('edu-admin/all_students',['students'=>$students]);
	}

	public function add_new_student()
	{
		$this->load->view('edu-admin/add_new_student');	
	}

	public function add_new_student_data()
	{
		$this->load->model('admin_model');
		$this->form_validation->set_rules('stu_name','Student Name','required');
		$this->form_validation->set_rules('stu_roll','Student Roll','required');
		$this->form_validation->set_rules('reg','Registration No','required');
		$this->form_validation->set_rules('board','Board','required');
		$this->form_validation->set_rules('institute','Institute','required');
		if ($this->form_validation->run()==false) {
			# code...
			$this->load->view('edu-admin/add_new_student');
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
		} else {
			# code...
			$this->admin_model->insert_student_data();
			$this->session->set_flashdata('success', 'Congatulations!');
			redirect(base_url().'edu-admin/all_students');
		}
		
		
	}

	public function add_result()
	{	
		$this->load->view('edu-admin/add_result');
	}


	public function update_result($stu_roll)
	{
		$this->load->model('admin_model');
		$results = $this->admin_model->getSingleStudentmarks($stu_roll);
		$this->load->view('edu-admin/update_marks',['results'=>$results]);
	}

	public function delete_student()
	{
		$this->load->view('edu-admin/delete_student');
	}

	public function view($stu_sl)
	{
		$this->load->model('admin_model');
		$students = $this->admin_model->getSingleStudentinfo($stu_sl);
		$this->load->view('edu-admin/view',['students'=>$students]);
	}

	public function delete($stu_sl)
	{
		$this->load->model('admin_model');
		$this->admin_model->deleteSingleStudent($stu_sl);
		$this->session->set_flashdata('success', 'Delete Student successfully!');
		redirect(base_url().'edu-admin/all_students');
	}

	public function add_marks($stu_sl)
	{
		$this->load->model('admin_model');
		$students = $this->admin_model->getSingleStudentinfo($stu_sl);
		$this->load->view('edu-admin/add_result',['students'=>$students]);
	}

	public function add_student_mark($stu_sl)
	{

			# code...
		$this->load->model('admin_model');
		$this->form_validation->set_rules('ban','Bangla','required');
		$this->form_validation->set_rules('en','English','required');
		$this->form_validation->set_rules('mat','Math','required');
		$this->form_validation->set_rules('sci','Science','required');
		$this->form_validation->set_rules('ss','Social Science','required');
		$this->form_validation->set_rules('religion','Religion','required');
		if ($this->form_validation->run()==false) {
			# code...
			$students = $this->admin_model->getSingleStudentinfo($stu_sl);
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
			$this->load->view('edu-admin/add_result',['students'=>$students]);
			
		} else {
			# code...
			$this->admin_model->addSingleStudentMark($stu_sl);
			$this->session->set_flashdata('success', 'Congatulations!');
			redirect(base_url().'edu-admin/all_students');
		}
		

		
	}

	public function edit_marks(){
		$this->load->model('admin_model');
		$this->admin_model->updateStudentMark();
		$this->session->set_flashdata('success', 'Marks updated successfully!');
		redirect(base_url().'edu-admin/all_students');
	}

	public function searchstudent()
	{
		$Board = $this->input->post('board');
		$roll = $this->input->post('roll');
		$reg = $this->input->post('reg');
		$this->load->model('admin_model');	
		$results = $this->admin_model->getStudentResult($Board, $roll, $reg);
		// var_dump($results);
		$this->load->view('search',['results'=>$results]);
	}
}


?>













