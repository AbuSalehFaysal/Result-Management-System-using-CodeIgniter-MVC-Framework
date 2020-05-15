<?php require_once (APPPATH."helpers/helper.php"); ?>

<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('Admin_model');
		$email = $this->input->post('email',true);
		$pass = $this->input->post('pass',true);

		$formArray = array();
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required');

		if ( $this->form_validation->run()==false ) {
			$this->load->view('edu-admin/index');
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
		} else {
			$result = $this->Admin_model->signin($email, $pass);
			if ($result) {
			 	$this->session->name = $result->name;
			 	redirect(base_url().'edu-admin/dashboard');
			 } else {
			 	$this->session->set_flashdata('error', 'Wrong Email or Password!');
			 	$this->load->view('edu-admin/index');
			 }
		}
	}

	public function signup()
	{
		$this->load->view('edu-admin/signup');	
	}

	public function signin()
	{
		$this->load->view('edu-admin/index');	
	}

	public function admin_data()
	{
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pass','Password','required');
		if ( $this->form_validation->run()==false ) {
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
			$this->load->view('edu-admin/signup');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$status = 'active';
			$this->Admin_model->insert_admin_data($name, $email, $pass, $status);
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
		session_destroy();
		header("location:".base_url()."edu-admin/index");
	}

	public function all_students()
	{
		$this->load->model('Admin_model');
		$students = $this->Admin_model->getStudentinfo();
		$this->load->view('edu-admin/all_students',['students'=>$students]);
	}

	public function add_new_student()
	{
		$this->load->view('edu-admin/add_new_student');	
	}

	public function add_new_student_data()
	{
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('stu_name','Student Name','required');
		$this->form_validation->set_rules('stu_roll','Student Roll','required');
		$this->form_validation->set_rules('reg','Registration No','required');
		$this->form_validation->set_rules('board','Board','required');
		$this->form_validation->set_rules('institute','Institute','required');
		if ($this->form_validation->run()==false) {
			$this->load->view('edu-admin/add_new_student');
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
		} else {
			$stu_name = $this->input->post('stu_name');
			$stu_roll = $this->input->post('stu_roll');
			$reg = $this->input->post('reg');
			$board = $this->input->post('board');
			$institute = $this->input->post('institute');
			$this->Admin_model->insert_student_data($stu_name, $stu_roll, $reg, $board, $institute);
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
		$this->load->model('Admin_model');
		$result = $this->Admin_model->checkResultExist($stu_roll);
		if ( $result ) {
			$results = $this->Admin_model->getSingleStudentmarks($stu_roll);
			$this->load->view('edu-admin/update_marks',['results'=>$results]);
		} else {
			$this->load->view('edu-admin/notice1');
		}	
	}

	public function view($stu_roll)
	{
		$this->load->model('Admin_model');
		$students = $this->Admin_model->getSingleStudentinfo($stu_roll);
		$this->load->view('edu-admin/view',['students'=>$students]);
	}

	public function delete($stu_roll)
	{
		$this->load->model('Admin_model');
		$this->Admin_model->deleteSingleStudent($stu_roll);
		$this->session->set_flashdata('success', 'Delete Student successfully!');
		redirect(base_url().'edu-admin/all_students');
	}

	public function add_marks($stu_roll)
	{
		$this->load->model('Admin_model');
		$result = $this->Admin_model->checkResultExist($stu_roll);
		if ( $result ) {
			$this->load->view('edu-admin/notice2');
		} else {
			$students = $this->Admin_model->getSingleStudentinfo($stu_roll);
			$this->load->view('edu-admin/add_result',['students'=>$students]);
		}
		
	}

	public function add_student_mark($stu_roll)
	{
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('ban','Bangla','required');
		$this->form_validation->set_rules('en','English','required');
		$this->form_validation->set_rules('mat','Math','required');
		$this->form_validation->set_rules('sci','Science','required');
		$this->form_validation->set_rules('ss','Social Science','required');
		$this->form_validation->set_rules('religion','Religion','required');
		if ($this->form_validation->run()==false) {
			$students = $this->Admin_model->getSingleStudentinfo($stu_roll);
			$this->session->set_flashdata('error', 'Please, fill the form properly!');
			$this->load->view('edu-admin/add_result',['students'=>$students]);
		} else {
			$stu_name = $this->input->post('stu_name');
			$stu_roll = $this->input->post('stu_roll');
			$reg = $this->input->post('reg');
			$board = $this->input->post('board');
			$institute = $this->input->post('institute');
			$b_m = $this->input->post('ban');
			$e_m = $this->input->post('en');
			$m_m = $this->input->post('mat');
			$s_m = $this->input->post('sci');
			$ss_m = $this->input->post('ss');
			$r_m = $this->input->post('religion');

			$ban_grade = checkGrade($b_m);
        	$ban_Gpa = checkGpa($b_m);

        	$en_grade = checkGrade($e_m);
        	$en_Gpa = checkGpa($e_m);

			$mat_grade = checkGrade($m_m);
        	$mat_Gpa = checkGpa($m_m);

			$sci_grade = checkGrade($s_m);
        	$sci_Gpa = checkGpa($s_m);
			
			$ss_grade = checkGrade($ss_m);
        	$ss_Gpa = checkGpa($ss_m);
			
			$religion_grade = checkGrade($r_m);
        	$religion_Gpa = checkGpa($r_m);

        	$stu_cgpa = checkCgpa($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);
        	$stu_cgpa_round = round($stu_cgpa, 2);

        	$grade_alpha = checkGradeAlpha($stu_cgpa);

        	$result = checkResult($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);

			$this->Admin_model->addSingleStudentMark($stu_sl, $stu_name, $stu_roll, $reg, $board, $institute, $b_m, $e_m, $m_m, $s_m, $ss_m, $r_m, $ban_grade, $ban_Gpa, $en_grade, $en_Gpa, $mat_grade, $mat_Gpa, $sci_grade, $sci_Gpa, $ss_grade, $ss_Gpa, $religion_grade, $religion_Gpa , $stu_cgpa_round, $grade_alpha, $result );
			$this->session->set_flashdata('success', 'Congatulations!');
			redirect(base_url().'edu-admin/all_students');
		}
	}

	public function edit_marks()
	{
		$this->load->model('Admin_model');
		$result_sl = $this->input->post('result_sl');
		$b_m = $this->input->post('ban');
		$e_m = $this->input->post('en');
		$m_m = $this->input->post('mat');
		$s_m = $this->input->post('sci');
		$ss_m = $this->input->post('ss');
		$r_m = $this->input->post('religion');

		$ban_grade = checkGrade($b_m);
        $ban_Gpa = checkGpa($b_m);

		$en_grade = checkGrade($e_m);
        $en_Gpa = checkGpa($e_m);
		
		$mat_grade = checkGrade($m_m);
        $mat_Gpa = checkGpa($m_m);
		
		$sci_grade = checkGrade($s_m);
        $sci_Gpa = checkGpa($s_m);
		
		$ss_grade = checkGrade($ss_m);
        $ss_Gpa = checkGpa($ss_m);
		
		$religion_grade = checkGrade($r_m);
        $religion_Gpa = checkGpa($r_m);

        $stu_cgpa = checkCgpa($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);
        $stu_cgpa_round = round($stu_cgpa, 2);

		$grade_alpha = checkGradeAlpha($stu_cgpa);
		$result = checkResult($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);

		$this->Admin_model->updateStudentMark($result_sl, $b_m, $e_m, $m_m, $s_m, $ss_m, $r_m, $ban_grade, $ban_Gpa, $en_grade, $en_Gpa, $mat_grade, $mat_Gpa, $sci_grade, $sci_Gpa, $ss_grade, $ss_Gpa, $religion_grade, $religion_Gpa, $stu_cgpa_round, $grade_alpha, $result );
		$this->session->set_flashdata('success', 'Marks updated successfully!');
		redirect(base_url().'edu-admin/all_students');
	}

	public function searchstudent()
	{
		$board = $this->input->post('board');
		$roll = $this->input->post('roll');
		$reg = $this->input->post('reg');
		$this->load->model('Admin_model');
		$this->form_validation->set_rules('board','Board','required');
		$this->form_validation->set_rules('roll','Roll No','required');
		$this->form_validation->set_rules('reg','Registration No','required');
		if ( $this->form_validation->run()==false ) {
				$this->session->set_flashdata('error', 'Please, fill the form properly!');
				$this->load->view('index');
			} else {
				$results = $this->Admin_model->getStudentResult($board, $roll, $reg);
				if ( $results ) {
					$this->load->view('search',['results'=>$results]);
				} else {
					$this->session->set_flashdata('error', 'No result found!');
					$this->load->view('index');
				}	
			}
	}
		
}





