<!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('lib/Headlib') ?>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/input-text/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <!-- BEGIN BODY -->
  <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-blue dashboard">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <?php $this->load->view('lib/Navigation') ?>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <?php $this->load->view('lib/Header') ?>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2><strong>User</strong> Profile</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Update</a>
                </li>
                <li class="active">Profile</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'Profile/UpdateProfile' ?>">
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Change</strong> <small>Password</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="<?php echo base_url();?>assets/global/images/gallery/icon-user.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-md-6">
                        <br>
                        <br>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Username</label>
                          <div class="col-sm-8">
                            <input class="form-control" readonly required autocomplete="off" id="username" name="username" value="<?php echo $this->session->userdata('usernamePMR') ?>" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Display Name</label>
                          <div class="col-sm-8">
                            <input class="form-control form-white" required autocomplete="off" id="name" name="name" value="<?php echo $this->session->userdata('namePMR') ?>" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">New Password</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" type="password" class="form-control form-white" id="new" name="new" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Re-type Password</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" type="password" class="form-control form-white" id="confirm" name="confirm" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12" style="text-align:center;">
                        <button type="submit" id="update" data-toggle="modal" data-target="#myModalNorm" class="btn btn-embossed btn-primary m-r-20">Update</button>
                        <a href="<?php echo base_url().'Dashboard' ?>" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</a>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
                           aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <button type="button" class="close"
                                         data-dismiss="modal">
                                             <span aria-hidden="true">&times;</span>
                                             <span class="sr-only">Close</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel">
                                          Confirm Password
                                      </h4>
                                  </div>

                                  <!-- Modal Body -->
                                  <div class="modal-body">

                                      <div class="col-md-12">
                                        <label for="exampleInputPassword1">Your Current Password</label>
                                        <div class="form-group">
                                          <div class="col-md-11">
                                            <input type="password" class="form-control form-white" onkeyup="myFunction()" required class="form-control"id="password" name="password" placeholder="Password"/>
                                          </div>
                                        </div>
                                      </div>
                                  </div>

                                  <!-- Modal Footer -->
                                  <div class="modal-footer" style="text-align:center">
                                      <button type="button" class="btn btn-default"
                                              data-dismiss="modal">
                                                  Cancel
                                      </button>
                                      <button id="submit" disabled type="submit" class="btn btn-primary">
                                          Save changes
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          </form>
          <?php $this->load->view('lib/Footer') ?>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>
		<?php $this->load->view('lib/Footlib') ?>
    <!-- BEGIN PAGE SCRIPT -->
    <script src="<?php echo base_url();?>assets/global/plugins/switchery/switchery.min.js"></script> <!-- IOS Switch -->
    <!-- END PAGE SCRIPT -->
    <script>
          function myFunction() {
            var button = document.getElementById("submit");
            var x = document.getElementById("password");

            if (x.value == "<?php echo $this->session->userdata('passwordPMR') ?>") {
              submit.disabled = false;
            }
            else {
              submit.disabled = true;
            }
          }

          function checker() {
            var update = document.getElementById("update");
            var newpass = document.getElementById("new");
            var confirm = document.getElementById("confirm");

            if (newpass.value == confirm.value) {
              update.disabled = false;
            }
            else {
              update.disabled = true;
            }
          }
        </script>
  </body>
</html>
