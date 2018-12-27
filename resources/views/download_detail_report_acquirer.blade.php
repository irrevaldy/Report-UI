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
      <h2><i class="fas fa-home"></i> <strong>Download Detail Report - Acquirer</strong></h3>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel no-bd bd-3 panel-stat">
        <a href='#' onClick="callTransactionDateFilter()">
          <div class="panel-header">
            <h3><i class="icon-graph"></i> <strong>Filter By Transaction Date &ensp;</strong></h3>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel no-bd bd-3 panel-stat">
        <a href='#' onClick="callSettlementDateFilter()">
          <div class="panel-header">
            <h3><i class="icon-graph"></i> <strong>Filter By Settlement Date &ensp;</strong></h3>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12" id="filterTransactionDate" style="display:none">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>Filter By Transaction Date &ensp;</strong></h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div class="panel-content widget-info">

                <div class="row">
                  <form id="ListReportTable_form" method="POST" action="/download_detail_report_acquirer/filter_report_table">
<!--
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Acquirer</label>
                      <select class="form-control select2 selectAcquirer" name="acquirer_code" id="acquirer_code" style="width: 100%;" required>
                        <option value=""></option>
                      </select>
                        </div>
                  </div>-->

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Range</label>
                      <select class="form-control select2 selectRange" name="range" id="range" style="width: 100%;" required="required" onChange="switchtoMonth(this, '', 'detailHost')">
                        <option></option>
                        <option value="d"> 1 Day </option>
                        <option value="w"> 1 Week </option>
                        <option value="m"> 1 Month </option>
                      </select>
                    </div><!-- /.form-group -->
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1" id='detailHost'>From Date</label>
                      <div class="input-group date">
                        <input type="text" name="date" id="detailDate" class="form-control readonly" placeholder="Select Date" required="required" />
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div><!-- /.input group -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1" id='detailHost1' style="visibility: hidden;">From Date</label>
                      <div class="">
                        <input type="Submit" class="generate btn btn-primary" id="btnSubmitReport" value="Filter List">
                        <a class="hide-loading" style="display: none">
                          <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                          <span> Loading...</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </form>
                </div>

                  <div class="row" id="box-result" style="display:none">
                    <form id="listReport_form" method="POST" action="/download_detail_report_acquirer/zip_list_report">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-bordered" id="tableListReport">
                      <thead>
                        <tr>
                          <th style='width: 5%'>No</th>
                          <th style='width: 50%'>File Name</th>
                          <th style='width: 20%'>Date Modified</th>
                          <th style='width: 20%'>Size</th>
                          <th style='width: 5%'><input name="select_all" value="1" id="example-select-all" type="checkbox" /></th>
                        </tr>
                      </thead>
                    </table>
                    <div>
                      <button type="button" id="btnSubmit">Submit</button>
                    </div>
                    </form>
                  </div>

              </div>
          </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12" id="filterSettlementDate" style="display:none">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>Filter By Settlement Date &ensp;</strong></h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div class="panel-content widget-info">

                <div class="row">
                  <form id="ListReportSettlementTable_form" method="POST" action="/download_detail_report_acquirer/filter_report_table_settlement">
