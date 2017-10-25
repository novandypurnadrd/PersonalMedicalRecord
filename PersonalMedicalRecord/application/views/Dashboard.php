<!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('lib/Headlib') ?>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?php echo base_url();?>assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/global/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
  </head>
  <!-- BEGIN BODY -->
  <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-blue dashboard" onload="Loader()">
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
        <div class="page-content page-thin">
          <div class="row">
            <div class="col-xlg-12">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-graph"></i> <strong>Visitors</strong> Data</h3>
                </div>
                <div class="panel-content widget-full widget-stock stock1">
                  <div class="tabs tabs-linetriangle">
                    <ul class="nav nav-tabs nav-4">
                      <li class="lines-3">
                        <a href="#microsoft-tab" id="microsoft" data-toggle="tab">
                          <div id="day">

                          </div>
                        </a>
                      </li>
                      <li class="active lines-3">
                        <a href="#samsung-tab"  id="samsung" data-toggle="tab">
                          <div id="month">

                          </div>
                        </a>
                      </li>
                      <li class="lines-3">
                        <a href="#apple-tab"  id="apple" data-toggle="tab">
                          <div id="year">

                          </div>
                        </a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane" id="microsoft-tab">
                        <div id="stock-microsoft"></div>
                      </div>
                      <div class="tab-pane active" id="sony-tab">
                        <div id="stock-sony"></div>
                      </div>
                      <div class="tab-pane" id="samsung-tab">
                        <div id="stock-samsung"></div>
                      </div>
                      <div class="tab-pane" id="apple-tab">
                        <div id="stock-apple"></div>
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
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
    <script src="<?php echo base_url();?>assets/global/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="<?php echo base_url();?>assets/global/js/widgets/todo_list.js"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <script src="<?php echo base_url();?>assets/global/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
    <script src="<?php echo base_url();?>assets/global/plugins/charts-highstock/js/highstock.min.js"></script> <!-- financial Charts -->
    <script src="<?php echo base_url();?>assets/global/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
    <script src="<?php echo base_url();?>assets/global/plugins/maps-amcharts/ammap/ammap.min.js"></script> <!-- Vector Map -->
    <script src="<?php echo base_url();?>assets/global/plugins/maps-amcharts/ammap/maps/js/worldLow.min.js"></script> <!-- Vector World Map  -->
    <script src="<?php echo base_url();?>assets/global/plugins/maps-amcharts/ammap/themes/black.min.js"></script> <!-- Vector Map Black Theme -->
    <script src="<?php echo base_url();?>assets/global/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
    <script src="<?php echo base_url();?>assets/global/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
    <script src="<?php echo base_url();?>assets/global/js/widgets/widget_weather.js"></script>
    <script>
      $(function() {

          /**** FINANCIAL CHARTS: HIGHSTOCK ****/
          var day = [
            <?php foreach ($Graph as $graph): ?>
              [<?php echo ((strtotime($graph->Date) * 1000) + 86400000) ?>, <?php echo $graph->visitor ?>],
            <?php endforeach; ?>
          ];

          function stockCharts(tabName) {
              var custom_colors = ['#C9625F', '#18A689', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#8085e8', '#91e8e1'];
              var custom_color = custom_colors[Math.floor(Math.random() * custom_colors.length)];

              // Create the chart
              $('#stock-' + tabName).highcharts('StockChart', {
                  chart: {
                      height: 286,
                      borderColor: '#DE0E13'
                  },
                  credits: {
                      enabled: false
                  },
                  exporting: {
                      enabled: false
                  },
                  rangeSelector: {
                      inputEnabled: false,
                      selected: 3
                  },
                  colors: [custom_color],
                  scrollbar: {
                      enabled: false
                  },
                  navigator: {
                      enabled: false
                  },
                  xAxis: {
                      lineColor: '#EFEFEF',
                      tickColor: '#EFEFEF',
                  },
                  yAxis: {
                      gridLineColor: '#EFEFEF'
                  },
                  series: [{
                      name: "Total Visitors",
                      data: day,
                      tooltip: {
                          valueDecimals: 0
                      }
                  }]
              });
          }
          stockCharts('sony');
          $('.stock1 .nav-tabs a').on('click', function() {
              stockCharts($(this).attr('id'));
          });



      });
    </script>
    <script>
      var day = document.getElementById('day');
      var month = document.getElementById('month');
      var year = document.getElementById('year');

      var dayvisit = "0";
      var monthvisit = "0";
      var yearvisit = "0";

      <?php foreach ($Daily as $daily): ?>
        dayvisit = <?php echo $daily->visitor ?>
      <?php endforeach; ?>

      <?php foreach ($Monthly as $monthly): ?>
        monthvisit = <?php echo $monthly->visitor ?>
      <?php endforeach; ?>

      <?php foreach ($Yearly as $yearly): ?>
        yearvisit = <?php echo $yearly->visitor ?>
      <?php endforeach; ?>

      function Loader() {
        var dayhtml =
          '<span class="title">This Day</span>'+
          '<span class="c-gray"><strong><?php echo date('d-M-y') ?></strong></span>'+
          '<span class="c-green">'+dayvisit+'</span>';
        var monthhtml =
          '<span class="title">This Month</span>'+
          '<span class="c-gray"><strong><?php echo date('F') ?></strong></span>'+
          '<span class="c-green">'+monthvisit+'</span>';
        var yearhtml =
          '<span class="title">This Year</span>'+
          '<span class="c-gray"><strong><?php echo date('Y') ?></strong></span>'+
          '<span class="c-green">'+yearvisit+'</span>';

        $('#day').html(dayhtml);
        $('#month').html(monthhtml);
        $('#year').html(yearhtml);
      }
    </script>


    <!-- END PAGE SCRIPT -->
  </body>
</html>
