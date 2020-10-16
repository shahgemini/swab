<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="Mosaddek">

    <meta name="keyword" content="Software Pattern, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

   <!--  <link rel="shortcut icon" href="<?php echo base_url(); ?>upload/account/<?php echo $this->session->userdata('VMS_settings')->logo; ?>"> -->



    <title> SWAB Login</title>



    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">

    <!--external css-->

    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->

    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />

		<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

<style type="text/css">

       .form-signin .btn-login {

        background: #666666;

        box-shadow: 0 4px #666666;

       }

       .form-signin h2.form-signin-heading {

        background: #41cac0;

       }

       .form-signin a {

        color: #A10000;

        }

        .login-wrap input{

             color: #333333;

        }

        .modal-header {

        background: #A10000;

        }

        .form-control{

            color: #333333;

        }

        .btn-default{

            background: #666666 !important;

            border-color: #666666 !important;

        }

         .btn-success{

            background: #666666 !important;

            border-color: #666666 !important;

        }

   </style>

</head>

 <!-- 

  <body class="login-body" style="background-image: url('<?php echo $bg ?>');background-repeat: no-repeat;background-size: cover;"> -->

<style type="text/css">
.card1
{
  padding: 10px 50px;
}
  .card1 p
  {
    background-color:#fff3cd;
    font-size: 15px;
    padding: 10px 10px;
  }
</style>

   <body class="login-body">

    <div class="container">
      <div class="card1">

      <?php echo validation_errors(); ?>
    </div>

      
      <form class="form-signin" method="POST" action="<?php echo base_url('Login/login_user') ?>">

        <h2 class="form-signin-heading">Sign In</h2>
        <div class="login-wrap"style="">
             <?php 
      if(isset($_SESSION['msg']) && isset($_SESSION['status'])){?>

        
          <div class="alert alert-danger"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); unset($_SESSION['status']); ?></div>
      <?php
      }
      ?> 
      <br>
            <input type="email" name="LoginEmail" class="form-control" required placeholder="Enter Email">
            <br>
            <input type="password" name="LoginPassword" class="form-control" required="" placeholder="Password">
            <label class="checkbox" style="float: right; margin-bottom: 20px;">
               
              
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            
           <!-- 
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div> -->

        </div>
        </form>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="<?php echo base_url('Login/forgetpassword'); ?>">
                      <div class="modal-header" style="background-color: #41cac0;">
                          <h4 class="modal-title" >Forgot Password ?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="submit">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>


  </body>

</html>

