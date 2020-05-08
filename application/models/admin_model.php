<?php  

	class admin_model extends CI_model {

		public function insert_admin_data ()
		{
			$adminData=array();
			$adminData['name'] = $this->input->post('name');
			$adminData['email'] = $this->input->post('email');
			$adminData['pass'] = $this->input->post('pass');
			$adminData['status'] = 'active';
			$this->db->insert('user_admin',$adminData);
		}

		public function signin($email, $pass) 
		{
			$this->db->select('*');
			$this->db->from('user_admin');
			$this->db->where('email',$email);
			$this->db->where('pass',$pass);
			$query_result = $this->db->get();
			$result = $query_result -> row();
			return $result; 
		}

		public function insert_student_data()
		{
			
			$studentData = array();
			$studentData['stu_name'] = $this->input->post('stu_name',true);
			$studentData['stu_roll'] = $this->input->post('stu_roll',true);
			$studentData['reg'] = $this->input->post('reg',true);
			$studentData['board'] = $this->input->post('board',true);
			$studentData['institute'] = $this->input->post('institute',true);
			$this->db->insert('students_info',$studentData);
		}

		// public function getStudent($student_sl)
		// {
		// 	$this->db->where('stu_sl',$student_sl)
		// 	return $student = $this->db->get('students_info')->row_array();
		// }


		// public function insert_student_mark ()
		// {
		// 	$studentMark = array(); 
		// 	$studentMark['b_m'] = $this->input->post('ban',true);
		// 	$studentMark['e_m'] = $this->input->post('en',true);
		// 	$studentMark['m_m'] = $this->input->post('mat',true);
		// 	$studentMark['s_m'] = $this->input->post('sci',true);
		// 	$studentMark['ss_m'] = $this->input->post('ss',true);
		// 	$studentMark['r_m'] = $this->input->post('religion',true);
		// 	$this->db->insert('students_results',$studentMark);
		// }

		
	}


 ?>