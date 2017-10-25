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
            <h2><strong>Detail</strong> Consultation Form</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Detail</a>
                </li>
                <li class="active">Off Site</li>
              </ol>
            </div>
          </div>
          <?php foreach ($OffSite as $offsite): ?>
            <?php foreach ($Patient as $patient): ?>
              <?php if ($patient->NIK == $offsite->NIK): ?>
                <?php
                $Name = $patient->Name;
                $Sex = $patient->Sex;
                $Age = $patient->Age;
                $Site = $patient->Site;
                $Company = $patient->Company;
                $Job = $patient->Job;
                foreach ($Departement as $dept) {
                  if ($dept->id == $patient->Departement) {
                    $departement = $dept->departement;
                  }
                }
                foreach ($Section as $sect) {
                  if ($sect->id == $patient->Section) {
                    $section =  $sect->section;
                  }
                }
                 ?>
              <?php endif; ?>
            <?php endforeach; ?>
            <form class="form-horizontal">
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
                              <input autocomplete="off" class="form-control" readonly id="NIK" name="NIK" onkeypress="Generator()" required type="text" placeholder="" value="<?php echo $offsite->NIK ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Name" name="Name" required type="text" placeholder="" value="<?php echo $Name ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Gender</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Sex" name="Sex" required type="text" placeholder="" value="<?php echo $Sex ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">DOB & Age</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Age" name="Age" required type="text" placeholder="" value="<?php echo $Age ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Departement</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Departement" name="Departement" required type="text" placeholder="" value="<?php echo $departement ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Section</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Section" name="Section" required type="text" placeholder="" value="<?php echo $section ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Job</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Job" name="Job" required type="text" placeholder="" value="<?php echo $Job ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Site</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Site" name="Site" required type="text" placeholder="" value="<?php echo $Site ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Company</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Company" name="Company" required type="text" placeholder="" value="<?php echo $Company ?>">
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
                    <h3><i class="icon-check"></i> <strong>Consultation</strong> <small>Off Site</small></h3>
                  </div>
                  <div class="panel-content bg-default">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Date of Consultation</label>
                            <div class="col-sm-6">
                              <div class="prepend-icon">
                                <input autocomplete="off" type="text" id="Date" name="Date" class="b-datepicker form-control" readonly required data-date-format="yyyy-mm-dd" value="<?php echo $offsite->Date ?>">
                                <i class="icon-calendar"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" style="color:white">---</label>
                            <div class="col-sm-8">
                            </div>
                          </div>
                        </div>
                      </div>

                      </br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Diagnose</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Diagnose" id="Diagnose" rows="5" class="form-control" readonly placeholder="" required><?php echo $offsite->Diagnose ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Therapy</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Therapy" id="Therapy" rows="5" class="form-control" readonly placeholder="" required><?php echo $offsite->Therapy ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          <?php endforeach; ?>
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
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
    <script src="<?php echo base_url();?>assets/global/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/rateit/jquery.rateit.min.js"></script> <!-- Rating star plugin -->
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
    <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
    <!-- END PAGE SCRIPT -->

  </body>
</html>
