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
        <h2><i class="fas fa-user" aria-hidden="true"></i><strong> Subgroup </strong>Setup</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-6" style="margin-top: 4px;">
							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>Subgroup</strong> List</h3>
					  	</div>
                        
                            <div class="col-sm-6">
                                <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add Subgroup</button></a>
                            </div>
                        
					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <table  class="table" id="table1" >
                        <thead>
                            <tr>
                                <th width=5%>#</th>
                                <th>Group</th>
                                <th>Subgroup Name</th>
                                <th>Description</th>
                                <th width=18%></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($data['subgroup_data'] as $key => $value)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $value['group_fullname'] }} </td>
                                <td> {{ $value['subgroup_name'] }} </td>
                                <td> {{ str_ireplace("<br />", "\r\n", $value['description']) }} </td>

                                <td> 
                                    
                                        <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit('{{ $value['id'] }}', '{{ $value['user_group_id'] }}', '{{ $value['subgroup_name'] }}', '{{ $value['description'] }}')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                    
                                        <!-- <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  -->
                                    
                                    |
                                    
                                        <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_subgroup('{{ $value['id'] }}', '{{ $value['subgroup_name'] }}')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a> 
                                    
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

    <!-- Modal Add Subgroup -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 65%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Add New Subgroup</strong></h4>
            </div>
            <form role="form" class="form-validation" id="insertSubgroup_form" autocomplete="off">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Subgroup Name</label>
                              <input class="form-control form-white" name="new_subgroupName" id="new_subgroupName" maxlength="20" type="text" placeholder="subgroup name" required>
                            </div>
                        </div>
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

                <div class="row" id="add_privilege" style="padding-top: 10px;">
                    <div class="col-md-12">
                        <span style="font-style: italic;color: #999;"> *Select group to show supported privilege(s). </span>
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

    <!-- Modal Edit Subgroup -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width: 65%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Edit Subgroup</strong></h4>
            </div>
            <form role="form" class="form-validation" id="updateSubgroup_form" autocomplete="off">
            <input class="form-control form-white" name="edit_subgroup_id" id="edit_subgroup_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Subgroup Name</label>
                              <input class="form-control form-white" name="edit_subgroupName" id="edit_subgroupName" maxlength="20" type="text" placeholder="subgroup name" required>
                            </div>
                        </div>
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

                <div class="row" id="edit_privilege" style="padding-top: 10px;">
                    <div class="col-md-12">
                        <span style="font-style: italic;color: #999;"> *Select group to show supported privilege(s). </span>
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

    <!-- Modal Delete Subgroup -->
    <div id="deleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Delete Subgroup</strong></h4>
            </div>
            <form role="form" class="form-validation" id="deleteSubgroup_form" autocomplete="off">
            <input class="form-control form-white" name="delete_subgroup_id" id="delete_subgroup_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <p> Subgroup <span id="delete_subgroup_name" ></span> will be deleted, are you sure ? </p>
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
            write_privilege('add', this.value);
        });

        $(".edit_selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            write_privilege('edit', this.value);
        }); 

        $('.select2').width('100%');
        
    });

    var privilege_data = <?php echo json_encode($data['privilege_data']); ?>;
    var privilege_list = {};
    for( var i=0; i<privilege_data.length; i++ ) {

        var id_privilege = privilege_data[i].id;
        var privilege_name = privilege_data[i].privilege_name;

        privilege_list[ id_privilege ] = privilege_name;

    }

    function write_privilege( state, id_group) {
        
        if( id_group == '' ) {
            var id_group = '0';
        }

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/group_privilege_data/'+id_group,
            success: function (data) {

                var element = "";
                var element_edit = "";
                for( var i=0; i<data.length; i++ ) {
                    element +=  "<div class='col-md-4'>"
                                    + "<div class='form-group'>"
                                        + "<div class='icheck-list '>"
                                            + "<label><input type='checkbox' class='new_privilege' id='new_privilege_"+ data[i].privilege_id +"' data-checkbox='icheckbox_square-blue' value='"+ data[i].privilege_id +"'> "+ privilege_list[ data[i].privilege_id ] +" </label>"
                                        + "</div>"
                                    + "</div>"
                                + "</div>";

                    element_edit +=  "<div class='col-md-4'>"
                                    + "<div class='form-group'>"
                                        + "<div class='icheck-list '>"
                                            + "<label><input type='checkbox' class='edit_privilege' id='edit_privilege_"+ data[i].privilege_id +"' data-checkbox='icheckbox_square-blue' value='"+ data[i].privilege_id +"'> "+ privilege_list[ data[i].privilege_id ] +" </label>"
                                        + "</div>"
                                    + "</div>"
                                + "</div>";
                }

                if( state == 'add' ) {
                    $('div#add_privilege').html( element );
                    $('.new_privilege').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});
                } else if ( state == 'edit' ) {
                    $('div#edit_privilege').html( element_edit );
                    $('.edit_privilege').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});
                }

                if( id_group == '0' ) {
                    if( state == 'add' ) {
                        $('div#add_privilege').html( '<div class="col-md-12"><span style="font-style: italic;color: #999;"> *Select group to show supported privilege(s). </span></div>' );
                    } else if( state == 'edit' ) {
                        $('div#edit_privilege').html( '<div class="col-md-12"><span style="font-style: italic;color: #999;"> *Select group to show supported privilege(s). </span></div>' );
                    }
                }

            }
        });
    }

    function initTable() {
        var table = $('#table1').DataTable();
            
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/all',
            async: false,
            success: function (data) {

                table.clear().draw();

                var regex = /<br\s*[\/]?>/gi;

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));

                for (var i = 0; i < data.length; i++) {

                    var id                = data[i].id;
                    var user_group_id     = data[i].user_group_id;
                    var subgroup_name     = data[i].subgroup_name;
                    var description       = data[i].description;
                    var group_fullname    = data[i].group_fullname; 

                    var element = 
                        '<td>'+ (i + 1) +'</td>' + 
                        '<td>'+group_fullname+'</td>' + 
                        '<td>'+subgroup_name+'</td>' + 
                        '<td>'+description.replace(regex, "\n")+'</td>';

                    element += "<td>";

                    //if( contains.call(priv_list, 'SUBGROUP_E') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a style="cursor: pointer;" onClick="edit(\''+ id +'\', \''+user_group_id+'\', \''+subgroup_name+'\', \''+description+'\')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> |';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';
                    //}

                    //if( contains.call(priv_list, 'SUBGROUP_D ') == true || {{ Session::get('user_subgroup_id') }} == '1' ) {

                        element += '<a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_subgroup(\''+ id +'\', \''+subgroup_name+'\')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>';

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

    function edit( id, user_group_id, subgroup_name, description ) {

        $('#edit_subgroup_id').val(id);
        $('#edit_subgroupName').val(subgroup_name);
        $('#edit_description').val(description);
        $('#edit_groupId').val(user_group_id).trigger('change');

        $.ajax({
          url: "/tran_subgroup_privilege_data/"+id,
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

            $('#editModal').modal('show');
          }
        });

    }

    function delete_subgroup( id, subgroup_name ) {
        $('#delete_subgroup_id').val(id);
        $('span#delete_subgroup_name').html(subgroup_name);
    }

    $("#insertSubgroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var subgroupName    = $('#new_subgroupName').val();
        var groupId         = $('#new_groupId').val();
        var description     = $('#new_description').val();
        description         = description.replace(/\r?\n/g, '<br />');

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
                url: '/subgroup_data_insert',
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                data : {
                    subgroupName    : subgroupName,
                    groupId         : groupId,
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
                               message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Insert data success !'
                            },
                            'position'  :'top right'
                        });

                        $('#addModal').modal('hide');
                        initTable();
                        $('#insertSubgroup_form')[0].reset();
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

    $("#updateSubgroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var subgroup_id     = $('#edit_subgroup_id').val();
        var subgroupName    = $('#edit_subgroupName').val();
        var groupId         = $('#edit_groupId').val();
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
                url: '/subgroup_data_update',
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                data : {
                    subgroup_id     : subgroup_id,
                    subgroupName    : subgroupName,
                    groupId         : groupId,
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
                        $('#updateSubgroup_form')[0].reset();
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

    $("#deleteSubgroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var subgroup_id = $('#delete_subgroup_id').val();

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
            url: '/subgroup_data_delete',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                subgroup_id     : subgroup_id
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

                $('.finish-btn').prop('disabled', false);
            }
        });

    });

</script>
@endsection