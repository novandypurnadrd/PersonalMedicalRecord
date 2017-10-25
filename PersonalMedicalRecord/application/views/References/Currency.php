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
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								References
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Currency
								</small>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									USD to IDR
								</small>
							</h1>
						</div><!-- /.page-header -->

              <!-- MAIN CONTENT BEGIN -->
							<form class="form-horizontal" method="post" action="<?php echo base_url().'References/Currency/updateCurrency'?>" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group">
										<div class="col-xs-5 col-sm-5">
											<div class="form-group">
												</br>
												<label class="col-sm-8 control-label no-padding-right" for="form-field-1"> IDR </label>
												<div class="col-xs-4 col-sm-4 col-md4 col-lg-4">
													<?php foreach ($Currency as $currency): ?>
														<input type="text" class="form-control" required="on" autocomplete="off" id="currency" name="currency" value="<?php echo $currency->dollars ?>"/>
													<?php endforeach; ?>
												</div>
											</div><!-- /.span -->
										</div>
										<div class="col-xs-7 col-sm-7"></br>
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
			$('#currency').on('change keyup', function() {
				var sanitized = $(this).val().replace(/[^0-9]/g, '');
				$(this).val(sanitized);
			});
		</script>

	</body>
</html>
