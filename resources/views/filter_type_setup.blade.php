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
        <h2><i class="fas fa-filter" aria-hidden="true"></i><strong> Filter Type </strong>Setup</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-6" style="margin-top: 4px;">
							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>Filter Type</strong> List</h3>
					  	</div>
                        
                            <div class="col-sm-6">
                                <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add Filter Type</button></a>
                            </div>
                        
					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <table  class="table" id="table1" >
                        <thead>
                            <tr>
                                <th width=5%>#</th>
                                <th>Filter Type Name</th>
                                <th width=18%></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($data['filter_type_data'] as $key => $value)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $value['name'] }} </td>

                                <td> 

                                    
                                        <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit('{{ $value['id'] }}', '{{ $value['name'] }}')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                    
                                        <!-- <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  -->
                                    
                                    |
                                    
                                        <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_package('{{ $value['id'] }}', '{{ $value['name'] }}')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a> 
                                    
                                        <!-- <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>  -->
                                    
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
				</div>
                <div class="panel-footer">
                </div>
			</div>
        </div>
    </div>

    <!-- Modal Add Filter Type -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Add New Filter Type</strong></h4>
            </div>
            <form role="form" class="form-validation" id="insertFilterType_form" autocomplete="off">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Filter Type Name</label>
                              <input class="form-control form-white" name="new_filterTypeName" id="new_filterTypeName" maxlength="20" type="text" placeholder="filter type name" required>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form>
        </div>

      </div>
    </div>

    <!-- Modal Edit Filter Type -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Edit Filter Type</strong></h4>
            </div>
            <form role="form" class="form-validation" id="updateFilterType_form" autocomplete="off">
            <input class="form-control form-white" name="edit_filter_type_id" id="edit_filter_type_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Filter Type Name</label>
                              <input class="form-control form-white" name="edit_filterTypeName" id="edit_filterTypeName" maxlength="20" type="text" placeholder="filter type name" required>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form>
        </div>

      </div>
    </div>

    <!-- Modal Delete Filter Type -->
    <div id="deleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Delete Filter Type</strong></h4>
            </div>
            <form role="form" class="form-validation" id="deleteFilterType_form" autocomplete="off">
            <input class="form-control form-white" name="delete_filter_type_id" id="delete_filter_type_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <p> Filter Type <span id="delete_filter_name" ></span> will be deleted, are you sure ? </p>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form>
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

<script type="text/javascript">

	$(document).ready(function () {

        var table = $('#table1').DataTable();

        $(".selectPackage").select2({
            placeholder: "select package",
            allowClear: true
        }).on('change', function(event){
           
        });

        $(".edit_selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            
        }); 

        $('.new_privilege').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});
        $('.edit_privilege').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});

        $('.select2').width('100%');
        
    });

    function initTable() {
        var table = $('#table1').DataTable();
            
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/filter_type_data/all',
            success: function (data) {

                table.clear().draw();

                var regex = /<br\s*[\/]?>/gi;

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));

                for (var i = 0; i < data.length; i++) {

                    var id    = data[i].id;
                    var name  = data[i].name;

                    var element = 
                        '<td>'+ (i + 1) +'</td>' + 
                        '<td>'+name+'</td>';

                    element += "<td>";

                    //if( contains.call(priv_list, 'USER_E') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit(\''+ id +'\', \''+ name +'\')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';
                    //}

                    //if( contains.call(priv_list, 'USER_D') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_package(\''+ id +'\', \''+ name +'\')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a> ';
                    //}

                    element += "</td>";

                    var jRow = $('<tr>').append(element);

                    table.row.add(jRow).draw();
                }
            
            }
        });
    }

    function edit( id, name) {

        $('#edit_filter_type_id').val(id);
        $('#edit_filterTypeName').val(name);

    }

    function delete_package( id, name ) {
        $('#delete_filter_type_id').val(id);
        $('span#delete_filter_name').html(name);
    }

    $("#insertFilterType_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var filterTypeName = $('#new_filterTypeName').val();

        $.amaran({
            'theme'     :'colorful',
            'content'   :{
                bgcolor:'#666',
                color:'#fff',
                message:'Please wait...'
            },
            'position'  :'top right'
        });

        $.ajax({
            dataType: 'JSON',
            type: 'POST',
            url: '/filter_type_data_insert',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                filterTypeName : filterTypeName
            },
            success: function (data) {

                if(data.success == true) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Insert data success !'
                        },
                        'position'  :'top right'
                    });

                    $('#addModal').modal('hide');
                    initTable();
                    $('#insertFilterType_form')[0].reset();
                } else if(data.success == false) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> '+data.message+' !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else if(data.success == 'error') {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Insert data error, please contact administrator !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else {
                    $('.finish-btn').prop('disabled', false);
                }
            }
        });
		
        $('.btn-primary').prop('disabled', false);

    });

    $("#updateFilterType_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var filter_type_id  = $('#edit_filter_type_id').val();
        var filterTypeName  = $('#edit_filterTypeName').val();
                
        $.amaran({
            'theme'     :'colorful',
            'content'   :{
                bgcolor:'#666',
                color:'#fff',
                message:'Please wait...'
            },
            'position'  :'top right'
        });

        $.ajax({
            dataType: 'JSON',
            type: 'POST',
            url: '/filter_type_data_update',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                filter_type_id      : filter_type_id,
                filterTypeName      : filterTypeName

            },
            success: function (data) {

                if(data.success == true) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Update data success !'
                        },
                        'position'  :'top right'
                    });

                    $('#editModal').modal('hide');
                    initTable();
                    $('#updateFilterType_form')[0].reset();
                } else if(data.success == false) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> '+data.message+' !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else if(data.success == 'error') {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Insert data error, please contact administrator !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else {
                    $('.finish-btn').prop('disabled', false);
                }
            }
        });
        
        $('.btn-primary').prop('disabled', false);

    });

    $("#deleteFilterType_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var filter_type_id = $('#delete_filter_type_id').val();

        $.amaran({
            'theme'     :'colorful',
            'content'   :{
                bgcolor:'#666',
                color:'#fff',
                message:'Please wait...'
            },
            'position'  :'top right'
        });

        $.ajax({
            dataType: 'JSON',
            type: 'POST',
            url: '/filter_type_data_delete',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                filter_type_id     : filter_type_id
            },
            success: function (data) {

                if(data.success == true) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Delete data success !'
                        },
                        'position'  :'top right'
                    });

                    $('#deleteModal').modal('hide');
                    initTable();
                } else if(data.success == false) {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> '+data.message+' !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else if(data.success == 'error') {
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                            message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Delete data error, please contact administrator !'
                        },
                        'position'  :'top right'
                    });

                    $('.finish-btn').prop('disabled', false);
                } else {
                    $('.finish-btn').prop('disabled', false);
                }
            }
        });

    });

</script>
@endsection