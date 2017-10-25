<!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('lib/Headlib') ?>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url();?>assets/global/plugins/datatables/dataTables.min.css" rel="stylesheet">
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
            <h2><strong>List</strong> On Site</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">List</a>
                </li>
                <li class="active">On Site</li>
              </ol>
            </div>
          </div>
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'OnSite/Input/InputOnSite' ?>">
          <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-check"></i> <strong>On Site</strong> <small>consultation</small></h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                  <a target="_blank" href="<?php echo base_url().'OnSite/Export/'?>" class="btn btn-blue"><i class="fa fa-print"></i> Export</a>
                  <table class="table table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>ID No</th>
                            <th>Log</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Patient Type</th>
                            <th>Consultation Type</th>
                            <th>Incident Type</th>
                            <th>Diagnose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($OnSite as $onsite): ?>
                          <tr>
                            <td>
                              <a  class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo $onsite->id; ?>">
                                <span class="fa fa-trash"></span>
                              </a>
                              <a  class="btn btn-xs btn-warning" href="<?php echo base_url().'OnSite/Table/Update/'.$onsite->id ?>">
                               <span class="fa fa-pencil"></span>
                              </a>
                              <a target="_blank"  class="btn btn-xs btn-success" href="<?php echo base_url().'OnSite/Table/Detail/'.$onsite->id ?>">
                               <span class="fa fa-search"></span>
                              </a>
                            </td>
                            <td>
                              <?php echo $onsite->NIK ?>
                            </td>
                            <td>
                              <?php echo $onsite->Number ?>
                            </td>
                            <td>
                              <?php echo $onsite->Job ?>
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
                            <td>
                              <?php echo $onsite->Subjective ?>
                            </td>
                          </tr>
                          <div class="modal fade" id="<?php echo $onsite->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
    															<a> <?php echo anchor('OnSite/Table/DeleteOnSite/'.$onsite->id,'<button type="button" class="btn btn-dark">Delete</button>') ?></a>
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
    <!-- END PAGE SCRIPT -->
  </body>
</html>
