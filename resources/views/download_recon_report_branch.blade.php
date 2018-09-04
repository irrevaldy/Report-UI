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
      <h2><i class="fas fa-home"></i> <strong>Download Reconciliation Report - Branch</strong></h3>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel no-bd bd-3 panel-stat">
          <div class="panel-header">
              <h3><i class="icon-graph"></i> <strong>List of Report &ensp;</strong></h3>
              <div class="control-btn">
                  <a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a>
              </div>
          </div>
          <div class="panel-body p-15 p-b-0">
              <div class="panel-content widget-info">


                    <div class="row">
                      <form id="ListReportTable_form" method="POST" action="/download_recon_report_branch/filter_report_table">
                      <!--
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Branch</label>
                          <select class="form-control select2 selectBranch" name="branch_code" id="branch_code" style="width: 100%;" required>
                            <option value=""></option>
                              <option value='AllBranch'> All Branch </option>
                          </select>
                        </div><!-- /.input group --><!--
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
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>

                  <div class="row">
                    <form id="listReport_form" method="POST" action="/download_recon_report_branch/zip_list_report">
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
$(function ()
{
      $(".selectBranch").select2({
          placeholder: "Select Branch Code",
          allowClear: true
      });

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

  var tableListReport = $('#tableListReport').DataTable({
    'columnDefs': [{
         'targets': 2,
         'searchable':false,
         'orderable':false
      }]
  });

  $.ajax({
    dataType: 'JSON',
    type: 'GET',
    url: '/download_recon_report_branch/get_list_report',

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
      }
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

});

$("#ListReportTable_form").submit(function(e) {

    e.preventDefault();

    var tableListReport = $('#tableListReport').DataTable({
    destroy: true,
      'columnDefs': [{
           'targets': 2,
           'searchable':false,
           'orderable':false,
        }]
    });

    $.ajax({
      type: 'POST',
      data: { branch_code : $('#branch_code option:selected').val(),
              range : $('#range option:selected').val(),
              detailDate : $('#detailDate').val()
            },
      url: '/download_recon_report_branch/filter_report_table',
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
                '<td>'+ no +'</td>',
                '<td>'+ file +'</td>',
                '<td>'+ datemodified +'</td>',
                '<td>'+ size +'</td>',
                '<td><input type="checkbox" name="id[]" value="'+ file + '" class="chk"></td>'
                );
            tableListReport.row.add(jRow).draw();
        }


      }

    });

});

//select host
/*
$(function(){
    $.ajax({
      dataType: 'JSON',
      type: 'GET',
      url: '/branch_data',
      success: function (data) {
        for(var i = 0; i < data.length; i++)
        {
          $("#branch_code").append('<option value="' + data[i]['branch_code'] + '">' + data[i]['branch_code'] + '</option>');
        }
      }
    });


  });
*/
</script>

@endsection
