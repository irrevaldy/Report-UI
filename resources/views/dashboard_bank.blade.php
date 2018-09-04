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
    <div class="header panel-header" style="border-bottom: none; padding-top: 0px">
        <h2><i class="fas fa-home"></i> <strong>Home</strong></h3>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <h3><i class="icon-graph"></i> <strong>Total Data Transaction &ensp;</strong>last month</h3>
		            <!-- <div class="control-btn">
		                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
		                <a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a>
		            </div> -->
		        </div>
		        <div class="panel-body p-15 p-b-0">
		           	<div class="panel-content widget-info">
		           	    <div class="row" class="full" height="60px">
		           	    	<!-- <div class="left">
		           	        	<i class="fa fa-usd bg-green"></i>
		           	        </div> -->
		           	        <div class="col-md-6">
		           	        	<div style="border-right: 2px solid gray">
			           	        	<p><i class="fa fa-usd text-primary"></i> <strong> Total Amount</strong></p>
			           	        	<p class="number countup text-primary" data-from="0" data-to="{{ $total_amount }}" style="font-size: 30px"></p>
			           	        	<p class="text">Rupiah</p>
		           	        	</div>
		           	        </div>
		           	        <div class="col-md-2">
		           	        	<div style="padding-left: 0px; border-right: 2px solid gray">
			           	        	<p><i class="fa fa-retweet text-primary"></i> <strong> Total</strong></p>
			           	        	<p class="number countup text-primary" data-from="0" data-to="{{ $total_trx }}" style="font-size: 30px"></p>
			           	        	<p class="text">Transactions</p>
		           	        	</div>
		           	        </div>
		           	        <div class="col-md-2">
		           	        	<div style="padding-left: 0px; border-right: 2px solid gray">
			           	        	<p><i class="fa fa-check c-green"></i> <strong> Success</strong></p>
			           	        	<p class="number countup c-green" data-from="0" data-to="{{ $total_trx_success }}" style="font-size: 30px"></p>
			           	        	<p class="text">Transactions</p>
		           	        	</div>
		           	        </div>
		           	        <div class="col-md-2">
		           	        	<div style="padding-left: 0px">
			           	        	<p><i class="fa fa-close c-red"></i> <strong> Failed</strong></p>
			           	        	<p class="number countup c-red" data-from="0" data-to="{{ $total_trx_failed }}" style="font-size: 30px"></p>
			           	        	<p class="text">Transactions</p>
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
		            <a href="#"><h3 class="panel-toggle"><i class="icon-graph"></i> <strong>Top 5 Highest Amount &ensp;</strong> by merchant</h3></a>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
			            <canvas id="amount_top5high_chart" class="full" height="150px"></canvas>
			        </div>
		        </div>
		       
		    </div>
		</div>
		<div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <a href="#"><h3 class="panel-toggle"><i class="icon-graph"></i> <strong>Top 5 Lowest Amount &ensp;</strong> by merchant</h3></a>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
		                <canvas id="amount_top5low_chart" class="full" height="150px"></canvas>
			        </div>
		        </div>
		       
		    </div>
		</div>
	</div>
    <!-- <div class="row">
	    <div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <h3><i class="icon-graph"></i> <strong>Top 5 Highest Transaction &ensp;</strong> by merchant</h3>
		            <div class="control-btn">
		                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
		                <a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a>
		            </div>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
		                <canvas id="trx_top5high_chart" class="full" height="80px"></canvas>
			        </div>
		        </div>
		       
		    </div>
		</div>
		<div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <h3><i class="icon-graph"></i> <strong>Top 5 Lowest Transaction &ensp;</strong> by merchant</h3>
		            <div class="control-btn">
		                <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
		                <a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a>
		            </div>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
		                <canvas id="trx_top5low_chart" class="full" height="80px"></canvas>
			        </div>
		        </div>
		       
		    </div>
		</div>
	</div> -->
    <div class="row">
	    <div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <a href="#"><h3 class="panel-toggle"><i class="icon-graph"></i> <strong>Total Transaction &ensp;</strong> by cardtype</h3></a>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
		                <canvas id="cardtype_chart" class="full" height="150px"></canvas>
			        </div>
		        </div>
		       
		    </div>
		</div>
		<div class="col-md-6">
		    <div class="panel no-bd bd-3 panel-stat">
		        <div class="panel-header">
		            <a href="#"><h3 class="panel-toggle"><i class="icon-graph"></i> <strong>Total Transaction &ensp;</strong> by type</h3></a>
		        </div>
		        <div class="panel-body p-15 p-b-0">
		        	<div class="panel-content widget-info">
		                <canvas id="trxtype_chart" class="full" height="150px"></canvas>
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

    	var last_month 			= <?php echo json_encode($last_month); ?>;
    	var top5high_amount 	= <?php echo json_encode($top5high_amount); ?>;
		var top5low_amount 		= <?php echo json_encode($top5low_amount); ?>;
		var total_trx_cardtype 	= <?php echo json_encode($total_trx_cardtype); ?>;
		

		console.log(top5high_amount);

    	function randomScalingFactor() {
    	    return Math.floor((Math.random() * 100) + 1);
    	}


    	var MONTHS = ['Months', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

		var color = Chart.helpers.color;

		var amount_top5highdata = {
			labels: [MONTHS[last_month]],
			datasets: [{
				label: top5high_amount[0].FMERCHNAME,
				backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
				data: [
					top5high_amount[0].total_amount
				]
			}, {
				label: top5high_amount[1].FMERCHNAME,
				backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
				data: [
					top5high_amount[1].total_amount
				]
			}, {
				label: top5high_amount[2].FMERCHNAME,
				backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
				data: [
					top5high_amount[2].total_amount
				]
			}, {
				label: top5high_amount[3].FMERCHNAME,
				backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
				data: [
					top5high_amount[3].total_amount
				]
			}, {
				label: top5high_amount[4].FMERCHNAME,
				backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
				data: [
					top5high_amount[4].total_amount
				]
			}]

		};

		var amount_top5lowdata = {
			labels: [MONTHS[last_month]],
			datasets: [{
				label: top5low_amount[0].FMERCHNAME,
				backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
				data: [
					top5low_amount[0].total_amount
				]
			}, {
				label: top5low_amount[1].FMERCHNAME,
				backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
				data: [
					top5low_amount[1].total_amount
				]
			}, {
				label: top5low_amount[2].FMERCHNAME,
				backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
				data: [
					top5low_amount[2].total_amount
				]
			}, {
				label: top5low_amount[3].FMERCHNAME,
				backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
				data: [
					top5low_amount[3].total_amount
				]
			}, {
				label: top5low_amount[4].FMERCHNAME,
				backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
				data: [
					top5low_amount[4].total_amount
				]
			}]

		};

		var trx_top5highdata = {
			labels: [MONTHS[last_month]],
			datasets: [{
				label: 'Merchant A',
				backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
				data: [
					"252"
				]
			}, {
				label: 'Merchant B',
				backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
				data: [
					"231"
				]
			}, {
				label: 'Merchant C',
				backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
				data: [
					"208"
				]
			}, {
				label: 'Merchant D',
				backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
				data: [
					"173"
				]
			}, {
				label: 'Merchant E',
				backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
				data: [
					"167"
				]
			}]

		};

		var trx_top5lowdata = {
			labels: [MONTHS[last_month]],
			datasets: [{
				label: 'Merchant F',
				backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
				data: [
					"39"
				]
			}, {
				label: 'Merchant G',
				backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
				data: [
					"44"
				]
			}, {
				label: 'Merchant H',
				backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
				data: [
					"50"
				]
			}, {
				label: 'Merchant I',
				backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
				data: [
					"56"
				]
			}, {
				label: 'Merchant J',
				backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
				data: [
					"76"
				]
			}]

		};

		var config = {
			type: 'line',
			data: {
				labels:[MONTHS[last_month-2], MONTHS[last_month-1], MONTHS[last_month]],
				datasets: [{
					label: total_trx_cardtype[0].FCARDTYPEDESC,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [ total_trx_cardtype[0].total_trx, randomScalingFactor(), randomScalingFactor() ],
					fill: false,
				}, {
					label: total_trx_cardtype[1].FCARDTYPEDESC,
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ],
				}, {
					label: total_trx_cardtype[2].FCARDTYPEDESC,
					fill: false,
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ],
				}, {
					label: total_trx_cardtype[3].FCARDTYPEDESC,
					fill: false,
					backgroundColor: window.chartColors.orange,
					borderColor: window.chartColors.orange,
					data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ],
				}, {
					label: total_trx_cardtype[4].FCARDTYPEDESC,
					fill: false,
					backgroundColor: window.chartColors.yellow,
					borderColor: window.chartColors.yellow,
					data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: false,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
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

			var chart_highamount = document.getElementById('amount_top5high_chart').getContext('2d');
			window.myHorizontalBar = new Chart(chart_highamount, {
				type: 'horizontalBar',
				data: amount_top5highdata,
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
					scaleLabel:{
						display: true,
						fontSize: 9
					}
				}
			});

			var chart_lowamount = document.getElementById('amount_top5low_chart').getContext('2d');
			window.myHorizontalBar = new Chart(chart_lowamount, {
				type: 'horizontalBar',
				data: amount_top5lowdata,
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

    <script type="text/javascript">
      	// var data = <?php //echo json_encode($priv);?>;
    	
    </script>
@endsection