<!--
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Acquirer</label>
                      <select class="form-control select2 selectAcquirer" name="acquirer_code" id="acquirer_code" style="width: 100%;" required>
                        <option value=""></option>
                      </select>
                        </div>
                  </div>-->

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Range</label>
                      <select class="form-control select2 selectRange" name="settlement_range" id="settlement_range" style="width: 100%;" required="required" onChange="switchtoMonth(this, '', 'settlementDetailHost')">
                        <option></option>
                        <option value="d"> 1 Day </option>
                        <option value="w"> 1 Week </option>
                        <option value="m"> 1 Month </option>
                      </select>
                    </div><!-- /.form-group -->
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1" id='settlementDetailHost'>From Date</label>
                      <div class="input-group date">
                        <input type="text" name="settlementDate" id="settlementDetailDate" class="form-control readonly" placeholder="Select Date" required="required" />
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div><!-- /.input group -->
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1" id='detailHost1' style="visibility: hidden;">From Date</label>
                      <div class="">
                        <input type="Submit" class="generate btn btn-primary" id="btnSubmitReportSettlement" value="Filter List">
                        <a class="hide-loading" style="display: none">
                          <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                          <span> Loading...</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </form>
                </div>

                  <div class="row" id="box-result2" style="display:none">
                    <form id="listReportSettlement_form" method="POST" action="/download_detail_report_acquirer/zip_list_report">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-bordered" id="tableListReportSettlement">
                      <thead>
                        <tr>
                          <th style='width: 5%'>No</th>
                          <th style='width: 50%'>File Name</th>
                          <th style='width: 20%'>Date Modified</th>
                          <th style='width: 20%'>Size</th>
                          <th style='width: 5%'><input name="select_all" value="1" id="example-select-all2" type="checkbox" /></th>
                        </tr>
                      </thead>
                    </table>
                    <div>
                      <button type="button" id="btnSubmitSettlement">Submit</button>
                    </div>
                    </form>
                  </div>

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
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>


<script>
function callTransactionDateFilter() {
    var x = document.getElementById("filterTransactionDate");
    var y = document.getElementById("filterSettlementDate");
    if (x.style.display === "none" ) {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }
}
function callSettlementDateFilter() {
    var y = document.getElementById("filterSettlementDate");
    var x = document.getElementById("filterTransactionDate");
    if (y.style.display === "none") {
        y.style.display = "block";
        x.style.display = "none";
    } else {
        y.style.display = "none";
        x.style.display = "none";
    }
}

$(function ()
{
    /*  $(".selectAcquirer").select2({
          placeholder: "Select Acquirer Code",
          allowClear: true
      });*/

       $(".selectRange").select2({
           placeholder: "Select Range",
           allowClear: true
       });
});

function switchtoMonth(id, state, idLabel){
  if(id.value == 'm' && state == 'bank') {
    $('.bankdate').datepicker('remove');
    $('.bankdate').datepicker({
      format: "mm/yyyy",
      autoclose: true,
      todayHighlight: true,
      orientation: 'bottom',
      minViewMode: 1
    });

    document.getElementById(idLabel).innerHTML = 'Month';
  } else if(id.value != 'm' && state == 'bank'){
    $('.bankdate').datepicker('remove');
    $('.bankdate').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true,
      orientation: 'bottom'
    });

    document.getElementById(idLabel).innerHTML = 'Month';
  }else if(id.value == 'm') {
    $('.input-group.date').datepicker('remove');
    $('.input-group.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "mm/yyyy",
        minViewMode: 1,
      orientation: 'auto'
    });

    document.getElementById(idLabel).innerHTML = 'Month';
   } else if(id.value == 'w') {
    $('.input-group.date').datepicker('remove');
    $('.input-group.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "dd/mm/yyyy",
      orientation: 'auto'
    });

    document.getElementById(idLabel).innerHTML = 'End Date';
   } else {
    $('.input-group.date').datepicker('remove');
    $('.input-group.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "dd/mm/yyyy",
      orientation: 'auto'
    });

    document.getElementById(idLabel).innerHTML = 'From Date';
   }
}


