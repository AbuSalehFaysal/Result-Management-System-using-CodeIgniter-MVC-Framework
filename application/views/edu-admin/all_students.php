<?php 

    require_once "template/header.php"; 


 ?>
                                    
                                    
                                    <!-- ADMIN PANEL SECTION -->
      <div class="row">
                                        
        <div class="col-md-10" style="margin: 50px 20px 50px 50px;">
             <section class="panel b-a" style="min-height: 400px;">
                
                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"></span> <a href="#" class="font-bold">All Students Information</a> </div>

                <?php if ( $this->session->flashdata('success') ) { ?>
                    <div class="alert alert-success" role="alert">
                    <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                 <?php } ?>

                 <?php if ( $this->session->flashdata('error') ) { ?>
                    <div class="alert alert-danger" role="alert">
                    <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                 <?php } ?>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Student SL</th>
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Registration No</th>
                                    <th>Board</th>
                                    <th>Institute</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                                    
                            <tbody>


                                <?php 

                                    // $sql = "SELECT * FROM students_info";
                                    // $data = $conn -> query($sql);

                                    // $i = 1;
                                    // while ( $all_students_data = $data -> fetch_assoc() ): 


                                 ?>

                                <?php $i=01; ?>
                                <?php if( count($students) ): ?>
                                  <?php foreach( $students as $students ): ?>
                                <tr>
                                    <td><?php echo $i; $i++; ?></td>
                                    <td><?php echo $students->stu_name; ?></td>
                                    <td><?php echo $students->stu_roll; ?></td>
                                    <td><?php echo $students->reg; ?></td>
                                    <td><?php echo $students->board; ?></td>
                                    <td><?php echo $students->institute; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>add_marks/<?php echo $students->stu_sl; ?>">Add</a>

                                        <a type="button" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>delete/<?php echo $students->stu_sl; ?>">Delete</a>

                                        <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>view/<?php echo $students->stu_sl; ?>">View</a>

                                    </td>
                                </tr>
                                 <?php endforeach; ?>
                                <?php else: ?>
                                  <tr>
                                    <td>No Records Found</td>
                                  </tr>
                                <?php endif; ?>


                                    <?php 


                                        // $result_num = checkResultExist($all_students_data['stu_roll'], $all_students_data['reg'], $conn);

                                        // if($result_num == 0) :


                                     ?>

                                     <?php 

                                        // ?sl=<?php echo $all_students_data['stu_sl']; ?>

                                      <!-- ?> -->

                                    <!-- <td><a class="btn btn-info" href="#">Add Result</a></td>

                                    <td><a class="btn btn-danger" href="#">Update</a></td>
                                    <td><a class="btn btn-danger" href="#">Delete</a></td> -->


                                    <!-- <td><a class="btn btn-info" href="<?php // echo base_url(); ?>edu-admin/add_result?sl=<?php // echo $all_students_data['stu_sl']; ?>">Add Result</a></td>

                                    <td><a class="btn btn-danger" href="<?php // echo base_url(); ?>edu-admin/delete_student?sl=<?php // echo $all_students_data['stu_sl']; ?>">Delete</a></td> -->

                                    

                                        <?php 

                                            // else : 


                                            // $sql = "SELECT * FROM students_results";
                                            // $result = $conn -> query($sql);

                                            
                                            // $single_result = $result -> fetch_assoc();




                                         ?>

                                         <!-- <td><a class="btn btn-success" href="#">Update Result</a></td>

                                         <td><a class="btn btn-danger" href="#">Delete</a></td> -->

                                         <!-- <td><a class="btn btn-success" href="<?php // echo base_url(); ?>edu-admin/update_result?sl=<?php // echo $single_result['result_sl']; ?>">Update Result</a></td>

                                         <td><a class="btn btn-danger" href="<?php // echo base_url(); ?>edu-admin/delete_student?sl=<?php // echo $all_students_data['stu_sl']; ?>">Delete</a></td> -->


                                            
                                         

                                            <?php 

                                                // endif ;

                                             ?>


                                </tr>

                                <?php 

                                    // endwhile; 


                                 ?>




                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>


    
                    </div>
                    
                  </div>






                                               


                            

    <?php 


        require_once "template/footer.php";


    ?>

