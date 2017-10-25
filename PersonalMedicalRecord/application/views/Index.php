<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Personal Medical Record</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url();?>pictures/favicon.ico">
        <link href="<?php echo base_url();?>assets/global/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/global/css/ui.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <i class="user-img icons-faces-users-03"></i>
                        <form class="form-signin" role="form" method="post" action="<?php echo base_url().'Login' ?>" enctype="multipart/form-data">
                            <div class="append-icon">
                                <input type="text" name="username" autocomplete="off" id="username" class="form-control form-white username" placeholder="Username" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Sign In</button>
                            <div class="social-btn">
                            </div>
                            <div class="clearfix">
                            </div>
                        </form>
                        <form class="form-password" role="form">
                            <div class="append-icon m-b-20">
                            </div>
                            <div class="clearfix">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © 2016 </span><span>Dep. IT PT. Kasongan Bumi Kencana</span>.<span> All rights reserved.</span>
            </p>

        </div>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/js/pages/login-v1.js"></script>
    </body>
</html>
