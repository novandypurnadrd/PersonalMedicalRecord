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
            <h2><strong>Upload</strong> Referral</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Upload</a>
                </li>
                <li class="active">Referral</li>
              </ol>
            </div>
          </div>
          <?php if ($Update == "0") { ?>
            <form class="form-horizontal"  method="post" action="<?php echo base_url().'Reference/Upload/UploadReference' ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-12 portlets">
                <div class="panel">
                  <div class="panel-header panel-controls">
                    <h3><i class="icon-check"></i> <strong>Referral</strong> <small>Consultation</small></h3>
                  </div>
                  <div class="panel-content bg-default">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">NIK</label>
                              <div class="col-sm-9">
                                <select class="form-control form-white" onchange="Toggle()" required id="NIK" name="NIK" data-search="true">
                                  <option value=""></option>
                                  <?php foreach ($Patient as $patient): ?>
                                    <option value="<?php echo $patient->NIK ?>"><?php echo $patient->NIK ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <label class="col-sm-3 control-label">Date</label>
                            <div class="col-md-9">
                              <div class="prepend-icon">
                                <input autocomplete="off" type="text" id="Date" name="Date" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
                                <i class="icon-calendar"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">PDF</label>
                            <div class="col-sm-10">
                              <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                              <div class="form-control" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
                              </div>
                              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>
                              <input type="file" name="file" required>
                              </span>
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-md-12" style="text-align:center;">
                          <button type="submit" id="submit" disabled="true" class="btn btn-embossed btn-primary m-r-20">Upload</button>
                          <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          <?php }
          else { ?>
            <form class="form-horizontal"  method="post" action="<?php echo base_url().'Reference/Upload/UpdateReference/'.$id ?>" enctype="multipart/form-data">
              <?php foreach ($Reference as $reference): ?>
                <div class="row">
                  <div class="col-lg-12 portlets">
                    <div class="panel">
                      <div class="panel-header panel-controls">
                        <h3><i class="icon-check"></i> <strong>Referral</strong> <small>Consultation</small></h3>
                      </div>
                      <div class="panel-content bg-default">
                        <div class="row">
                          <div class="col-md-7">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">NIK</label>
                                <div class="col-sm-9">
                                  <select class="form-control form-white" onchange="Toggle()" required id="NIK" name="NIK" data-search="true">
                                    <option value=""></option>
                                    <?php foreach ($Patient as $patient): ?>
                                      <option value="<?php echo $patient->NIK ?>" <?php if($patient->NIK = $reference->NIK){echo "selected='true' ";} ?>><?php echo $patient->NIK ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-7">
                              <label class="col-sm-3 control-label">Date</label>
                              <div class="col-md-9">
                                <div class="prepend-icon">
                                  <input autocomplete="off" type="text" id="Date" name="Date" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd" value="<?php echo $reference->Date ?>">
                                  <i class="icon-calendar"></i>
                                </div>
                              </div>
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
              <?php endforeach; ?>
            </form>
          <?php } ?>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Referral</strong> <small>List</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Date</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Reference as $table): ?>
                          <tr>
                            <td>
                              <a  class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo $table->id; ?>">
                                <span class="fa fa-trash"></span>
                              </a>
                              <a  class="btn btn-xs btn-warning" href="<?php echo base_url().'Reference/Upload/Update/'.$table->id ?>">
                               <span class="fa fa-pencil"></span>
                              </a>
                            </td>
                            <td>
                              <?php echo $table->NIK ?>
                            </td>
                            <td>
                              <?php echo date("d-F-Y", strtotime($table->Date)) ?>
                            </td>
                            <td>
                              <a target="_blank" href="<?php echo base_url().'excel/reference/'.explode('/',$table->File)[3] ?>"><?php echo explode('/',$table->File)[3]; ?></a>
                            </td>
                          </tr>
                          <div class="modal fade" id="<?php echo $table->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog bg-red">
                              <div class="modal-content bg-red">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                                  <h4 class="modal-title">Full <strong>Colored</strong></h4>
                                </div>
                                <div class="modal-body">
                                  <p class="m-t-40">Are you sure want to delete this data? </p>
                                </div>
                                <div class="modal-footer">
    															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    															<a> <?php echo anchor('Reference/Upload/DeleteReference/'.$table->id,'<button type="button" class="btn btn-dark">Delete</button>') ?></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

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
    <!-- END PAGE SCRIPT -->
    <script type="text/javascript">

      var NIK = document.getElementById('NIK');
      var submit = document.getElementById('submit');

      function Toggle() {
        if (NIK.value != "") {
          submit.disabled = false;
        }
        else {
          submit.disabled = true;
        }
      }
    </script>
  </body>
</html>
