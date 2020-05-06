<?php  

	 require_once (APPPATH."libraries/function.php");



	if ( isset($_GET['sl']) ) {
                # code...
                $SL = $_GET['sl'];
            } else {
                $SL = '';
            }

	$sql = "DELETE FROM students_info WHERE stu_sl='$SL' ";
	$conn -> query($sql);
	unlink('students_photos/'.$student_photo);
	header("location:".base_url()."edu-admin/all_students");



?>