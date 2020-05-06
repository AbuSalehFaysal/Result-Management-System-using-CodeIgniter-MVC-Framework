<?php 

    
    require_once "libs/function.php";


 ?>

<!DOCTYPE html>
<html lang="en" class=" ">

<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../assets/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Scale</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Sign in to get in touch</strong> </header>


                <?php  

                           if( isset($_POST['submit']) ){


                               $pass = $_POST['pass'];
                               $email = $_POST['email'];



                               if( empty($email) || empty($pass) ){
                                   $mess = "<p class='alert alert-danger'> Please, fill the form properly!<button class='close' data-dismiss='alert'>&times;</button></p>";
                               }else {

                                   $sql = "SELECT * FROM user_admin WHERE email='$email'";
                                   $data = $conn -> query($sql);
                                   $login_data = $data -> fetch_assoc();

                                   
                                    
                                   if($login_data['email'] == $email ){

                                            

                                        if( $login_data['pass'] == $pass ){

                                            // $_SESSION['name'] = $login_data['name'];

                                            $_SESSION['name'] = $login_data['name'];

                                            header("location:".base_url()."edu-admin/dashboard");

                                        }else{
                                            $mess = "<p class='alert alert-danger'> Wrong Password!<button class='close' data-dismiss='alert'>&times;</button></p>";
                                        }


                                   }else{
                                        $mess = "<p class='alert alert-danger'> Email is not valid !<button class='close' data-dismiss='alert'>&times;</button></p>";
                                   }


                               }   


                           }


                       ?>


                 <div class="mess">
                    <?php  

                        if( isset($mess) ){
                        echo $mess;
                        
                        }

                    ?>
                </div>
    


                <form action="<?php echo base_url(); ?>edu-admin/index" method="POST">
                    <div class="list-group">
                        <div class="list-group-item">
                            <input name="email" type="text" placeholder="Email" class="form-control no-border"> </div>
                        <div class="list-group-item">
                            <input name="pass" type="password" placeholder="Password" class="form-control no-border"> </div>
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