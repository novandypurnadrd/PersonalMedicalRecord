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
                <li class="active">On Site</li>
              </ol>
            </div>
          </div>
          <?php foreach ($OnSite as $onsite): ?>
            <?php foreach ($Patient as $patient): ?>
              <?php if ($patient->NIK == $onsite->NIK): ?>
                <?php
                  $Name = $patient->Name;
                  $Sex = $patient->Sex;
                  $Age = $patient->Age;
                  $Site = $patient->Site;
                  $Company = $patient->Company;
                  $Job = $patient->Job;
                  $Allergy = $patient->Allergy;
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
                              <input autocomplete="off" class="form-control" readonly id="NIK" name="NIK" onkeypress="Generator()" required type="text" placeholder="" value="<?php echo $onsite->NIK ?>">
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
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Company</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Company" name="Company" required type="text" placeholder="" value="<?php echo $Company ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Patient Type</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Patient" name="Patient" required type="text" placeholder="" value="<?php echo $onsite->Patient ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nationality</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Nationality" name="Nationality" required type="text" placeholder="" value="<?php echo $onsite->Nationality ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Allergy</label>
                            <div class="col-sm-10">
                              <textarea name="Allergy" id="Allergy" rows="3" class="form-control" readonly placeholder="" ><?php echo $Allergy ?></textarea>
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
                    <h3><i class="icon-check"></i> <strong>Consultation</strong> <small>On Site</small></h3>
                  </div>
                  <div class="panel-content bg-default">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Number</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Number" name="Number" required type="text" placeholder="" value="<?php echo $onsite->Number ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Incident</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Incident" name="Incident" required type="text" placeholder="" value="<?php echo $onsite->Incident ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Consultation Type</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Consultation" name="Consultation" required type="text" placeholder="" value="<?php echo $onsite->Consultation ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Date</label>
                            <div class="col-sm-8">
                              <div class="prepend-icon">
                                <input autocomplete="off" type="text" id="Date" name="Date" class="b-datepicker form-control" readonly required data-date-format="yyyy-mm-dd" value="<?php echo $onsite->Date ?>">
                                <i class="icon-calendar"></i>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Staff Name</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Staff" name="Staff" required type="text" placeholder="" value="<?php echo $onsite->Staff ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Time</label>
                            <div class="col-sm-8">
                              <div class="prepend-icon">
                                <input type="text" name="Time" class="timepicker form-control" readonly placeholder="Choose a time..." value="<?php echo $onsite->Time ?>">
                                <i class="icon-clock"></i>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Case</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Case" name="Case" required type="text" placeholder="" value="<?php echo $onsite->CaseType ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      </br>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Subjective</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Subjective" id="Subjective" rows="5" class="form-control" readonly placeholder="" required><?php echo $onsite->Subjective ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Plan</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Plan" id="Plan" rows="5" class="form-control" readonly placeholder="" required><?php echo $onsite->Plan ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Education</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Education" id="Education" rows="5" class="form-control" readonly placeholder="" required><?php echo $onsite->Education ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Objective</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Objective" id="Objective" rows="5" class="form-control" readonly placeholder="" required><?php echo $onsite->Objective ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" style="color:white">--- </label>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Treatment</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Treatment" name="Treatment" required type="text" placeholder="" value="<?php echo $onsite->Treatment ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Medications</label>
                            <div class="col-sm-8">
                              <input autocomplete="off" class="form-control" readonly id="Medications" name="Medications" required type="text" placeholder="" value="<?php echo $onsite->Medications ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Assessment</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Assessment" id="Assessment" rows="5" class="form-control" readonly placeholder="" required><?php echo $onsite->Assessment ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Fitness</label>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <textarea name="Fitness" id="Fitness" rows="2" class="form-control" readonly placeholder="" required><?php echo $onsite->Fitness ?></textarea>
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
