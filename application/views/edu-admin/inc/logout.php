<?php 


	session_start();
	session_destroy();
	header("location:".base_url()."edu-admin/index");


 ?>