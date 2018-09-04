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
        <h2><i class="fab fa-get-pocket" aria-hidden="true"></i><strong> Package </strong>Setup</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-6" style="margin-top: 4px;">
							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>Package</strong> List</h3>
					  	</div>
                        
                            <div class="col-sm-6">
                                <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add Package</button></a>
                            </div>
                        
					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <table  class="table" id="table1" >
                        <thead>
                            <tr>
                                <th width=5%>#</th>
                                <th>Package Name</th>
                                <th>Description</th>
                                <th width=18%></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($data['package_data'] as $key => $value)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $value['package_name'] }} </td>
                                <td> {{ str_ireplace("<br />", "\r\n", $value['description']) }} </td>

                                <td> 

                                    
                                        <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit('{{ $value['id'] }}', '{{ $value['package_name'] }}', '{{ $value['description'] }}')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                    
                                        <!-- <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  -->
                                    
                                    |
                                    
                                        <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_package('{{ $value['id'] }}', '{{ $value['package_name'] }}')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a> 
                                    
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

    <!-- Modal Add Package -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 65%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Add New Package</strong></h4>
            </div>
            <form role="form" class="form-validation" id="insertPackage_form" autocomplete="off">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Package Name</label>
                              <input class="form-control form-white" name="new_packageName" id="new_packageName" maxlength="20" type="text" placeholder="package name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label> 
                                <textarea class="form-control form-white" rows="5" maxlength="100" name="new_description" id="new_description" aria-required="true" required placeholder="description..." ></textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row modal-header body">
                    <div class="col-md-10" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Select Privilege(s) : </strong>
                        </span>
                    </div>
                </div>

                <div class="row" style="padding-top: 10px;">
                    @foreach ($data['privilege_data'] as $key => $value)

                    <div class='col-md-4'>
                        <div class='form-group'>
                            <div class='icheck-list '>
                                <label><input type='checkbox' class='new_privilege' id='' data-checkbox='icheckbox_square-blue' value="{{ $value['id'] }}"> {{ $value['privilege_name'] }} </label>
                            </div>
                        </div>
                    </div>

                    @endforeach  
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

    <!-- Modal Edit Package -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 65%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Edit Package</strong></h4>
            </div>
            <form role="form" class="form-validation" id="updatePackage_form" autocomplete="off">
            <input class="form-control form-white" name="edit_package_id" id="edit_package_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Package Name</label>
                              <input class="form-control form-white" name="edit_packageName" id="edit_packageName" maxlength="20" type="text" placeholder="package name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label> 
                                <textarea class="form-control form-white" rows="5" maxlength="100" name="edit_description" id="edit_description" aria-required="true" required placeholder="description..." ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row modal-header body">
                    <div class="col-md-10" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Select Privilege(s) : </strong>
                        </span>
                    </div>
                </div>

                <div class="row" style="padding-top: 10px;">
                    @foreach ($data['privilege_data'] as $key => $value)

                    <div class='col-md-4'>
                        <div class='form-group'>
                            <div class='icheck-list '>
                                <label><input type='checkbox' class='edit_privilege' id="edit_privilege_{{ $value['id'] }}" data-checkbox='icheckbox_square-blue' value="{{ $value['id'] }}"> {{ $value['privilege_name'] }} </label>
                            </div>
                        </div>
                    </div>

                    @endforeach  
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

    <!-- Modal Delete Package -->
    <div id="deleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Delete Package</strong></h4>
            </div>
            <form role="form" class="form-validation" id="deletePackage_form" autocomplete="off">
            <input class="form-control form-white" name="delete_package_id" id="delete_package_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <p> Package <span id="delete_package_name" ></span> will be deleted, are you sure ? </p>
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
            url: '/package_data/all',
            success: function (data) {

                table.clear().draw();

                var regex = /<br\s*[\/]?>/gi;

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));

                for (var i = 0; i < data.length; i++) {

                    var id             = data[i].id;
                    var package_name   = data[i].package_name;
                    var description    = data[i].description;

                    var element = 
                        '<td>'+ (i + 1) +'</td>' + 
                        '<td>'+package_name+'</td>' + 
                        '<td>'+description.replace(regex, "\n")+'</td>';

                    element += "<td>";

                    //if( contains.call(priv_list, 'PACKAGE_E') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit(\''+ id +'\', \''+ package_name +'\', \''+ description +'\')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';
                    //}

                    //if( contains.call(priv_list, 'PACKAGE_D') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += ' <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_package(\''+ id +'\', \''+ package_name +'\')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>';

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

    function edit( id, package_name, description) {

        $('#edit_package_id').val(id);
        $('#edit_packageName').val(package_name);
        var regex = /<br\s*[\/]?>/gi;
        $('#edit_description').val(description.replace(regex, "\n").replace('</a>', ''));

        $.ajax({
          url: "/tran_host_package_privilege_data/"+id,
          async: false,
          success: function (data) {
            var curr_privilege = [];

            for (var i = 0; i < data.length; i++) {
              curr_privilege.push(data[i].privilege_id);
            }

            for (var i = 0; i < $('.edit_privilege').length; i++) {
              if(contains.call(curr_privilege, $('.edit_privilege')[i].value) == true) {
                
                $('#edit_privilege_'+$('.edit_privilege')[i].value).iCheck('check');
              } else {
                
                $('#edit_privilege_'+$('.edit_privilege')[i].value).iCheck('uncheck');
              }
            }
          }
        });

    }

    function delete_package( id, package_name ) {
        $('#delete_package_id').val(id);
        $('span#delete_package_name').html(package_name);
    }

    $("#insertPackage_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var packageName       = $('#new_packageName').val();
        var description       = $('#new_description').val();
        description           = description.replace(/\r?\n/g, '<br />');

        var privilege_select = $(".new_privilege:checked").map(function(){
            return $(this).val();
        }).toArray();

        if( privilege_select.length == 0) {
            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                   bgcolor:'#f4d742',
                   color:'#666',
                   message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select privilege !'
                },
                'position'  :'top right'
            });
        } else {

            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                    bgcolor:'#666',
                    color:'#fff',
                    message:'Please wait...'
                },
                'position'  :'top right'
            });

            privilege_select = JSON.stringify(privilege_select);

            $.ajax({
                dataType: 'JSON',
                type: 'POST',
                url: '/package_data_insert',
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                data : {
                    packageName : packageName,
                    description : description,
                    privilege   : privilege_select
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
                        $('#insertPackage_form')[0].reset();
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
        }
		
        $('.btn-primary').prop('disabled', false);

    });

    $("#updatePackage_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var package_id      = $('#edit_package_id').val();
        var packageName     = $('#edit_packageName').val();
        var description     = $('#edit_description').val();
        description         = description.replace(/\r?\n/g, '<br />');

        var privilege_select = $(".edit_privilege:checked").map(function(){
            return $(this).val();
        }).toArray();

        if( privilege_select.length == 0) {
            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                   bgcolor:'#f4d742',
                   color:'#666',
                   message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select privilege !'
                },
                'position'  :'top right'
            });
        } else {
            
            privilege_select = JSON.stringify(privilege_select);
                
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
                url: '/package_data_update',
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                data : {
                    package_id      : package_id,
                    packageName     : packageName,
                    description     : description,
                    privilege       : privilege_select

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
                        $('#updatePackage_form')[0].reset();
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

        }
        
        $('.btn-primary').prop('disabled', false);

    });

    $("#deletePackage_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var package_id = $('#delete_package_id').val();

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
            url: '/package_data_delete',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                package_id     : package_id
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

        $('.finish-btn').prop('disabled', false);

    });

</script>
@endsection