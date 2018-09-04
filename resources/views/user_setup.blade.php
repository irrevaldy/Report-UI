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
        <h2><i class="fas fa-user-circle" aria-hidden="true"></i><strong> User </strong>Setup</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-6" style="margin-top: 4px;">
							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>User</strong> List</h3>
					  	</div>
                        <!-- PRIV A -->
                            <div class="col-sm-6">
                                <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add User</button></a>
                            </div>

					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <table  class="table" id="table1" >
                        <thead>
                            <tr>
                                <th width=5%>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Subgroup</th>
                                <th>Active</th>
                                <th width=18%></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($data['user_data'] as $key => $value)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $value['user_name'] }} </td>
                                <td> {{ $value['name'] }} </td>
                                <td> {{ $value['subgroup_name'] }} </td>

                                @if ( $value['user_active'] == '1' )
                                    <td> <span class="label label-success">Yes</span> </td>
                                @else
                                    <td> <span class="label label-danger">No</span> </td>
                                @endif

                                <td> 
                                    
                                        <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit('{{ $value['user_id'] }}', '{{ $value['user_name'] }}', '{{ $value['name'] }}', '{{ $value['user_subgroup_id'] }}', '{{ $value['description'] }}', '{{ $value['user_active'] }}')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                    
                                        <!-- <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  -->
                                        
                                    |
                                    
                                   
                                        <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_user('{{ $value['user_id'] }}', '{{ $value['user_name'] }}')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a> 
                                    
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

    <!-- Modal Add User -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Add New User</strong></h4>
            </div>
            <form role="form" class="form-validation" id="insertUser_form" autocomplete="off">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <input class="form-control form-white" name="new_name" id="new_name" maxlength="50" type="text" placeholder="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Username</label>
                              <input class="form-control form-white" name="new_username" id="new_username" maxlength="30" type="text" placeholder="username" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Password</label>
                              <input class="form-control form-white matchPassword" name="new_password" id="new_password" maxlength="30" type="password" placeholder="password" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Confirm Password</label>
                              <input class="form-control form-white matchPassword" name="new_confirmPassword" id="new_confirmPassword" maxlength="30" type="password" placeholder="confirm password" required>
                              <span class='warning_confirmPassword'> *Confirm password not match with password. </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Group</label> 
                                <select class="form-control form-white selectGroup" name="new_groupId" id="new_groupId" data-search="true" required >
                                    <option value=''></option>     
                                    @foreach ($data['group_data'] as $key => $value)
                                        <option value="{{ $value['id'] }}"> {{ $value['group_fullname'] }}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subgroup</label> 
                                <select class="form-control form-white selectSubgroup" name="new_subgroupId" id="new_subgroupId" data-search="true" required >
                                    <option value=''></option>
                                </select>
                            </div>
                        </div><div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label> 
                                <textarea class="form-control form-white" rows="5" name="new_description" id="new_description" aria-required="true" required placeholder="description..." ></textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row modal-header body">
                    <div class="col-md-9" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Filter Type : </strong>
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="modal-title add_addOption">
                            <a style="cursor: pointer;" onClick="write_filter_type()"><strong>Add Filter Type</strong></a>
                        </span>
                    </div>
                </div>
                <div id="add_filterType" style="padding-top: 10px;">
                    <div class="row">
                        <div  class="col-md-12">
                            <span style="font-style: italic;color: #999;"> *please add filter type. </span>
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

    <!-- Modal Edit User -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Edit User</strong></h4>
            </div>
            <form role="form" class="form-validation" id="updateUser_form" autocomplete="off">
            <input class="form-control form-white" name="edit_user_id" id="edit_user_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <input class="form-control form-white" name="edit_name" id="edit_name" maxlength="50" type="text" placeholder="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Username</label>
                              <input class="form-control form-white" name="edit_username" id="edit_username" maxlength="30" type="text" placeholder="username" required disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Password</label>
                              <input class="form-control form-white edit_matchPassword" name="edit_password" id="edit_password" maxlength="30" type="password" placeholder="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Confirm Password</label>
                              <input class="form-control form-white edit_matchPassword" name="edit_confirmPassword" id="edit_confirmPassword" maxlength="30" type="password" placeholder="confirm password">
                              <span class='edit_warning_confirmPassword'> *Confirm password not match with password. </span>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-6" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Group</label> 
                                <select class="form-control form-white edit_selectGroup" name="edit_groupId" id="edit_groupId" data-search="true" required >
                                    <option value=''></option>     
                                    @foreach ($data['group_data'] as $key => $value)
                                        <option value="{{ $value['id'] }}"> {{ $value['group_fullname'] }}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subgroup</label> 
                                <select class="form-control form-white edit_selectSubgroup" name="edit_subgroupId" id="edit_subgroupId" data-search="true" required >
                                    <option value=''></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label> 
                                <textarea class="form-control form-white" rows="1" name="edit_description" id="edit_description" aria-required="true" required placeholder="description..." ></textarea>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group new_status_group'>
                                <label class='control-label'> Active </label>
                                <br>
                                <div class='onoffswitch'>
                                    <input type='checkbox' class='onoffswitch-checkbox add_termOpt_tagValue termOptCheckbox' name='edit_userActive'  id='edit_userActive' >
                                    <label class='onoffswitch-label' for='edit_userActive'>
                                        <span class='onoffswitch-inner'>
                                            <span class='onoffswitch-active'><span class='onoffswitch-switch'>Yes</span></span>
                                            <span class='onoffswitch-inactive'><span class='onoffswitch-switch'>No</span></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                </div>
                <div class="row modal-header body">
                    <div class="col-md-9" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Filter Type : </strong>
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="modal-title add_addOption">
                            <a style="cursor: pointer;" onClick="edit_write_filter_type()"><strong>Add Filter Type</strong></a>
                        </span>
                    </div>
                </div>
                <div id="edit_filterType" style="padding-top: 10px;">
                    <div class="row">
                        <div  class="col-md-12">
                            <span style="font-style: italic;color: #999;"> *please add filter type. </span>
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

    <!-- Modal Delete User -->
    <div id="deleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Delete User</strong></h4>
            </div>
            <form role="form" class="form-validation" id="deleteUser_form" autocomplete="off">
            <input class="form-control form-white" name="delete_user_id" id="delete_user_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <p> Username <span id="delete_username" ></span> will be deleted, are you sure ? </p>
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

        $(".selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            get_subgroup( this.value );
        });

        $(".edit_selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            edit_get_subgroup( this.value );
        });  

        $(".selectSubgroup").select2({
            placeholder: "select subgroup",
            allowClear: true
        });  

        $(".edit_selectSubgroup").select2({
            placeholder: "select subgroup",
            allowClear: true
        });

        $('.select2').width('100%');

        $( "#edit_password" ).change(function() {
            
            if( this.value == '' ) {
                $('#edit_confirmPassword').removeAttr('required');
            } else {
                $('#edit_confirmPassword').attr('required', true);
            }

        });
        
    });

    var filter_type_data = <?php echo json_encode($data['filter_type_data']); ?>;
    var filter_type_list = {};
    for( var i=0; i<filter_type_data.length; i++ ) {
        var filter_type_id = filter_type_data[i].id;

        filter_type_list[ filter_type_id ] = filter_type_data[i].name;
    }

    var add_element_filter_type = "";
    var edit_element_filter_type = "";
    add_element_filter_type +=  
                "<div class='row div_filter_type'>"
                    + "<div class='col-md-5'>"
                        + "<div class='form-group'>"
                            + "<label>Filter Type</label>" 
                            + "<select class='form-control form-white new_selectFilterType' name='new_filterTypeId[]' id='' data-search='true' required >"
                                + "<option value=''></option>";

    edit_element_filter_type +=  
                "<div class='row edit_div_filter_type'>"
                    + "<div class='col-md-5'>"
                        + "<div class='form-group'>"
                            + "<label>Filter Type</label>" 
                            + "<select class='form-control form-white edit_selectFilterType' name='edit_filterTypeId[]' id='' data-search='true' required >"
                                + "<option value=''></option>";

    for( var i=0; i<filter_type_data.length; i++ ) {
        add_element_filter_type += 
                                "<option value='" + filter_type_data[i].id + "'>" + filter_type_data[i].name + "</option>";

        edit_element_filter_type += 
                                "<option value='" + filter_type_data[i].id + "'>" + filter_type_data[i].name + "</option>";
    }

    add_element_filter_type +=
                            "</select>"
                        + "</div>"
                    + "</div>"
                    + "<div class='col-md-5'>"
                        + "<div class='form-group'>"
                            + "<label class='control-label'>Filter Type Value</label>"
                            + "<select class='form-control form-white new_filterTypeValue' name='new_filterTypeValue[]' id='' data-search='true' required>"
                                + "<option value=''></option>"
                            + "</select>"
                        + "</div>"
                    + "</div>"
                    + "<div class='col-md-2'>"
                        + "<div class='form-group' style='padding-top: 30px;'>"
                            + "<a style='cursor: pointer;' onClick='add_remove_filter_type(this)'>Delete</a>"
                        + "</div>"
                    + "</div>"
                + "</div>";

    edit_element_filter_type +=
                            "</select>"
                        + "</div>"
                    + "</div>"
                    + "<div class='col-md-5'>"
                        + "<div class='form-group'>"
                            + "<label class='control-label'>Filter Type Value</label>"
                            + "<select class='form-control form-white edit_filterTypeValue' name='edit_filterTypeValue[]' data-search='true' required>"
                                + "<option value=''></option>"
                            + "</select>"
                        + "</div>"
                    + "</div>"
                    + "<div class='col-md-2'>"
                        + "<div class='form-group' style='padding-top: 30px;'>"
                            + "<a style='cursor: pointer;' onClick='edit_remove_filter_type(this)'>Delete</a>"
                        + "</div>"
                    + "</div>"
                + "</div>";

    function write_filter_type() {

        if( $('.div_filter_type').length == 0 ) {
            $('#add_filterType').html( add_element_filter_type );
        } else {
            $('#add_filterType').append( add_element_filter_type );
        }

        $(".new_selectFilterType").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){
           
        });

        $(".new_filterTypeValue").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){
           
        });

        setTimeout(function(){ 
            $(".new_selectFilterType").select2('destroy');

            setTimeout(function(){ 
                $(".new_selectFilterType").select2({
                    placeholder: "select filter type",
                    allowClear: true
                }).on('change', function(event){

                    var filter_type = $(this).val();

                    var data_list = new Array();

                    var select = $(this).parent().parent().parent().find(".new_filterTypeValue");

                    $(this).parent().parent().parent().find(".new_filterTypeValue option").remove();  
                    select.append('<option value=""></option>');

                    $.ajax({
                        dataType: 'JSON',
                        type: 'GET',
                        url: '/filter_value_option/'+filter_type,
                        success: function (data) {

                            data_list = data;

                            var total_data = data.length;
                                             
                            for (var i = 0; i < total_data ; i++) { 
                                
                                select.append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');                     
                                                    
                            }

                        }
                    });

                });

                $('.select2').width('100%');
                
            }, 50);
        }, 50);

        // $('.modal-backdrop').height( $('#addModal .modal-content').height() + ( $('#addModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");
        
    }

    function edit_write_filter_type() {

        if( $('.edit_div_filter_type').length == 0 ) {
            $('#edit_filterType').html( edit_element_filter_type );
        } else {
            $('#edit_filterType').append( edit_element_filter_type );
        }

        $(".edit_selectFilterType").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){
           
        });

        $(".edit_filterTypeValue").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){
           
        });

        setTimeout(function(){ 
            $(".edit_selectFilterType").select2('destroy');

            setTimeout(function(){ 
                $(".edit_selectFilterType").select2({
                    placeholder: "select filter type",
                    allowClear: true
                }).on('change', function(event){

                    var filter_type = $(this).val();

                    var data_list = new Array();

                    var select = $(this).parent().parent().parent().find(".edit_filterTypeValue");

                    $(this).parent().parent().parent().find(".edit_filterTypeValue option").remove();  
                    select.append('<option value=""></option>');

                    $.ajax({
                        dataType: 'JSON',
                        type: 'GET',
                        url: '/filter_value_option/'+filter_type,
                        success: function (data) {

                            data_list = data;

                            var total_data = data.length;
                                             
                            for (var i = 0; i < total_data ; i++) { 
                                
                                select.append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');                     
                                                    
                            }

                        }
                    });
                   
                });

                $('.select2').width('100%');
                
            }, 50);
        }, 50);

        // $('.modal-backdrop').height( $('#editModal .modal-content').height() + ( $('#editModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");
        
    }

    function add_remove_filter_type( id ) {
        // $('#div_filter_type_'+ value).remove();

        $(id).parents('.row').remove();
        // $('.modal-backdrop').height( $('#addModal .modal-content').height() + ( $('#addModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");

        if( $('.div_filter_type').length == 0 ) {
            $('#add_filterType').html( "<div class='row' ><div class='col-md-12'><span style='font-style: italic;color: #999;'> *please add filter type. </span></div></div>" );
        }
    }

    function edit_remove_filter_type( id ) {
        // $('#div_filter_type_'+ value).remove();

        $(id).parents('.row').remove();
        // $('.modal-backdrop').height( $('#editModal .modal-content').height() + ( $('#editModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");

        if( $('.edit_div_filter_type').length == 0 ) {
            $('#edit_filterType').html( "<div class='row' ><div class='col-md-12'><span style='font-style: italic;color: #999;'> *please add filter type. </span></div></div>" );
        }
    }

    function initTable() {
        var table = $('#table1').DataTable();
            
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/user_data',
            success: function (data) {

                table.clear().draw();

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));

                for (var i = 0; i < data.length; i++) {

                  var user_id           = data[i].user_id;
                  var user_subgroup_id  = data[i].user_subgroup_id;
                  var name              = data[i].name;
                  var user_name         = data[i].user_name;
                  var description       = data[i].description;
                  var subgroup_name     = data[i].subgroup_name;
                  var user_active       = data[i].user_active;

                  if( user_active == '1' ) {
                     var user_active_label = '<span class="label label-success">Yes</span>';
                  } else {
                     var user_active_label = '<span class="label label-danger">No</span>';
                  }

                    var element = 
                        '<td>'+ (i + 1) +'</td>' + 
                        '<td>'+user_name+'</td>' + 
                        '<td>'+name+'</td>' + 
                        '<td>'+subgroup_name+'</td>' + 
                        '<td>'+user_active_label+'</td>';

                    element += "<td>";

                    //if( contains.call(priv_list, 'USER_E') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit(\''+ user_id +'\', \''+user_name+'\', \''+name+'\', \''+user_subgroup_id+'\', \''+description+'\', \''+user_active+'\')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> ';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';
                    //}

                    //if( contains.call(priv_list, 'USER_D') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_user(\''+ user_id +'\', \''+user_name+'\')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>';

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

    function get_subgroup( group_id ) {
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/group/'+group_id,
            success: function (data) {

                $('#new_subgroupId option').remove();
                $('#new_subgroupId').append('<option value=""></option>');

                for( var i=0; i<data.length; i++ ) {
                    $('#new_subgroupId').append('<option value="'+ data[i].id +'">'+ data[i].subgroup_name +'</option>');
                }

            }
        });
    }

    function edit_get_subgroup( group_id ) {
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/group/'+group_id,
            async: false,
            success: function (data) {

                $('#edit_subgroupId option').remove();
                $('#edit_subgroupId').append('<option value=""></option>');

                for( var i=0; i<data.length; i++ ) {
                    $('#edit_subgroupId').append('<option value="'+ data[i].id +'">'+ data[i].subgroup_name +'</option>');
                }

            }
        });
    }

    function edit( user_id, user_name, name, user_subgroup_id, description, user_active ) {

        $('#edit_user_id').val(user_id);
        $('#edit_name').val(name);
        $('#edit_username').val(user_name);
        $('#edit_description').val(description);

         $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/'+user_subgroup_id,
            async: false,
            success: function (data) {

                var result = data;

                var group_id = result[0].user_group_id;
                $('#edit_groupId').val(group_id).trigger('change');

            }
        });

        $('#edit_subgroupId').val(user_subgroup_id).trigger('change');

        if( user_active == '1' ) {
            $('#edit_userActive').prop('checked', true);
        } else {
            $('#edit_userActive').prop('checked', false);
        }

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/user_filter_type_data/'+user_id,
            success: function (data) {

                $('#edit_filterType').html( "<div class='row' ><div class='col-md-12'><span style='font-style: italic;color: #999;'> *please add filter type. </span></div></div>" );

                if( data.length > 0 ) {
                    $('#edit_filterType').html('');
                }

                var data_list = new Array();

                data_list = data;

                for( var i=0; i<data_list.length; i++ ) {
                    $('#edit_filterType').append( edit_element_filter_type );
                    $(".edit_selectFilterType").select2();
                    $(".edit_filterTypeValue").select2();
                    // $('.edit_selectFilterType')[i].value = data[i].data_filter_type_id;
                    $( $('.edit_selectFilterType')[i] ).val(data_list[i].data_filter_type_id).trigger('change');
                    // $('select[name="edit_filterTypeValue[]"]')[i].value = data[i].value;
                    $('.edit_filterTypeValue')[i].value = data_list[i].value;
                }

                $(".edit_selectFilterType").select2({
                    placeholder: "select filter type",
                    allowClear: true
                }).on('change', function(event){

                    var filter_type = $(this).val();

                    var data_list = new Array();

                    var select = $(this).parent().parent().parent().find(".edit_filterTypeValue");

                    $(this).parent().parent().parent().find(".edit_filterTypeValue option").remove();  
                    // select.append('<option value=""></option>');

                    $.ajax({
                        dataType: 'JSON',
                        type: 'GET',
                        url: '/filter_value_option/'+filter_type,
                        async: false,
                        success: function (data) {

                            data_list = data;

                            var total_data = data.length;
                                             
                            for (var i = 0; i < total_data ; i++) { 
                                
                                select.append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');                     
                                                    
                            }

                        }
                    });
                   
                });

                $('.edit_selectFilterType').trigger('change');

                for( var i=0; i<data_list.length; i++ ) {
                   $( $('.edit_filterTypeValue')[i] ).val(data_list[i].value).trigger('change');
                }

                $('.select2').width('100%');

                // $('.modal-backdrop').height( $('#editModal .modal-content').height() + ( $('#editModal .modal-content').height() * 20 / 100 ) );
                $('.modal-backdrop').height("100%");

            }
        });

    }

    function delete_user( user_id, username ) {
        $('#delete_user_id').val(user_id);
        $('span#delete_username').html(username);
    }

    $("#insertUser_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var username        = $('#new_username').val();
        var name            = $('#new_name').val();
        var password        = $('#new_password').val();
        var confirmPassword = $('#new_confirmPassword').val();
        var groupId         = $('#new_groupId').val();
        var subgroupId      = $('#new_subgroupId').val();
        var description     = $('#new_description').val();

        if( password != confirmPassword ) {

            $('.warning_confirmPassword').css('display', 'block');
            $('.matchPassword').css('border', '1px solid #ff5b5e');
            $('#'+ $('.matchPassword')[0].getAttribute('id')).focus();

        } else {
            
            // if( $('.new_selectFilterType').length == 0) {
            //     $.amaran({
            //         'theme'     :'colorful',
            //         'content'   :{
            //            bgcolor:'#f4d742',
            //            color:'#666',
            //            message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select filter type !'
            //         },
            //         'position'  :'top right'
            //     });
            // } else {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#666',
                       color:'#fff',
                       message:'Please wait...'
                    },
                    'position'  :'top right'
                });

                password = sha256(username+password);

                var filter_type_id = new Array();
                var filter_type_value = new Array();

                for( var i=0; i<$('.new_selectFilterType').length; i++ ) {
                    var id = $('.new_selectFilterType')[i].value;
                    var value = $('select[name="new_filterTypeValue[]"]')[i].value;

                    filter_type_id.push( id );
                    filter_type_value.push( value );
                }

                $.ajax({
                    dataType: 'JSON',
                    type: 'POST',
                    url: '/user_data_insert',
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    data : {
                        username            : username,
                        name                : name,
                        password            : password,
                        groupId             : groupId,
                        subgroupId          : subgroupId,
                        description         : description,
                        filter_type_id      : filter_type_id,
                        filter_type_value   : filter_type_value
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
                            $('#insertUser_form')[0].reset();
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
            // }

        }

        $('.btn-primary').prop('disabled', false);

    });

    $("#updateUser_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var user_id         = $('#edit_user_id').val();
        var username        = $('#edit_username').val();
        var name            = $('#edit_name').val();
        var password        = $('#edit_password').val();
        var confirmPassword = $('#edit_confirmPassword').val();
        var groupId         = $('#edit_groupId').val();
        var subgroupId      = $('#edit_subgroupId').val();
        var description     = $('#edit_description').val();

        if( $('#edit_userActive').is(':checked') == true ) {
            var userActive = '1';
        } else {
            var userActive = '0';
        }

        if( password != '' && password != confirmPassword ) {

            $('.edit_warning_confirmPassword').css('display', 'block');
            $('.edit_matchPassword').css('border', '1px solid #ff5b5e');
            $('#'+ $('.edit_matchPassword')[0].getAttribute('id')).focus();

        } else {
            
            // if( $('.edit_selectFilterType').length == 0) {
            //     $.amaran({
            //         'theme'     :'colorful',
            //         'content'   :{
            //            bgcolor:'#f4d742',
            //            color:'#666',
            //            message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select filter type !'
            //         },
            //         'position'  :'top right'
            //     });
            // } else {
                $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#666',
                       color:'#fff',
                       message:'Please wait...'
                    },
                    'position'  :'top right'
                });

                if( password != '' ) {

                    password = sha256(username+password);

                }

                var filter_type_id      = new Array();
                var filter_type_value   = new Array();

                for( var i=0; i<$('.edit_selectFilterType').length; i++ ) {
                    var id      = $('.edit_selectFilterType')[i].value;
                    var value   = $('select[name="edit_filterTypeValue[]"]')[i].value;

                    filter_type_id.push( id );
                    filter_type_value.push( value );
                }

                $.ajax({
                    dataType: 'JSON',
                    type: 'POST',
                    url: '/user_data_update',
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    data : {
                        user_id             : user_id,
                        username            : username,
                        name                : name,
                        password            : password,
                        groupId             : groupId,
                        subgroupId          : subgroupId,
                        description         : description,
                        userActive          : userActive,
                        filter_type_id      : filter_type_id,
                        filter_type_value   : filter_type_value
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
                            $('#updateUser_form')[0].reset();
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
                                   message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Update data error, please contact administrator !'
                                },
                                'position'  :'top right'
                            });

                            $('.finish-btn').prop('disabled', false);
                        } else {
                            $('.finish-btn').prop('disabled', false);
                        }
                    }
                });
            // }

        }

        $('.btn-primary').prop('disabled', false);

    });

    $("#deleteUser_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var user_id = $('#delete_user_id').val();

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
            url: '/user_data_delete',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                user_id     : user_id
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