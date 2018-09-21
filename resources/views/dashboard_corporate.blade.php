@extends('layout')      

@section('content')
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
        <h2><i class="fas fa-home"></i> <strong>Corporate</strong></h3>
    </div>

    <?php
      if ($total_trx_count != 0) {
        $total_trx_percent         = round($total_trx_count / $total_trx_count * 100);
        $total_trx_success_percent = round($total_trx_success / $total_trx_count * 100);
        $total_trx_failed_percent  = round($total_trx_failed / $total_trx_count * 100);
      }else{
        $total_trx_percent         = 100;
        $total_trx_success_percent = 100;
        $total_trx_failed_percent  = 100;
      }
    ?>

    <div class="row tile_count">
      <div class="panel transparent" style="margin-bottom: 0px">
        <div class="panel-header" style="border-bottom: none;">
          <h3><strong>Corporate </strong> Summary</h3>
        </div>
        <div class="panel-content row" style="padding-top: 0; padding-bottom: 0">
          <div style="width: 3%; padding: 0px;" class="col-md-1"> <!-- background-color: #ab1313; color: white -->
            <!-- <div class="vertical-text" style="margin: 20px 0px 20px 5px"><center>Last Day</center></div> -->
          </div>
          <div style="width: 97%; padding: 0px; " class="col-md-11">
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left" style="border-left: none;"></div>
              <div class="right">
                <span class="count_top f-16"><svg aria-hidden="true" data-prefix="fas" data-icon="school" class="svg-inline--fa fa-school fa-w-16 blue" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"></path></svg> Merchant</span>

                <?php
                  if( $total_merchant == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count blue number f-30 {{ $class }}" data-from="0" data-to="{{ $total_merchant }}">{{ $total_merchant }}</div>
                <!-- <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span> -->
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top f-16"><i class="fa fa-sitemap blue"></i> Branch</span>

                <?php
                  if( $total_branch == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count blue number f-30 {{ $class }}" data-from="0" data-to="{{ $total_branch }}">{{ $total_branch }}</div>
                <!-- <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span> -->
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top f-16"><svg aria-hidden="true" data-prefix="fas" data-icon="store" class="svg-inline--fa fa-store fa-w-16 blue" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616 512"><path fill="currentColor" d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"></path></svg> Store</span>

                <?php
                  if( $total_store == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count blue number f-30 {{ $class }}" data-from="0" data-to="{{ $total_store }}">{{ $total_store }}</div>
                <!-- <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span> -->
              </div>
            </div>
          </div>
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

                <?php
                  if( $total_terminal == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count blue number f-30 {{ $class }}" data-from="0" data-to="{{ $total_terminal }}">{{ $total_terminal }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="glyphicon glyphicon-transfer orange"></i> Active Transaction</span>

                <?php
                  if( $total_trx_count == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count orange number f-30 {{ $class }}" data-from="0" data-to="{{ $total_trx_count }}">{{ $total_trx_count }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator green"></i> Active</span>

                <?php
                  if( $terminal_active == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count green number f-30 {{ $class }}" data-from="0" data-to="{{ $terminal_active }}">{{ $terminal_active }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-calculator red"></i> Inactive</span>

                <?php
                  if( $terminal_inactive == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count red number f-30 {{ $class }}" data-from="0" data-to="{{ $terminal_inactive }}">{{ $terminal_inactive }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span>
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

                <?php
                  if( $total_trx_volume == 0 ) { $class = ''; } else { $class = ''; }
                  if( strlen($total_trx_volume) > 10 ) { $total_trx_volume = substr($total_trx_volume, 0, -6); $symbol = 'M'; } 
                  else if ( strlen($total_trx_volume) > 7 ) { $total_trx_volume = substr($total_trx_volume, 0, -3); $symbol = 'K'; } 
                  else { $symbol = ''; }
                ?>

                <div class="count blue number f-30 {{ $class }}">{{ number_format($total_trx_volume).$symbol }}</div>
                <span class="count_bottom"><i class="">Rupiah </i> </span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-retweet orange"></i> Transaction Count</span>

                <?php
                  if( $total_trx_count == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count orange number f-30 {{ $class }}" data-from="0" data-to="{{ $total_trx_count }}">{{ $total_trx_count }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_percent }}% </i> from Total</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-check-square green"></i> Transaction Success</span>

                <?php
                  if( $total_trx_success == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count green number f-30 {{ $class }}" data-from="0" data-to="{{ $total_trx_success }}">{{ $total_trx_success }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_success_percent }}% </i> from Total </span>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 tile_stats_count hov_effect">
              <div class="left"></div>
              <div class="right">
                <span class="count_top"><i class="fa fa-times-circle red"></i> Transaction Failed</span>

                <?php
                  if( $total_trx_failed == 0 ) { $class = ''; } else { $class = 'countup'; }
                ?>

                <div class="count red number f-30 {{ $class }}" data-from="0" data-to="{{ $total_trx_failed }}">{{ $total_trx_failed }}</div>
                <span class="count_bottom"><i class="">{{ $total_trx_failed_percent }}% </i> from Total </span>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-header" style="border-bottom: none;">
          <h3><strong>On-us off-us Transaction</strong> Percentage - Last Month</h3>
        </div>

        <?php

          $total_offus_onus = $offus_trxcount+$onus_trxcount;

          if ($total_offus_onus == 0) {

            $total_offus_onus_percent   = 100;
            $total_offus_percent        = "No data";
            $total_onus_percent         = 0;
            
            $class_offus  = "col-sm-12";
            $class_onus   = "col-sm-0";
            $style_offus  = "";
            $style_onus   = "";
          
          }else{

            $total_offus_onus_percent   = round($total_offus_onus / $total_offus_onus * 100);
            $total_offus_percent        = round($offus_trxcount / $total_offus_onus * 100);
            $total_onus_percent         = round($onus_trxcount / $total_offus_onus * 100);

            $class_offus  = "col-sm-6 p-r-0";
            $class_onus   = "col-sm-6 p-l-0";
            $style_offus  = "padding-left: 80px";
            $style_onus   = "padding-right: 80px";
          }
        ?>

        <div class="panel-content row" style="padding-top: 0;">
          <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count hov_effect">
            <div class="row">
                @if($total_offus_onus == 0)
                <div class="{{ $class_offus }}" style="width:100%; padding-left: 80px; padding-right: 80px">
                    <div style="border-radius: 0px; height: 28px">
                        <div id="offus_onus_nodata" class="back-gray t-center f-16" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            0%
                        </div>
                    </div>
                </div>
                @else
                <div class="{{ $class_offus }}" style="width:{{ $total_offus_percent}}%;{{ $style_offus }}">
                    <div style="border-radius: 0px; height: 28px">
                        <div id="offus_data" class="back-green t-center f-16" role="progressbar" aria-valuenow="{{ $total_offus_percent }}" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $total_offus_percent }}%
                        </div>
                    </div>
                </div>
                <div class="{{ $class_onus }}" style="width:{{ $total_onus_percent}}%;{{ $style_onus }}">
                    <div style="border-radius: 0px; height: 28px">
                        <div id="onus_data" class="back-red t-center f-16" role="progressbar" aria-valuenow="{{ $total_onus_percent }}" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            {{ $total_onus_percent }}%
                        </div>
                    </div>
                </div>
                @endif
            </div>
          </div>
        </div>
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
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Corporate Transaction Volume</strong> Charts</h3>
        <div>
          <canvas id="trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Corporate Transaction Count</strong> Charts</h3>
        <div>
          <canvas id="trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>

    <!-- TOP 5 ACQUIRER -->
    <div class="row tile_count">
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Acquirer Highest Transaction Volume</strong> Charts</h3>
        <div>
          <canvas id="acq_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Acquirer Highest Transaction Count</strong> Charts</h3>
        <div>
          <canvas id="acq_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>


    <!-- TOP 5 MERCHANT -->
    <div class="row tile_count">
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Merchant Highest Transaction Volume</strong> Charts</h3>
        <div>
          <canvas id="mer_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Merchant Highest Transaction Count</strong> Charts</h3>
        <div>
          <canvas id="mer_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>


    <!-- TOP 5 CARDTYPE -->
    <div class="row tile_count">
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Card Type</strong> Charts</h3>
        <div>
          <canvas id="ctp_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Card Type</strong> Charts</h3>
        <div>
          <canvas id="ctp_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>

    <!-- TOP 5 TRXTYPE -->
    <div class="row tile_count">
      
      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Volume By Transaction Type</strong> Charts</h3>
        <div>
          <canvas id="ttp_top5trxvolume_chart"  class="full" height="100"/>
        </div>
      </div>

      <div class="col-md-6 hov_effect" style="padding-left: 20px">
        <h3><strong>Top 5 Transaction Count By Transaction Type</strong> Charts</h3>
        <div>
          <canvas id="ttp_top5trxcount_chart" class="full" height="100"></canvas>
        </div>
      </div>

    </div>

   <!-- <div class="row tile_count">
      
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
      
    </div> -->

@endsection

@section('javascript')
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
    <!-- <script src="{{ asset('assets/plugins/Highcharts-6.1.1/code/js/highcharts.js') }}"></script>  -->
    <!-- <script src="{{ asset('assets/plugins/charts-highstock/js/highstock.min.js') }}"></script>  -->
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

    var last_month      = 8;
    // var last_month      = <?php // echo json_encode($last_month); ?>;
    // var top5high_amount   = <?php // echo json_encode($top5high_amount); ?>;
    // var top5low_amount    = <?php // echo json_encode($top5low_amount); ?>;
    // var total_trx_cardtype  = <?php // echo json_encode($total_trx_cardtype); ?>;
    // var total_trx_type  = <?php // echo json_encode($total_trx_type); ?>;
    var top5acq_trx_volume  = <?php echo json_encode($top5acq_trx_volume); ?>;
    var top5acq_trx_count  = <?php echo json_encode($top5acq_trx_count); ?>;
    var top5mer_trx_volume  = <?php echo json_encode($top5mer_trx_volume); ?>;
    var top5mer_trx_count  = <?php echo json_encode($top5mer_trx_count); ?>;
    var top5ctp_trx_volume  = <?php echo json_encode($top5ctp_trx_volume); ?>;
    var top5ctp_trx_count  = <?php echo json_encode($top5ctp_trx_count); ?>;
    var top5ttp_trx_volume  = <?php echo json_encode($top5ttp_trx_volume); ?>;
    var top5ttp_trx_count  = <?php echo json_encode($top5ttp_trx_count); ?>;
    
    // console.log(total_amount);

    // console.log(top5high_amount);

    function randomScalingFactor() {
      return Math.floor((Math.random() * 1000000) + 1);
    }


    var MONTHS = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var arr_month = [];
    var value = [];

    var color = Chart.helpers.color;

    var time = new Date();

    var curr_month = time.getMonth();
    var curr_year = time.getFullYear()-1;
    var str_year = curr_year.toString().substr(2);

    console.log(curr_year);

    for (var i = 1; i < MONTHS.length; i++) {
        
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


    /*
        ================DATA ACQUIRER================
    */
    var acq_top5trxvolume_data = {
      labels: top5acq_trx_volume.label,
      datasets: top5acq_trx_volume.dataset_list
    };
   
    var acq_top5trxcount_data = {
      labels: top5acq_trx_count.label,
      datasets: top5acq_trx_count.dataset_list
    };


    /*
        ================DATA MERCHANT================
    */
    var mer_top5trxvolume_data = {
      labels: top5mer_trx_volume.label,
      datasets: top5mer_trx_volume.dataset_list
    };

    var mer_top5trxcount_data = {
      labels: top5mer_trx_count.label,
      datasets: top5mer_trx_count.dataset_list
    };


    /*
        ================DATA CARDTYPE================
    */
    var ctp_top5trxvolume_data = {
      labels: top5ctp_trx_volume.label,
      datasets: top5ctp_trx_volume.dataset_list
    };
   
    var ctp_top5trxcount_data = {
      labels: top5ctp_trx_count.label,
      datasets: top5ctp_trx_count.dataset_list
    };


    /*
        ================DATA TRXTYPE================
    */
    var ttp_top5trxvolume_data = {
      labels: top5ttp_trx_volume.label,
      datasets: top5ttp_trx_volume.dataset_list
    };
   
    var ttp_top5trxcount_data = {
      labels: top5ttp_trx_count.label,
      datasets: top5ttp_trx_count.dataset_list
    };


    /*
        ================DATA TOTAL CARDTYPE================
    */
    // var trx_bycardtype_data = {
    //   labels: [ MONTHS[last_month-2], MONTHS[last_month-1], MONTHS[last_month] ],
    //   datasets: [{
    //     label: "A",
    //     backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.red,
    //     borderWidth: 1,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: "B",
    //     backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.orange,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: "C",
    //     backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.yellow,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: "D",
    //     backgroundColor: color(window.chartColors.blue).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.blue,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: "E",
    //     backgroundColor: color(window.chartColors.green).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.green,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }]

    // };


    // /*
    //     ================DATA TOTAL TRXTYPE================
    // */
    // var trx_bytype_data = {
    //   labels: [ MONTHS[last_month-2], MONTHS[last_month-1], MONTHS[last_month] ],
    //   datasets: [{
    //     label: ['Sale'],
    //     backgroundColor: color(window.chartColors.red).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.red,
    //     borderWidth: 1,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: ['Prepaid Sale'],
    //     backgroundColor: color(window.chartColors.orange).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.orange,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }, {
    //     label: ['Prepaid Top Up'],
    //     backgroundColor: color(window.chartColors.yellow).alpha(0.9).rgbString(),
    //     borderColor: window.chartColors.yellow,
    //     data: [ randomScalingFactor(), randomScalingFactor(), randomScalingFactor() ]
    //   }]

    // };

    /*var amount_top5highdata = {
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

    };*/


    window.onload = function() {

      $('#offus_onus_nodata').tooltip({title: "No data", animation: true}); 
      $('#offus_data').tooltip({title: "Count: {{ $offus_trxcount }} | Volume: Rp. {{ number_format($offus_trxvolume) }}", animation: true}); 
      $('#onus_data').tooltip({title: "Count: {{ $onus_trxcount }} | Volume: Rp. {{ number_format($onus_trxvolume) }}", animation: true}); 

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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });

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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });


      /*
        =========================ACQUIRER========================
      */
      var acq_top5trxvolume = document.getElementById('acq_top5trxvolume_chart').getContext('2d');
      window.myBar = new Chart(acq_top5trxvolume, {
        type: 'bar',
        data: acq_top5trxvolume_data,
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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });

      var acq_top5trxcount = document.getElementById('acq_top5trxcount_chart').getContext('2d');
      window.myBar = new Chart(acq_top5trxcount, {
        type: 'bar',
        data: acq_top5trxcount_data,
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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });


      /*
        =========================MERCHANT========================
      */
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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });

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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });


      /*
        =========================CARDTYPE========================
      */
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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });

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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });


      /*
        =========================TRXTYPE========================
      */
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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });

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
                return "Rp" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                  return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
              }
            }
          }
        }
      });
      

      // var chart_trxcardtype     = document.getElementById('trx_cardtype_chart').getContext('2d');
      // var ctx_trxcardtype_graph = new Chart(chart_trxcardtype, {
      //   type: 'horizontalBar',
      //   data: trx_bycardtype_data,
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
      //     },
      //     scales: {
      //       xAxes: [
      //         {
      //           ticks: {
      //             callback: function(label, index, labels) {
      //               if(label > 1000000000){
      //                 return label/1000000000+'B';  
      //               }else if(label > 1000000){
      //                 return label/1000000+'M';  
      //               }else if(label > 1000){
      //                 return label/1000+'K';
      //               }else{
      //                 return label;
      //               }
                    
      //             }
      //           },
      //           scaleLabel: {
      //             display: true,
      //             labelString: 'Value'
      //           }
      //         }
      //       ]
      //     },
      //     tooltips: {
      //       callbacks: {
      //         label: function(tooltipItem, data) {
      //           return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
      //             return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      //           });
      //         }
      //       }
      //     }
      //   }
      // });

      // var chart_trxtype     = document.getElementById('trx_type_chart').getContext('2d');
      // var ctx_trxtype_graph = new Chart(chart_trxtype, {
      //   type: 'horizontalBar',
      //   data: trx_bytype_data,
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
      //     },
      //     scales: {
      //       xAxes: [
      //         {
      //           ticks: {
      //             callback: function(label, index, labels) {
      //               if(label > 1000000000){
      //                 return label/1000000000+'B';  
      //               }else if(label > 1000000){
      //                 return label/1000000+'M';  
      //               }else if(label > 1000){
      //                 return label/1000+'K';
      //               }else{
      //                 return label;
      //               }
                    
      //             }
      //           },
      //           scaleLabel: {
      //             display: true,
      //             labelString: 'Value'
      //           }
      //         }
      //       ]
      //     },
      //     tooltips: {
      //       callbacks: {
      //         label: function(tooltipItem, data) {
      //           return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
      //             return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      //           });
      //         }
      //       }
      //     }
      //   }
      // });

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

      // var chart_line = document.getElementById('cardtype_chart').getContext('2d');
      // window.myLine = new Chart(chart_line, config);

      // var chart_bar = document.getElementById('trxtype_chart').getContext('2d');
      // window.myBar = new Chart(chart_bar, {
      //   type: 'bar',
      //   data: barChartData,
      //   options: {
      //     responsive: true,
      //     legend: {
      //       position: 'top',
      //     },
      //     title: {
      //       display: false,
      //       text: 'Chart.js Bar Chart'
      //     }
      //   }
      // });
      

    //   var chart_hightrx = document.getElementById('trx_top5high_chart').getContext('2d');
    //   window.myHorizontalBar = new Chart(chart_hightrx, {
    //     type: 'horizontalBar',
    //     data: trx_top5highdata,
    //     options: {
    //       // Elements options apply to all of the options unless overridden in a dataset
    //       // In this case, we are setting the border of each horizontal bar to be 2px wide
    //       elements: {
    //         rectangle: {
    //           borderWidth: 2,
    //         }
    //       },
    //       responsive: true,
    //       legend: {
    //         position: 'bottom',
    //       },
    //       title: {
    //         display: false,
    //         text: 'Chart.js Horizontal Bar Chart'
    //       }
    //     }
    //   });

    //   var chart_lowtrx = document.getElementById('trx_top5low_chart').getContext('2d');
    //   window.myHorizontalBar = new Chart(chart_lowtrx, {
    //     type: 'horizontalBar',
    //     data: trx_top5lowdata,
    //     options: {
    //       // Elements options apply to all of the options unless overridden in a dataset
    //       // In this case, we are setting the border of each horizontal bar to be 2px wide
    //       elements: {
    //         rectangle: {
    //           borderWidth: 2,
    //         }
    //       },
    //       responsive: true,
    //       legend: {
    //         position: 'bottom',
    //       },
    //       title: {
    //         display: false,
    //         text: 'Chart.js Horizontal Bar Chart'
    //       }
    //     }
    //   });

    };
    
    </script>
@endsection