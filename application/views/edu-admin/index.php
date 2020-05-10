<?php 

    
    require_once "libs/function.php";


 ?>

<!DOCTYPE html>
<html lang="en" class=" ">

<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../assets/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Admin Panel</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Sign in to get in touch</strong> </header>

                       <?php if ( $this->session->flashdata('success') ) { ?>
                    <div class="alert alert-success" role="alert">
                    <h6><?php echo $this->session->flashdata('success'); ?></h6></div>
                 <?php } ?>

                 <?php if ( $this->session->flashdata('error') ) { ?>
                    <div class="alert alert-danger" role="alert">
                    <h6><?php echo $this->session->flashdata('error'); ?></h6></div>
                 <?php } ?>



                <form action="<?php echo base_url(); ?>edu-admin/index" method="POST">
                    <div class="list-group">
                        <div class="list-group-item">
                          <label>Email</label>
                            <input name="email" type="text" placeholder="" class="form-control no-border"> </div>
                        <div class="list-group-item">
                          <label>Password</label>
                            <input name="pass" type="password" placeholder="" class="form-control no-border"> </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    <div class="text-center m-t m-b"><a href=""><small></small></a></div>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p> <a href="<?php echo base_url(); ?>edu-admin/signup" class="btn btn-lg btn-default btn-block">Create an account</a> 
                    <br>
                    <br>
                    <p class="text-muted text-center"><small>Are you a student?</small></p>
                    <a href="<?php echo base_url(); ?>" class="btn btn-lg btn-default btn-block">Click Here to Check Your Result</a> 
                </form>



            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p> <small><br></small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../assets/js/app.v1.js"></script>
    <script src="../assets/js/app.plugin.js"></script>
</body>

</html>