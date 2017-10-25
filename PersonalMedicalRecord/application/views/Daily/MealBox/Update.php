<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('lib/Headlib'); ?>
	</head>

	<body class="no-skin" onload="Enabler()">
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
									Meal Box
                  <small>
  									<i class="ace-icon fa fa-angle-double-right"></i>
  									Update
  								</small>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<!-- MAIN CONTENT BEGIN -->
						<?php foreach ($Table as $table): ?>
							<form class="form-horizontal" method="post" action="<?php echo base_url().'Daily/Mealbox/Update/updateMealBox/'.$id?>" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<div class="input-group">
																	<input class="form-control date-picker" id="id-date-picker-1" required="on" value="<?php echo $table->date ?>" autocomplete="off" name="date" type="text" data-date-format="yyyy-mm-dd" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
													</div>
											</div><!-- /.span -->
											<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bidang </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<select class="chosen-select form-control" id="category" name="category" data-placeholder="Choose a category">
															<option value="">Pilih Bidang</option>
															<?php foreach ($Category as $category): ?>
																<option value="<?php echo $category->id ?>" <?php if($category->id == $table->category){echo "selected = true";} ?>><?php echo $category->category ?></option>
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
																<option value="<?php echo $subcategory->id ?>" class="<?php echo $subcategory->category; ?>" <?php if($subcategory->id == $table->subcategory){echo "selected = true";} ?>><?php echo $subcategory->subcategory ?></option>
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
																<option value="<?php echo $subsubcategory->id ?>" class="<?php echo $subsubcategory->subcategory; ?>" <?php if($subsubcategory->id == $table->subsubcategory){echo "selected = true";} ?>><?php echo $subsubcategory->subsubcategory ?></option>
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
																<option value="<?php echo $program->id ?>" <?php if($program->id == $table->program){echo "selected = true";} ?>  class="<?php echo $program->subsubcategory; ?>"><?php echo $program->program ?></option>
															<?php endforeach; ?>
														</select>
													</div>
											</div><!-- /.span -->
										</div>

										<div class="col-xs-6 col-sm-6">
											<div class="col-xs-6 col-sm-6">
												<div class="form-group">
													<div class="page-header">
														<h1>
															<small>
																<i class="ace-icon fa fa-angle-double-right"></i>
																Keperluan Meal Box
															</small>
														</h1>
													</div>
												</div>
												<div class="form-group">
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Pagi </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" autocomplete="off" onkeyup="checker()" id="pagi" name="pagi" value="<?php echo $table->pagi ?>"/>
														</div>
												</div><!-- /.span -->
												<div class="form-group">
													</br>
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Siang </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" autocomplete="off" onkeyup="checker()" id="siang" name="siang" value="<?php echo $table->siang ?>"/>
														</div>
												</div><!-- /.span -->
												<div class="form-group">
													</br>
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Malam </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" autocomplete="off" onkeyup="checker()" id="malam" name="malam" value="<?php echo $table->siang ?>"/>
														</div>
												</div><!-- /.span -->
											</div>
											<div class="col-xs-6 col-sm-6">
													<div class="form-group">
														<div class="page-header">
															<h1>
																<small>
																	<i class="ace-icon fa fa-angle-double-right"></i>
																	Cost
																</small>
															</h1>
														</div>
													</div>
													<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Price</label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<input type="text" class="form-control" onkeyup="convert()" autocomplete="off" id="price" name="price" value="<?php echo $table->price ?>"/>
															</div>
													</div><!-- /.span -->
													<div class="form-group">
													</br>
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Total</label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<input type="number" class="form-control" readonly autocomplete="off" id="total" name="total" value="<?php echo $table->total ?>"/>
															</div>
													</div><!-- /.span -->
													<div class="form-group">
													</br>
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dollars </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="number" class="form-control" readonly autocomplete="off" id="dollars" name="dollars" value="<?php echo $table->dollars ?>"/>
																	<i class="ace-icon fa fa-dollar blue"></i>
																</span>
															</div>
													</div><!-- /.span -->
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6" style="text-align:center">
											<div class="form-group">
												<div class="page-header">
													<h1>
														<small>
															<i class="ace-icon fa fa-angle-double-right"></i>
															Keperluan Meal Box
														</small>
													</h1>
												</div>
											</div>
											<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<textarea class="form-control" id="form-field-8" id="keterangan" name="keterangan" rows="4"><?php echo $table->keterangan ?></textarea>
													</div>
											</div><!-- /.span -->

										</div>

										<div class="col-xs-6 col-sm-6" style="text-align:center">
											<div class="form-group">
												<div class="page-header">
													<h1>
														<small>
														</small>
													</h1>
												</div>
											</div>
											<button type="submit" id="submit" class="btn btn-sm btn-primary">
												<i class="ace-icon fa fa-save"></i>
												Update
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
						<?php endforeach; ?>
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
			function Enabler(){
				var submit = document.getElementById("submit");
				submit.disabled = true;
				checker();
				convert();
			}

			function checker(){
				var price = parseInt(document.getElementById("price").value);
				var total = document.getElementById("total");
				var dollars = document.getElementById("dollars");
				var siang = document.getElementById("siang").value;
				var pagi = document.getElementById("pagi").value;
				var malam = document.getElementById("malam").value;
				if ((siang != "") || (pagi != "") || (malam != "")) {
					submit.disabled = false;
				}
				else {
					submit.disabled = true;
				}

				if (siang == "") {
					siang = 0;
				}

				if (pagi == "") {
					pagi = 0;
				}

				if (malam == "") {
					malam = 0;
				}

				total.value = price * (parseInt(siang)+parseInt(malam)+parseInt(pagi));
				dollars.value = total.value / <?php echo $Currency; ?>;
			}

			function convert() {
				var price = parseInt(document.getElementById("price").value);
				var total = document.getElementById("total");
				var dollars = document.getElementById("dollars");
				var siang = document.getElementById("siang").value;
				var pagi = document.getElementById("pagi").value;
				var malam = document.getElementById("malam").value;

				if (siang == "") {
					siang = 0;
				}

				if (pagi == "") {
					pagi = 0;
				}

				if (malam == "") {
					malam = 0;
				}

				total.value = price * (parseInt(siang)+parseInt(malam)+parseInt(pagi));
				dollars.value = total.value / <?php echo $Currency; ?>;
			}

		</script>

		<!-- Chained for selected onchange -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
			$("#subcategory").chained("#category");
      $("#subsubcategory").chained("#subcategory");
      $("#program").chained("#subsubcategory");
			$('#pagi').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#siang').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#malam').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
			$('#price').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
    </script>

	</body>
</html>
