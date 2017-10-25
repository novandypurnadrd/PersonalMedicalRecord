<!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('lib/Headlib') ?>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/dataTables.min.css" rel="stylesheet">
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
            <h2><strong>List</strong> Referral</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">List</a>
                </li>
                <li class="active">Referral</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'Reference/Input/InputReference' ?>">
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Referral</strong> <small>consultation</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Title</th>
                            <th>Date of Referral</th>
                            <th>Date of Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Reference as $reference): ?>
                          <?php foreach ($Patient as $patient): ?>
                            <?php if ($patient->NIK == $reference->NIK): ?>
                              <?php
                                $NIK = $patient->NIK;
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
                          <tr>
                            <td>
                              <a  class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo $reference->id; ?>">
                                <span class="fa fa-trash"></span>
                              </a>
                              <a  class="btn btn-xs btn-warning" href="<?php echo base_url().'Reference/Table/Update/'.$reference->id ?>">
                               <span class="fa fa-edit"></span>
                              </a>
                              <a target="_blank"  class="btn btn-xs btn-success" href="<?php echo base_url().'Reference/Table/Detail/'.$reference->NIK.'/'.$reference->DateReference ?>">
                               <span class="fa fa-search"></span>
                              </a>
                            </td>
                            <td>
                              <?php echo $NIK ?>
                            </td>
                            <td>
                              <?php echo $Job ?>
                            </td>
                            <td>
                              <?php echo date("d-M-Y", strtotime($reference->DateReference)) ?>
                            </td>
                            <td>
                              <?php echo date("d-M-Y", strtotime($reference->Date)) ?>
                            </td>
                          </tr>
                          <div class="modal fade" id="<?php echo $reference->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
    															<a> <?php echo anchor('Reference/Table/DeleteReference/'.$reference->id,'<button type="button" class="btn btn-dark">Delete</button>') ?></a>
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
          </form>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Reference</strong> <small>Tools</small></h3>
                </div>
                <div class="panel-content bg-default">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-sm-12 control-label">NIK</label>
                          </div>
                        </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input autocomplete="off" class="form-control form-white" id="NIK" name="NIK" onkeyup="Linker()" required type="text" placeholder="">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="col-sm-12 control-label">Date of Referral</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="prepend-icon">
                              <input autocomplete="off" type="text" id="DateReference" onchange="Linker()" name="DateReference" class="b-datepicker form-control form-white" required data-date-format="yyyy-mm-dd">
                              <i class="icon-calendar"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="col-sm-12 control-label" style="color:white">----</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <a target="_blank" id="link" href="<?php echo base_url().'Patient/Export/'?>" class="btn btn-blue"><i class="fa fa-print"></i> Print</a>
                          </div>
                        </div>
                      </div>
                    </div>
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
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="<?php echo base_url();?>assets/global/js/pages/table_dynamic.js"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <!-- END PAGE SCRIPT -->
    <script type="text/javascript">
      function Linker() {
        var NIK = document.getElementById('NIK').value;
        var DateReference = document.getElementById('DateReference').value;
        $("#link").attr("href", "Export/PrintReference/"+NIK+"/"+DateReference);
      }
    </script>
  </body>
</html>
