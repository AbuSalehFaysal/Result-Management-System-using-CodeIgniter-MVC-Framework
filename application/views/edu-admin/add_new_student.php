<?php 

    require_once "template/header.php"; 


 ?>
                                    
                                    
                                    <!-- ADMIN PANEL SECTION -->
      <div class="row">
                                        
        <div class="col-md-10" style="margin: 50px 20px 50px 50px;">
             <section class="panel b-a" style="min-height: 400px;">
                
                <div class="panel-heading b-b"> <span class="badge bg-warning pull-right"></span> <a href="#" class="font-bold">Please, fill the form</a> </div>



                <?php if ( $this->session->flashdata('success') ) { ?>
                    <div class="alert alert-success" role="alert">
                    <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                 <?php } ?>

                 <?php if ( $this->session->flashdata('error') ) { ?>
                    <div class="alert alert-danger" role="alert">
                    <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                 <?php } ?>


                    <div class="card" style="padding: 30px;">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>edu-admin/add_new_student_data" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">Student Name</label>
                                <input name="stu_name" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label for="">Student Roll</label>
                                <input name="stu_roll" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label for="">Registration No</label>
                                <input name="reg" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label for="">Board</label>
                                <input name="board" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                <label for="">Institute</label>
                                <input name="institute" class="form-control" type="text">
                            </div>

                            <div class="form-group">
                                
                                <input name="submit" class="btn btn-success" type="submit" value="Submit">
                            </div>

                        </form>
                    </div>
                    
                  </div>




                                               


                </section>
            </div>




                                       
        </div>
                                

        <?php 


        require_once "template/footer.php";


    ?>




  