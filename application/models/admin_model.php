<?php  

	class Admin_model extends CI_Model {

		public function insert_admin_data($name, $email, $pass, $status)
		{
			$adminData=array();
			$adminData['name'] = $name;
			$adminData['email'] = $email;
			$adminData['pass'] = $pass;
			$adminData['status'] = $status;
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
 
		public function insert_student_data($stu_name, $stu_roll, $reg, $board, $institute)
		{
			$studentData = array();
			$studentData['stu_name'] = $stu_name;
			$studentData['stu_roll'] = $stu_roll;
			$studentData['reg'] = $reg;
			$studentData['board'] = $board;
			$studentData['institute'] = $institute;
			$this->db->insert('students_info',$studentData);
		}

		public function getStudentinfo()
		{
			$query = $this->db->get('students_info');
			if ( $query->num_rows() > 0 ) {
				return $query->result();
			}
		}

		public function getResultinfo()
		{
			$query = $this->db->get('students_results');
			if ( $query->num_rows() > 0 ) {
				return $query->result();
			}
		}

		public function getSingleStudentinfo($stu_roll)
		{
			$query = $this->db->get_where('students_info', array('stu_roll' => $stu_roll));
			if ( $query->num_rows() > 0 ) {
				return $query->row();
			}
		}

		public function addSingleStudentMark($stu_sl, $stu_name, $stu_roll, $reg, $board, $institute, $b_m, $e_m, $m_m, $s_m, $ss_m, $r_m, $ban_grade, $ban_Gpa, $en_grade, $en_Gpa, $mat_grade, $mat_Gpa, $sci_grade, $sci_Gpa, $ss_grade, $ss_Gpa, $religion_grade, $religion_Gpa , $stu_cgpa_round, $grade_alpha, $result )
		{
			$studentMark = array();

			$studentMark['name'] = $stu_name;
			$studentMark['roll'] = $stu_roll;
			$studentMark['reg'] = $reg;
			$studentMark['board'] = $board;
			$studentMark['institute'] = $institute;

			$studentMark['b_m'] = $b_m;
	        $studentMark['b_g'] = $ban_grade;
	        $studentMark['b_c'] = $ban_Gpa;

			$studentMark['e_m'] = $e_m;
	        $studentMark['e_g'] = $en_grade;
	        $studentMark['e_c'] = $en_Gpa;

			$studentMark['m_m'] = $m_m;
	        $studentMark['m_g'] = $mat_grade;
	        $studentMark['m_c'] = $mat_Gpa;

			$studentMark['s_m'] = $s_m;
	        $studentMark['s_g'] = $sci_grade;
	        $studentMark['s_c'] = $sci_Gpa;

			$studentMark['ss_m'] = $ss_m;
	        $studentMark['ss_g'] = $ss_grade;
	        $studentMark['ss_c'] = $ss_Gpa;

			$studentMark['r_m'] = $r_m;
	        $studentMark['r_g'] = $religion_grade;
	        $studentMark['r_c'] = $religion_Gpa;

	        $studentMark['cgpa'] = $stu_cgpa_round;
	        $studentMark['grade_alpha'] = $grade_alpha;
	        $studentMark['result'] = $result;

			$this->db->insert('students_results',$studentMark);
		}

		public function getSingleStudentmarks($stu_roll)
		{
			$query = $this->db->get_where('students_results', array('roll' => $stu_roll));
			if ( $query->num_rows() > 0 ) {
				return $query->row();
			}
		}

		public function updateStudentMark($result_sl, $b_m, $e_m, $m_m, $s_m, $ss_m, $r_m, $ban_grade, $ban_Gpa, $en_grade, $en_Gpa, $mat_grade, $mat_Gpa, $sci_grade, $sci_Gpa, $ss_grade, $ss_Gpa, $religion_grade, $religion_Gpa, $stu_cgpa_round, $grade_alpha, $result )
		{
			$studentMark = array();

			$studentMark['b_m'] = $b_m;
	        $studentMark['b_g'] = $ban_grade;
	        $studentMark['b_c'] = $ban_Gpa;

			$studentMark['e_m'] = $e_m;
	        $studentMark['e_g'] = $en_grade;
	        $studentMark['e_c'] = $en_Gpa;

			$studentMark['m_m'] = $m_m;
	        $studentMark['m_g'] = $mat_grade;
	        $studentMark['m_c'] = $mat_Gpa;

			$studentMark['s_m'] = $s_m;
	        $studentMark['s_g'] = $sci_grade;
	        $studentMark['s_c'] = $sci_Gpa;

			$studentMark['ss_m'] = $ss_m;
	        $studentMark['ss_g'] = $ss_grade;
	        $studentMark['ss_c'] = $ss_Gpa;

			$studentMark['r_m'] = $r_m;
	        $studentMark['r_g'] = $religion_grade;
	        $studentMark['r_c'] = $religion_Gpa;

	        $studentMark['cgpa'] = $stu_cgpa_round;
	        $studentMark['grade_alpha'] = $grade_alpha;
	        $studentMark['result'] = $result;

			$this->db->where('result_sl',$result_sl);
			$this->db->update('students_results', $studentMark);
		}

		public function deleteSingleStudent($stu_roll)
		{
			$this->db->where('stu_roll',$stu_roll);
			$this->db->delete('students_info');
			$this->db->where('roll',$stu_roll);
			$this->db->delete('students_results');
		}

		public function getStudentResult($board, $roll, $reg)
		{
			$query = $this->db->get_where('students_results', array('board' =>$board, 'roll' =>$roll, 'reg'=>$reg ));
			if ( $query->num_rows() > 0 ) {
				return $query->row();
			}
		}

		public function checkResultExist($stu_roll) 
		{
			$query = $this->db->get_where( 'students_results', array( 'roll' =>$stu_roll ) );
			if ( $query->num_rows() > 0 ) {
				return $query->row();
			}
		}
		
}


