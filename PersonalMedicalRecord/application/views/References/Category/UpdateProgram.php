<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('lib/Headlib'); ?>
	</head>

	<body class="no-skin" onload="myFunction()">
		<?php $this->load->view('lib/Header'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php $this->load->view('lib/Navigation'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url().'Dashboard' ;?>">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								References
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Category
								</small>
                <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Update
								</small>
							</h1>
						</div><!-- /.page-header -->

              <!-- MAIN CONTENT BEGIN -->
							<form class="form-horizontal" method="post" action="<?php echo base_url().'References/Category/SubmitUpdateProgram/'.$id ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Update Field </label>
                    <?php foreach ($ProgramID as $program): ?>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <select class="chosen-select form-control" id="ddlcategoryprogram" name="ddlcategoryprogram" onchange="CategoryOnChangeprogram()" data-placeholder="Choose a State...">
                          <option value="">Select Category</option>
                          <?php foreach ($Category as $category): ?>
                            <option value="<?php echo $category->id ?>" <?php if($program->category == $category->id){echo "selected = true";} ?>><?php echo $category->category ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <select class="chosen-select form-control" id="ddlsubcategoryprogram" name="ddlsubcategoryprogram" onchange="SubCategoryOnChangeprogram()" data-placeholder="Choose a State...">
                          <option value="">Select Sub Category</option>
                          <?php foreach ($SubCategory as $subcategory): ?>
                            <option value="<?php echo $subcategory->id ?>" <?php if($program->subcategory == $subcategory->id){echo "selected = true";} ?> class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <select class="chosen-select form-control" id="ddlsubsubcategoryprogram" name="ddlsubsubcategoryprogram" onchange="SubSubCategoryOnChangeprogram()" data-placeholder="Choose a State...">
                          <option value="">Select Sub Category</option>
                          <?php foreach ($SubSubCategory as $subsubcategory): ?>
                            <option value="<?php echo $subsubcategory->id ?>" <?php if($program->subsubcategory == $subsubcategory->id){echo "selected = true";} ?> class="<?php echo $subsubcategory->subcategory; ?>"><?php echo $subsubcategory->subsubcategory ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" class="form-control" autocomplete="off" id="program" name="program" onkeyup="Enabler()" placeholder="Sub-sub Category" required="on" value="<?php echo $program->program; ?>"/>
                      </div>
                    <?php endforeach; ?>
  								</div>
                </div>
								<hr />

                <div class="row">
                  <div class="col-xs-11 col-sm-11" style="text-align:center;">
  									<button type="submit" id="submit" class="btn btn-sm btn-primary">
  										<i class="ace-icon fa fa-save"></i>
  										Update
  									</button>
                  </div>
								</div>
							</form>
							<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('lib/Footer'); ?>

		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<?php $this->load->view('lib/Footlib'); ?>



		<!-- Chained for selected onchange -->
		<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.chained.min.js"></script>
		<script type="text/javascript">
      $("#ddlsubcategorysubsub").chained("#ddlcategorysubsub");
      $("#ddlsubcategoryprogram").chained("#ddlcategoryprogram");
      $("#ddlsubsubcategoryprogram").chained("#ddlsubcategoryprogram");
		</script>

		<!-- inline scripts related to this page -->
    <script>
			function myFunction(){

					var submit = document.getElementById("submit");
					var ddlcategoryprogram = document.getElementById("ddlcategoryprogram");
					var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram");
					var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram");
          var program = document.getElementById("program");

					Enabler();

			}

			function Enabler(){

					var submit = document.getElementById("submit");

					var ddlcategoryprogram = document.getElementById("ddlcategoryprogram").value;
					var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram").value;
					var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram").value;
          var program = document.getElementById("program").value;

					if ((ddlcategorysubsub != "" && ddlsubcategorysubsub != "" && subsubcategory != "" && program != "")) {
						submit.disabled = false;
					}
					else {
						submit.disabled = true;
					}

			}

			function CategoryOnChangeprogram() {
        var ddlcategoryprogram = document.getElementById("ddlcategoryprogram").value;
        var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram");
        var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram");
        var program = document.getElementById("program");
        var submit = document.getElementById("submit");

				if (ddlcategoryprogram == "") {
          ddlsubcategoryprogram.disabled = true;
          ddlsubsubcategoryprogram.disabled = true;
          program.disabled = true;
          submit.disabled = true;
				}
				else {
          ddlsubcategoryprogram.disabled = false;
          ddlsubsubcategoryprogram.disabled = false;
          program.disabled = false;
          submit.disabled = false;
				}
			}

			function SubCategoryOnChangeprogram() {
        var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram").value;
        var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram");
        var program = document.getElementById("program");
        var submit = document.getElementById("submit");

				if (ddlsubcategoryprogram == "") {
          ddlsubsubcategoryprogram.disabled = true;
          program.disabled = true;
          submit.disabled = true;
				}
				else {
          ddlsubsubcategoryprogram.disabled = false;
          program.disabled = false;
          submit.disabled = false;
				}
			}

      function SubCategoryOnChangeprogram() {
        var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram").value;
        var program = document.getElementById("program");
        var submit = document.getElementById("submit");

				if (ddlsubcategoryprogram == "") {
          program.disabled = true;
          submit.disabled = true;
				}
				else {
          program.disabled = false;
          submit.disabled = false;
				}
			}
		</script>

	</body>
</html>
