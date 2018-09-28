      

<?php $__env->startSection('content'); ?>
    
    <link href="<?php echo e(asset('assets/plugins/AmaranJS/dist/css/amaran.min.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('assets/plugins/DataTables-1.10.16/dataTables.css')); ?>" rel="stylesheet">
    
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

        @media  screen and (max-width: 767px) {
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

        .modal-dialog {
            margin-top: 2%;
        }

    </style>
    
    <div class="header">
        <h2><i class="fas fa-users" aria-hidden="true"></i><strong> Group </strong>Setup</h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-6" style="margin-top: 4px;">
							<h3><i class="fa fa-list" aria-hidden="true"></i> <strong>Group</strong> List</h3>
					  	</div>
                        
                            <div class="col-sm-6">
                                <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add Group</button></a>
                            </div>
                        
					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <table  class="table" id="table1" >
                        <thead>
                            <tr>
                                <th width=5%>#</th>
                                <th>Group Name</th>
                                <th>Package</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th width=18%></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data['group_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($key + 1); ?> </td>
                                <td> <?php echo e($value['group_fullname']); ?> </td>
                                <td> <?php echo e($value['package_name']); ?> </td>
                                <td> <?php echo e($value['description']); ?> </td>

                                <?php if( $value['group_active'] == '1' ): ?>
                                    <td> <span class="label label-success">Yes</span> </td>
                                <?php else: ?>
                                    <td> <span class="label label-danger">No</span> </td>
                                <?php endif; ?>

                                <td> 

                                    
                                        <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit('<?php echo e($value['id']); ?>', '<?php echo e($value['package_id']); ?>', '<?php echo e($value['group_fullname']); ?>', '<?php echo e($value['description']); ?>', '<?php echo e($value['group_active']); ?>')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> 
                                    
                                        <!-- <a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>  -->
                                    
                                    |
                                    
                                        <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_group('<?php echo e($value['id']); ?>', '<?php echo e($value['group_fullname']); ?>')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>
                                    
                                        <!-- <a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>  -->
                                    

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
				</div>
                <div class="panel-footer">
                </div>
			</div>
        </div>
    </div>

    <!-- Modal Add Group -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Add New Group</strong></h4>
            </div>
            <form role="form" class="form-validation" id="insertGroup_form" autocomplete="off">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Group Name</label>
                              <input class="form-control form-white" name="new_groupName" id="new_groupName" maxlength="50" type="text" placeholder="group name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Package</label> 
                                <select class="form-control form-white selectPackage" name="new_packageId" id="new_packageId" data-search="true" required >
                                    <option value=''></option>     
                                    <?php $__currentLoopData = $data['package_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value['id']); ?>"> <?php echo e($value['package_name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
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

                <!-- <div class="row modal-header body">
                    <div class="col-md-10" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Select Filter Type : </strong>
                        </span>
                    </div>
                </div>

                <div class="row" id="" style="padding-top: 10px;">
                    <?php $__currentLoopData = $data['filter_type_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <div class='icheck-list '>
                                    <label><input type='checkbox' class='new_filterType' id='' data-checkbox='icheckbox_square-blue' value="<?php echo e($value['id']); ?>"> <?php echo e($value['name']); ?> </label>
                                </div>
                            </div>
                        </div>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                 <div class="row modal-header body">
                    <div class="col-md-10" style="padding-left: 0px;">
                        <span class="modal-title">
                            <strong>Filter Type Value : </strong>
                        </span>
                    </div>
                </div>

                <div class="row" id="add_filterType" style="padding-top: 10px;">
                    <div class="col-md-12">
                        <span style="font-style: italic;color: #999;"> *Select filter type to input value. </span>
                    </div>
                </div> -->

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

    <!-- Modal Edit Group -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Edit Group</strong></h4>
            </div>
            <form role="form" class="form-validation" id="updateGroup_form" autocomplete="off">
            <input class="form-control form-white" name="edit_group_id" id="edit_group_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label">Group Name</label>
                              <input class="form-control form-white" name="edit_groupName" id="edit_groupName" maxlength="50" type="text" placeholder="group name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Package</label> 
                                <select class="form-control form-white selectPackage" name="edit_packageId" id="edit_packageId" data-search="true" required >
                                    <option value=''></option>     
                                    <?php $__currentLoopData = $data['package_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value['id']); ?>"> <?php echo e($value['package_name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label> 
                                <textarea class="form-control form-white" rows="5" maxlength="100" name="edit_description" id="edit_description" aria-required="true" required placeholder="description..." ></textarea>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group new_status_group'>
                                <label class='control-label'> Active </label>
                                <br>
                                <div class='onoffswitch'>
                                    <input type='checkbox' class='onoffswitch-checkbox ' name='edit_groupActive'  id='edit_groupActive' >
                                    <label class='onoffswitch-label' for='edit_groupActive'>
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

    <!-- Modal Delete Subgroup -->
    <div id="deleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Delete Subgroup</strong></h4>
            </div>
            <form role="form" class="form-validation" id="deleteGroup_form" autocomplete="off">
            <input class="form-control form-white" name="delete_group_id" id="delete_group_id" maxlength="30" type="hidden" placeholder="" required>
            <div class="modal-body">
                <p> Group <span id="delete_group_name" ></span> will be deleted, are you sure ? </p>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form>
        </div>

      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<!-- BEGIN PAGE SCRIPTS -->
<script src="<?php echo e(asset('assets/plugins/DataTables-1.10.16/datatables.js')); ?>"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="<?php echo e(asset('assets/js/pages/table_dynamic.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/AmaranJS/dist/js/jquery.amaran.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/js-sha256/src/sha256.js')); ?>"></script>
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

        $('.select2').width('100%');

        $('.new_filterType').iCheck(
            {
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            }
        ).on('ifChecked', function(event){
            write_filter_type( this.value );
        }).on('ifUnchecked', function(event){
            remove_filter_type( this.value );
        });


        $(".selectFilterType").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){
           
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
            url: '/group_data/all',
            success: function (data) {

                table.clear().draw();

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '"- "'));

                for (var i = 0; i < data.length; i++) {

                    var id                = data[i].id;
                    var package_id        = data[i].package_id;
                    var group_fullname    = data[i].group_fullname;
                    var description       = data[i].description;
                    var group_active      = data[i].group_active;
                    var package_name      = data[i].package_name;

                    if( group_active == '1' ) {
                        var group_active_label = '<span class="label label-success">Yes</span>';
                    } else {
                        var group_active_label = '<span class="label label-danger">No</span>';
                    }

                    var element = 
                        '<td>'+ (i + 1) +'</td>' + 
                        '<td>'+group_fullname+'</td>' + 
                        '<td>'+package_name+'</td>' + 
                        '<td>'+description+'</td>' + 
                        '<td>'+group_active_label+'</td>';

                    element += "<td>";

                    //if( contains.call(priv_list, 'GROUP_E') == true || <?php echo e(Session::get('user_subgroup_id')); ?> == '1' ) {

                        element += '<a data-toggle="modal" data-target="#editModal" style="cursor: pointer;" onClick="edit(\''+ id +'\', \''+package_id+'\', \''+group_fullname+'\', \''+description+'\', \''+group_active+'\')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';

                    //} else {
                        //element += '<a style="color: #888" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a> | ';
                    //}

                    //if( contains.call(priv_list, 'GROUP_D') == true || <?php echo e(Session::get('user_subgroup_id')); ?> == '1' ) {

                        element += '<a data-toggle="modal" data-target="#deleteModal" style="cursor: pointer;" onClick="delete_group(\''+ id +'\', \''+group_fullname+'\')" ><i class="fa fa-times" aria-hidden="true"></i>Delete</a>';

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

    function edit( id, package_id, group_fullname, description, group_active ) {

        $('#edit_group_id').val(id);
        $('#edit_packageId').val(package_id).trigger('change');
        $('#edit_groupName').val(group_fullname);
        $('#edit_description').val(description);
        
        if( group_active == '1' ) {
            $('#edit_groupActive').prop('checked', true);
        } else {
            $('#edit_groupActive').prop('checked', false);
        }

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/group_filter_type_data/'+id,
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

    function delete_group( id, group_fullname ) {
        $('#delete_group_id').val(id);
        $('span#delete_group_name').html(group_fullname);
    }

    $("#insertGroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var groupName       = $('#new_groupName').val();
        var packageId       = $('#new_packageId').val();
        var description     = $('#new_description').val();

        if( $('.new_selectFilterType').length == 0) {
            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                   bgcolor:'#f4d742',
                   color:'#666',
                   message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select filter type !'
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
                url: '/group_data_insert',
                headers: { 'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" },
                data : {
                    groupName           : groupName,
                    packageId           : packageId,
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
                        $('#insertGroup_form')[0].reset();
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

    $("#updateGroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var group_id        = $('#edit_group_id').val();
        var groupName       = $('#edit_groupName').val();
        var packageId       = $('#edit_packageId').val();
        var description     = $('#edit_description').val();

        if( $('#edit_groupActive').is(':checked') == true ) {
            var groupActive = '1';
        } else {
            var groupActive = '0';
        }

        if( $('.edit_selectFilterType').length == 0) {
            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                   bgcolor:'#f4d742',
                   color:'#666',
                   message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select filter type !'
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

            var filter_type_id = new Array();
            var filter_type_value = new Array();

            for( var i=0; i<$('.edit_selectFilterType').length; i++ ) {
                var id = $('.edit_selectFilterType')[i].value;
                var value = $('select[name="edit_filterTypeValue[]"]')[i].value;

                filter_type_id.push( id );
                filter_type_value.push( value );
            }

            $.ajax({
                dataType: 'JSON',
                type: 'POST',
                url: '/group_data_update',
                headers: { 'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" },
                data : {
                    group_id            : group_id,
                    groupName           : groupName,
                    packageId           : packageId,
                    description         : description,
                    groupActive         : groupActive,
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
                        $('#updateGroup_form')[0].reset();
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

    $("#deleteGroup_form").submit(function(e){
        e.preventDefault();

        $('.btn-primary').prop('disabled', true);

        var group_id = $('#delete_group_id').val();

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
            url: '/group_data_delete',
            headers: { 'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" },
            data : {
                group_id     : group_id
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

        $('.btn-primary').prop('disabled', false);

    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>