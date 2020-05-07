<?php  

	class login extends CI_model {

		function can_login()
		{
			$query = $this->db->get('user_admin');
			return $query;
		}
	}


 ?>