<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Result Management System</title>
		<link rel="stylesheet" href="assets/ui_assets/css/syle.css">
		<link rel="shortcut icon" type="" href="">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	</head>
	<body>
		<div class="wraper">
			<div class="w-top">
				<div class="logo">
					
				</div>
				<div class="banner">
					<h3></h3>
					<hr>
					<h4></h4>
				</div>
			</div>
			<div class="w-main">
				<div class="student-info">
					<div class="student-photo">
						<img src="assets/images/p10.jpg" alt="">
					</div>
					<div class="student-details">
						<table>
							<tr>
								<td>Name</td>
								<td><?php echo $results->name; ?></td>
							</tr>
							<tr>
								<td>Roll</td>
								<td><?php echo $results->roll ?></td>
							</tr>
							<tr>
								<td>Reg.</td>
								<td><?php echo $results->reg ?></td>
							</tr>
							<tr>
								<td>Board</td>
								<td><?php echo $results->board ?></td>
							</tr>
							<tr>
								<td>Institute</td>
								<td><?php echo $results->institute ?></td>
							</tr>
							<tr>
								<td>Result</td>
								<?php
									if($results->result == 'Passed') :
								?>
								<td><span style="color:green;font-weight:bold;">Passed<span></td>
								<?php
								else :
								?>
								<td><span style="color:red;font-weight:bold;">Failed<span></td>
								
								<?php endif ; ?>
								
							</tr>
						</table>
					</div>
				</div>
				<div class="student-result">
					<table>
						<tr>
							<td>Subject</td>
							<td>Marks</td>
							<td>Grade</td>
							<td>GPA</td>
							<td>CGPA</td>
						</tr>
						<tr>
							<td>Bangla</td>
							<td><?php echo $results->b_m; ?></td>
							<td><?php echo $results->b_g; ?></td>
							<td><?php echo $results->b_c; ?></td>
							<td rowspan="6"><?php echo $results->cgpa; ?></td>
						</tr>
						<tr>
							<td>English</td>
							<td><?php  echo $results->e_m; ?></td>
							<td><?php  echo $results->e_g; ?></td>
							<td><?php  echo $results->e_c; ?></td>
						</tr>
						<tr>
							<td>Math</td>
							<td><?php  echo $results->m_m; ?></td>
							<td><?php  echo $results->m_g; ?></td>
							<td><?php  echo $results->m_c; ?></td>
						</tr>
						<tr>
							<td>Science</td>
							<td><?php  echo $results->s_m; ?></td>
							<td><?php  echo $results->s_g; ?></td>
							<td><?php  echo $results->s_c; ?></td>
						</tr>
						<tr>
							<td>Social Science</td>
							<td><?php  echo $results->ss_m; ?></td>
							<td><?php  echo $results->ss_g; ?></td>
							<td><?php  echo $results->ss_c; ?></td>
						</tr>
						<tr>
							<td>Religion</td>
							<td><?php  echo $results->r_m; ?></td>
							<td><?php  echo $results->r_g; ?></td>
							<td><?php  echo $results->r_c; ?></td>
						</tr>
					</table>
				</div>
				<a type="button" class="btn btn-info btn-lg" href="<?php echo base_url(); ?>">Back</a>
			</div>
		</div>	
	</body>
</html>