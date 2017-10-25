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
							<form class="form-horizontal" method="post" action="<?php echo base_url().'References/Category/SubmitUpdateSubSubCategory/'.$id ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Update Field </label>
                    <?php foreach ($SubSubCategoryID as $subsubcategory): ?>
                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <select class="chosen-select form-control" id="ddlcategorysubsub" name="ddlcategorysubsub" onchange="CategoryOnChangeSubSub()" data-placeholder="Choose a State...">
                          <option value="">Select Category</option>
                          <?php foreach ($Category as $category): ?>
                            <option value="<?php echo $category->id ?>" <?php if($subsubcategory->category == $category->id){echo "selected = true";} ?>><?php echo $category->category ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <select class="chosen-select form-control" id="ddlsubcategorysubsub" name="ddlsubcategorysubsub" onchange="SubCategoryOnChangeSubSub()" data-placeholder="Choose a State...">
                          <option value="">Select Sub Category</option>
                          <?php foreach ($SubCategory as $subcategory): ?>
                            <option value="<?php echo $subcategory->id ?>" <?php if($subsubcategory->subcategory == $subcategory->id){echo "selected = true";} ?> class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <input type="text" class="form-control" autocomplete="off" id="subsubcategory" name="subsubcategory" onkeyup="Enabler()" value="<?php echo $subsubcategory->subsubcategory ?>" required="on"/>
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
		</script>

		<!-- inline scripts related to this page -->
    <script>
			function myFunction(){

					var submit = document.getElementById("submit");
					var ddlcategorysubsub = document.getElementById("ddlcategorysubsub");
					var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub");
					var subsubcategory = document.getElementById("subsubcategory");

					Enabler();

			}

			function Enabler(){

					var submit = document.getElementById("submit");
					var ddlcategorysubsub = document.getElementById("ddlcategorysubsub").value;
					var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub").value;
					var subsubcategory = document.getElementById("subsubcategory").value;

					if ((ddlcategorysubsub != "" && ddlsubcategorysubsub != "" && subsubcategory != "")) {
						submit.disabled = false;
					}
					else {
						submit.disabled = true;
					}

			}

			function CategoryOnChangeSubSub() {
				var ddlcategorysubsub = document.getElementById("ddlcategorysubsub").value;
				var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub");
				var subsubcategory = document.getElementById("subsubcategory");
        var submit = document.getElementById("submit");

				if (ddlcategorysubsub == "") {
					ddlsubcategorysubsub.disabled = true;
          subsubcategory.disabled = true;
					submit.disabled = true;
				}
				else {
					ddlsubcategorysubsub.disabled = false;
					subsubcategory.disabled = false;
          submit.disabled = false;
				}
			}

			function SubCategoryOnChangeSubSub() {
				var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub").value;
				var subsubcategory = document.getElementById("subsubcategory");
        var submit = document.getElementById("submit");

				if (ddlsubcategorysubsub == "") {
					subsubcategory.disabled = true;
					submit.disabled = true;
				}
				else {
					subsubcategory.disabled = false;
          submit.disabled = false;
				}
			}
		</script>

	</body>
</html>
