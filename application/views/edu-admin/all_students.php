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

                                    $sql = "SELECT * FROM students_info";
                                    $data = $conn -> query($sql);

                                    $i = 1;
                                    while ( $all_students_data = $data -> fetch_assoc() ): 


                                 ?>


                                <tr>
                                    <th><?php echo $i; $i++; ?></th>
                                    <th><?php echo $all_students_data['stu_name']; ?></th>
                                    <th><?php echo $all_students_data['stu_roll']; ?></th>
                                    <th><?php echo $all_students_data['reg']; ?></th>
                                    <th><?php echo $all_students_data['board']; ?></th>
                                    <th><?php echo $all_students_data['institute']; ?></th>
                                    


                                    <?php 


                                        $result_num = checkResultExist($all_students_data['stu_roll'], $all_students_data['reg'], $conn);

                                        if($result_num == 0) :


                                     ?>

                                     <?php 

                                        // ?sl=<?php echo $all_students_data['stu_sl']; ?>

                                      <!-- ?> -->


                                    <th><a class="btn btn-info" href="<?php echo base_url(); ?>edu-admin/add_result?sl=<?php echo $all_students_data['stu_sl']; ?>">Add Result</a></th>

                                    <th><a class="btn btn-danger" href="<?php echo base_url(); ?>edu-admin/delete_student?sl=<?php echo $all_students_data['stu_sl']; ?>">Delete</a></th>

                                    

                                        <?php 

                                            else : 


                                            $sql = "SELECT * FROM students_results";
                                            $result = $conn -> query($sql);

                                            
                                            $single_result = $result -> fetch_assoc();




                                         ?>

                                         <th><a class="btn btn-success" href="<?php echo base_url(); ?>edu-admin/update_result?sl=<?php echo $single_result['result_sl']; ?>">Update Result</a></th>

                                         <th><a class="btn btn-danger" href="<?php echo base_url(); ?>edu-admin/delete_student?sl=<?php echo $all_students_data['stu_sl']; ?>">Delete</a></th>


                                            
                                         

                                            <?php 

                                                endif ;

                                             ?>


                                </tr>

                                <?php 

                                    endwhile; 


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

