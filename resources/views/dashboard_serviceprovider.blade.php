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
        <h2><i class="fas fa-home"></i> <strong>Service Provider Dashboard</strong></h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel no-bd bd-3 panel-stat">

            <div class="panel-body p-15 p-b-0" style="border: 1px solid gray">
                <div class="panel-content widget-info">
                    <div class="row">
                      <!-- <div class="left">
                          <i class="fa fa-usd bg-green"></i>
                        </div> -->
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Acquirer</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="5" style="font-size: 42px">5</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Corporate</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="2" style="font-size: 42px">2</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px">
                            <p><i class="fa fa-home text-primary"></i> <strong>Merchant</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="10" style="font-size: 42px">10</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px">
                            <p><i class="fa fa-home text-primary"></i> <strong>Store</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="20000" style="font-size: 42px">20000</p>
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <!-- <div class="left">
                          <i class="fa fa-usd bg-green"></i>
                        </div> -->
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Terminal</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="60000" style="font-size: 42px">60000</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Active</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="50000" style="font-size: 42px">50000</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Inactive</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="10000" style="font-size: 42px">10000</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Active Transaction</strong></p>
                            <p class="number countup text-primary" data-from="0" data-to="10000" style="font-size: 42px">10000</p>
                          </div>
                        </div>
                    </div>
                    <br>
                    <?php
                      if( $total_amount == 0 ) { $class = ''; } else { $class = ''; }
                      if( strlen($total_amount) > 10 ) { $total_amount = substr($total_amount, 0, -6); $symbol = 'M'; }
                      else if ( strlen($total_amount) > 7 ) { $total_amount = substr($total_amount, 0, -3); $symbol = 'K'; }
                      else { $symbol = ''; }
                    ?>
                    <div class="row">
                      <!-- <div class="left">
                          <i class="fa fa-usd bg-green"></i>
                        </div> -->
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Total Amount</strong></p>
                            <p class="count number text-primary {{ $class }}" style="font-size: 42px">{{ number_format($total_amount).$symbol }}</p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Total Transaction</strong></p>
                            <p class="number countup text-primary {{ $class }}" data-from="0" data-to="{{ $total_trx }}" style="font-size: 42px"></p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Transaction Success</strong></p>
                            <p class="number countup text-primary {{ $class }}" data-from="0" data-to="{{ $total_trx_success }}" style="font-size: 42px"></p>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div style="padding-left: 50px;">
                            <p><i class="fa fa-home text-primary"></i> <strong>Transaction Failed</strong></p>
                            <p class="number countup text-primary {{ $class }}" data-from="0" data-to="{{ $total_trx_failed }}" style="font-size: 42px"></p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body p-15 p-b-0" style="border: 1px solid gray">
                <div class="panel-content widget-info">
                    <div id="container" style="min-width: 310px; max-width: 800px; height: 50px; margin: 0 auto "></div>
                </div>
            </div>

            <div class="panel-body p-15 p-b-0" style="border: 1px solid gray">
                <div class="panel-content widget-info">
                  <div class="row tile_count">

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Merchant Highest Transaction Count</strong> Charts</h3>
                      <div>
                        <canvas id="trx_cardtype_chart"  class="full" height="100"/>
                      </div>
                    </div>

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Merchant Highest Amount</strong> Charts</h3>
                      <div>
                        <canvas id="trx_type_chart" class="full" height="100"></canvas>
                      </div>
                    </div>

                  </div>
                </div>
            </div>

            <div class="panel-body p-15 p-b-0" style="border: 1px solid gray">
                <div class="panel-content widget-info">
                  <div class="row tile_count">

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Transaction Count By Cardtype</strong> Charts</h3>
                      <div>
                        <canvas id="trx_cardtype_chart2"  class="full" height="100"/>
                      </div>
                    </div>

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Transaction Amount By Cardtype</strong> Charts</h3>
                      <div>
                        <canvas id="trx_type_chart2" class="full" height="100"></canvas>
                      </div>
                    </div>

                  </div>
                </div>
            </div>

            <div class="panel-body p-15 p-b-0" style="border: 1px solid gray">
                <div class="panel-content widget-info">
                  <div class="row tile_count">

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Transaction Count By Transaction Type</strong> Charts</h3>
                      <div>
                        <canvas id="trx_cardtype_chart3"  class="full" height="100"/>
                      </div>
                    </div>

                    <div class="col-md-6 hov_effect" style="padding-left: 20px">
                      <h3><strong>Top 5 Transaction Amount By Transaction Type</strong> Charts</h3>
                      <div>
                        <canvas id="trx_type_chart3" class="full" height="100"></canvas>
                      </div>
                    </div>

                  </div>
                </div>
            </div>

        </div>
      </div>
    </div>


@endsection

@section('javascript')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<!--<script src="{{ asset('assets/plugins/charts-highstock/js/highstock.min.js') }}"></script>-->
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