$(document).ready(function(){

  $('#example-select-all').prop('checked', true);
  $('#example-select-all2').prop('checked', true);

  var tableListReport = $('#tableListReport').DataTable({
    'columnDefs': [{
         'targets': 2,
         'searchable':false,
         'orderable':false
      }]
  });

  var tableListReportSettlement = $('#tableListReportSettlement').DataTable({
    'columnDefs': [{
         'targets': 2,
         'searchable':false,
         'orderable':false
      }]
  });
/*
  $.ajax({
    dataType: 'JSON',
    type: 'GET',
    url: '/download_detail_report_acquirer/get_list_report',

    success: function (data) {
      tableListReport.clear().draw();

      for (var i = 0; i < data.length; i++)
      {

        var no = i+1;
        var file = data[i].val;
        var datemodified = data[i].datemodified;
        var size = data[i].size;


          var jRow = $('<tr>').append(
              '<td>'+ no +'</td>',
              '<td>'+ file +'</td>',
              '<td>'+ datemodified +'</td>',
              '<td>'+ size +'</td>',
              '<td><input type="checkbox" name="id[]" value="'+ file + '" class="chk"></td>'
              );
          tableListReport.row.add(jRow).draw();

          $('.chk').prop('checked', true);
      }
    }
    });
*/
    // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = tableListReport.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   $('#example-select-all2').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = tableListReportSettlement.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#tableListReport tbody').on('change', 'input[type="checkbox"]', function(){
   // If checkbox is not checked
   if(!this.checked){
      var el = $('#example-select-all').get(0);
      // If "Select all" control is checked and has 'indeterminate' property
      if(el && el.checked && ('indeterminate' in el)){
         // Set visual state of "Select all" control
         // as 'indeterminate'
         el.indeterminate = true;
      }
   }
  });

  // Handle click on checkbox to set state of "Select all" control
  $('#tableListReportSettlement tbody').on('change', 'input[type="checkbox"]', function(){
  // If checkbox is not checked
  if(!this.checked){
     var el = $('#example-select-all2').get(0);
     // If "Select all" control is checked and has 'indeterminate' property
     if(el && el.checked && ('indeterminate' in el)){
        // Set visual state of "Select all" control
        // as 'indeterminate'
        el.indeterminate = true;
     }
  }
 });

  $("#btnSubmit").click(function() {
    var chkArray = [];

    /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
    $(".chk:checked").each(function() {
      chkArray.push($(this).val());
    });

    /* we join the array separated by the comma */
    //var selected;
    //selected = chkArray.join(', ') ;

    console.log(chkArray);
    console.log(chkArray[1]);

    $( "#listReport_form" ).append(
       $('<input>')
          .attr('type', 'hidden')
          .attr('name', 'checkedArray')
          .val(JSON.stringify(chkArray))
    );

    $( "#listReport_form" ).submit();

	});

  $("#btnSubmitSettlement").click(function() {
    var chkArray = [];

    $(".chk:checked").each(function() {
      chkArray.push($(this).val());
    });

    //var selected;
    //selected = chkArray.join(', ') ;

    console.log(chkArray);
    console.log(chkArray[1]);

    $( "#listReportSettlement_form" ).append(
       $('<input>')
          .attr('type', 'hidden')
          .attr('name', 'checkedArray')
          .val(JSON.stringify(chkArray))
    );

    $( "#listReportSettlement_form" ).submit();

	});

});

$("#ListReportTable_form").submit(function(e) {

    e.preventDefault();

    $(".hide-loading").css("display", "inline");

    var x = document.getElementById("box-result");
      x.style.display = "block";

    var tableListReport = $('#tableListReport').DataTable({
    destroy: true,
      'columnDefs': [{
           'targets': 2,
           'searchable':false,
           'orderable':false,
        }]
    });

    $('#example-select-all').prop('checked', true);

    $.ajax({
      type: 'POST',
      data: { merchant_code : $('#merchant_code option:selected').val(),
              range : $('#range option:selected').val(),
              detailDate : $('#detailDate').val()
            },
      url: '/download_detail_report_acquirer/filter_report_table',
      headers: {'X-CSRF_TOKEN': "{{ csrf_token() }}" },
        success: function(data){

        // var data = JSON.parse(msg);

        //$('#summaryTrx_div').html(msg);

        //$('#summaryTrx_div').html(data.FNAME + '-' + data.totalTrx + '-' + data.totalAmount);
        tableListReport.clear().draw();

        for (var i = 0; i < data.length; i++)
        {

          var no = i+1;
          var file = data[i].val;
          var datemodified = data[i].datemodified;
          var size = data[i].size;


            var jRow = $('<tr>').append(
                '<td style="width: 5%">'+ no +'</td>',
                '<td style="width: 50%">'+ file +'</td>',
                '<td style="width: 20%">'+ datemodified +'</td>',
                '<td style="width: 20%">'+ size +'</td>',
                '<td style="width: 5%"><input type="checkbox" name="id[]" value="'+ file + '" class="chk"></td>'
                );
            tableListReport.row.add(jRow).draw();

            $('.chk').prop('checked', true);
        }
        $(".hide-loading").css("display", "none");

      }

    });

    // Handle click on "Select all" control
     $('#example-select-all').on('click', function(){
        // Check/uncheck all checkboxes in the table
        var rows = tableListReport.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
     });

     // Handle click on checkbox to set state of "Select all" control
     $('#tableListReport tbody').on('change', 'input[type="checkbox"]', function(){
     // If checkbox is not checked
     if(!this.checked){
        var el = $('#example-select-all').get(0);
        // If "Select all" control is checked and has 'indeterminate' property
        if(el && el.checked && ('indeterminate' in el)){
           // Set visual state of "Select all" control
           // as 'indeterminate'
           el.indeterminate = true;
        }
     }
    });

});

