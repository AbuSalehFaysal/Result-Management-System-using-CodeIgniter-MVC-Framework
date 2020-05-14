<!DOCTYPE html>
<html lang="en" class=" ">
    <head>
        <meta charset="utf-8" />
        <title>Education Board Result</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    </head>
        <body>
            <div class="container">
                <?php if ( $this->session->flashdata('success') ) { ?>
                <div class="alert alert-success" role="alert">
                <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                <?php } ?>
                <?php if ( $this->session->flashdata('error') ) { ?>
                <div class="alert alert-danger" role="alert">
                <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                <?php } ?>
                <form action="<?php base_url(); ?>searchstudent" method="POST">
                    <fieldset>
                        <legend>Result Management System</legend>
                        
                        <div class="form-group">
                            <label>Roll No</label>
                            <input class="form-control" name= "roll" type="text" placeholder="Roll No">
                        </div>
                        <div class="form-group">
                            <label>Registration No</label>
                            <input class="form-control" name= "reg" type="text" placeholder="Registration No">
                        </div>
                        <div class="form-group">
                            <label>Board</label>
                            <select class="form-control" name="board">
                                <option value=""selected>Select One</option>
                                <option value="barisal">Barisal</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="comilla">Comilla</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="dinajpur">Dinajpur</option>
                                <option value="jessore">Jessore</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="madrasah">Madrasah</option>
                                <option value="tec">Technical</option>
                                <option value="dibs">DIBS(Dhaka)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
                <br>
                <a type="button" class="btn btn-info btn-lg" href="<?php echo base_url(); ?>edu-admin/index">Click here if you are an Admin</a>
            </div>
        </body>
</html>