<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/maruti-login.css" />
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo base_url(); ?>admin/login/userlogin" method="post">
         <div class="control-group normal_text"> <h3><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="email" placeholder="Email" name="email" required />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
        
            </form>
      
      
            <form id="recoverform" action="<?php echo base_url(); ?>forgotpassword/addpost" class="form-vertical" method="post">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
        
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="email" name="email" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
                </div>
            </form>
      
       <div class="text-center">
                    <span style="color:red;">
          <?php echo $this->session->flashdata('error');?>
          </span><br />
          
          
           <span style="color:green;">
          <?php echo $this->session->flashdata('success');?>
          </span>
          
                  </div>
      
        </div>
        
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>assets/js/maruti.login.js"></script> 
    </body>

</html>
