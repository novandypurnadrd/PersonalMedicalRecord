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
            <h2><strong>Input</strong> Medical Check Up</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Input</a>
                </li>
                <li class="active">MCU</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'MCU/Input/InputMCU' ?>">
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
                          <label class="col-sm-4 control-label">Sex</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Sex" name="Sex" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Age</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control" readonly id="Age" name="Age" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Departement</label>
                          <div class="col-sm-8">
                            <input autocomplete="off"  class="form-control" readonly id="Departement" name="Departement" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Section</label>
                          <div class="col-sm-8">
                            <input autocomplete="off"  class="form-control" readonly id="Section" name="Section" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Job</label>
                          <div class="col-sm-8">
                            <input autocomplete="off"  class="form-control" readonly id="Job" name="Job" required type="text" placeholder="">
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
                          <label class="col-sm-4 control-label">Type MCU</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="Type" name="Type" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Date MCU</label>
                          <div class="col-sm-8">
                            <div class="prepend-icon">
                              <input autocomplete="off" type="text" id="DateMCU" name="DateMCU" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
                              <i class="icon-calendar"></i>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Date Result</label>
                          <div class="col-sm-8">
                            <div class="prepend-icon">
                              <input autocomplete="off" type="text" id="DateResult" name="DateResult" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
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
                  <h3><i class="icon-check"></i> <strong>Vital Sign</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">BP</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="BP" name="BP" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Pulse</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="Pulse" name="Pulse" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Resp</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="Resp" name="Resp" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Height</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="Height" name="Height" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Weight</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="Weight" name="Weight" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">BMI</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="BMI" name="BMI" required type="text" placeholder="">
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
                  <h3><i class="icon-check"></i> <strong>EYES EXAMINATION</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">VOD</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="VOD" name="VOD" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">VOS</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="VOS" name="VOS" required type="text" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">VOD/S</label>
                          <div class="col-sm-8">
                            <input autocomplete="off" class="form-control form-white" id="VODS" name="VODS" required type="text" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Color Blind</label>
                          <div class="col-sm-8">
                            <textarea name="ColorBlind" id="ColorBlind" rows="2" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Eyes</label>
                          <div class="col-sm-8">
                            <textarea name="Eyes" id="Eyes" rows="4" class="form-control form-white" placeholder="" required></textarea>
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
                  <h3><i class="icon-check"></i> <strong>PHYSICAL EXAMINATION</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">ENT</label>
                          <div class="col-sm-9">
                            <textarea name="ENT" id="ENT" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Heart</label>
                          <div class="col-sm-9">
                            <textarea name="Heart" id="Heart" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Lung</label>
                          <div class="col-sm-9">
                            <textarea name="Lung" id="Lung" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Abd</label>
                          <div class="col-sm-9">
                            <textarea name="Abd" id="Abd" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Hand</label>
                          <div class="col-sm-9">
                            <textarea name="Hand" id="Hand" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Leg</label>
                          <div class="col-sm-9">
                            <textarea name="Leg" id="Leg" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Paresis/Paralisa</label>
                          <div class="col-sm-9">
                            <textarea name="Paresis" id="Paresis" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Edema</label>
                          <div class="col-sm-9">
                            <textarea name="Edema" id="Edema" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Skin</label>
                          <div class="col-sm-9">
                            <textarea name="Skin" id="Skin" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Genital</label>
                          <div class="col-sm-9">
                            <textarea name="Genital" id="Genital" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Varices</label>
                          <div class="col-sm-9">
                            <textarea name="Varices" id="Varices" rows="4" class="form-control form-white" placeholder="" required></textarea>
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
                  <h3><i class="icon-check"></i> <strong>ADDITIONAL EXAMINATION</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Audiometry</label>
                          <div class="col-sm-9">
                            <textarea name="Audiometry" id="Audiometry" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Spirometry</label>
                          <div class="col-sm-9">
                            <textarea name="Spirometry" id="Spirometry" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">ECG</label>
                          <div class="col-sm-9">
                            <textarea name="ECG" id="ECG" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">X-Ray</label>
                          <div class="col-sm-9">
                            <textarea name="XRay" id="XRay" rows="4" class="form-control form-white" placeholder="" required></textarea>
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
                  <h3><i class="icon-check"></i> <strong>ADDITIONAL EXAMINATION</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Hematology</label>
                          <div class="col-sm-9">
                            <textarea name="Hematology" id="Hematology" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Urinalisis</label>
                          <div class="col-sm-9">
                            <textarea name="Urinalisis" id="Urinalisis" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Biokimia</label>
                          <div class="col-sm-9">
                            <textarea name="Biokimia" id="Biokimia" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Serology</label>
                          <div class="col-sm-9">
                            <textarea name="Serology" id="Serology" rows="4" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Logam Berat</label>
                          <div class="col-sm-9">
                            <textarea name="LogamBerat" id="LogamBerat" rows="4" class="form-control form-white" placeholder="" required></textarea>
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
                  <h3><i class="icon-check"></i> <strong>CONCLUSION</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Summary</label>
                          <div class="col-sm-9">
                            <textarea name="Summary" id="Summary" rows="6" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Fit</label>
                          <div class="col-sm-9">
                            <div class="input-group">
                              <div class="icheck-inline">
                                <label><input type="radio" name="Fit" data-radio="iradio_square-blue" value="1"> Fit</label>
                                <label><input type="radio" name="Fit" checked="true" data-radio="iradio_square-blue" value="0">After TX</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Recommendation</label>
                          <div class="col-sm-9">
                            <textarea name="Recommendation" id="Recommendation" rows="6" class="form-control form-white" placeholder="" required></textarea>
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
                  <h3><i class="icon-check"></i> <strong>NOTE</strong> <small>MCU</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Note Doctor</label>
                          <div class="col-sm-9">
                            <textarea name="NoteDoctor" id="NoteDoctor" rows="6" class="form-control form-white" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">note HR</label>
                          <div class="col-sm-9">
                            <textarea name="NoteHR" id="NoteHR" rows="6" class="form-control form-white" placeholder="" required></textarea>
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
          if (NIK.value == <?php echo $patient->NIK ?>) {
            Name.value = "<?php echo $patient->Name ?>";
            Sex.value = "<?php echo $patient->Sex ?>";
            Age.value = "<?php echo $patient->Age ?>";
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
