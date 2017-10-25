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
            <h2><strong>Update</strong> Patient</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Update</a>
                </li>
                <li class="active">patient</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'Patient/Update/UpdatePatient/'.$id ?>">
            <?php foreach ($Table as $table): ?>
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
                                <input autocomplete="off"class="form-control form-white" id="NIK" name="NIK" required type="text" value="<?php echo $table->NIK ?>" placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Name</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control form-white" id="Name" name="Name" required type="text" value="<?php echo $table->Name ?>" placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Date of Birth</label>
                              <div class="col-sm-8">
                                <div class="prepend-icon">
                                  <input autocomplete="off"type="text" id="DateBirth" onchange="CountAge()" name="DateBirth" class="b-datepicker form-control form-white" value="<?php echo $table->DateBirth ?>" required data-date-format="yyyy-mm-dd">
                                  <i class="icon-calendar"></i>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Age</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control " id="Age" readonly name="Age" required type="text" value="<?php echo $table->Age ?>" placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Sex</label>
                              <div class="col-sm-8">
                                <select class="form-control form-white" required id="Sex" name="Sex" data-search="true">
                                  <option value=""></option>
                                  <option value="MALE" <?php if($table->Sex == "MALE"){echo "selected='true'";} ?>>MALE</option>
                                  <option value="FEMALE" <?php if($table->Sex == "FEMALE"){echo "selected='true'";} ?>>FEMALE</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Departement</label>
                              <div class="col-sm-8">
                                <select class="form-control form-white" required id="Departement" name="Departement" data-search="true">
                                  <option value=""></option>
                                  <?php foreach ($Departement as $dept): ?>
                                    <option value="<?php echo $dept->id ?>" <?php if($dept->id == $table->Departement){echo "selected='true'";} ?>><?php echo $dept->departement ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Section</label>
                              <div class="col-sm-8">
                                <select class="form-control form-white" id="Section" name="Section" data-search="true">
                                  <option value=""></option>
                                  <?php foreach ($Section as $section): ?>
                                    <option value="<?php echo $section->id ?>" <?php if($section->id == $table->Section){echo "selected='true'";} ?> class="<?php echo $section->departement ?>"><?php echo $section->section ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Job</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control form-white" id="Job" name="Job" required type="text" value="<?php echo $table->Job ?>" placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Site</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control form-white" id="Site" name="Site" required type="text" value="<?php echo $table->Site ?>" placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Company</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control form-white" id="Company" name="Company" required type="text" value="<?php echo $table->Company ?>" placeholder="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Telp</label>
                              <div class="col-sm-8">
                                <input autocomplete="off"class="form-control form-white" id="Telp" name="Telp" required type="text" value="<?php echo $table->Telp ?>" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Emergency Call</label>
                              <div class="col-sm-8">
                                  <input autocomplete="off"class="form-control form-white" id="Emergency" name="Emergency" required type="text" value="<?php echo $table->Emergency ?>" placeholder="" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Relation</label>
                              <div class="col-sm-8">
                                  <input autocomplete="off"class="form-control form-white" id="Relation" name="Relation" required type="text" placeholder="" value="<?php echo $table->Relation ?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-4 control-label">Status</label>
                              <div class="col-sm-8">
                                <select class="form-control form-white" required id="Status" name="Status" data-search="true">
                                  <option value=""></option>
                                  <option value="1" <?php if($table->Status == "1"){ echo "selected='true'";} ?>>Active</option>
                                  <option value="0" <?php if($table->Status == "0"){ echo "selected='true'";} ?>>Inactive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Allergy</label>
                              <div class="col-sm-10">
                                <textarea name="Allergy" id="Allergy" rows="3" class="form-control form-white" placeholder="" ><?php echo $table->Allergy ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr />
                        <div class="row">
                          <div class="col-md-12" style="text-align:center;">
                            <button type="submit" class="btn btn-embossed btn-primary m-r-20">Update</button>
                            <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
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
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->
    <script src="<?php echo base_url();?>assets/global/plugins/rateit/jquery.rateit.min.js"></script> <!-- Rating star plugin -->
    <script src="<?php echo base_url();?>assets/global/js/jquery.chained.min.js"></script>
    <!-- END PAGE SCRIPT -->
    <script type="text/javascript">
			$("#Section").chained("#Departement");
      $('#costcode').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#Telp').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#Emergency').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
    </script>

    <script type="text/javascript">
      function CountAge() {
        var dob = document.getElementById('DateBirth').value;
        var countage = document.getElementById('Age');
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd='0'+dd
        }

        if(mm<10) {
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        var diff = new Date(today) - new Date(dob);
        var diffdays = diff / 1000 / (60 * 60 * 24);
        var age = Math.floor(diffdays / 365.25);

        countage.value = age;
      }
    </script>
  </body>
</html>
