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

	public function getStudentinfo()
	{
		$query = $this->db->get('students_info');
		if ( $query->num_rows() > 0 ) {
			# code...
			return $query->result();
		
		}
	}

	public function getResultinfo()
	{
		$query = $this->db->get('students_results');
		if ( $query->num_rows() > 0 ) {
			# code...
			return $query->result();
		
		}
	}

	public function getSingleStudentinfo($stu_sl)
	{
		$query = $this->db->get_where('students_info', array('stu_sl' => $stu_sl));
		if ( $query->num_rows() > 0 ) {
			# code...
			return $query->row();
		}
	}

	public function addSingleStudentMark($stu_sl)
	{
		// $query = $this->db->get_where('students_info', array('stu_sl' => $stu_sl));
		$studentMark = array();
		$studentMark['name'] = $this->input->post('stu_name',true);
		$studentMark['roll'] = $this->input->post('stu_roll',true);
		$studentMark['reg'] = $this->input->post('reg',true);
		$studentMark['board'] = $this->input->post('board',true);
		$studentMark['institute'] = $this->input->post('institute',true);


		$studentMark['b_m'] = $this->input->post('ban',true);
		$ban_grade = checkGrade($studentMark['b_m']);
        $ban_Gpa = checkGpa($studentMark['b_m']);
        $studentMark['b_g'] = $ban_grade;
        $studentMark['b_c'] = $ban_Gpa;


		$studentMark['e_m'] = $this->input->post('en',true);
		$en_grade = checkGrade($studentMark['e_m']);
        $en_Gpa = checkGpa($studentMark['e_m']);
        $studentMark['e_g'] = $en_grade;
        $studentMark['e_c'] = $en_Gpa;

		$studentMark['m_m'] = $this->input->post('mat',true);
		$mat_grade = checkGrade($studentMark['m_m']);
        $mat_Gpa = checkGpa($studentMark['m_m']);
        $studentMark['m_g'] = $mat_grade;
        $studentMark['m_c'] = $mat_Gpa;

		$studentMark['s_m'] = $this->input->post('sci',true);
		$sci_grade = checkGrade($studentMark['s_m']);
        $sci_Gpa = checkGpa($studentMark['s_m']);
        $studentMark['s_g'] = $sci_grade;
        $studentMark['s_c'] = $sci_Gpa;

		$studentMark['ss_m'] = $this->input->post('ss',true);
		$ss_grade = checkGrade($studentMark['ss_m']);
        $ss_Gpa = checkGpa($studentMark['ss_m']);
        $studentMark['ss_g'] = $ss_grade;
        $studentMark['ss_c'] = $ss_Gpa;

		$studentMark['r_m'] = $this->input->post('religion',true);
		$religion_grade = checkGrade($studentMark['r_m']);
        $religion_Gpa = checkGpa($studentMark['r_m']);
        $studentMark['r_g'] = $religion_grade;
        $studentMark['r_c'] = $religion_Gpa;

        $stu_cgpa = checkCgpa($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);

        $stu_cgpa_round = round($stu_cgpa, 2);
        $studentMark['cgpa'] = $stu_cgpa_round;

        $grade_alpha = checkGradeAlpha($stu_cgpa);
        $studentMark['grade_alpha'] = $grade_alpha;

        $result = checkResult($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);
        $studentMark['result'] = $result;

		$this->db->insert('students_results',$studentMark);
	}

	public function getSingleStudentmarks($stu_roll)
	{
		$query = $this->db->get_where('students_results', array('roll' => $stu_roll));
		if ( $query->num_rows() > 0 ) {
			# code...
			return $query->row();
		}
	}

	public function updateStudentMark()
	{
		$studentMark = array();
		$result_sl = $this->input->post('result_sl');
		$studentMark['b_m'] = $this->input->post('ban',true);
		$ban_grade = checkGrade($studentMark['b_m']);
        $ban_Gpa = checkGpa($studentMark['b_m']);
        $studentMark['b_g'] = $ban_grade;
        $studentMark['b_c'] = $ban_Gpa;


		$studentMark['e_m'] = $this->input->post('en',true);
		$en_grade = checkGrade($studentMark['e_m']);
        $en_Gpa = checkGpa($studentMark['e_m']);
        $studentMark['e_g'] = $en_grade;
        $studentMark['e_c'] = $en_Gpa;

		$studentMark['m_m'] = $this->input->post('mat',true);
		$mat_grade = checkGrade($studentMark['m_m']);
        $mat_Gpa = checkGpa($studentMark['m_m']);
        $studentMark['m_g'] = $mat_grade;
        $studentMark['m_c'] = $mat_Gpa;

		$studentMark['s_m'] = $this->input->post('sci',true);
		$sci_grade = checkGrade($studentMark['s_m']);
        $sci_Gpa = checkGpa($studentMark['s_m']);
        $studentMark['s_g'] = $sci_grade;
        $studentMark['s_c'] = $sci_Gpa;

		$studentMark['ss_m'] = $this->input->post('ss',true);
		$ss_grade = checkGrade($studentMark['ss_m']);
        $ss_Gpa = checkGpa($studentMark['ss_m']);
        $studentMark['ss_g'] = $ss_grade;
        $studentMark['ss_c'] = $ss_Gpa;

		$studentMark['r_m'] = $this->input->post('religion',true);
		$religion_grade = checkGrade($studentMark['r_m']);
        $religion_Gpa = checkGpa($studentMark['r_m']);
        $studentMark['r_g'] = $religion_grade;
        $studentMark['r_c'] = $religion_Gpa;

        $stu_cgpa = checkCgpa($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);

        $stu_cgpa_round = round($stu_cgpa, 2);
        $studentMark['cgpa'] = $stu_cgpa_round;

        $grade_alpha = checkGradeAlpha($stu_cgpa);
        $studentMark['grade_alpha'] = $grade_alpha;

        $result = checkResult($ban_Gpa, $en_Gpa, $mat_Gpa, $sci_Gpa, $ss_Gpa, $religion_Gpa);
        $studentMark['result'] = $result;
		// $userData['contact_no'] = $this->input->post('contact_no');
		$this->db->where('result_sl',$result_sl);
		$this->db->update('students_results', $studentMark);
	}

	public function deleteSingleStudent($stu_sl)
	{
		$this->db->where('stu_sl',$stu_sl);
		$this->db->delete('students_info');
	}

	public function getStudentResult($Board, $roll, $reg)
	{
		// var_dump($Board);
		// var_dump($roll);
		// var_dump($reg);
		
		$query = $this->db->get_where('students_results', array('board' =>$Board, 'roll' =>$roll, 'reg'=>$reg ));
		// var_dump($query->row());

		if ( $query->num_rows() > 0 ) {
			# code...

			return $query->row();
		}
	}
}


