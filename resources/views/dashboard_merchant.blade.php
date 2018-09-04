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
        color: #DBDB27;
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

    /*f1b2*/
</style>
	<?php
		// dd(session()->all());
	?>
  <div class="header panel-header" style="border-bottom: none;">
      <h2><i class="fas fa-home"></i> <strong>Merchant Dashboard</strong></h3>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>Total Branch and Store &ensp;</strong></h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div class="panel-content widget-info">
                  <div class="row">
                    <!-- <div class="left">
                        <i class="fa fa-usd bg-green"></i>
                      </div> -->
                      <div class="col-md-4">
                        <div style="padding-left: 100px; border-right: 2px solid gray">
                          <p><i class="fa fa-home text-primary"></i> <strong>Total Branch</strong></p>
                          <p class="number countup text-primary" data-from="0" data-to="{{ $total_branch }}" style="font-size: 42px">5,100</p>
                          <p class="text">Branch</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div style="padding-left: 100px; border-right: 2px solid gray">
                          <p><i class="fa fa-home text-primary"></i> <strong>Total Store</strong></p>
                          <p class="number countup text-primary" data-from="0" data-to="{{ $total_store }}" style="font-size: 42px">100</p>
                          <p class="text">Store</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div style="padding-left: 100px">
                          <p><i class="fa fa-home text-primary"></i> <strong>Total Terminal</strong></p>
                          <p class="number countup text-primary" data-from="0" data-to="{{ $total_terminal }}" style="font-size: 42px">100</p>
                          <p class="text">Terminal</p>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
    <div class="row">
	    <div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <h3><i class="icon-graph"></i> <strong>Top 5 Highest Transaction &ensp;</strong> by Branch</h3>
		            <div class="control-btn">
		                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
		            </div>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		            <div style="width: 100%; padding: 10px 20px">
		                <canvas id="trx_top5high_chart"></canvas>
		            </div>
		        </div>

		    </div>
		</div>
		<div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <h3><i class="icon-graph"></i> <strong>Top 5 Lowest Transaction &ensp;</strong> by Branch</h3>
		            <div class="control-btn">
		                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
		            </div>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		            <div style="width: 100%; padding: 10px 20px">
		                <canvas id="trx_top5low_chart"></canvas>
		            </div>
		        </div>

		    </div>
		</div>
	</div>

  <div class="row">
    <div class="col-md-6">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>Top 5 Highest Transaction &ensp;</strong> by Store</h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div style="width: 100%; padding: 10px 20px">
                  <canvas id="trx_top5high_chartStore"></canvas>
              </div>
          </div>

      </div>
  </div>
  <div class="col-md-6">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>Top 5 Lowest Transaction &ensp;</strong> by Store</h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div style="width: 100%; padding: 10px 20px">
                  <canvas id="trx_top5low_chartStore"></canvas>
              </div>
          </div>

      </div>
  </div>
</div>



@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/charts-highstock/js/highstock.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/maps-amcharts/ammap/ammap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/countup/countUp.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> -->

    <script type="text/javascript">

      animateNumber();
    
		var color = Chart.helpers.color;
