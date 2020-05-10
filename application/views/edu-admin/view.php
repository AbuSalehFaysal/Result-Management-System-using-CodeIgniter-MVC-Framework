<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="<?php echo base_url('assets2/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets2/js/jquery.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/css/bootstrap.css'); ?>">
</head>
<body>
	

	<div class="card">
		<div class="card-header">Student Information</div>
		<div class="card-body">
			<h1>Name: <?php echo $students->stu_name; ?></h1>
			<h3>Roll No: <?php echo $students->stu_roll; ?></h3>
			<h3>Registration No: <?php echo $students->reg; ?></h3>
			<h3>Board: <?php echo $students->board; ?></h3>
			<h3>Institute: <?php echo $students->institute; ?></h3>
		</div>
		<div class="card-footer">
			<a href="<?php echo base_url(); ?>update_result/<?php echo $students->stu_roll; ?>">Edit Student Result</a>
		</div>
	</div>


	
</body>
</html>


 	
    