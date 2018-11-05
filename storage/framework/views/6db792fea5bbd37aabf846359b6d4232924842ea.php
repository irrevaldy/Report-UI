<?php $__env->startSection('content'); ?>
<?php
   //dd(session()->all());
 ?>
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

    .back-green {
        background-color: #4ca64c;
        color:  #fff;
    }

    .red {
        color: #e74c3c;
    }

    .back-red {
        background-color: #ff4c4c;
        color:  #fff;
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

    .back-gray {
        background-color: darkgray;
        color: #eeeeee;
    }

    .heavy-blue {
      background-color: #000033;
      color:  #fff;
    }

    .dark-gray {
      background-color: #A9A9A9;
      color: #fff;
    }


    .tile_stats_count {
      padding-top: 10px;
      padding-bottom: 10px;
      /*border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;*/
      border-top: 2px solid #adb2b5;
      /*border-bottom: 2px solid #adb2b5;*/
    }

    .tile_stats_count .left {
        /*border-left: 2px solid #adb2b5;*/
        border-left: 1px solid #adb2b5;
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
    .vertical-text {
      /*text-orientation: upright;*/
      writing-mode: vertical-rl;
      text-align: center;
      transform: rotate(-180deg);
    }

    /*f1b2*/
</style>

    <div class="header panel-header" style="border-bottom: none;">
        <h2><i class="fas fa-home"></i> <strong>Acquirer</strong></h3>
    </div>
    <div class="row tile_count">
      <div class="panel transparent" style="margin-bottom: 0px">
        <div class="panel-header" style="border-bottom: none;">
          <h3><strong>Acquirer </strong> Summary</h3>
        </div>
        <div class="panel-content row" style="padding-top: 0; padding-bottom: 0;">
          <div style="width: 3%; padding: 0px; background-color: #ab1313; color: white; border-bottom: 1px solid white" class="col-md-1">
            <div class="vertical-text" style="margin: 20px 0px 20px 5px"><center>Last 7 Days</center></div>
          </div>
          <div style="width: 97%; padding: 0px; " class="col-md-11">
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator blue"></i> Terminal</span>

                <div id="totalT" class="count blue number f-30" data-from="0" data-to="0"><span class="totalterminal"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_terminal"><marquee>...</marquee></span>% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="glyphicon glyphicon-transfer green"></i> Active Transaction</span>

                <div id="totalAT" class="count green number f-30" data-from="0" data-to="0"><span class="totalactivetrx"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_active_trx"><marquee>...</marquee></span>% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator orange"></i> Active Without Transaction</span>
                <div id="totalATW" class="count orange number f-30" data-from="0" data-to="0"><span class="terminalactive"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_active_wo_trx"><marquee>...</marquee></span>% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator red"></i> Inactive</span>

                <div id="terminalI" class="count red number f-30" data-from="0" data-to="0"><span class="terminalinactive"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_terminal_inactive"><marquee>...</marquee></span>% </i> from Total</span>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-content row" style="padding-top: 0; padding-bottom: 0;">
          <div style="width: 3%; padding: 0px; background-color: #ab1313; color: white" class="col-md-1">
            <div class="vertical-text" style="margin: 22px 0px 22px 5px"><center>Last Day</center></div>
          </div>
          <div style="width: 97%; padding: 0px; " class="col-md-11">
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-database blue"></i> Transaction Volume</span>



                <div id="totalTV" class="count blue number f-30"><span class="totaltrxvolume"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class="">Rupiah </i> </span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-retweet blue"></i> Transaction Count</span>

                <div id="totalTC" class="count blue number f-30" data-from="0" data-to="0"><span class="totaltrxcount"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_count"><marquee>...</marquee></span>% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-check-square green"></i> Transaction Success</span>

                <div id="totalTS" class="count green number f-30" data-from="0" data-to="0"><span class="totaltrxsuccess"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_success"><marquee>...</marquee></span>% </i> from Total </span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-times-circle red"></i> Transaction Failed</span>


                <div id="totalTF" class="count red number f-30" data-from="0" data-to="0"><span class="totaltrxfailed"><marquee>...</marquee></span></div>
                <span class="count_bottom"><i class=""><span class="total_trx_percent_failed"><marquee>...</marquee></span>% </i> from Total </span>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-header" style="border-bottom: none;">
          <h3><strong>On-us off-us Transaction Volume</strong> Percentage - Last Month</h3>
        </div>


        <div class="panel-content row" style="padding-top: 0;">
          <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count hov_effect">
            <div class="row">
              <span class="onus_offus_chart"><marquee>...</marquee></span>
            </div>
          </div>
        </div>


      </div>
    </div>

    <!--<div class="row tile_count">

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Acquirer Transaction Volume</strong> Charts</h3>
        <div>
          <a id="hide-loading1" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Acquirer Transaction Count</strong> Charts</h3>
        <div>
          <a id="hide-loading2" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>-->


    <!-- TOP 5 MERCHANT -->
    <div class="row tile_count">

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Merchant Highest Transaction Volume</strong> Charts</h3>
        <div>
          <a id="hide-loading3" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="mer_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Merchant Highest Transaction Count</strong> Charts</h3>
        <div>
          <a id="hide-loading4" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="mer_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>


    <!-- TOP 5 CARDTYPE -->
    <div class="row tile_count">

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Card Type</strong> Charts</h3>
        <div>
          <a id="hide-loading5" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="ctp_top5trxvolume_chart"  class="full" height="100"></canvas>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Card Type</strong> Charts</h3>
        <div>
          <a id="hide-loading6" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="ctp_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>


    <!-- TOP 5 TRXTYPE -->
    <div class="row tile_count">

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Transaction Type</strong> Charts</h3>
        <div>
          <a id="hide-loading7" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="ttp_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Count By Transaction Type</strong> Charts</h3>
        <div>
          <a id="hide-loading8" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
            <span> Loading...</span>
          </a>
          <canvas id="ttp_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
      <script src="<?php echo e(asset('assets/plugins/maps-amcharts/ammap/ammap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/countup/countUp.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/chartjs/Chart.min.js')); ?>"></script>

    <script type="text/javascript">

        $('.panel-header-section').click(function() {
            $(this).toggleClass("closed").parents(".panel:first").find(".panel-content").slideToggle();
            $(this).find(".svg-inline--fa.icon").slideToggle();
        });

    </script>

    <script type="text/javascript">

    function numberWithCommas(x)
    {
      x = x.toString();
      var pattern = /(-?\d+)(\d{3})/;
      while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
      return x;
    }

    animateNumber();

    $(document).ready(function()
    {
      $("#hide-loading1").css("display", "inline");
      $("#hide-loading2").css("display", "inline");
      $("#hide-loading3").css("display", "inline");
      $("#hide-loading4").css("display", "inline");
      $("#hide-loading5").css("display", "inline");
      $("#hide-loading6").css("display", "inline");
      $("#hide-loading7").css("display", "inline");
      $("#hide-loading8").css("display", "inline");

      $.ajax({
        url: "/dashboard_acquirer/data_dashboard_acquirer",
        method: "GET",
        success: function(data)
        {
          var totalterminal = data.total_terminal;
          var totalactivetrx = data.total_active_trx;
          var totalactivewotrx = data.total_active_wo_trx;
          var terminalactive = data.terminal_active;
          var terminalinactive = data.terminal_inactive;
          var totaltrxvolume = data.total_trx_volume;

        /*  if(totaltrxvolume.length > 10)
          {
            totaltrxvolume = totaltrxvolume.slice(0, -6);
            var symbol = 'M';
          }
          else if(totaltrxvolume > 7)
          {
            totaltrxvolume = totaltrxvolume.slice(0, -3);
            var symbol = 'K';
          }
          else
          {
            var symbol = '';
          }

          totaltrxvolume = totaltrxvolume.concat(symbol);*/

          if(totaltrxvolume >= 1000000000)
          {
            totaltrxvolume = (Math.round((totaltrxvolume/1000000000) * 100) / 100) +' B';
          }
          else if(totaltrxvolume >= 1000000)
          {
            totaltrxvolume = totaltrxvolume/1000000+'M';
          }
          else if(totaltrxvolume >= 1000)
          {
            totaltrxvolume = totaltrxvolume/1000+'K';
          }
          else
          {
            totaltrxvolume = totaltrxvolume;
          }

          var totaltrxcount = data.total_trx_count;
          var totaltrxsuccess = data.total_trx_success;
          var totaltrxfailed = data.total_trx_failed;

          if(totalterminal != 0)
          {
            var total_terminal_percent = Math.round(((totalterminal / totalterminal) * 100) * 100) / 100;
            var total_active_transaction_percent = Math.round(((totalactivetrx / totalterminal) * 100) * 100) / 100;
            var total_active_wo_transaction_percent = Math.round(((totalactivewotrx / totalterminal) * 100) * 100) / 100;
            var total_active_terminal_percent = Math.round(((terminalactive / totalterminal) * 100) * 100) / 100;
            var total_inactive_terminal_percent = Math.round(((terminalinactive / totalterminal) * 100) * 100) / 100;

          }
          else
          {
            var total_terminal_percent = 100;
            var total_active_transaction_percent = 100;
            var total_active_wo_transaction_percent = 100;
            var total_active_terminal_percent = 100;
            var total_inactive_terminal_percent = 100;
          }

          if(totaltrxcount != 0)
          {
            var total_trx_percent = Math.round(((totaltrxcount / totaltrxcount) * 100) * 10) / 10;
            var total_trx_success_percent = Math.round(((totaltrxsuccess / totaltrxcount) * 100) * 10) / 10;
            var total_trx_failed_percent = Math.round(((totaltrxfailed / totaltrxcount) * 100) * 10) / 10;
          }
          else
          {
            var total_trx_percent = 100;
            var total_trx_success_percent = 100;
            var total_trx_failed_percent = 100;
          }

          totaltrxvolume = numberWithCommas(totaltrxvolume);
          totalterminal = numberWithCommas(totalterminal);
          totalactivetrx = numberWithCommas(totalactivetrx);
          totalactivewotrx = numberWithCommas(totalactivewotrx);
          terminalactive = numberWithCommas(terminalactive);
          terminalinactive = numberWithCommas(terminalinactive);
          totaltrxcount = numberWithCommas(totaltrxcount);
          totaltrxsuccess = numberWithCommas(totaltrxsuccess);
          totaltrxfailed = numberWithCommas(totaltrxfailed);

          var offus_trxcount = parseInt(data.offus_trxcount);
          var onus_trxcount = parseInt(data.onus_trxcount);
          var offus_trxvolume = parseInt(data.offus_trxvolume);
          var onus_trxvolume = parseInt(data.onus_trxvolume);

          // var offus_trxcount = 643563;
          // var onus_trxcount = 64354;
          // var offus_trxvolume = 3245676846;
          // var onus_trxvolume = 643254233;

          var total_offus_onus = parseInt(offus_trxvolume) + parseInt(onus_trxvolume);

          if(total_offus_onus == 0)
          {
            var total_offus_onus_percent = 100;
            var total_offus_percent = "No data";
            var total_onus_percent = 0;

            var class_offus = "col-sm-12";
            var class_onus = "col-sm-0";
            var style_offus = "";
            var style_onus = "";
          }
          else
          {
            var total_offus_onus_percent = Math.round((total_offus_onus / total_offus_onus) * 100);
            var total_offus_percent = Math.round((offus_trxvolume / total_offus_onus) * 100);
            var total_onus_percent = Math.round((onus_trxvolume / total_offus_onus) * 100);

            if (total_offus_percent == 100 && onus_trxvolume != 0)
            {
              total_offus_percent = 99;
              total_onus_percent = 1;
            }
            if (total_onus_percent == 100 && offus_trxvolume != 0)
            {
              total_onus_percent = 99;
              total_offus_percent = 1;
            }

            var class_offus = "col-sm-6 p-r-0";
            var class_onus = "col-sm-6 p-l-0";
            var style_offus = "padding-left: 0px";
            var style_onus = "padding-right: 0px";
          }

          // console.log(total_offus_onus);
          // console.log(offus_trxvolume);
          // console.log(onus_trxvolume);
          // console.log(total_offus_onus_percent);
          // console.log(total_offus_percent);
          // console.log(total_onus_percent);

          $(".totalterminal").text(totalterminal);
          $(".totalactivetrx").text(totalactivetrx);
          $(".totalactivewotrx").text(totalactivewotrx);
          $(".terminalactive").text(terminalactive);
          $(".terminalinactive").text(terminalinactive);
          $(".totaltrxvolume").text(totaltrxvolume);
          $(".totaltrxcount").text(totaltrxcount);
          $(".totaltrxsuccess").text(totaltrxsuccess);
          $(".totaltrxfailed").text(totaltrxfailed);

          $(".total_trx_percent_terminal").text(total_terminal_percent);
          $(".total_trx_percent_active_trx").text(total_active_transaction_percent);
          $(".total_trx_percent_active_wo_trx").text(total_active_wo_transaction_percent);
          //$(".total_trx_percent_terminal_active").text(total_active_terminal_percent);
          $(".total_trx_percent_terminal_inactive").text(total_inactive_terminal_percent);
          $(".total_trx_percent_count").text(total_trx_percent);
          $(".total_trx_percent_success").text(total_trx_success_percent);
          $(".total_trx_percent_failed").text(total_trx_failed_percent);

          var html_onus_offuschart = "";
          if(total_offus_onus == 0)
          {
            htmlonus_offus_chart = '<div class="' + class_offus +'" style="width:100%; padding-left: 80px; padding-right: 80px">' + '<div style="border-radius: 0px; height: 28px">' + '<div id="offus_onus_nodata" class="back-gray t-center f-16" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">'+ '0%' + '</div>' + '</div>' + '</div>'
          }
          else
          {
            htmlonus_offus_chart = '<div class="'+ class_offus +'" style="width:7%;height:22.85px;text-align: right;"><strong>On Us &nbsp;</strong></div><div class="'+ class_onus +'" style="width:' + (total_onus_percent * (86/100)) + '%;' + style_onus +'">' + '<div style="border-radius: 0px; height: 28px">' + '<div id="onus_data" class="heavy-blue t-center f-16" role="progressbar" aria-valuenow="' + total_onus_percent + '" aria-valuemin="0" aria-valuemax="100" style="width:100%">' + total_onus_percent + '%' + '</div>' + '</div>' + '</div>' + '<div class="' + class_offus + '" style="width:' + (total_offus_percent * (86/100)) +'%;' + style_offus + '">'+ '<div style="border-radius: 0px; height: 28px">' + '<div id="offus_data" class="dark-gray t-center f-16" role="progressbar" aria-valuenow="' + total_offus_percent +'" aria-valuemin="0" aria-valuemax="100" style="width:100%">' + total_offus_percent + '%' +'</div>' + '</div>' + '</div><div class="'+ class_onus +'" style="width:7%;height:22.85px;' + style_onus +'"><strong> &nbsp; Off Us</strong></div>';
          }
          $(".onus_offus_chart").html(htmlonus_offus_chart);

          $('#offus_onus_nodata').tooltip({title: "No data", animation: true});
          $('#offus_data').tooltip({title: "Off Us | Count: "+ offus_trxcount +" | Volume: Rp. "+ numberWithCommas(offus_trxvolume), animation: true});
          $('#onus_data').tooltip({title: "On Us | Count: "+ onus_trxcount +" | Volume: Rp. "+ numberWithCommas(onus_trxvolume), animation: true});
        },
        error: function(data) {
        	console.log(data);
        }
        });

        /*$.ajax({
          url: "/dashboard_acquirer/trxvolume",
          method: "GET",
          success: function(data)
          {
            var color = Chart.helpers.color;

            function randomScalingFactor() {
              return Math.floor((Math.random() * 1000000) + 1);
            }

            var MONTHS = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            var arr_month = [];
            var value = [];

            var time = new Date();

            var curr_month      = time.getMonth();
            var last_month      = time.getMonth()-1;
            var curr_year       = time.getFullYear()-1;
            var str_year        = curr_year.toString().substr(2);

            //console.log(curr_year);

            for (var i = 1; i < MONTHS.length; i++)
            {
                curr_month = curr_month + 1;

                if (curr_month == 13) {
                    curr_month = 1;
                    curr_year = time.getFullYear();
                    str_year = curr_year.toString().substr(2);
                }

                arr_month.push( MONTHS[curr_month]+" '"+str_year );
                value.push( randomScalingFactor() );
            }

            var trxvolume_data = {
              labels: arr_month,
              datasets: [{
                label: "A",
                backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: value
              }]

            };

            var trxvolume_chart = document.getElementById('trxvolume_chart').getContext('2d');
            window.myBar = new Chart(trxvolume_chart, {
              type: 'bar',
              data: trxvolume_data,
              options: {
                responsive: true,
                legend: {
                  display: false,
                  position: 'top',
                },
                title: {
                  display: false,
                  text: 'Chart.js Bar Chart'
                },
                scales: {
                  yAxes: [
                    {
                      ticks: {
                        callback: function(label, index, labels) {
                          if(label >= 1000000000){
                            return label/1000000000+'B';
                          }else if(label >= 1000000){
                            return label/1000000+'M';
                          }else if(label >= 1000){
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
                      return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                      });
                    }
                  }
                }
              }
            });
            $("#hide-loading1").css("display", "none");
          },
          error: function(data) {
          	console.log(data);
          }
          });

        $.ajax({
          url: "/dashboard_acquirer/trxcount",
          method: "GET",
          success: function(data)
          {
            var color = Chart.helpers.color;

            function randomScalingFactor() {
              return Math.floor((Math.random() * 1000000) + 1);
            }

            var MONTHS = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            var arr_month = [];
            var value = [];

            var time = new Date();

            var curr_month      = time.getMonth();
            var last_month      = time.getMonth()-1;
            var curr_year       = time.getFullYear()-1;
            var str_year        = curr_year.toString().substr(2);

            //console.log(curr_year);

            for (var i = 1; i < MONTHS.length; i++)
            {
                curr_month = curr_month + 1;

                if (curr_month == 13) {
                    curr_month = 1;
                    curr_year = time.getFullYear();
                    str_year = curr_year.toString().substr(2);
                }

                arr_month.push( MONTHS[curr_month]+" '"+str_year );
                value.push( randomScalingFactor() );
            }

            var trxcount_data = {
              labels: arr_month,
              datasets: [{
                label: "A",
                backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: value
              }]

            };

            var trxcount_chart = document.getElementById('trxcount_chart').getContext('2d');
            window.myBar = new Chart(trxcount_chart, {
              type: 'bar',
              data: trxcount_data,
              options: {
                responsive: true,
                legend: {
                  display: false,
                  position: 'top',
                },
                title: {
                  display: false,
                  text: 'Chart.js Bar Chart'
                },
                scales: {
                  yAxes: [
                    {
                      ticks: {
                        callback: function(label, index, labels) {
                          if(label >= 1000000000){
                            return label/1000000000+'B';
                          }else if(label >= 1000000){
                            return label/1000000+'M';
                          }else if(label >= 1000){
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
                      return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                      });
                    }
                  }
                }
              }
            });
            $("#hide-loading2").css("display", "none");
          },
          error: function(data) {
            console.log(data);
          }
        });*/

          $.ajax({
            url: "/dashboard_acquirer/top5mer_trxvolume",
            method: "GET",
            success: function(data)
            {

              var mer_top5trxvolume_data = {
                labels: data.label,
                datasets: data.dataset_list
              };

              var mer_top5trxvolume = document.getElementById('mer_top5trxvolume_chart').getContext('2d');
              window.myBar = new Chart(mer_top5trxvolume, {
                type: 'bar',
                data: mer_top5trxvolume_data,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                  },
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            if(label >= 1000000000){
                              return label/1000000000+'B';
                            }else if(label >= 1000000){
                              return label/1000000+'M';
                            }else if(label >= 1000){
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
                        return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                          return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                      }
                    }
                  }
                }
              });
              $("#hide-loading3").css("display", "none");
            },
            error: function(data) {
              console.log(data);
            }
            });

    $.ajax({
      url: "/dashboard_acquirer/top5mer_trxcount",
      method: "GET",
      success: function(data)
      {
        var mer_top5trxcount_data = {
          labels: data.label,
          datasets: data.dataset_list
        };

        var mer_top5trxcount = document.getElementById('mer_top5trxcount_chart').getContext('2d');
        window.myBar = new Chart(mer_top5trxcount, {
          type: 'bar',
          data: mer_top5trxcount_data,
          options: {
            responsive: true,
            legend: {
              position: 'top',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            },
            scales: {
              yAxes: [
                {
                  ticks: {
                    callback: function(label, index, labels) {
                      if(label >= 1000000000){
                        return label/1000000000+'B';
                      }else if(label >= 1000000){
                        return label/1000000+'M';
                      }else if(label >= 1000){
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
                  return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                  });
                }
              }
            }
          }
        });
        $("#hide-loading4").css("display", "none");
      },
      error: function(data) {
        console.log(data);
      }
      });

          $.ajax({
            url: "/dashboard_acquirer/top5ctp_trxvolume",
            method: "GET",
            success: function(data)
            {
              var ctp_top5trxvolume_data = {
                labels: data.label,
                datasets: data.dataset_list
              };

              var ctp_top5trxvolume = document.getElementById('ctp_top5trxvolume_chart').getContext('2d');
              window.myBar = new Chart(ctp_top5trxvolume, {
                type: 'bar',
                data: ctp_top5trxvolume_data,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                  },
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            if(label >= 1000000000){
                              return label/1000000000+'B';
                            }else if(label >= 1000000){
                              return label/1000000+'M';
                            }else if(label >= 1000){
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
                        return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                          return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                      }
                    }
                  }
                }
              });

              $("#hide-loading5").css("display", "none");
            },
            error: function(data) {
              console.log(data);
            }
            });

          $.ajax({
            url: "/dashboard_acquirer/top5ctp_trxcount",
            method: "GET",
            success: function(data)
            {
              var ctp_top5trxcount_data = {
                labels: data.label,
                datasets: data.dataset_list
              };

              var ctp_top5trxcount = document.getElementById('ctp_top5trxcount_chart').getContext('2d');
              window.myBar = new Chart(ctp_top5trxcount, {
                type: 'bar',
                data: ctp_top5trxcount_data,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                  },
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            if(label >= 1000000000){
                              return label/1000000000+'B';
                            }else if(label >= 1000000){
                              return label/1000000+'M';
                            }else if(label >= 1000){
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
                        return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                          return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                      }
                    }
                  }
                }
              });
              $("#hide-loading6").css("display", "none");
            },
            error: function(data) {
              console.log(data);
            }
            });

          $.ajax({
            url: "/dashboard_acquirer/top5ttp_trxvolume",
            method: "GET",
            success: function(data)
            {
              var ttp_top5trxvolume_data = {
                labels: data.label,
                datasets: data.dataset_list
              };

              var ttp_top5trxvolume = document.getElementById('ttp_top5trxvolume_chart').getContext('2d');
              window.myBar = new Chart(ttp_top5trxvolume, {
                type: 'bar',
                data: ttp_top5trxvolume_data,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                  },
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            if(label >= 1000000000){
                              return label/1000000000+'B';
                            }else if(label >= 1000000){
                              return label/1000000+'M';
                            }else if(label >= 1000){
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
                        return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                          return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                      }
                    }
                  }
                }
              });
              $("#hide-loading7").css("display", "none");
            },
            error: function(data) {
              console.log(data);
            }
            });

          $.ajax({
            url: "/dashboard_acquirer/top5ttp_trxcount",
            method: "GET",
            success: function(data)
            {
              var ttp_top5trxcount_data = {
                labels: data.label,
                datasets: data.dataset_list
              };

              var ttp_top5trxcount = document.getElementById('ttp_top5trxcount_chart').getContext('2d');
              window.myBar = new Chart(ttp_top5trxcount, {
                type: 'bar',
                data: ttp_top5trxcount_data,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: false,
                    text: 'Chart.js Bar Chart'
                  },
                  scales: {
                    yAxes: [
                      {
                        ticks: {
                          callback: function(label, index, labels) {
                            if(label >= 1000000000){
                              return label/1000000000+'B';
                            }else if(label >= 1000000){
                              return label/1000000+'M';
                            }else if(label >= 1000){
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
                        return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                          return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                        });
                      }
                    }
                  }
                }
              });
              $("#hide-loading8").css("display", "none");
            },
            error: function(data) {
              console.log(data);
            }
            });

    });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>