/*
		var top5highdata = {
			labels: ['July'],
			datasets: [{
				label: 'Merchant A',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				data: [
					"252"
				]
			}, {
				label: 'Merchant B',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				data: [
					"231"
				]
			}, {
				label: 'Merchant C',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				data: [
					"208"
				]
			}, {
				label: 'Merchant D',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.orange,
				data: [
					"173"
				]
			}, {
				label: 'Merchant E',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				data: [
					"167"
				]
			}]

		};

		var top5lowdata = {
			labels: ['July'],
			datasets: [{
				label: 'Merchant F',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				data: [
					"39"
				]
			}, {
				label: 'Merchant G',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				data: [
					"44"
				]
			}, {
				label: 'Merchant H',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				data: [
					"50"
				]
			}, {
				label: 'Merchant I',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.orange,
				data: [
					"56"
				]
			}, {
				label: 'Merchant J',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				data: [
					"76"
				]
			}]

		};

    var top5highdataStore = {
			labels: ['July'],
			datasets: [{
				label: 'Merchant A',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				data: [
					"252"
				]
			}, {
				label: 'Merchant B',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				data: [
					"231"
				]
			}, {
				label: 'Merchant C',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				data: [
					"208"
				]
			}, {
				label: 'Merchant D',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.orange,
				data: [
					"173"
				]
			}, {
				label: 'Merchant E',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				data: [
					"167"
				]
			}]

		};

		var top5lowdataStore = {
			labels: ['July'],
			datasets: [{
				label: 'Merchant F',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				data: [
					"39"
				]
			}, {
				label: 'Merchant G',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				data: [
					"44"
				]
			}, {
				label: 'Merchant H',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				data: [
					"50"
				]
			}, {
				label: 'Merchant I',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.orange,
				data: [
					"56"
				]
			}, {
				label: 'Merchant J',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.yellow,
				data: [
					"76"
				]
			}]

		};
*/

    $(document).ready(function()
    {
      $.ajax({
        url: "/dashboard_merchant/monthly_branch",
        method: "GET",
        success: function(data)
        {
          console.log(data);
          var branch = [];
          var amount = [];

          for(var i in data)
          {
            branch.push(data[i].branch);
            amount.push(data[i].amount);
          }

          var chartdata =
          {
            labels: branch,
            datasets : [
            {
              label: 'Amount',
						  backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
					    borderColor: 'rgba(200, 200, 200, 0.75)',
						  hoverBackgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
						  hoverBorderColor: 'rgba(200, 200, 200, 1)',
						  data: amount
					  }
				   ]
			    };

			var ctx = $("#trx_top5high_chart");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
        options: {
  				responsive: true,
  				scales: {
  					xAxes: [{
  						display: true,
  						scaleLabel: {
  							display: true,
  							labelString: 'Branch Code'
  						}
  					}],
  					yAxes: [{
  						display: true,
  						scaleLabel: {
  							display: true,
  							labelString: 'Value'
  						}
  					}]
  				}
  			}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});

  $.ajax({
    url: "/dashboard_merchant/monthly_branchlow",
    method: "GET",
    success: function(data)
    {
      console.log(data);
      var branch = [];
      var amount = [];

      for(var i in data)
      {
        branch.push(data[i].branch);
        amount.push(data[i].amount);
      }

      var chartdata =
      {
        labels: branch,
        datasets : [
        {
          label: 'Amount',
          backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
          borderColor: 'rgba(200, 200, 200, 0.75)',
          hoverBackgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
          hoverBorderColor: 'rgba(200, 200, 200, 1)',
          data: amount
        }
       ]
      };

  var ctx = $("#trx_top5low_chart");

  var barGraph = new Chart(ctx, {
    type: 'bar',
    data: chartdata,
    options: {
      responsive: true,
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Branch Code'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  });
},
error: function(data) {
  console.log(data);
}
});

$.ajax({
  url: "/dashboard_merchant/monthly_storehigh",
  method: "GET",
  success: function(data)
  {
    console.log(data);
    var store = [];
    var amount = [];

    for(var i in data)
    {
      store.push(data[i].store);
      amount.push(data[i].amount);
    }

    var chartdata =
    {
      labels: store,
      datasets : [
      {
        label: 'Amount',
        backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
          data: amount
      }
     ]
    };

var ctx = $("#trx_top5high_chartStore");

var barGraph = new Chart(ctx, {
  type: 'bar',
  data: chartdata,
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Branch Code'
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value'
        }
      }]
    }
  }
});
},
error: function(data) {
console.log(data);
}
});

$.ajax({
  url: "/dashboard_merchant/monthly_storelow",
  method: "GET",
  success: function(data)
  {
    console.log(data);
    var store = [];
    var amount = [];

    for(var i in data)
    {
      store.push(data[i].store);
      amount.push(data[i].amount);
    }

    var chartdata =
    {
      labels: store,
      datasets : [
      {
        label: 'Amount',
        backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
  data: amount
      }
     ]
    };

var ctx = $("#trx_top5low_chartStore");

var barGraph = new Chart(ctx, {
  type: 'bar',
  data: chartdata,
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Branch Code'
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value'
        }
      }]
    }
  }
});
},
error: function(data) {
console.log(data);
}
});




});

/*
		window.onload = function() {

			var chart_hightrx = document.getElementById('trx_top5high_chart').getContext('2d');
			window.myHorizontalBar = new Chart(chart_hightrx, {
				type: 'bar',
				data: top5highdata,
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
						position: 'right',
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
				data: top5lowdata,
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
						position: 'right',
					},
					title: {
						display: false,
						text: 'Chart.js Horizontal Bar Chart'
					}
				}
			});

      var chart_hightrxStore = document.getElementById('trx_top5high_chartStore').getContext('2d');
			window.myHorizontalBar = new Chart(chart_hightrxStore, {
				type: 'bar',
				data: top5highdataStore,
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
						position: 'right',
					},
					title: {
						display: false,
						text: 'Chart.js Horizontal Bar Chart'
					}
				}
			});

			var chart_lowtrxStore = document.getElementById('trx_top5low_chartStore').getContext('2d');
			window.myHorizontalBar = new Chart(chart_lowtrxStore, {
				type: 'bar',
				data: top5lowdataStore,
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
						position: 'right',
					},
					title: {
						display: false,
						text: 'Chart.js Horizontal Bar Chart'
					}
				}
			});


		};
*/
    </script>
@endsection
