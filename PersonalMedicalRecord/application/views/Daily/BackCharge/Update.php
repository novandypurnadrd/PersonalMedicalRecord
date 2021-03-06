<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('lib/Headlib'); ?>
	</head>

	<body class="no-skin" onload="convert()">
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
									Back Charge
                  <small>
  									<i class="ace-icon fa fa-angle-double-right"></i>
  									Update
  								</small>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<!-- MAIN CONTENT BEGIN -->
						<?php foreach ($Table as $table): ?>
							<form class="form-horizontal" method="post" action="<?php echo base_url().'Daily/BackCharge/Update/updateBackCharge/'.$id?>" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group">
										<div class="col-xs-5 col-sm-5">
											<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<div class="input-group">
																	<input class="form-control date-picker" id="id-date-picker-1" required="on" autocomplete="off" name="date" type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $table->date;?>" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
													</div>
											</div><!-- /.span -->
											<div class="form-group">
												</br>
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rincian </label>
												<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
													<input type="text" class="form-control" required="on" autocomplete="off" id="rincian" name="rincian" value="<?php echo $table->rincian;?>"/>
												</div>
											</div><!-- /.span -->
											<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bidang </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<select class="form-control" id="category" name="category" data-placeholder="Choose a category">
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
														<select class="form-control" id="subcategory" name="subcategory" data-placeholder="Choose a State...">
															<option value="">Pilih Sub Bidang</option>
															<?php foreach ($SubCategory as $subcategory): ?>
																<option value="<?php echo $subcategory->id ?>" <?php if($subcategory->id == $table->subcategory){echo "selected = true";} ?> class="<?php echo $subcategory->category; ?>"><?php echo $subcategory->subcategory ?></option>
															<?php endforeach; ?>
														</select>
													</div>
											</div><!-- /.span -->
											<div class="form-group">
												</br>
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub-sub Bidang </label>
													<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
														<select class="form-control" id="subsubcategory" name="subsubcategory" data-placeholder="Choose a State...">
															<option value="">Pilih Sub-sub Bidang</option>
															<?php foreach ($SubSubCategory as $subsubcategory): ?>
																<option value="<?php echo $subsubcategory->id ?>" <?php if($subsubcategory->id == $table->subsubcategory){echo "selected = true";} ?> class="<?php echo $subsubcategory->subcategory; ?>"><?php echo $subsubcategory->subsubcategory ?></option>
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

										<div class="col-xs-7 col-sm-7">
											<div class="form-group">
												<div class="col-xs-6 col-sm-6"></br>
													<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<textarea class="form-control" id="form-field-8" id="keterangan" name="keterangan" rows="4"><?php echo $table->keterangan ?></textarea>
															</div>
													</div><!-- /.span -->
													<div class="form-group">
														</br>
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> QTY </label>
														<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
															<input type="text" class="form-control" required="on" onkeyup="convert()" autocomplete="off" id="qty" name="qty" value="<?php echo $table->qty ?>"/>
														</div>
													</div><!-- /.span -->
													<div class="form-group">
														</br>
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> UOM </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<select class="chosen-select form-control" onchange="Enabler()" id="form-field-select-3" name="uom" data-placeholder="Select UOM">
																	<option value="0"></option>
																	<?php foreach ($UOM as $uom): ?>
																		<option value="<?php echo $uom->id?>" <?php if($uom->id == $table->uom){echo "selected = true";} ?>><?php echo $uom->description?></option>
																	<?php endforeach; ?>
																</select>
															</div>
													</div><!-- /.span -->
												</div>
												<div class="col-xs-6 col-sm-6"></br>
													<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price (Rp.) </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="text" class="form-control" onkeyup="convert()" autocomplete="off" id="price" name="price" value="<?php echo $table->price ?>"/>
																	<i class=""></i>
																</span>
															</div>
													</div><!-- /.span -->
													<div class="form-group"></br>
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total (Rp.) </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="text" class="form-control" readonly  autocomplete="off" id="cost" name="cost" value="<?php echo $table->cost ?>"/>
																	<i class=""></i>
																</span>
															</div>
													</div><!-- /.span -->
													<div class="form-group">
													</br>
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total </label>
															<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
																<span class="input-icon">
																	<input type="text" class="form-control" readonly autocomplete="off" id="dollars" name="dollars" placeholder=""  value="<?php echo $table->dollars ?>"/>
																	<i class="ace-icon fa fa-dollar blue"></i>
																</span>
															</div>
													</div><!-- /.span -->
												</div>
											</div>
											</br>
											<div class="form-group">
												<div class="col-xs-11 col-sm-11" style="text-align:center">
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
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});


				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}


				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});

				autosize($('textarea[class*=autosize]'));

				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});

				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});

				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});



				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";

						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});


				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});

				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true

					});
				});

				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});


				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);




				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";

						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";

						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');

					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format

						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']

						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]


						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/


						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});


					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/

				});

				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});


				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});


				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});




				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});


				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe

				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist


				$(".knob").knob();


				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)

					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');

					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}


				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})

				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/



				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')

					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});

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

			function label() {
				var jenis = document.getElementById("jenis").value;
				var label = document.getElementById("label");

				if (jenis == "SIR") {
					label.innerHTML = "No. SIR";
				}
				else {
					label.innerHTML = "No. PS";
				}

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
			$('#qty').on('change keyup', function() {
			  var sanitized = $(this).val().replace(/[^0-9]/g, '');
			  $(this).val(sanitized);
			});
    </script>

	</body>
</html>
