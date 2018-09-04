@extends('layout')

@section('content')

    <link href="{{ asset('assets/plugins/AmaranJS/dist/css/amaran.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables-1.10.16/dataTables.css') }}" rel="stylesheet">

    <style type="text/css">

        .btn.dropdown-toggle {
            margin-bottom: 0;
            padding: 7px 10px 8px;
        }

        .main-content .page-content .panel .panel-content .btn:not(.btn-sm) i {
            padding-right: 0px;
        }

        .dropdown-menu {
          min-width: 100px;
        }

        .dropdown-menu > li > a {
            color: #666666;
            padding: 2px 10px;
        }

        .main-content .page-content .panel .panel-header {
            padding: 6px 15px 0 18px;
        }

        .btn-white:hover, .btn-white:focus, .btn-white:active, .btn-white.active, .open .dropdown-toggle.btn-white {
            background-color: #666;
            border-color: #319DB5;
            color: #fff;
        }

        button.add-cluster {
          float: right;
          margin-right: 15px;
          margin-top: 5px;
        }

        .btn-white {
            background-color: #ffffff;
            border: 1px solid #319db5 !important;
            color: #319db5;
        }

        @media screen and (max-width: 767px) {
            button.add-cluster {
              float: left;
            }
        }

        form .file-button {
        	height: 33px;
        }

        .form-control.form-white {
            background-color: #fafafa;
            border: 1px solid #ccc;
            color: #555555;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fafafa;
            border: 1px solid #bbb;
            border-radius: 2px;
        }

        .warning_confirmPassword,
        .edit_warning_confirmPassword {
            color: #ff5b5e;
            font-size: 11px;
            font-style: italic;
            display: none;
        }

    </style>

    <div class="header">
        <h2><i class="fas fa-search" aria-hidden="true"></i><strong> Search </strong>Transaction</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">

      				<div class="panel-header">
      					<div class="row">
      					 	<div class="col-sm-6" style="margin-top: 4px;">
      							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>Search</strong> By Filter</h3>
      					  	</div>
      					</div>
      				</div>
              <div class="panel-body">
                  <div class="row">  <!-- first row -->
                  <div class="col-md-12">

                  <div class="row">
                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Store Code</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="store_code" id="store_code" placeholder="Store Code">
                          </div>
                        </div>
                      </div>

                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Branch Code</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-sitemap" aria-hidden="true"></i>
                            </div>

                            <input type="text" class="form-control" name="branch_code" id="branch_code" value="" placeholder="Branch Code" >
                          </div>
                        </div>
                      </div>

                       <div class='col-sm-4'>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Host </label>
                           <select class="form-control host selectHost" name="host" id="host" style="width: 100%;" required>
                           </select>
                           <!--<input type="text" class="form-control" name="host" id="host" placeholder="Host" >-->

                         </div>
                      </div>

                    </div>
                  </div>
                </div> <!-- end of first row -->

                <div class="row"> <!-- second row -->
                  <div class="col-md-12">

                    <div class="row">

                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label>Transaction Type </label>
                      <select class="form-control trx selectTransaction_Type" name="transaction_type" id="transaction_type" style="width: 100%;">
                            <option></option>
                            <option value="sale"> Sale </option>
                            <option value="installment"> Installment </option>
                            <option value="loyalty"> Loyalty </option>
                            <option value="prepaid_sale"> Prepaid Sale </option>
                            <option value="prepaid_topup"> Prepaid Top Up </option>
                            <option value="tarik_tunai"> Tarik Tunai </option>
                            @if(Session::get('FCODE') == 'pvs1909' || Session::get('merch_id') == '1')
                            <option value="loyalty_indomaret"> Loyalty Indomaret </option>
                            @endif
                          </select>
                        <!--  <input type="text" class="form-control" name="transaction_type" id="transaction_type" placeholder="Transaction Type" >-->

                        </div><!-- /.form-group -->
                      </div>

                       <div class='col-sm-4'>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Prepaid Card Number</label>
                           <div class="input-group">
                             <div class="input-group-addon">
                               <i class="fa fa-credit-card" aria-hidden="true"></i>
                             </div>

                             <input type="text" class="form-control" name="prepaid_card_number" id="prepaid_card_number" placeholder="Prepaid Card Number" disabled>
                           </div>
                         </div>
                      </div>

                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Approval Code</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-check-square" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" name="approval_code" id="approval_code" placeholder="Approval Code">
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div> <!-- end of second row -->

                <div class="row"> <!-- third row -->
                  <div class="col-md-12">
                    <div class="row">

                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label for="exampleInputEmail1">MID</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-tasks" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" id="mid" name="mid" placeholder="MID" required>
                          </div>
                        </div>
                      </div>

                      <div class='col-sm-4'>
                        <div class="form-group">
                          <label for="exampleInputEmail1">TID</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-tasks" aria-hidden="true"></i>
                            </div>
                            <input type="text" class="form-control" id="tid" placeholder="TID">
                          </div>
                        </div>
                      </div>

                      <div class='col-sm-4'>
                        <!-- Date range -->
                        <div class="form-group">
                          <label>Transaction Date</label>

                          <div class="input-group date">
                              <input type="text" name="transaction_date" id="transaction_date" class="form-control readonly" placeholder="Select Date" required="required" />
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                            </div>
                        </div><!-- /.form group -->
                      </div>

                    </div>
                  </div>
                </div> <!-- end of third row -->

              </div>




              <div class="panel-footer">
                <button type="button" class="btn btn-primary btn-embossed" id="btnSubmit">Submit</button>
              </div>

			     </div>
       </div>
    </div>

    <div class="row" id="box-result" style="display:none">
        <div class="col-lg-12">
            <div class="panel">


                <div class="form-group">
                  <div class="panel-content pagination2 force-table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered" id="tableSearch">
                      <thead>
                        <tr>
                          <th>Host</th>
                          <th>MID</th>
                          <th>TID</th>
                          <th>Branch</th>
                          <th>Store</th>
                          <th>Transaction</th>
                          <th>Card Num</th>
                          <th>Prepaid Card Num</th>
                          <th>Inv Num</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>RC</th>
                          <th>Status</th>
                          <th>APPR Code</th>
                          <th>Amount</th>
                          <th>Redeem</th>
                          <th>Net</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  </div>


            </div>
        </div>
     </div>


