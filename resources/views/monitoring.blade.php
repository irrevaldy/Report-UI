@extends('layout')

@section('content')

  <link href="{{ asset('assets/plugins/AmaranJS/dist/css/amaran.min.css') }}" rel="stylesheet"> 

<script>
  // FontAwesomeConfig = { searchPseudoElements: true };
</script>
<style type="text/css">
    .widget-info .left svg {
        border-radius: 50%;
        color: #ffffff;
        font-size: 45px;
        padding: 8px;
        text-align: center;
    }

    .widget-icon {
        float: right;
    }
    .widget-icon .icon {
        /*color: #18A689;*/
        /*fill: currentcolor;*/
        font-size: 20px;
        height: 67px;
        /*left: 80%;*/
        /*position: absolute;*/
        top: 13px;
        width: 67px;
        opacity: 0.1;
        filter: blur(1px);
    }

    .icon.master-icon {
        color: #18A689;
        fill: currentcolor;
    }

    .icon.template-icon {
        color: #4584D1;
        fill: currentcolor;
    }

    .icon.terminal-icon {
        color: #C9625F;
        fill: currentcolor;
    }

    .main-content .page-content .panel-content {
        padding: 10px 20px 10px;
    }

    .tile_stats_count .count {
        font-size: 40px;
        /*font-weight: 600;*/
        line-height: 47px;
        font-weight: normal;
    }

    .tile_stats_count .right {
        height: 100%;
        overflow: hidden;
        padding-left: 10px;
        text-overflow: ellipsis;
    }

    .tile_stats_count .right span {
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .count_bottom i {
        width: 12px;
    }

    .blue {
        color: #2CA3DE;
    }

    .green {
        color: #1abb9c;
    }

    .red {
        color: #e74c3c;
    }

    .yellow {
        color: #ff9f40;
    }

    .orange {
        color: #DEA92C;
    }

    .tile_stats_count {
      border-top: 1px solid #ddd;
      padding-top: 10px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
    }

    .tile_stats_count .left {
        border-left: 2px solid #adb2b5;
        float: left;
        height: 65px;
        margin-top: 10px;
        width: 15%;
    }

    .main-content .page-content .panel {
        border-left: 0px solid #666;
    }

    .panel-header {
        border-bottom: 1px solid #d6d6d6;
    }

    .main-content .page-content .panel.transparent {
      background: transparent;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0);
    }

    .progress-striped .progress-bar-sale,
    .progress-striped .progress-bar-prepaid-sale,
    .progress-striped .progress-bar-prepaid-topup {
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }

    .progress-bar-sale {
        background-color: #ff6384;
    }

    .progress-bar-prepaid-sale {
        background-color: #ff9f40;
    }

    .progress-bar-prepaid-topup {
        /*background-color: #4bc0c0;*/
        background-color: #5EB7E3;
    }

    .hov_effect {
      -webkit-transition: all 0.6s ease-in-out;
      -moz-transition: all 0.6s ease-in-out;
      -ms-transition: all 0.6s ease-in-out;
      -o-transition: all 0.6s ease-in-out;
      transition: all 0.6s ease-in-out;
    }

    .hov_effect:hover {
      background-color: #f3f3f3;
      -webkit-transition: all 0.6s ease-in-out;
      -moz-transition: all 0.6s ease-in-out;
      -ms-transition: all 0.6s ease-in-out;
      -o-transition: all 0.6s ease-in-out;
      transition: all 0.6s ease-in-out;
    }

    .progress.progress-bar-large {
        height: 10px;
    }

    .disabled_text {
      color: #ddd;
    }

    @media screen and (min-width: 1920px) {
        .col-lg-6 {
            /*width: 100%;*/
        }
    }

    /*f1b2*/