$("#ListReportSettlementTable_form").submit(function(e) {

    e.preventDefault();

    $(".hide-loading").css("display", "inline");

    var x = document.getElementById("box-result2");
      x.style.display = "block";

      var tableListReportSettlement = $('#tableListReportSettlement').DataTable({
      destroy: true,
        'columnDefs': [{
             'targets': 2,
             'searchable':false,
             'orderable':false,
          }]
      });

      $('#example-select-all2').prop('checked', true);

    $.ajax({
      type: 'POST',
      data: { merchant_code : $('#merchant_code option:selected').val(),
              range : $('#settlement_range option:selected').val(),
              detailDate : $('#settlementDetailDate').val()
            },
      url: '/download_detail_report_acquirer/filter_report_table_settlement',
      headers: {'X-CSRF_TOKEN': "{{ csrf_token() }}" },
        success: function(data){

        // var data = JSON.parse(msg);

        //$('#summaryTrx_div').html(msg);

        //$('#summaryTrx_div').html(data.FNAME + '-' + data.totalTrx + '-' + data.totalAmount);
        tableListReportSettlement.clear().draw();

        for (var i = 0; i < data.length; i++)
        {

          var no = i+1;
          var file = data[i].val;
          var datemodified = data[i].datemodified;
          var size = data[i].size;


            var jRow = $('<tr>').append(
                '<td style="width: 5%">'+ no +'</td>',
                '<td style="width: 50%">'+ file +'</td>',
                '<td style="width: 20%">'+ datemodified +'</td>',
                '<td style="width: 20%">'+ size +'</td>',
                '<td style="width: 5%"><input type="checkbox" name="id[]" value="'+ file + '" class="chk"></td>'
                );
            tableListReportSettlement.row.add(jRow).draw();

            $('.chk').prop('checked', true);
        }
        $(".hide-loading").css("display", "none");

      }

    });

    // Handle click on "Select all" control
     $('#example-select-all2').on('click', function(){
        // Check/uncheck all checkboxes in the table
        var rows = tableListReportSettlement.rows({ 'search': 'applied' }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
     });

     // Handle click on checkbox to set state of "Select all" control
     $('#tableListReportSettlement tbody').on('change', 'input[type="checkbox"]', function(){
     // If checkbox is not checked
     if(!this.checked){
        var el = $('#example-select-all2').get(0);
        // If "Select all" control is checked and has 'indeterminate' property
        if(el && el.checked && ('indeterminate' in el)){
           // Set visual state of "Select all" control
           // as 'indeterminate'
           el.indeterminate = true;
        }
     }
    });

});
/*
//select merchant
$(function(){
    $.ajax({
      dataType: 'JSON',
      type: 'GET',
      url: '/host_data_filtered',
      success: function (data) {
        for(var i = 0; i < data.length; i++)
        {
          $("#acquirer_code").append('<option value="' + data[i]['value'] + '">' + data[i]['FNAME'] + '</option>');
        }
      }
    });


  });
*/
</script>

@endsection
