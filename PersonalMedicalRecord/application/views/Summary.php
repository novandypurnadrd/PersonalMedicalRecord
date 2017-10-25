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
            <h2><strong>Personal Medical</strong> Record</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">List</a>
                </li>
                <li class="active">Record</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'Summary/Filter' ?>">
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>PMR</strong> <small>Tools</small></h3>
                </div>
                <div class="panel-content bg-default">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
                        <div class="col-md-8">
                          <input autocomplete="off" class="form-control form-white" id="NIK" name="NIK" onkeyup="Linker()" required type="text" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="col-md-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-embossed btn-primary m-r-20"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <?php if ($Export == "1"): ?>
                            <a target="_blank" id="link" href="<?php echo base_url().'Summary/Export/'.$NIK?>" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                          <?php endif; ?>
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
                  <h3><i class="icon-check"></i> <strong>MCU</strong> <small>employee</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Type MCU</th>
                            <th>Date MCU</th>
                            <th>Date Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($MCU as $table): ?>
                          <tr>
                            <td>
                              <a target="_blank"  class="btn btn-xs btn-success" href="<?php echo base_url().'MCU/Table/DetailNIK/'.$table->NIK ?>">
                               <span class="fa fa-search"></span>
                              </a>
                            </td>
                            <td>
                              <?php echo $table->NIK ?>
                            </td>
                            <td>
                              <?php echo $table->Type ?>
                            </td>
                            <td>
                              <?php echo date("d-M-Y", strtotime($table->DateMCU)) ?>
                            </td>
                            <td>
                              <?php echo date("d-M-Y", strtotime($table->DateResult)) ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>On Site</strong> <small>consultation</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>ID No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Patient Type</th>
                            <th>Consultation Type</th>
                            <th>Incident Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($OnSite as $onsite): ?>
                          <?php foreach ($Patient as $patient): ?>
                            <?php if ($patient->NIK == $onsite->NIK): ?>
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
                              <a target="_blank"  class="btn btn-xs btn-success" href="<?php echo base_url().'OnSite/Table/DetailNIK/'.$onsite->NIK ?>">
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
                              <?php echo date("d-M-Y", strtotime($onsite->Date)) ?>
                            </td>
                            <td>
                              <?php echo $onsite->Patient ?>
                            </td>
                            <td>
                              <?php echo $onsite->Consultation ?>
                            </td>
                            <td>
                              <?php echo $onsite->Incident ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Off Site</strong> <small>consultation</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Diagnose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($OffSite as $offsite): ?>
                          <?php foreach ($Patient as $patient): ?>
                            <?php if ($patient->NIK == $offsite->NIK): ?>
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
                              <a target="_blank"  class="btn btn-xs btn-success" href="<?php echo base_url().'OffSite/Table/DetailNIK/'.$offsite->NIK ?>">
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
                              <?php echo date("d-M-Y", strtotime($offsite->Date)) ?>
                            </td>
                            <td>
                              <?php echo $offsite->Diagnose ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>Reference</strong> <small>consultation</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Title</th>
                            <th>Date of Reference</th>
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
                        <?php endforeach; ?>
                    </tbody>
                  </table>
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
    <script src="<?php echo base_url();?>assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="<?php echo base_url();?>assets/global/js/pages/table_dynamic.js"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <!-- END PAGE SCRIPT -->
  </body>
</html>
