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

		
	}


 ?>