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
							</h1>
						</div><!-- /.page-header -->

              <!-- MAIN CONTENT BEGIN -->
							<form method="post" action="<?php echo base_url().'References/Category/Insert' ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xs-12 col-sm-5">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Category</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
																<input type="text" class="form-control" style="text-align:center" onkeyup="checker()" autocomplete="off" id="code" name="code" placeholder="A-Z"/>
													</div>
													<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
																<input type="text" class="form-control" autocomplete="off" id="category" onkeyup="Enabler()" name="category" placeholder="Category" required="on"/>
													</div>

													<hr />
												</div>
											</div>
										</div>
									</div><!-- /.span -->

									<div class="col-xs-12 col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Sub Category</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
														<select class="chosen-select form-control" id="ddlcategorysub" onchange="CategoryOnChangeSub()" name="ddlcategorysub" data-placeholder="Choose a State...">
															<option value="">Select Category</option>
															<?php foreach ($Category as $category): ?>
																<option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
																<input type="text" class="form-control" autocomplete="off" id="subcategory" name="subcategory"  onkeyup="Enabler()" placeholder="Sub Category" required="on"/>
													</div>
													<hr />
												</div>
											</div>
										</div>
									</div><!-- /.span -->
								</div>

								<hr />
								<div class="row">
									<div class="col-xs-12 col-sm-11">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Sub-sub Category</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<select class="chosen-select form-control" id="ddlcategorysubsub" name="ddlcategorysubsub" onchange="CategoryOnChangeSubSub()" data-placeholder="Choose a State...">
															<option value="">Select Category</option>
															<?php foreach ($Category as $category): ?>
																<option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<select class="chosen-select form-control" id="ddlsubcategorysubsub" name="ddlsubcategorysubsub" onchange="SubCategoryOnChangeSubSub()" data-placeholder="Choose a State...">
															<option value="">Select Sub Category</option>
															<?php foreach ($SubCategory as $subcategory): ?>
																<option value="<?php echo $subcategory->id ?>" class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
																<input type="text" class="form-control" autocomplete="off" id="subsubcategory" name="subsubcategory" onkeyup="Enabler()" placeholder="Sub-sub Category" required="on"/>
													</div>

													<hr />
												</div>
											</div>
										</div>
									</div><!-- /.span -->
								</div>
								<hr />
								<div class="row">
									<div class="col-xs-12 col-sm-11">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Program</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<select class="chosen-select form-control" id="ddlcategoryprogram" name="ddlcategoryprogram" onchange="CategoryOnChangeprogram()" data-placeholder="Choose a State...">
															<option value="">Select Category</option>
															<?php foreach ($Category as $category): ?>
																<option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<select class="chosen-select form-control" id="ddlsubcategoryprogram" name="ddlsubcategoryprogram" onchange="SubCategoryOnChangeprogram()" data-placeholder="Choose a State...">
															<option value="">Select Sub Category</option>
															<?php foreach ($SubCategory as $subcategory): ?>
																<option value="<?php echo $subcategory->id ?>" class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
														<select class="chosen-select form-control" id="ddlsubsubcategoryprogram" name="ddlsubsubcategoryprogram" onchange="SubSubCategoryOnChangeprogram()" data-placeholder="Choose a State...">
															<option value="">Select Sub Category</option>
															<?php foreach ($SubSubCategory as $subsubcategory): ?>
																<option value="<?php echo $subsubcategory->id ?>" class="<?php echo $subsubcategory->subcategory; ?>"><?php echo $subsubcategory->subsubcategory ?></option>
															<?php endforeach; ?>
														</select>
													</div>

													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
																<input type="text" class="form-control" autocomplete="off" id="program" name="program" onkeyup="Enabler()" placeholder="Sub-sub Category" required="on"/>
													</div>

													<hr />
												</div>
											</div>
										</div>
									</div><!-- /.span -->
								</div>
								</br>

								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									</div>
									<button type="submit" id="submit" class="width-20 btn btn-sm btn-primary">
										<i class="ace-icon fa fa-plus"></i>
										<span class="bigger-110">Add</span>
									</button>
								</div>

								<hr />
								<div class="row">
									<div class="col-xs-6">
										<div class="page-header">
											<h1>
												Category
											</h1>
										</div><!-- /.page-header -->
										<table id="dynamic-table-1" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th>Code</th>
													<th>Name</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach ($Category as $category): ?>
													<tr>
														<td><?php echo $category->code; ?></td>
														<td>
															<?php echo $category->category; ?>
														</td>
														<td class="center">
															<div class="hidden-sm hidden-xs btn-group">
																<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#<?php echo $category->id; ?>">
																	<i class="ace-icon fa fa-trash bigger-120"></i>
																</a>
																<a class="btn btn-xs btn-danger" href="<?php echo base_url().'References/Category/UpdateCategory/'.$category->id ?>">
																	<i class="ace-icon fa fa-pencil bigger-110"></i>
																</a>
															</div>
														</td>
													</tr>

													<div class="modal fade" id="<?php echo $category->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-body">
																			<h3>Are you sure? </h3>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																			<a> <?php echo anchor('/References/Category/deleteCategory/'.$category->id,'<button type="button" class="btn btn-danger">Delete</button>') ?></a>
																		</div>
																	</div>
																</div>
													</div>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div><!-- /.span -->

									<div class="col-xs-6">
											<div class="page-header">
												<h1>
													Sub Category
												</h1>
											</div><!-- /.page-header -->
											<table id="dynamic-table-2" class="table  table-bordered table-hover">
												<thead>
													<tr>
														<th>Category</th>
														<th>Code</th>
														<th>Name</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($SubCategory as $subcategory): ?>
														<tr>
															<?php foreach ($Category as $category): ?>
																<?php if ($subcategory->category == $category->id): ?>
																	<td><?php echo $category->category; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
															<td><?php echo $subcategory->id; ?></td>
															<td>
																<?php echo $subcategory->subcategory; ?>
															</td>
															<td class="center">
																<div class="hidden-sm hidden-xs btn-group">
																	<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#sub<?php echo $subcategory->id; ?>">
																		<i class="ace-icon fa fa-trash bigger-120"></i>
																	</a>
																	<a class="btn btn-xs btn-danger" href="<?php echo base_url().'References/Category/updateSubCategory/'.$subcategory->id ?>">
																		<i class="ace-icon fa fa-pencil bigger-110"></i>
																	</a>
																</div>
															</td>
														</tr>

														<div class="modal fade" id="sub<?php echo $subcategory->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          												<div class="modal-dialog" role="document">
          													<div class="modal-content">
          														<div class="modal-body">
          															<h3>Are you sure? </h3>
          														</div>
          														<div class="modal-footer">
          															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          															<a> <?php echo anchor('/References/Category/deleteSubCategory/'.$subcategory->id,'<button type="button" class="btn btn-danger">Delete</button>') ?></a>
          														</div>
          													</div>
          												</div>
  				                      </div>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div><!-- /.span -->
								</div>
								</br>
								<div class="row">
									<div class="col-xs-6">
											<div class="page-header">
												<h1>
													Sub-sub Category
												</h1>
											</div><!-- /.page-header -->
											<table id="dynamic-table-3" class="table  table-bordered table-hover">
												<thead>
													<tr>
														<th>Category</th>
														<th>Sub Category</th>
														<th>Name</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($SubSubCategory as $subsubcategory): ?>
														<tr>
															<?php foreach ($Category as $category): ?>
																<?php if ($subsubcategory->category == $category->id): ?>
																	<td><?php echo $category->category; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>

															<?php foreach ($SubCategory as $subcategory): ?>
																<?php if ($subcategory->id == $subsubcategory->subcategory): ?>
																	<td><?php echo $subcategory->subcategory; ?></td>
																<?php endif; ?>
															<?php endforeach; ?>
															<td>
																<?php echo $subsubcategory->subsubcategory; ?>
															</td>
															<td class="center">
																<div class="hidden-sm hidden-xs btn-group">
																	<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#subsub<?php echo $subsubcategory->id; ?>">
																		<i class="ace-icon fa fa-trash bigger-120"></i>
																	</a>
																	<a class="btn btn-xs btn-danger" href="<?php echo base_url().'References/Category/updateSubSubCategory/'.$subsubcategory->id ?>">
																		<i class="ace-icon fa fa-pencil bigger-110"></i>
																	</a>
																</div>
															</td>
														</tr>

														<div class="modal fade" id="subsub<?php echo $subsubcategory->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          												<div class="modal-dialog" role="document">
          													<div class="modal-content">
          														<div class="modal-body">
          															<h3>Are you sure? </h3>
          														</div>
          														<div class="modal-footer">
          															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          															<a> <?php echo anchor('/References/Category/deleteSubSubCategory/'.$subsubcategory->id,'<button type="button" class="btn btn-danger">Delete</button>') ?></a>
          														</div>
          													</div>
          												</div>
  				                      </div>
													<?php endforeach; ?>


												</tbody>
											</table>
										</div><!-- /.span -->
									<div class="col-xs-6">
												<div class="page-header">
													<h1>
														Program
													</h1>
												</div><!-- /.page-header -->
												<table id="dynamic-table-4" class="table  table-bordered table-hover">
													<thead>
														<tr>
															<th>Category</th>
															<th>Sub Category</th>
															<th>Sub Sub Category</th>
															<th>Name</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody>
														<?php foreach ($Program as $program): ?>
															<tr>
																<?php foreach ($Category as $category): ?>
																	<?php if ($program->category == $category->id): ?>
																		<td><?php echo $category->category; ?></td>
																	<?php endif; ?>
																<?php endforeach; ?>

																<?php foreach ($SubCategory as $subcategory): ?>
																	<?php if ($subcategory->id == $program->subcategory): ?>
																		<td><?php echo $subcategory->subcategory; ?></td>
																	<?php endif; ?>
																<?php endforeach; ?>

																<?php foreach ($SubSubCategory as $subsubcategory): ?>
																	<?php if ($subsubcategory->id == $program->subsubcategory): ?>
																		<td><?php echo $subsubcategory->subsubcategory; ?></td>
																	<?php endif; ?>
																<?php endforeach; ?>
																<td>
																	<?php echo $program->program; ?>
																</td>
																<td class="center">
																	<div class="hidden-sm hidden-xs btn-group">
																		<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#subsub<?php echo $program->id; ?>">
																			<i class="ace-icon fa fa-trash bigger-120"></i>
																		</a>
																		<a class="btn btn-xs btn-danger" href="<?php echo base_url().'References/Category/updateProgram/'.$program->id ?>">
																			<i class="ace-icon fa fa-pencil bigger-110"></i>
																		</a>
																	</div>
																</td>
															</tr>

															<div class="modal fade" id="subsub<?php echo $subsubcategory->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	          												<div class="modal-dialog" role="document">
	          													<div class="modal-content">
	          														<div class="modal-body">
	          															<h3>Are you sure? </h3>
	          														</div>
	          														<div class="modal-footer">
	          															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	          															<a> <?php echo anchor('/References/Category/deleteSubSubCategory/'.$subsubcategory->id,'<button type="button" class="btn btn-danger">Delete</button>') ?></a>
	          														</div>
	          													</div>
	          												</div>
	  				                      </div>
														<?php endforeach; ?>


													</tbody>
												</table>
											</div><!-- /.span -->
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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		var myTable1 =
		$('#dynamic-table-1')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
				{ "bSortable": false },
				null,
				{ "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
					//"bServerSide": true,
					//"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			"sScrollY": "300px",
			"bPaginate": false,

			//"sScrollX": "100%",
			// "sScrollXInner": "120%",
			// "bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				style: 'multi'
			}
			} );
		var myTable2 =
		$('#dynamic-table-2')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
				{ "bSortable": false },
				null, null,
				{ "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
					//"bServerSide": true,
					//"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			"sScrollY": "300px",
			"bPaginate": false,

			//"sScrollX": "100%",
			// "sScrollXInner": "120%",
			// "bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				style: 'multi'
			}
			} );
		var myTable3 =
		$('#dynamic-table-3')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
				{ "bSortable": false },
				null, null,
				{ "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
					//"bServerSide": true,
					//"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			"sScrollY": "300px",
			"bPaginate": false,

			//"sScrollX": "100%",
			// "sScrollXInner": "120%",
			// "bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				style: 'multi'
			}
			} );
		var myTable4 =
		$('#dynamic-table-4')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
				bAutoWidth: false,
				"aoColumns": [
					{ "bSortable": false },
					null, null,null,
					{ "bSortable": false }
				],
				"aaSorting": [],


				//"bProcessing": true,
						//"bServerSide": true,
						//"sAjaxSource": "http://127.0.0.1/table.php"	,

				//,
				"sScrollY": "300px",
				"bPaginate": false,

				//"sScrollX": "100%",
				// "sScrollXInner": "120%",
				// "bScrollCollapse": true,
				//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
				//you may want to wrap the table inside a "div.dataTables_borderWrap" element

				//"iDisplayLength": 50


				select: {
					style: 'multi'
				}
				} );

		</script>
		<script>
			function myFunction(){

					var submit = document.getElementById("submit");
					var code = document.getElementById("code");
					var category = document.getElementById("category");
					var ddlcategorysub = document.getElementById("ddlcategorysub");
					var subcategory = document.getElementById("subcategory");
					var ddlcategorysubsub = document.getElementById("ddlcategorysubsub");
					var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub");
					var subsubcategory = document.getElementById("subsubcategory");
					var ddlcategoryprogram = document.getElementById("ddlcategoryprogram");
					var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram");
					var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram");
					var program = document.getElementById("program");

					category.disabled = true;
					subcategory.disabled = true;
					ddlsubcategorysubsub.disabled = true;
					subsubcategory.disabled = true;
					submit.disabled = true;
					ddlsubcategoryprogram.disabled = true;
					ddlsubsubcategoryprogram.disabled = true;
					program.disabled = true;

			}

			function Enabler(){

					var submit = document.getElementById("submit");
					var code = document.getElementById("code").value;
					var category = document.getElementById("category").value;
					var ddlcategorysub = document.getElementById("ddlcategorysub").value;
					var subcategory = document.getElementById("subcategory").value;
					var ddlcategorysubsub = document.getElementById("ddlcategorysubsub").value;
					var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub").value;
					var subsubcategory = document.getElementById("subsubcategory").value;
					var ddlcategoryprogram = document.getElementById("ddlcategoryprogram").value;
					var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram").value;
					var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram").value;
					var program = document.getElementById("program").value;

					if ( (code != "" && category != "") || (subcategory != "") || (subsubcategory != "") || (program != "")) {
						submit.disabled = false;
					}
					else {
						submit.disabled = true;
					}

			}

			function checker(){
				var code = document.getElementById("code").value;
				var category = document.getElementById("category");

				if (code == "") {
					category.disabled = true;
				}
				else {
					category.disabled = false;
				}
			}

			function CategoryOnChangeSub(){
				var ddlcategorysub = document.getElementById("ddlcategorysub").value;
				var subcategory = document.getElementById("subcategory");

				if (ddlcategorysub == "") {
					subcategory.disabled = true;
				}
				else {
					subcategory.disabled = false;
				}
			}

			function CategoryOnChangeSubSub() {
				var ddlcategorysubsub = document.getElementById("ddlcategorysubsub").value;
				var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub");
				var subsubcategory = document.getElementById("subsubcategory");

				if (ddlcategorysubsub == "") {
					ddlsubcategorysubsub.disabled = true;
					subsubcategory.disabled = true;
				}
				else {
					ddlsubcategorysubsub.disabled = false;
					subsubcategory.disabled = false;
				}
			}

			function SubCategoryOnChangeSubSub() {
				var ddlsubcategorysubsub = document.getElementById("ddlsubcategorysubsub").value;
				var subsubcategory = document.getElementById("subsubcategory");

				if (ddlsubcategorysubsub == "") {
					subsubcategory.disabled = true;
				}
				else {
					subsubcategory.disabled = false;
				}
			}

			function CategoryOnChangeprogram() {
				var ddlcategoryprogram = document.getElementById("ddlcategoryprogram").value;
				var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram");
				var program = document.getElementById("program");

				if (ddlcategoryprogram == "") {
					ddlsubcategoryprogram.disabled = true;
				}
				else {
					ddlsubcategoryprogram.disabled = false;
				}
			}

			function SubCategoryOnChangeprogram() {
				var ddlsubcategoryprogram = document.getElementById("ddlsubcategoryprogram").value;
				var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram");

				if (ddlsubcategoryprogram == "") {
					ddlsubsubcategoryprogram.disabled = true;
				}
				else {
					ddlsubsubcategoryprogram.disabled = false;
				}
			}

			function SubSubCategoryOnChangeprogram() {
				var ddlsubsubcategoryprogram = document.getElementById("ddlsubsubcategoryprogram").value;
				var program = document.getElementById("program");

				if (ddlsubsubcategoryprogram == "") {
					program.disabled = true;
				}
				else {
					program.disabled = false;
				}
			}
		</script>

		<!-- Chained for selected onchange -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.chained.min.js"></script>
    <script type="text/javascript">
			$("#ddlsubcategorysubsub").chained("#ddlcategorysubsub");
			$("#ddlsubcategoryprogram").chained("#ddlcategoryprogram");
			$("#ddlsubsubcategoryprogram").chained("#ddlsubcategoryprogram");
    </script>

	</body>
</html>
