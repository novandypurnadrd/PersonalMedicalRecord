<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('lib/Headlib'); ?>
	</head>

	<body class="no-skin">
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
							<li class="active">Daily Activity</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Daily Activity
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Work Order
                  <small>
  									<i class="ace-icon fa fa-angle-double-right"></i>
  									Input
  								</small>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<!-- MAIN CONTENT BEGIN -->
						<form class="form-horizontal" method="post" action="<?php echo base_url().'Daily/WorkOrder/Input/insertWorkOrder'?>" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group">
									<div class="col-xs-5 col-sm-5">
										<div class="form-group">
											</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date Made </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<div class="input-group">
																<input class="form-control date-picker" id="id-date-picker-1" required="on" autocomplete="off" name="date" type="text" data-date-format="yyyy-mm-dd" />
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>
															</div>
												</div>
										</div><!-- /.span -->
										<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date Complete </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<div class="input-group">
																	<input class="form-control date-picker" disabled="true" required id="id-date-picker-2" required="on" autocomplete="off" name="datecomplete" type="text" data-date-format="yyyy-mm-dd" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
													</div>
										</div>
										<div class="form-group">
											</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bidang </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<select class="chosen-select form-control" id="category" name="category" data-placeholder="Choose a category">
														<option value="">Pilih Bidang</option>
														<?php foreach ($Category as $category): ?>
															<option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
														<?php endforeach; ?>
													</select>
												</div>
										</div><!-- /.span -->
										<div class="form-group">
											</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub Bidang </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<select class="chosen-select form-control" id="subcategory" name="subcategory" data-placeholder="Choose a State...">
														<option value="">Pilih Sub Bidang</option>
														<?php foreach ($SubCategory as $subcategory): ?>
															<option value="<?php echo $subcategory->id ?>" class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
														<?php endforeach; ?>
													</select>
												</div>
										</div><!-- /.span -->
										<div class="form-group">
											</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub-sub Bidang </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<select class="chosen-select form-control" id="subsubcategory" name="subsubcategory" data-placeholder="Choose a State...">
														<option value="">Pilih Sub-sub Bidang</option>
														<?php foreach ($SubSubCategory as $subsubcategory): ?>
															<option value="<?php echo $subsubcategory->id ?>" class="<?php echo $subsubcategory->subcategory; ?>"><?php echo $subsubcategory->subsubcategory ?></option>
														<?php endforeach; ?>
													</select>
												</div>
										</div><!-- /.span -->
										<div class="form-group">
											</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<select class="form-control" id="program" name="program" data-placeholder="Choose a State...">
														<option value="">Pilih Program</option>
														<?php foreach ($Program as $program): ?>
															<option value="<?php echo $program->id ?>" class="<?php echo $program->subsubcategory; ?>"><?php echo $program->program ?></option>
														<?php endforeach; ?>
													</select>
												</div>
										</div><!-- /.span -->
									</div>

									<div class="col-xs-7 col-sm-7">
										<div class="form-group">
											<div class="col-xs-6 col-sm-6"></br>
												<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. WO </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" required="on" autocomplete="off" id="no" name="no" value=""/>
														</div>
												</div><!-- /.span -->
												<div class="form-group">
													</br>
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cost Code </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" required="on" autocomplete="off" id="costcode" name="costcode" value=""/>
														</div>
												</div><!-- /.span -->
												<div class="form-group">
													</br>
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<select class="chosen-select form-control" id="status" onchange="myFunction()" name="status" data-placeholder="Choose a category">
																<option value="0">Progress</option>
																<option value="1">Completed</option>
																<option value="2">Cancel</option>
															</select>
														</div>
												</div><!-- /.span -->
											</div>
											<div class="col-xs-6 col-sm-6"></br>
													<div class="form-group">
															<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Rp. </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="text" class="form-control" required="on" onkeyup="convert()" autocomplete="off" id="cost" name="cost" value=""/>
																	<i class=""></i>
																</span>
															</div>
													</div><!-- /.span -->
													<div class="form-group">
													</br>
															<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Dollars </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="text" class="form-control" readonly autocomplete="off" id="dollars" name="dollars" placeholder=""/>
																	<i class="ace-icon fa fa-dollar blue"></i>
																</span>
															</div>
													</div><!-- /.span -->
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-5 col-sm-5" style="text-align:center">
										<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Job </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<textarea class="form-control" id="form-field-8" id="job" name="job" rows="4"></textarea>
												</div>
										</div><!-- /.span -->

									</div>
									<div class="col-xs-6 col-sm-6" style="text-align:center"></br>
										<button type="submit" id="submit" class="btn btn-sm btn-primary">
											<i class="ace-icon fa fa-save"></i>
											Insert
										</button>
										<button type="reset" class="btn btn-sm btn-danger">
											<i class="ace-icon fa fa-refresh"></i>
											Reset
										</button>
									</div>
								</div>
							</div>
							<hr />
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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

			});
		</script>

		<script>
			function myFunction() {
				var status = document.getElementById("status").value;
				var datecomplete = document.getElementById("id-date-picker-2");

				if (status == "1" || status == "2") {
					datecomplete.disabled = false;
				}
				else {
					datecomplete.disabled = true;
				}
			}

			function convert() {
				var cost = document.getElementById("cost");
				var dollars = document.getElementById("dollars");

				dollars.value = cost.value / <?php echo $Currency; ?>;
			}
		</script>

		<!-- Chained for selected onchange -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
			$("#subcategory").chained("#category");
      $("#subsubcategory").chained("#subcategory");
      $("#program").chained("#subsubcategory");
			$('#costcode').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#cost').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
    </script>

	</body>
</html>
