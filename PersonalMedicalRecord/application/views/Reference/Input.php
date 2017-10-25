<!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('lib/Headlib') ?>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/input-text/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/rateit/rateit.css" rel="stylesheet">
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
            <h2><strong>Input</strong> Referral Form</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Input</a>
                </li>
                <li class="active">Referral</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'Reference/Input/InputReference' ?>">
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>IDENTITIY</strong> <small>employee</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">NIK</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="NIK" name="NIK" onkeypress="Generator()" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Name</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Name" name="Name" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Gender</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Sex" name="Sex" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">DOB & Age</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Age" name="Age" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Departement</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Departement" name="Departement" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Section</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Section" name="Section" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Job</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Job" name="Job" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Site</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Site" name="Site" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Company</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Company" name="Company" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Date of Referral</label>
                          <div class="col-sm-8">
                            <div class="prepend-icon">
                              <input autocomplete="off" type="text" id="DateReference" name="DateReference" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
                              <i class="icon-calendar"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Consultation</strong> <small>Referral</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">Date</label>
                          </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="prepend-icon">
                                <input autocomplete="off" type="text" id="Date" name="Date" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
                                <i class="icon-calendar"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Status</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="icheck-inline">
                                  <label><input type="radio" name="Status" data-radio="iradio_square-blue" value="1"> Fit</label>
                                  <label><input type="radio" name="Status" checked="true" data-radio="iradio_square-blue" value="0">Currently Unfit</label>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Purpose</label>
                            </div>
                          </div>
                          <div class="col-sm-11">
                            <input autocomplete="off" class="form-control form-white" id="Purpose" name="Purpose" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Diagnose</label>
                            </div>
                          </div>
                          <div class="col-sm-11">
                            <textarea name="Diagnose" id="Diagnose" rows="3" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Note</label>
                            </div>
                          </div>
                          <div class="col-sm-11">
                            <textarea name="Note" id="Note" rows="3" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-12" style="text-align:center;">
                        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Submit</button>
                        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
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
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="<?php echo base_url();?>assets/global/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
    <script src="<?php echo base_url();?>assets/global/js/pages/form_icheck.js"></script>  <!-- Change Icheck Color - DEMO PURPOSE - OPTIONAL -->
    <script src="<?php echo base_url();?>assets/global/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
    <script src="<?php echo base_url();?>assets/global/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
    <script src="<?php echo base_url();?>assets/global/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/rateit/jquery.rateit.min.js"></script> <!-- Rating star plugin -->
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
    <!-- END PAGE SCRIPT -->

    <script type="text/javascript">
      function patientMaker() {
        var NIK = document.getElementById('NIK');
        var Name = document.getElementById('Name');
        var Sex = document.getElementById('Sex');
        var Age = document.getElementById('Age');
        var Job = document.getElementById('Job');
        var Section = document.getElementById('Section');
        var Departement = document.getElementById('Departement');
        var Site = document.getElementById('Site');
        var Company = document.getElementById('Company');

        <?php foreach ($Patient as $patient): ?>
          if (NIK.value == '<?php echo $patient->NIK ?>') {
            Name.value = "<?php echo $patient->Name ?>";
            Sex.value = "<?php echo $patient->Sex ?>";
            Age.value = "<?php echo $patient->DateBirth.' / '.$patient->Age.'yrs' ?>";
            <?php foreach ($Departement as $departement): ?>
              <?php if ($patient->Departement == $departement->id) { ?>
                Departement.value = "<?php echo $departement->departement ?>";
              <?php } ?>
            <?php endforeach; ?>

            <?php foreach ($Section as $section): ?>
              <?php if ($patient->Section == $section->id) { ?>
                Section.value = "<?php echo $section->section ?>";
              <?php } ?>
            <?php endforeach; ?>
            Job.value = "<?php echo $patient->Job ?>";
            Site.value = "<?php echo $patient->Site ?>";
            Company.value = "<?php echo $patient->Company ?>";
          }
        <?php endforeach; ?>
      }

      function Generator(){
        var x = event.which || event.keyCode;
        if (x == 13) {
          patientMaker();
        }
      }
    </script>
  </body>
</html>