//start of highchart (horizontal percentage bar)
  var chart; // global
  document.addEventListener('DOMContentLoaded', (function() {

  chart =  Highcharts.chart('container', {
      chart: {
          type: 'bar',
      },
      legend: {
        enabled: false
      },
      exporting: { enabled: false },
      title: {
          text: ''
      },
      xAxis: {
     			visible: false,
          categories: ['']
      },
      yAxis: {
          min: 0,
          gridLineWidth: 0,
          visible: false,
          title: {
              text: ''
          }
      },
     credits: {
        enabled: false
    },
    tooltip: {
                enabled:false
    },
    plotOptions: {
      bar: {
                    grouping: true,
                    groupPadding:0.1,
                    pointWidth:20,
                    pointPadding: 0,
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        useHTML: true,
                        align: 'center',
                        color: 'white',
                        style: {
                            fontWeight: 'bold'
                        },
                        verticalAlign: 'middle',
                        formatter: function () {
                            if (this.series.name)
                              return '<span style="color:white">' + this.series.name + ' = ' + this.y + ' %</span>';
                            else return '';
                        }
                    }
                },
      series: {
        stacking: 'normal'
      }
    },
    series: [{
          name: 'Off Us',
          data: [20],

    }, {
          name: 'On Us',
          data: [80]
      }]
    });
  }));
//end of highchart (horizontal percentage bar)

animateNumber();

var last_month      = <?php echo json_encode($last_month); ?>;
var top5high_amount   = <?php echo json_encode($top5high_amount); ?>;
var top5low_amount    = <?php echo json_encode($top5low_amount); ?>;
var total_trx_cardtype  = <?php echo json_encode($total_trx_cardtype); ?>;
var total_trx_type  = <?php echo json_encode($total_trx_type); ?>;

// console.log(total_amount);

console.log(top5high_amount);

function randomScalingFactor() {
return Math.floor((Math.random() * 100) + 1);
}


var MONTHS = ['Months', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

var color = Chart.helpers.color;

var amount_top5highdata = {
labels: [ MONTHS[last_month] ],
datasets: [{
  label: top5high_amount[0].FMERCHNAME,
  backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
  borderColor: window.chartColors.red,
  borderWidth: 1,
 data: [ top5high_amount[0].total_amount ]
},{
  label: top5high_amount[1].FMERCHNAME,
  backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
  borderColor: window.chartColors.orange,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5high_amount[1].total_amount ]
},{
  label: top5high_amount[2].FMERCHNAME,
  backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
  borderColor: window.chartColors.yellow,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5high_amount[2].total_amount ]
},{
  label: top5high_amount[3].FMERCHNAME,
  backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
  borderColor: window.chartColors.blue,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5high_amount[3].total_amount ]
},{
  label: top5high_amount[4].FMERCHNAME,
  backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
  borderColor: window.chartColors.green,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5high_amount[4].total_amount ]
}]

};

var amount_top5lowdata = {
labels: [ MONTHS[last_month] ],
datasets: [{
  label: top5low_amount[0].FMERCHNAME,
  backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
  borderColor: window.chartColors.red,
  borderWidth: 1,
  data: [ top5low_amount[0].total_amount ]
},{
  label: top5low_amount[1].FMERCHNAME,
  backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
  borderColor: window.chartColors.orange,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5low_amount[1].total_amount ]
},{
  label: top5low_amount[2].FMERCHNAME,
  backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
  borderColor: window.chartColors.yellow,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5low_amount[2].total_amount ]
},{
  label: top5low_amount[3].FMERCHNAME,
  backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
  borderColor: window.chartColors.blue,
  // hoverBackgroundColor: "rgba(117,214,195, 0.9)",
  data: [ top5low_amount[3].total_amount ]
},{
  label: top5low_amount[4].FMERCHNAME,
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

var chart_trxcardtype     = document.getElementById('trx_cardtype_chart').getContext('2d');
var ctx_trxcardtype_graph = new Chart(chart_trxcardtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else{
                return label/1000+'K';
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
    }
  }
});

var chart_trxtype     = document.getElementById('trx_type_chart').getContext('2d');
var ctx_trxtype_graph = new Chart(chart_trxtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else if(label > 1000){
                return label/1000+'K';
              }else{
                return label;
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
    }
  }
});

var chart_trxcardtype     = document.getElementById('trx_cardtype_chart2').getContext('2d');
var ctx_trxcardtype_graph = new Chart(chart_trxcardtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else{
                return label/1000+'K';
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
    }
  }
});

var chart_trxtype     = document.getElementById('trx_type_chart2').getContext('2d');
var ctx_trxtype_graph = new Chart(chart_trxtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else if(label > 1000){
                return label/1000+'K';
              }else{
                return label;
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
    }
  }
});

var chart_trxcardtype     = document.getElementById('trx_cardtype_chart3').getContext('2d');
var ctx_trxcardtype_graph = new Chart(chart_trxcardtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else{
                return label/1000+'K';
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
    }
  }
});

var chart_trxtype     = document.getElementById('trx_type_chart3').getContext('2d');
var ctx_trxtype_graph = new Chart(chart_trxtype, {
  type: 'bar',
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
    },
    scales: {
      xAxes: [
        {
          ticks: {
            callback: function(label, index, labels) {
              if(label > 1000000000){
                return label/1000000000+'B';
              }else if(label > 1000000){
                return label/1000000+'M';
              }else if(label > 1000){
                return label/1000+'K';
              }else{
                return label;
              }

            }
          },
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
          });
        }
      }
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
  type: 'bar',
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
  type: 'bar',
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