</style>

    <div class="header panel-header" style="border-bottom: none;">
        <h2>
          <i class="fas fa-home"></i> <strong>Home</strong>

          <!-- <a data-target='#monitoring_config_modal' data-toggle='modal'><i class="fas fa-cogs" style="float: right;"></i></a> -->
        </h2>
    </div>

    <?php
      $total_edc                = $data['mon_data']['edc_active'][0]['Total EDC'];
      $total_active             = $data['mon_data']['edc_active'][0]['Total Active'];
      $total_not_active         = $data['mon_data']['edc_active'][0]['Total Not Active'];
      $total_active_trx         = $data['mon_data']['edc_active'][0]['Total Active Transaction'];

      $total_active_percent     = round($total_active / $total_edc * 100);
      $total_not_active_percent = round($total_not_active / $total_edc * 100);
      $total_active_trx_percent = round($total_active_trx / $total_edc * 100);
    ?>

    <div class="row tile_count">

      <div class="col-md-6 col-lg-6">
        <div class="panel transparent">
          <div class="panel-header" style="border-bottom: none;">
            <h3><strong>EDC Active & Not Active</strong> Summary</h3>
          </div>
          <div class="panel-content row" style="padding-top: 0;">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6  tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator blue"></i> Total EDC</span>

                <?php
                  if( $total_edc == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div id="total_edc" class="count blue number {{ $class }}" data-from="0" data-to=" {{ $total_edc }} ">0</div>
                <span class="count_bottom"><i class="">100% </i> </span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-12 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-share yellow"></i> Total Active</span>

                <?php
                  if( $total_active == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div id="total_active" class="count yellow number {{ $class }}" data-from="0" data-to="{{ $total_active }}">0</div>
                <span class="count_bottom"><i class="">{{ $total_active_percent }}% </i> from Total </span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-12 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-times-circle red"></i> Total Not Active</span>

                <?php
                  if( $total_not_active == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div id="total_not_active" class="count red number {{ $class }}" data-from="0" data-to="{{ $total_not_active }}">0</div>
                <span class="count_bottom"><i class="">{{ $total_not_active_percent }}% </i> from Total </span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 col-xl-12 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-check-square green"></i> Total Active Transaction</span>

                <?php
                  if( $total_active_trx == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div id="total_active_trx" class="count green number {{ $class }}" data-from="0" data-to="{{ $total_active_trx }}">0</div>
                <span class="count_bottom"><i class="">{{ $total_active_trx_percent }}% </i> from Total </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 hov_effect">
        <h3><strong>Edc Active</strong> Charts - Last 30 Days</h3>
        <!-- <p>A line chart is a way of plotting data points on a line.<br>
          Often, it is used to show trend data, and the comparison of two data sets.
        </p> -->
        <canvas id="edc-active-chart" class="full" height="120px"></canvas>
      </div>
    </div>

    <?php
      // $total_Sale                 = $data['mon_data']['trx_summary'][0]['Sale'];
      // $total_PrepaidSale          = $data['mon_data']['trx_summary'][0]['PrepaidSale'];
      // $total_PrepaidTopUp         = $data['mon_data']['trx_summary'][0]['PrepaidTopUp'];
      // $total_Others               = $data['mon_data']['trx_summary'][0]['Others'];

      // $total_trx                  = $total_Sale + $total_PrepaidSale + $total_PrepaidTopUp + $total_Others;

      // $total_Sale_percent         = round($total_Sale / $total_trx * 100);
      // $total_PrepaidSale_percent  = round($total_PrepaidSale / $total_trx * 100);
      // $total_PrepaidTopUp_percent = round($total_PrepaidTopUp / $total_trx * 100);
      // $total_Others_percent       = round($total_Others / $total_trx * 100);

      // $success_decline_chart_data = $data['mon_data']['SuccessDeclineTrx'];

    ?>

    <div class="row tile_count">
      <div class="panel transparent">
        <div class="col-md-6 hov_effect">
          <h3><strong>Transaction Success Rate</strong> Charts - Last 30 Days</h3>
          <!-- <p>A line chart is a way of plotting data points on a line.<br>
            Often, it is used to show trend data, and the comparison of two data sets.
          </p> -->
          <canvas id="line-chart" class="full" height="100px"></canvas>
        </div>
        <div class="col-md-6 hov_effect">
          <h3><strong>Transaction Success Rate</strong> Charts - Last 24 Hours</h3>
          <!-- <p>A line chart is a way of plotting data points on a line.<br>
            Often, it is used to show trend data, and the comparison of two data sets.
          </p> -->
          <canvas id="success-rate-hourly" class="full" height="100px"></canvas>
        </div>

      </div>
    </div>

    <div class="row tile_count">
      <div class="panel transparent">
        <div class="col-md-6 hov_effect">
          <h3>
            <span><strong>Transaction Total</strong> Charts - Last 30 Days</span>
            <span style="float: right;"><a style="cursor: pointer;" onClick="trxTotal_config()"><i class="fa fa-cog" aria-hidden="true"></i></a></span>
          </h3>
          <!-- <p>A line chart is a way of plotting data points on a line.<br>
            Often, it is used to show trend data, and the comparison of two data sets.
          </p> -->
          <canvas id="total-trx-monthly" class="full" height="100px"></canvas>
        </div>
        <div class="col-md-6 hov_effect" style=''>
          <!-- <h3><strong>Transaction Success Rate</strong> Charts</h3>
          <div style='padding-left: 20px;'>
            <canvas id="count-trx-area" width="200" height="200"/>
          </div> -->
          <h3><strong>Transaction Total </strong>Summary - Last 24 Hours</h3>
          <div class="widget-progress-bar" id="trx-total-last-24">
            
          </div>
        </div>
      </div>
       
    </div>

    <div class="row tile_count" style="border-top: 1px solid #ddd; margin-top: 10px;">
      <!-- <div class="col-md-3 hov_effect" style="padding-left: 5%;">
        <h3><strong>Transaction Rate</strong> Charts</h3>
        <div style='padding-left: 20px;'>
          <canvas id="transaction-chart-area" width="200" height="200"/>
        </div>

      </div>

      <div class="col-md-3 hov_effect" style="padding-left: 5%;">
        <h3><strong>Transaction Success Rate</strong> Charts</h3>
        <div style='padding-left: 20px;'>
          <canvas id="transaction-success-chart-area" width="200" height="200"/>
        </div>

      </div>

      <div class="col-md-3 hov_effect" style="padding-left: 5%;">
        <h3><strong>Transaction Decline Rate</strong> Charts</h3>
        <div style='padding-left: 20px;'>
          <canvas id="transaction-decline-chart-area" width="200" height="200"/>
        </div>

      </div> -->

      <div class="col-md-6 hov_effect" >
        <h3><strong>Success Rate & Decline Rate Per Transaction Type</strong> Charts - Last 24 Hours</h3>
        <div style='padding-left: 20px;'>
          <canvas id="stacked-trx-type"  class="full" height="100"/>
        </div>

      </div>

      <div class="col-md-6 hov_effect">
          <h3><strong>Top 5 Error Code</strong> Charts - Last 24 Hours</h3>
          <!-- <p>A line chart is a way of plotting data points on a line.<br>
            Often, it is used to show trend data, and the comparison of two data sets.
          </p> -->
          <!-- <canvas id="errorCode-chart"  class="full" height="200px"></canvas> -->
          <canvas id="errorCode-chart" class="full" height="100"></canvas>
        </div>
    </div>

    <!-- BEGIN MODAL DATE & TIME PICKER -->
      <div class="modal fade" id="monitoring_config_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #eee;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
              <h4 class="modal-title"><strong>Date &amp; Timepicker </strong> inside modal</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Time Picker</label>
                    <div class="prepend-icon">
                      <input type="text" name="timepicker" class="timepicker form-control" placeholder="Choose a time...">
                      <i class="icon-clock"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                    <label class="form-label">Date &amp; Time Picker</label>
                    <div class="prepend-icon">
                      <input type="text" name="datetimepicker" class="datetimepicker form-control" placeholder="Choose a date...">
                      <i class="icon-clock"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer bg-gray-light">
              <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-embossed" data-dismiss="modal">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL DATE & TIME PICKER -->

    <div id="trxTotal_config_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title head"><strong>Transaction Total & Summary </strong>Configuration</h4>
              </div>

              <div class="modal-body">
                <div class="row">

                  <?php
                    $TmonTrxType  = $data['mon_data']['TmonTrxType'];

                    $element      = "";

                    foreach ($TmonTrxType as $key => $value) {
                      # code...

                      if( $value['FSHOW_FLAG'] == '1' ) {
                        $checked        = 'checked=checked';
                        $disabled       = '';
                        $disabled_text  = '';
                      } else {
                        $checked        = '';
                        $disabled       = '';
                        $disabled_text  = '';
                      }

                      $element    .= "<div class='col-md-6'>
                                      <div class='form-group'>
                                        <div class='icheck-list " . $disabled_text . "'>
                                          <label style='margin-top: 0px;'><input type='checkbox' ". $checked ." id='' name='trx_total_config' class='trx_total_config' data-checkbox='icheckbox_square-blue' value='". $value['FID'] ."' ". $disabled ." >". $value['FTRX_LABEL'] ."</label>
                                        </div>
                                      </div>
                                    </div>";

                    }

                    echo $element;
                  ?>

                </div>
              </div>

              <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="apply_config()">Apply</button>
              </div>
          </div>

        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/charts-highstock/js/highstock.min.js') }}"></script> <!-- financial Charts -->
    <script src="{{ asset('assets/plugins/maps-amcharts/ammap/ammap.min.js') }}"></script> <!-- Vector Map -->
    <script src="{{ asset('assets/plugins/countup/countUp.min.js') }}"></script> <!-- Animated Counter Number -->
    <!-- <script src="{{ asset('assets/plugins/charts-chartjs/Chart.min.js') }}"></script> -->  <!-- ChartJS Chart -->
    <!-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> -->
    <script src="{{ asset('assets/plugins/chartjs/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/countUp.1.9.3/countUp.js') }}"></script>
    <script src="{{ asset('assets/plugins/AmaranJS/dist/js/jquery.amaran.js') }}"></script>

    <script type="text/javascript">

        $('.panel-header-section').click(function() {
            $(this).toggleClass("closed").parents(".panel:first").find(".panel-content").slideToggle();
            $(this).find(".svg-inline--fa.icon").slideToggle();
        });

    </script>

    <script type="text/javascript">

      

      /**** Line Charts: ChartJs ****/
      // var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
      // var lineChartData = {
      //   labels : ["January","February","March","April","May","June","July"],
      //   datasets : [
      //     {
      //       label: "Decline Transaction",
      //       fillColor : "rgba(255, 105, 105,0.2)",
      //       strokeColor : "#B00000",
      //       pointColor : "#E60000",
      //       pointStrokeColor : "#fff",
      //       pointHighlightFill : "#fff",
      //       pointHighlightStroke : "#319DB5",
      //       data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      //     },{
      //       label: "Success Transaction",
      //       fillColor : "rgba(122,224,119,0.2)",
      //       strokeColor : "rgba(0,176,76,1)",
      //       pointColor : "rgba(7,207,0,1)",
      //       pointStrokeColor : "#fff",
      //       pointHighlightFill : "#fff",
      //       pointHighlightStroke : "rgba(220,220,220,1)",
      //       data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      //     }
      //   ]
      // }
      // var ctx = document.getElementById("line-chart").getContext("2d");
      // window.myLine = new Chart(ctx).Line(lineChartData, {
      //   responsive: true,
      //   tooltipCornerRadius: 0
      // });

      var options = {
        useEasing: true,
        useGrouping: true,
        separator: ',',
        decimal: '.',
      };

      var total_edc         = <?php echo json_encode($total_edc); ?>;
      var total_active      = <?php echo json_encode($total_active); ?>;
      var total_not_active  = <?php echo json_encode($total_not_active); ?>;
      var total_active_trx  = <?php echo json_encode($total_active_trx); ?>;

      var count_total_edc = new CountUp('total_edc', 0, total_edc, 0, 2, options);
      if (!count_total_edc.error) {
        count_total_edc.start();
      } else {
        console.error(count_total_edc.error);
      }

      var count_total_active = new CountUp('total_active', 0, total_active, 0, 2, options);
      if (!count_total_active.error) {
        count_total_active.start();
      } else {
        console.error(count_total_active.error);
      }

      var count_total_not_active = new CountUp('total_not_active', 0, total_not_active, 0, 2, options);
      if (!count_total_not_active.error) {
        count_total_not_active.start();
      } else {
        console.error(count_total_not_active.error);
      }

      var count_total_active_trx = new CountUp('total_active_trx', 0, total_active_trx, 0, 2, options);
      if (!count_total_active_trx.error) {
        count_total_active_trx.start();
      } else {
        console.error(count_total_active_trx.error);
      }

      var edc_active_daily_data     = <?php echo JSON_ENCODE($data['mon_data']['edc_active_daily']); ?>;
      edc_active_daily_data         = JSON.parse(JSON.stringify(edc_active_daily_data).replace(/null/g, '"0"'));

      var FDATES                    = [];
      var FTOTAL_ACTIVE             = [];
      var FTOTAL_INACTIVE           = [];
      var FTOTAL_ACTIVE_TRX         = [];

      for( var i=0; i<edc_active_daily_data.length; i++ ) {

        var full_date = edc_active_daily_data[i].FDATE.substring(4);
        var month     = full_date.slice(0, 2);
        var date      = full_date.slice(-2);

        FDATES.push( date + ' / ' + month );
        FTOTAL_ACTIVE.push( edc_active_daily_data[i].FTOTAL_ACTIVE );
        FTOTAL_INACTIVE.push( edc_active_daily_data[i].FTOTAL_INACTIVE );
        FTOTAL_ACTIVE_TRX.push( edc_active_daily_data[i].FTOTAL_ACTIVE_TRX );
      }

      var config_edc_active = {
        type: 'line',
        data: {
          labels: FDATES,
          datasets: [{
            label: "Active ",
            backgroundColor: "rgba(122,224,119,0.2)",
            borderColor: "rgba(0,176,76,1)",
            data: FTOTAL_ACTIVE,
          }, {
            label: "Not active ",
            // fill: false,
            backgroundColor: "rgba(255, 105, 105,0.2)",
            borderColor: "#B00000",
            data: FTOTAL_INACTIVE,
          }, {
            label: "Active Transaction ",
            // fill: false,
            backgroundColor: "rgba(204, 224, 119,0.2)",
            borderColor: "rgba(176, 167, 0,1)",
            data: FTOTAL_ACTIVE_TRX,
          }]
        },
        options: {
          responsive: true,
          legend: {
            position: 'right',
          },
          // title: {
          //   display: true,
          //   text: 'Chart.js Line Chart'
          // // },
          // tooltips: {
          //   mode: 'nearest',
            // intersect: true,
          // },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              display: true,
              scaleLabel: {
                display: false,
                labelString: 'Count'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: false,
                labelString: 'Value'
              }
            }]
          }
        }
      };

      var top5_error_code_data      = <?php echo JSON_ENCODE($data['mon_data']['Top5ErrorCode']); ?>;
      top5_error_code_data          = JSON.parse(JSON.stringify(top5_error_code_data).replace(/null/g, '"0"'));

      var TotalTrxSummaryPerTrxType = <?php echo JSON_ENCODE($data['mon_data']['TotalTrxSummaryPerTrxType']); ?>;
      TotalTrxSummaryPerTrxType     = JSON.parse(JSON.stringify(TotalTrxSummaryPerTrxType).replace(/null/g, '"0"'));

      var success_rate_monthly      = <?php echo JSON_ENCODE($data['mon_data']['success_rate_monthly']); ?>;
      success_rate_monthly          = JSON.parse(JSON.stringify(success_rate_monthly).replace(/null/g, '"0"'));

      // function build_charts(){

        var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
          type: 'line',
          data: {
            labels: success_rate_monthly['label'],
            datasets: [{
              label: "Total ",
              backgroundColor: "rgba(122,224,119,0.2)",
              borderColor: "rgba(0,176,76,1)",
              fill: false,
              data: success_rate_monthly['total'] ,
            }, {
              label: "Mandiri ",
              backgroundColor: "rgba(254, 182, 0,0.2)",
              borderColor: "#feb600",
              fill: false,
              data: success_rate_monthly['B002'] ,
            }, {
              label: "BNI ",
              fill: false,
              backgroundColor: "rgba(228, 83, 0,0.2)",
              borderColor: "#e45300",
              data: success_rate_monthly['B003'],
            }, {
              label: "BRI ",
              fill: false,
              backgroundColor: "rgba(0, 78, 145,0.2)",
              borderColor: "#004e91",
              data: success_rate_monthly['B012'],
            }, {
              label: "CIMB ",
              fill: false,
              backgroundColor: "rgba(192, 0, 0,0.2)",
              borderColor: "#c00000",
              data: success_rate_monthly['B008'],
            }]
          },
          options: {
            responsive: true,
            legend: {
              position: 'bottom',
            },
            // title: {
            //   display: true,
            //   text: 'Chart.js Line Chart'
            // // },
            // tooltips: {
            //   mode: 'nearest',
              // intersect: true,
            // },
            hover: {
              mode: 'nearest',
              intersect: true
            },
            scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Count'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Value'
                }
              }]
            }
          }
        };

        var success_rate_hourly      = <?php echo JSON_ENCODE($data['mon_data']['success_rate_hourly']); ?>;
        success_rate_hourly          = JSON.parse(JSON.stringify(success_rate_hourly).replace(/null/g, '"0"'));

        var config_success_rate_hourly = {
          type: 'line',
          data: {
            labels: success_rate_hourly['label'],
            datasets: [
            {
              label: "Total ",
              backgroundColor: "rgba(122,224,119,0.2)",
              borderColor: "rgba(0,176,76,1)",
              fill: false,
              data: success_rate_hourly['total'] ,
            },
            {
              label: "Mandiri ",
              backgroundColor: "rgba(254, 182, 0,0.2)",
              borderColor: "#feb600",
              fill: false,
              data: success_rate_hourly['B002'] ,
            }, {
              label: "BNI ",
              fill: false,
              backgroundColor: "rgba(228, 83, 0,0.2)",
              borderColor: "#e45300",
              data: success_rate_hourly['B003'],
            }, {
              label: "BRI ",
              fill: false,
              backgroundColor: "rgba(0, 78, 145,0.2)",
              borderColor: "#004e91",
              data: success_rate_hourly['B012'],
            }, {
              label: "CIMB ",
              fill: false,
              backgroundColor: "rgba(192, 0, 0,0.2)",
              borderColor: "#c00000",
              data: success_rate_hourly['B008'],
            }]
          },
          options: {
            responsive: true,
            legend: {
              position: 'bottom',
            },
            // title: {
            //   display: true,
            //   text: 'Chart.js Line Chart'
            // // },
            // tooltips: {
            //   mode: 'nearest',
              // intersect: true,
            // },
            hover: {
              mode: 'nearest',
              intersect: true
            },
            scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Count'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Value'
                }
              }]
            }
          }
        };

        var total_trx_monthly      = <?php echo JSON_ENCODE($data['mon_data']['total_trx_monthly']); ?>;
        total_trx_monthly          = JSON.parse(JSON.stringify(total_trx_monthly).replace(/null/g, '"0"'));

        var config_total_trx_monthly = {
          type: 'line',
          data: {
            labels: total_trx_monthly['label'],
            datasets: total_trx_monthly['dataset_list']
          },
          options: {
            responsive: true,
            legend: {
              position: 'bottom',
              display: true
            },
            hover: {
              mode: 'nearest',
              intersect: true
            },
            scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Count'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: false,
                  labelString: 'Value'
                }
              }]
            }
          }
        };

        var config_pie = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow
              ],
              label: 'Dataset 1'
            }],
            labels: [
              'Red',
              'Orange',
              'Yellow'
            ]
          },
          options: {
            responsive: false
          }
        };

        var config_pie_trx = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.green
              ],
              label: 'Dataset 1'
            }],
            labels: [
              'Sale',
              'Prepaid Sale',
              'Prepaid Top Up'
            ]
          },
          options: {
            responsive: false,
            legend: {
              position: 'bottom',
            },
          }
        };

        var config_pie_trx_success = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.green
              ],
              label: 'Dataset 1'
            }],
            labels: [
              'Sale',
              'Prepaid Sale',
              'Prepaid Top Up'
            ]
          },
          options: {
            responsive: false,
            legend: {
              position: 'bottom',
            },
          }
        };

        var config_pie_trx_decline = {
          type: 'pie',
          data: {
            datasets: [{
              data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.green
              ],
              label: 'Dataset 1'
            }],
            labels: [
              'Sale',
              'Prepaid Sale',
              'Prepaid Top Up'
            ]
          },
          options: {
            responsive: false,
            legend: {
              position: 'bottom'
            },
          }
        };

        var color = Chart.helpers.color;
        var horizontalBarChartData = {
          labels: top5_error_code_data['label'],
          datasets: [{
            label: '',
            backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: top5_error_code_data['total']
          }
          // , {
          //   label: top5_error_code_data[1]['FRESPCODE'],
          //   backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
          //   borderColor: window.chartColors.orange,
          //   data: [
          //     top5_error_code_data[1]['FTOTAL'],
          //   ]
          // }, {
          //   label: top5_error_code_data[2]['FRESPCODE'],
          //   backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
          //   borderColor: window.chartColors.yellow,
          //   data: [
          //     top5_error_code_data[2]['FTOTAL'],
          //   ]
          // }, {
          //   label: top5_error_code_data[3]['FRESPCODE'],
          //   backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
          //   borderColor: window.chartColors.blue,
          //   data: [
          //     top5_error_code_data[3]['FTOTAL'],
          //   ]
          // }, {
          //   label: top5_error_code_data[4]['FRESPCODE'],
          //   backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
          //   borderColor: window.chartColors.green,
          //   data: [
          //     top5_error_code_data[4]['FTOTAL'],
          //   ]
          // }
          ]

        };

        var stacked_trx_type = {
          labels: ['Sale', 'Prepaid Sale', 'Prepaid Top Up'],
          datasets: [
          // {
          //   label: 'Total Transaction',
          //   backgroundColor: window.chartColors.red,
          //   data: [
          //     TotalTrxSummaryPerTrxType[0]['TotalSale'],
          //     TotalTrxSummaryPerTrxType[0]['TotalPrepaidSale'],
          //     TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUp'],
          //   ]
          // },
          {
            label: 'Total Success',
            backgroundColor: window.chartColors.green,
            data: [
              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleSuccess']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleDecline']) ) * 100),
              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleSuccess']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleDecline']) ) * 100),
              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpSuccess']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpDecline']) ) * 100),
            ]
          }, {
            label: 'Total Decline',
            backgroundColor: window.chartColors.red,
            data: [

              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleDecline']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalSaleDecline']) ) * 100),
              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleDecline']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidSaleDecline']) ) * 100),
              Math.round(parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpDecline']) / ( parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpSuccess']) + parseInt(TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUpDecline']) ) * 100),
            ]
          }]

        };

        // window.onload = function() {

          var ctx_line                      = document.getElementById('line-chart').getContext('2d');
          var ctx_line_graph                = new Chart(ctx_line, config);

          var ctx_succes_rate_hourly        = document.getElementById('success-rate-hourly').getContext('2d');
          var ctx_succes_rate_hourly_graph  = new Chart(ctx_succes_rate_hourly, config_success_rate_hourly);

          var ctx_total_trx_monthly   = document.getElementById('total-trx-monthly').getContext('2d');
          var ctx_ctx_total_trx_monthly_graph   = new Chart(ctx_total_trx_monthly, config_total_trx_monthly);

          var ctx_edc_active                = document.getElementById('edc-active-chart').getContext('2d');
          var ctx_edc_active_graph          = new Chart(ctx_edc_active, config_edc_active);
          // window.myLine = new Chart(ctx_line, config);

          // var ctx = document.getElementById('chart-area').getContext('2d');
          // window.myPie = new Chart(ctx, config_pie);

          // var ctx_trx = document.getElementById('transaction-chart-area').getContext('2d');
          // window.myPie = new Chart(ctx_trx, config_pie_trx);

          // var ctx_success = document.getElementById('transaction-success-chart-area').getContext('2d');
          // window.myPie = new Chart(ctx_success, config_pie_trx_success);

          // var ctx_decline = document.getElementById('transaction-decline-chart-area').getContext('2d');
          // window.myPie = new Chart(ctx_decline, config_pie_trx_decline);

          var ctx_errorcode         = document.getElementById('errorCode-chart').getContext('2d');
          var ctx_errorcode_graph   = new Chart(ctx_errorcode, {
            type: 'horizontalBar',
            data: horizontalBarChartData,
            options: {
              // Elements options apply to all of the options unless overridden in a dataset
              // In this case, we are setting the border of each horizontal bar to be 2px wide
              elements: {
                rectangle: {
                  borderWidth: 2,
                }
              },
              responsive: true,
              legend: {
                position: 'bottom',
                display: false,
              },
              title: {
                display: false,
                text: 'Chart.js Horizontal Bar Chart'
              }
            }
          });

          var ctx_stacked_trx_type        = document.getElementById('stacked-trx-type').getContext('2d');
          var ctx_stacked_trx_type_graph  = new Chart(ctx_stacked_trx_type, {
            type: 'horizontalBar',
            data: stacked_trx_type,
            options: {
              title: {
                display: false,
                text: 'Chart.js Bar Chart - Stacked'
              },
              // tooltips: {
              //   mode: 'index',
              //   intersect: false
              // },
              responsive: true,
              scales: {
                xAxes: [{
                  stacked: true,
                  // categoryPercentage: 0.3,
                  // barPercentage: 0.9,
                  // barThickness: 70,
                }],
                yAxes: [{
                  stacked: true,
                  categoryPercentage: 0.5,
                  barPercentage: 0.9,
                }]
              },
              legend: {
                position: 'bottom',
              },
            }
          });

          var total_trx_last_24   = <?php echo JSON_ENCODE($data['mon_data']['total_trx_last_24']); ?>;
          var element_trx_last_24 = "";
          
          for( var i=0; i< total_trx_last_24.length; i++ ) {
            element_trx_last_24 += "<div class='col-md-6'>"
                                      + "<div class='clearfix'>"
                                        + "<div class='title'><strong>" + total_trx_last_24[i].label + "</strong></div>"
                                        + "<div class='number'><strong><span style='margin-right: 10px;' id=''>" + total_trx_last_24[i].total + "</span> | <span style='margin-left: 10px;' id=''>" + total_trx_last_24[i].percentage + "%</span></strong></div>"
                                      + "</div>"
                                      + "<div class='progress progress-bar-large'>"
                                        + "<div id='' data-transitiongoal='" + total_trx_last_24[i].percentage + "' class='progress-bar progress-bar-prepaid-topup'><strong></strong></div>"
                                      + "</div>"
                                    + "</div>";


          }

          $('#trx-total-last-24').html(element_trx_last_24);

          $('.progress-bar').progressbar();

        // };

        // setTimeout(function(){
        //   build_charts();
        // }, 5000);
      // }

      // build_charts();

      function get_monitoring_data(){

        $.ajax({
          dataType: 'JSON',
          type: 'GET',
          url: '/mon_data',
          success: function (data) {

            // console.log(data);

            /* edc active  */

            var total_edc_data        = data['mon_data']['edc_active'][0]['Total EDC'];
            var total_active_data     = data['mon_data']['edc_active'][0]['Total Active'];
            var total_not_active_data = data['mon_data']['edc_active'][0]['Total Not Active'];
            var total_active_trx_data = data['mon_data']['edc_active'][0]['Total Active Transaction'];

            count_total_edc.update( total_edc_data );
            count_total_active.update( total_active_data );
            count_total_not_active.update( total_not_active_data );
            count_total_active_trx.update( total_active_trx_data );

            var edc_active_daily_data = data['mon_data']['edc_active_daily'];
            edc_active_daily_data     = JSON.parse(JSON.stringify(edc_active_daily_data).replace(/null/g, '"0"'));

            FDATES            = [];
            FTOTAL_ACTIVE     = [];
            FTOTAL_INACTIVE   = [];
            FTOTAL_ACTIVE_TRX = [];

            for( var i=0; i<edc_active_daily_data.length; i++ ) {
              var full_date = edc_active_daily_data[i].FDATE.substring(4);
              var month     = full_date.slice(0, 2);
              var date      = full_date.slice(-2);

              FDATES.push( date + ' / ' + month );
              FTOTAL_ACTIVE.push( edc_active_daily_data[i].FTOTAL_ACTIVE );
              FTOTAL_INACTIVE.push( edc_active_daily_data[i].FTOTAL_INACTIVE );
              FTOTAL_ACTIVE_TRX.push( edc_active_daily_data[i].FTOTAL_ACTIVE_TRX );
            }

            var config_edc_active = {
              type: 'line',
              data: {
                labels: FDATES,
                datasets: [{
                  label: "Active ",
                  backgroundColor: "rgba(122,224,119,0.2)",
                  borderColor: "rgba(0,176,76,1)",
                  data: FTOTAL_ACTIVE,
                }, {
                  label: "Not active ",
                  // fill: false,
                  backgroundColor: "rgba(255, 105, 105,0.2)",
                  borderColor: "#B00000",
                  data: FTOTAL_INACTIVE,
                }, {
                  label: "Active Transaction ",
                  // fill: false,
                  backgroundColor: "rgba(204, 224, 119,0.2)",
                  borderColor: "rgba(176, 167, 0,1)",
                  data: FTOTAL_ACTIVE_TRX,
                }]
              },
              options: {
                responsive: true,
                legend: {
                  position: 'bottom',
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Count'
                    }
                  }],
                  yAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Value'
                    }
                  }]
                }
              }
            };

            // transaction success rate monthly
            ctx_edc_active_graph.destroy();
            ctx_edc_active_graph  = new Chart(ctx_edc_active, config_edc_active);

            var success_rate_monthly   = data['mon_data']['success_rate_monthly'];
            success_rate_monthly       = JSON.parse(JSON.stringify(success_rate_monthly).replace(/null/g, '"0"'));

            config = {
              type: 'line',
              data: {
                labels: success_rate_monthly['label'],
                datasets: [{
                  label: "Total ",
                  backgroundColor: "rgba(122,224,119,0.2)",
                  borderColor: "rgba(0,176,76,1)",
                  fill: false,
                  data: success_rate_monthly['total'] ,
                }, {
                  label: "Mandiri ",
                  backgroundColor: "rgba(254, 182, 0,0.2)",
                  borderColor: "#feb600",
                  fill: false,
                  data: success_rate_monthly['B002'] ,
                }, {
                  label: "BNI ",
                  fill: false,
                  backgroundColor: "rgba(228, 83, 0,0.2)",
                  borderColor: "#e45300",
                  data: success_rate_monthly['B003'],
                }, {
                  label: "BRI ",
                  fill: false,
                  backgroundColor: "rgba(0, 78, 145,0.2)",
                  borderColor: "#004e91",
                  data: success_rate_monthly['B012'],
                }, {
                  label: "CIMB ",
                  fill: false,
                  backgroundColor: "rgba(192, 0, 0,0.2)",
                  borderColor: "#c00000",
                  data: success_rate_monthly['B008'],
                }]
              },
              options: {
                responsive: true,
                legend: {
                  position: 'bottom',
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Count'
                    }
                  }],
                  yAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Value'
                    }
                  }]
                }
              }
            }; // end of config

            ctx_line_graph.destroy();
            ctx_line_graph  = new Chart(ctx_line, config);

            // transaction success rate hourly
            ctx_edc_active_graph.destroy();
            ctx_edc_active_graph  = new Chart(ctx_edc_active, config_edc_active);

            var success_rate_hourly    = data['mon_data']['success_rate_hourly'];
            success_rate_hourly        = JSON.parse(JSON.stringify(success_rate_hourly).replace(/null/g, '"0"'));

            config_success_rate_hourly = {
              type: 'line',
              data: {
                labels: success_rate_hourly['label'],
                datasets: [
                {
                  label: "Total ",
                  backgroundColor: "rgba(122,224,119,0.2)",
                  borderColor: "rgba(0,176,76,1)",
                  fill: false,
                  data: success_rate_hourly['total'] ,
                },
                {
                  label: "Mandiri ",
                  backgroundColor: "rgba(254, 182, 0,0.2)",
                  borderColor: "#feb600",
                  fill: false,
                  data: success_rate_hourly['B002'] ,
                }, {
                  label: "BNI ",
                  fill: false,
                  backgroundColor: "rgba(228, 83, 0,0.2)",
                  borderColor: "#e45300",
                  data: success_rate_hourly['B003'],
                }, {
                  label: "BRI ",
                  fill: false,
                  backgroundColor: "rgba(0, 78, 145,0.2)",
                  borderColor: "#004e91",
                  data: success_rate_hourly['B012'],
                }, {
                  label: "CIMB ",
                  fill: false,
                  backgroundColor: "rgba(192, 0, 0,0.2)",
                  borderColor: "#c00000",
                  data: success_rate_hourly['B008'],
                }]
              },
              options: {
                responsive: true,
                legend: {
                  position: 'bottom',
                },
                // title: {
                //   display: true,
                //   text: 'Chart.js Line Chart'
                // // },
                // tooltips: {
                //   mode: 'nearest',
                  // intersect: true,
                // },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Count'
                    }
                  }],
                  yAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Value'
                    }
                  }]
                }
              }
            }; // end of config

            ctx_succes_rate_hourly_graph.destroy();
            ctx_succes_rate_hourly_graph  = new Chart(ctx_succes_rate_hourly, config_success_rate_hourly);

            var horizontalBarChartData_data = data['mon_data']['Top5ErrorCode'];
            horizontalBarChartData_data     = JSON.parse(JSON.stringify(horizontalBarChartData_data).replace(/null/g, '"0"'));

            horizontalBarChartData = {
              labels: horizontalBarChartData_data['label'],
              datasets: [{
                label: '',
                backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: horizontalBarChartData_data['total'],
              }
              // , {
              //   label: horizontalBarChartData_data[1]['FRESPCODE'],
              //   backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
              //   borderColor: window.chartColors.orange,
              //   data: [
              //     horizontalBarChartData_data[1]['total'],
              //   ]
              // }, {
              //   label: horizontalBarChartData_data[2]['FRESPCODE'],
              //   backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
              //   borderColor: window.chartColors.yellow,
              //   data: [
              //     horizontalBarChartData_data[2]['total'],
              //   ]
              // }, {
              //   label: horizontalBarChartData_data[3]['FRESPCODE'],
              //   backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
              //   borderColor: window.chartColors.blue,
              //   data: [
              //     horizontalBarChartData_data[3]['total'],
              //   ]
              // }, {
              //   label: horizontalBarChartData_data[4]['FRESPCODE'],
              //   backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
              //   borderColor: window.chartColors.green,
              //   data: [
              //     horizontalBarChartData_data[4]['total'],
              //   ]
              // }
              ]

            }; // end of horizontalBarChartData

            ctx_errorcode_graph.destroy();
            ctx_errorcode_graph   = new Chart(ctx_errorcode, {
              type: 'horizontalBar',
              data: horizontalBarChartData,
              options: {
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                  rectangle: {
                    borderWidth: 2,
                  }
                },
                responsive: true,
                legend: {
                  position: 'bottom',
                  display: false,
                },
                title: {
                  display: false,
                  text: 'Chart.js Horizontal Bar Chart'
                }
              }
            });

            var total_trx_monthly      = data['mon_data']['total_trx_monthly'];
            total_trx_monthly          = JSON.parse(JSON.stringify(total_trx_monthly).replace(/null/g, '"0"'));

            config_total_trx_monthly = {
              type: 'line',
              data: {
                labels: total_trx_monthly['label'],
                datasets: total_trx_monthly['dataset_list']
              },
              options: {
                responsive: true,
                legend: {
                  position: 'bottom',
                  display: true
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Count'
                    }
                  }],
                  yAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Value'
                    }
                  }]
                }
              }
            };

            ctx_ctx_total_trx_monthly_graph.destroy();
            ctx_ctx_total_trx_monthly_graph   = new Chart(ctx_total_trx_monthly, config_total_trx_monthly);

            var stacked_trx_type_data = data['mon_data']['TotalTrxSummaryPerTrxType'];
            stacked_trx_type_data     = JSON.parse(JSON.stringify(stacked_trx_type_data).replace(/null/g, '"0"'));

            stacked_trx_type = {
              labels: ['Sale', 'Prepaid Sale', 'Prepaid Top Up'],
              datasets: [
              // {
              //   label: 'Total Transaction',
              //   backgroundColor: window.chartColors.red,
              //   data: [
              //     TotalTrxSummaryPerTrxType[0]['TotalSale'],
              //     TotalTrxSummaryPerTrxType[0]['TotalPrepaidSale'],
              //     TotalTrxSummaryPerTrxType[0]['TotalPrepaidTopUp'],
              //   ]
              // },
              {
                label: 'Total Success',
                backgroundColor: window.chartColors.green,
                data: [
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalSaleSuccess']) / ( parseInt(stacked_trx_type_data[0]['TotalSaleSuccess']) + parseInt(stacked_trx_type_data[0]['TotalSaleDecline']) ) * 100),
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleSuccess']) / ( parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleSuccess']) + parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleDecline']) ) * 100),
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpSuccess']) / ( parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpSuccess']) + parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpDecline']) ) * 100),
                ]
              }, {
                label: 'Total Decline',
                backgroundColor: window.chartColors.red,
                data: [
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalSaleDecline']) / ( parseInt(stacked_trx_type_data[0]['TotalSaleSuccess']) + parseInt(stacked_trx_type_data[0]['TotalSaleDecline']) ) * 100),
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleDecline']) / ( parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleSuccess']) + parseInt(stacked_trx_type_data[0]['TotalPrepaidSaleDecline']) ) * 100),
                  Math.round(parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpDecline']) / ( parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpSuccess']) + parseInt(stacked_trx_type_data[0]['TotalPrepaidTopUpDecline']) ) * 100),
                ]
              }]

            };

            ctx_stacked_trx_type_graph.destroy();
            ctx_stacked_trx_type_graph  = new Chart(ctx_stacked_trx_type, {
              type: 'horizontalBar',
              data: stacked_trx_type,
              options: {
                title: {
                  display: false,
                  text: 'Chart.js Bar Chart - Stacked'
                },
                // tooltips: {
                //   mode: 'index',
                //   intersect: false
                // },
                responsive: true,
                scales: {
                  xAxes: [{
                    stacked: true,
                    // categoryPercentage: 0.3,
                    // barPercentage: 0.9,
                    // barThickness: 70,
                  }],
                  yAxes: [{
                    stacked: true,
                    categoryPercentage: 0.5,
                    barPercentage: 0.9,
                  }]
                },
                legend: {
                  position: 'bottom',
                },
              }
            });

            // var trx_summary_data          = data['mon_data']['trx_summary'][0];
            // var Sale_data                 = trx_summary_data['Sale'];
            // var PrepaidSale_data          = trx_summary_data['PrepaidSale'];
            // var PrepaidTopUp_data         = trx_summary_data['PrepaidTopUp'];
            // var Others_data               = trx_summary_data['Others'];

            // var total_trx                 = parseInt(Sale_data) + parseInt(PrepaidSale_data) + parseInt(PrepaidTopUp_data) + parseInt(Others_data);

            // var Sale_data_percent         = Math.round(( parseInt(Sale_data) / total_trx * 100));
            // var PrepaidSale_data_percent  = Math.round(( parseInt(PrepaidSale_data) / total_trx * 100));
            // var PrepaidTopUp_data_percent = Math.round(( parseInt(PrepaidTopUp_data) / total_trx * 100));
            // var Others_data_percent       = Math.round(( parseInt(Others_data) / total_trx * 100));

            // $('#total_sale_text').html( Sale_data );
            // $('#total_sale_text_percent').html( Sale_data_percent+'%' );

            // $('#total_PrepaidSale').html( PrepaidSale_data );
            // $('#total_PrepaidSale_percent').html( PrepaidSale_data_percent+'%' );

            // $('#total_PrepaidTopUp').html( PrepaidTopUp_data );
            // $('#total_PrepaidTopUp_percent').html( PrepaidTopUp_data_percent+'%' );

            // $('#total_Others').html( Others_data );
            // $('#total_Others_percent').html( Others_data_percent+'%' );

            // $('#total_sale_bar').css('width', Sale_data_percent+'%');
            // $('#total_PrepaidSale_bar').css('width', PrepaidSale_data_percent+'%');
            // $('#total_PrepaidTopUp_bar').css('width', PrepaidTopUp_data_percent+'%');
            // $('#total_PrepaidTopUp_bar').css('width', Others_data_percent+'%');

            // $('.progress-bar').css('width', '0');

            var total_trx_last_24   = data['mon_data']['total_trx_last_24'];
            var element_trx_last_24 = "";
            
            for( var i=0; i< total_trx_last_24.length; i++ ) {
              element_trx_last_24 += "<div class='col-md-6'>"
                                        + "<div class='clearfix'>"
                                          + "<div class='title'><strong>" + total_trx_last_24[i].label + "</strong></div>"
                                          + "<div class='number'><strong><span style='margin-right: 10px;' id=''>" + total_trx_last_24[i].total + "</span> | <span style='margin-left: 10px;' id=''>" + total_trx_last_24[i].percentage + "%</span></strong></div>"
                                        + "</div>"
                                        + "<div class='progress progress-bar-large'>"
                                          + "<div id='' data-transitiongoal='" + total_trx_last_24[i].percentage + "' class='progress-bar progress-bar-prepaid-topup'><strong></strong></div>"
                                        + "</div>"
                                      + "</div>";


            }

            $('#trx-total-last-24').html(element_trx_last_24);

            $('.progress-bar').progressbar();

            setTimeout(function(){ get_monitoring_data(); }, 50000);

          }
        });

      }

      setTimeout(function(){ get_monitoring_data(); }, 50000);

      $('input.trx_total_config').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});

      var trx_selected = $(".trx_total_config:checked").map(function(){
        return $(this).val();
      }).toArray();

      if( trx_selected.length == 4 ) {

        for( var i=0; i<$('.trx_total_config').length; i++ ) {

          if( $( $('.trx_total_config')[i]).is(':checked') == false ) {
            $( $('.trx_total_config')[i] ).iCheck('disable');

            $( $('.trx_total_config')[i] ).parents('.icheck-list').addClass('disabled_text');
          }

        }

      } else if( trx_selected.length < 4 ) {
        $('input.trx_total_config').iCheck('enable');
      }


      $('input.trx_total_config').on('ifChecked', function(event){
        var trx_selected = $(".trx_total_config:checked").map(function(){
          return $(this).val();
        }).toArray();

        if( trx_selected.length == 4 ) {

          for( var i=0; i<$('.trx_total_config').length; i++ ) {

            if( $( $('.trx_total_config')[i]).is(':checked') == false ) {
              $( $('.trx_total_config')[i] ).iCheck('disable');

              $( $('.trx_total_config')[i] ).parents('.icheck-list').addClass('disabled_text');
            }

          }

        } else if( trx_selected.length < 4 ) {
          $('input.trx_total_config').iCheck('enable');
        }

      });

      $('input.trx_total_config').on('ifUnchecked', function(event){
        var trx_selected = $(".trx_total_config:checked").map(function(){
          return $(this).val();
        }).toArray();

        if( trx_selected.length < 4 ) {
          $('input.trx_total_config').iCheck('enable');

          $('input.trx_total_config').parents('.icheck-list').removeClass('disabled_text');
        }
      });

      function update_transaction_total(){
         $.ajax({
          dataType: 'JSON',
          type: 'GET',
          url: '/update_trx_total_data',
          success: function (data) {

            var total_trx_monthly      = data['total_trx_monthly'];
            total_trx_monthly          = JSON.parse(JSON.stringify(total_trx_monthly).replace(/null/g, '"0"'));

            config_total_trx_monthly = {
              type: 'line',
              data: {
                labels: total_trx_monthly['label'],
                datasets: total_trx_monthly['dataset_list']
              },
              options: {
                responsive: true,
                legend: {
                  position: 'bottom',
                  display: true
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Count'
                    }
                  }],
                  yAxes: [{
                    display: true,
                    scaleLabel: {
                      display: false,
                      labelString: 'Value'
                    }
                  }]
                }
              }
            };

            ctx_ctx_total_trx_monthly_graph.destroy();
            ctx_ctx_total_trx_monthly_graph   = new Chart(ctx_total_trx_monthly, config_total_trx_monthly);

            var total_trx_last_24   = data['total_trx_last_24'];
            var element_trx_last_24 = "";
            
            for( var i=0; i< total_trx_last_24.length; i++ ) {
              element_trx_last_24 += "<div class='col-md-6'>"
                                        + "<div class='clearfix'>"
                                          + "<div class='title'><strong>" + total_trx_last_24[i].label + "</strong></div>"
                                          + "<div class='number'><strong><span style='margin-right: 10px;' id=''>" + total_trx_last_24[i].total + "</span> | <span style='margin-left: 10px;' id=''>" + total_trx_last_24[i].percentage + "%</span></strong></div>"
                                        + "</div>"
                                        + "<div class='progress progress-bar-large'>"
                                          + "<div id='' data-transitiongoal='" + total_trx_last_24[i].percentage + "' class='progress-bar progress-bar-prepaid-topup'><strong></strong></div>"
                                        + "</div>"
                                      + "</div>";


            }

            $('#trx-total-last-24').html(element_trx_last_24);

            $('.progress-bar').progressbar();

          }

        });
      }

      function trxTotal_config() {
        $('#trxTotal_config_modal').modal('show');
      }

      function apply_config() {

        var trx_selected = $(".trx_total_config:checked").map(function(){
          return $(this).val();
        }).toArray();

        if( trx_selected.length > 0 ) {
          trx_selected = JSON.stringify(trx_selected);

          $.ajax({
            type: 'POST',
            data: { 
                    trx : trx_selected
                  },
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url: '/apply_config_trx_total',
            success: function (data) {

              if ( data.success == true ) {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#91ffbf',
                       color:'#666',
                       message:'<i class="fa fa-check" aria-hidden="true"></i> '+data.message
                    },
                    'position'  :'top right'
                });

                $('#trxTotal_config_modal').modal('hide');

                update_transaction_total();
              } else if ( data.success == true ) {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#ff8787',
                       color:'#666',
                       message:'<i class="fa fa-times" aria-hidden="true"></i> '+data.message
                    },
                    'position'  :'top right'
                });
              } else {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#ff8787',
                       color:'#666',
                       message:'<i class="fa fa-times" aria-hidden="true"></i> '+data.message
                    },
                    'position'  :'top right'
                });
              } 

            }
          });
        } else {

          $.amaran({
              'theme'     :'colorful',
              'content'   :{
                 bgcolor:'#f4d742',
                 color:'#666',
                 message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select transaction type !'
              },
              'position'  :'top right'
          });

        }

      }

    </script>
@endsection