@endsection

@section('javascript')
<!-- BEGIN PAGE SCRIPTS -->
<script src="{{ asset('assets/plugins/DataTables-1.10.16/datatables.js') }}"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="{{ asset('assets/js/pages/table_dynamic.js') }}"></script>
<script src="{{ asset('assets/plugins/AmaranJS/dist/js/jquery.amaran.js') }}"></script>
<script src="{{ asset('assets/plugins/js-sha256/src/sha256.js') }}"></script>
<!-- END PAGE SCRIPTS -->
<script>
$(function ()
{
       $(".selectHost").select2({
           placeholder: "Select Host",
           allowClear: true
       });

       $(".selectTransaction_Type").select2({
           placeholder: "Select Transaction",
           allowClear: true
       });

       $('.input-group.date').datepicker({
             autoclose: true,
             todayHighlight: true,
             format: "dd/mm/yyyy",
             orientation: 'auto'
         });
});

//select host
$(function(){
    $.ajax({
      dataType: 'JSON',
      type: 'GET',
      url: '/host_data',
      success: function (data) {


        $("#host").append('<option value=""></option>');
        for(var i = 0; i < data.length; i++)
        {
          $("#host").append('<option value="' + data[i]['FCODE'] + '">' + data[i]['FNAME'] + '</option>');
        }
      }
    });


  });

  $("#btnSubmit").click(function(e)
  {
    var x = document.getElementById("box-result");
    x.style.display = "block";

    e.preventDefault();

    var tableSearch = $('#tableSearch').DataTable();

    $('.btn-primary').prop('disabled', true);

    $.ajax({
          type: 'POST',
          data: {
            store_code          : $('input[name="store_code"]').val(),
            branch_code         : $('input[name="branch_code"]').val(),
            host                : $('#host').find(":selected").val(),
            transaction_type    : $('#transaction_type').find(":selected").val(),
            prepaid_card_number : $('input[name="prepaid_card_number"]').val(),
            approval_code       : $('input[name="approval_code"]').val(),
            mid                 : $('input[name="mid"]').val(),
            tid                 : $('input[name="tid"]').val(),
            transaction_date    : $('#transaction_date').val()
            // ,ModifiedBy        : "ADMIN"
          },
          //headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
          url: '/search_transaction/main_data',
          headers: {'X-CSRF_TOKEN': "{{ csrf_token() }}" },
          success: function (data)
          {
                tableSearch.clear().draw();

                for (var i = 0; i < data.length; i++)
                {

                  var fname = data[i]['FNAME'];
                  var fmid = data[i]['FMID'];
                  var ftid = data[i]['FTID'];
                  var fbranchcode = data[i]['FBRANCHCODE'];
                  var fstorecode = data[i]['FSTORECODE'];
                  var ftrx_label = data[i]['FTRX_LABEL'];
                  var fcardnum = data[i]['FCARDNUM'];
                  var fprepaidcardnum = data[i]['FPREPAIDCARDNUM'];
                  var finvnum = data[i]['FINVNUM'];
                  var fdate = data[i]['FDATE'];
                  var ftime  = data[i]['FTIME'];
                  var frespcode = data[i]['FRESPCODE'];
                  var fstatus = data[i]['FSTATUS'];
                  var fapprcode = data[i]['FAPPRCODE'];
                  var famount = data[i]['FAMOUNT'];
                  var fredeem = data[i]['FREDEEM'];
                  var fnet = data[i]['NET'];

                    var jRow = $('<tr>').append(
                        '<td>'+ fname +'</td>',
                        '<td>'+ fmid +'</td>',
                        '<td>'+ ftid +'</td>',
                        '<td>'+ fbranchcode +'</td>',
                        '<td>'+ fstorecode +'</td>',
                        '<td>'+ ftrx_label +'</td>',
                        '<td>'+ fcardnum +'</td>',
                        '<td>'+ fprepaidcardnum +'</td>',
                        '<td>'+ finvnum +'</td>',
                        '<td>'+ fdate +'</td>',
                        '<td>'+ ftime +'</td>',
                        '<td>'+ frespcode +'</td>',
                        '<td>'+ fstatus +'</td>',
                        '<td>'+ fapprcode +'</td>',
                        '<td>'+ famount +'</td>',
                        '<td>'+ fredeem +'</td>',
                        '<td>'+ fnet +'</td>',
                        );
                    tableSearch.row.add(jRow).draw();
                  }
          }
        });

      $('.btn-primary').prop('disabled', false);
    });

</script>

@endsection
