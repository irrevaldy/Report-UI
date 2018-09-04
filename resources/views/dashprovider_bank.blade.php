@extends('layout')      

@section('content')
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

    .purple {
        color: #9d74b0;
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

    /*f1b2*/
</style>

    <div class="header panel-header" style="border-bottom: none;">
        <h2><i class="fas fa-home"></i> <strong>Home</strong></h3>
    </div>

    <?php
      // $total_trx_percent         = round($total_trx / $total_trx * 100);
      // $total_trx_success_percent = round($total_trx_success / $total_trx * 100);
      // $total_trx_failed_percent  = round($total_trx_failed / $total_trx * 100);
    ?>

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
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Acquirer Highest Amount</strong> Charts</h3>
        <div>
          <canvas id="amount_top5high_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Acquirer Lowest Amount</strong> Charts</h3>
        <div>
          <canvas id="amount_top5low_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>

    <div class="row tile_count">
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Total Transaction By Cardtype</strong> Charts</h3>
        <div>
          <canvas id="trx_cardtype_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Total Transaction By Type</strong> Charts</h3>
        <div>
          <canvas id="trx_type_chart" class="full" height="100"></canvas>
        </div>
      </div>
      
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/charts-highstock/js/highstock.min.js') }}"></script> 
    <script src="{{ asset('assets/plugins/maps-amcharts/ammap/ammap.min.js') }}"></script> 
    <script src="{{ asset('assets/plugins/countup/countUp.min.js') }}"></script> 
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script> 

    <script type="text/javascript">
    
        $('.panel-header-section').click(function() {
            $(this).toggleClass("closed").parents(".panel:first").find(".panel-content").slideToggle();
            $(this).find(".svg-inline--fa.icon").slideToggle();
        });

    </script>

    <script type="text/javascript">

      animateNumber();

    var last_day          = <?php echo json_encode($last_day); ?>;
    var top5high_amount   = <?php echo json_encode($top5high_amount); ?>;
    var top5low_amount    = <?php echo json_encode($top5low_amount); ?>;
    // var total_trx_cardtype  = <?php //echo json_encode($total_trx_cardtype); ?>;
    // var total_trx_type  = <?php //echo json_encode($total_trx_type); ?>;
    
    // console.log(total_amount);

    console.log(top5high_amount);

    function randomScalingFactor() {
      return Math.floor((Math.random() * 100) + 1);
    }


    var MONTHS = ['Months', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var color = Chart.helpers.color;

    var amount_top5highdata = {
      labels: [ last_day ],
      datasets: [{
        label: top5high_amount[0].FNAME,
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [ top5high_amount[0].total_amount ]
      },{
        label: top5high_amount[1].FNAME,
        backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
        borderColor: window.chartColors.orange,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5high_amount[1].total_amount ]
      },{
        label: top5high_amount[2].FNAME,
        backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
        borderColor: window.chartColors.yellow,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5high_amount[2].total_amount ]
      },{
        label: top5high_amount[3].FNAME,
        backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
        borderColor: window.chartColors.blue,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5high_amount[3].total_amount ]
      },{
        label: top5high_amount[4].FNAME,
        backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
        borderColor: window.chartColors.green,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5high_amount[4].total_amount ]
      }]

    };
   
    var amount_top5lowdata = {
      labels: [ last_day ],
      datasets: [{
        label: top5low_amount[0].FNAME,
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [ top5low_amount[0].total_amount ]
      },{
        label: top5low_amount[1].FNAME,
        backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
        borderColor: window.chartColors.orange,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5low_amount[1].total_amount ]
      },{
        label: top5low_amount[2].FNAME,
        backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
        borderColor: window.chartColors.yellow,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5low_amount[2].total_amount ]
      },{
        label: top5low_amount[3].FNAME,
        backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
        borderColor: window.chartColors.blue,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5low_amount[3].total_amount ]
      },{
        label: top5low_amount[4].FNAME,
        backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
        borderColor: window.chartColors.green,
        // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
        data: [ top5low_amount[4].total_amount ]
      }]

    };

    var trx_bycardtype_data = {
      labels: [ MONTHS[last_month-2], MONTHS[last_month-1], MONTHS[last_month] ],
      datasets: [{
        label: total_trx_cardtype[0].FCARDTYPEDESC,
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [ total_trx_cardtype[0].total_trx, total_trx_cardtype[5].total_trx, total_trx_cardtype[10].total_trx ]
      }, {
        label: total_trx_cardtype[1].FCARDTYPEDESC,
        backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
        borderColor: window.chartColors.orange,
        data: [ total_trx_cardtype[1].total_trx, total_trx_cardtype[6].total_trx, total_trx_cardtype[11].total_trx ]
      }, {
        label: total_trx_cardtype[2].FCARDTYPEDESC,
        backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
        borderColor: window.chartColors.yellow,
        data: [ total_trx_cardtype[2].total_trx, total_trx_cardtype[7].total_trx, total_trx_cardtype[12].total_trx ]
      }, {
        label: total_trx_cardtype[3].FCARDTYPEDESC,
        backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
        borderColor: window.chartColors.blue,
        data: [ total_trx_cardtype[3].total_trx, total_trx_cardtype[8].total_trx, total_trx_cardtype[13].total_trx ]
      }, {
        label: total_trx_cardtype[4].FCARDTYPEDESC,
        backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
        borderColor: window.chartColors.green,
        data: [ total_trx_cardtype[4].total_trx, total_trx_cardtype[9].total_trx, total_trx_cardtype[14].total_trx ]
      }]

    };

    var trx_bytype_data = {
      labels: [ MONTHS[last_month-2], MONTHS[last_month-1], MONTHS[last_month] ],
      datasets: [{
        label: ['Sale'],
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [ total_trx_type[0].TotalSale, total_trx_type[1].TotalSale, total_trx_type[2].TotalSale ]
      }, {
        label: ['Prepaid Sale'],
        backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
        borderColor: window.chartColors.orange,
        data: [ total_trx_type[0].TotalPrepaidSale, total_trx_type[1].TotalPrepaidSale, total_trx_type[2].TotalPrepaidSale ]
      }, {
        label: ['Prepaid Top Up'],
        backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
        borderColor: window.chartColors.yellow,
        data: [ total_trx_type[0].TotalPrepaidTopUp, total_trx_type[1].TotalPrepaidTopUp, total_trx_type[2].TotalPrepaidTopUp ]
      }]

    };
    


    
    var barChartData = {
      labels: ['May', 'June', 'July'],
      datasets: [{
        label: 'Sale',
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
      }, {
        label: 'Top-Up',
        backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
        data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
      }]

    };

    

    window.onload = function() {

      var chart_highamount = document.getElementById('amount_top5high_chart').getContext('2d');
      window.myBar = new Chart(chart_highamount, {
        type: 'bar',
        data: amount_top5highdata,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Chart.js Bar Chart'
          }
        }
      });

      var chart_lowamount = document.getElementById('amount_top5low_chart').getContext('2d');
      window.myBar = new Chart(chart_lowamount, {
        type: 'bar',
        data: amount_top5lowdata,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Chart.js Bar Chart'
          }
        }
      });

      var chart_trxcardtype     = document.getElementById('trx_cardtype_chart').getContext('2d');
      var ctx_trxcardtype_graph = new Chart(chart_trxcardtype, {
        type: 'horizontalBar',
        data: trx_bycardtype_data,
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
          },
          title: {
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
          }
        }
      });

      var chart_trxtype     = document.getElementById('trx_type_chart').getContext('2d');
      var ctx_trxtype_graph = new Chart(chart_trxtype, {
        type: 'horizontalBar',
        data: trx_bytype_data,
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
          },
          title: {
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
          }
        }
      });

      // window.myHorizontalBar = new Chart(chart_lowamount, {
      //   type: 'horizontalBar',
      //   data: amount_top5lowdata,
      //   options: {
      //     // Elements options apply to all of the options unless overridden in a dataset
      //     // In this case, we are setting the border of each horizontal bar to be 2px wide
      //     elements: {
      //       rectangle: {
      //         borderWidth: 2,
      //       }
      //     },
      //     responsive: true,
      //     legend: {
      //       position: 'bottom',
      //     },
      //     title: {
      //       display: false,
      //       text: 'Chart.js Horizontal Bar Chart'
      //     }
      //   }
      // });

      var chart_line = document.getElementById('cardtype_chart').getContext('2d');
      window.myLine = new Chart(chart_line, config);

      var chart_bar = document.getElementById('trxtype_chart').getContext('2d');
      window.myBar = new Chart(chart_bar, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Chart.js Bar Chart'
          }
        }
      });
      

      var chart_hightrx = document.getElementById('trx_top5high_chart').getContext('2d');
      window.myHorizontalBar = new Chart(chart_hightrx, {
        type: 'horizontalBar',
        data: trx_top5highdata,
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
          },
          title: {
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
          }
        }
      });

      var chart_lowtrx = document.getElementById('trx_top5low_chart').getContext('2d');
      window.myHorizontalBar = new Chart(chart_lowtrx, {
        type: 'horizontalBar',
        data: trx_top5lowdata,
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
          },
          title: {
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
          }
        }
      });

    };
    
    </script>
@endsection