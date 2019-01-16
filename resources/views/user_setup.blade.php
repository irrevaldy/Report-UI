@extends('layout')

@section('content')
<?php
ini_set('max_execution_time', 36000);
ini_set('max_input_vars', 1000000);

?>
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

        .modal-dialog {

            margin-top: 100px;
            z-index: 10000;

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
                <a data-toggle="modal" data-target="#addModal" ><button id="botton_addModal" type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add User</button></a>
              </div>
            </div>
          </div>
          <div class="panel-content pagination2 table-responsive">
            <table class="table" id="table1" >
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
                        <strong>Add Data Filter</strong>
                    </span>
                </div>
                <!--<div class="col-md-3">
                    <span class="modal-title add_addOption">
                        <a style="cursor: pointer;" onClick="write_filter_type()"><strong>Add Filter Type</strong></a>
                    </span>
                </div>-->
                </div>

                <div id="add_filterType" style="padding-top: 10px;">
                  <div class="row">
                        <div  class="col-md-12">
                            <!--<span style="font-style: italic;color: #999;"> *please add filter type. </span>-->
                            <div class='row div_filter_type select-filter-type'>
                              <div class='col-md-5'>
                                <div class='form-group'>
                                  <label>Filter Type</label>
                                  <a class="hide-loading" style="display: none">
                                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                                     <span> Loading...</span>
                                  </a>
                                  <select class='form-control form-white new_selectFilterType' name='filterTypeList' id='filterTypeList' data-search='true' required >
                                    <option value=''></option>
                                  </select>
                                </div>
                              </div>

                        </div>
                    </div>
                </div>


                </div>

                <!-- ==================FILTER VALUE ACQUIRER ==================-->
                <div class="row mg-t-20 filter-acquirer" style="display: none">
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Data Filter: </label>
			        		    <select name="option_filter_acquirer" id="option_filter_acquirer" class="form-control" size="20" multiple="multiple">
                        </select>
			        		</div>
			        		<div class="col-lg-2">
		        		    	<div><button type="button" id="option_filter_acquirer_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
		        		    	<div><button type="button" id="option_filter_acquirer_rightSelected" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
		        		    	<div><button type="button" id="option_filter_acquirer_leftSelected" class="btn btn-danger"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
		        		    	<div><button type="button" id="option_filter_acquirer_leftAll" class="btn btn-secondary"><i class="glyphicon glyphicon-backward"></i></button></div>
			        		</div>
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Privilege: </label>
		        		    	<select name="filter_acquirer_selected" id="option_filter_acquirer_to" class="form-control" size="20" multiple="multiple">

                      </select>
		        			</div>
        				</div>

                <!-- ==================FILTER VALUE CORPORATE ==================-->
                <div class="row mg-t-20 filter-corporate" style="display: none">
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Data Filter: </label>
			        		    <select name="option_filter_corporate" id="option_filter_corporate" class="form-control" size="20" multiple="multiple">
                        </select>
			        		</div>
			        		<div class="col-lg-2 pd-t-30">
		        		    	<div><button type="button" id="option_filter_corporate_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
		        		    	<div><button type="button" id="option_filter_corporate_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
		        		    	<div><button type="button" id="option_filter_corporate_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
		        		    	<div><button type="button" id="option_filter_corporate_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
			        		</div>
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Privilege: </label>
		        		    	<select name="filter_corporate_selected" id="option_filter_corporate_to" class="form-control" size="20" multiple="multiple">

                      </select>
		        			</div>
        				</div>

                <!-- ==================FILTER VALUE MERCHANT ==================-->
                <div class="row mg-t-20 filter-merchant" style="display: none">
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Data Filter: </label>
			        		    <select name="option_filter_merchant" id="option_filter_merchant" class="form-control" size="20" multiple="multiple">
                      </select>
			        		</div>
			        		<div class="col-lg-2 pd-t-30">
		        		    	<div><button type="button" id="option_filter_merchant_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
		        		    	<div><button type="button" id="option_filter_merchant_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
		        		    	<div><button type="button" id="option_filter_merchant_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
		        		    	<div><button type="button" id="option_filter_merchant_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
			        		</div>
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Privilege: </label>
		        		    	<select name="filter_merchant_selected" id="option_filter_merchant_to" class="form-control" size="20" multiple="multiple">

                      </select>
		        			</div>
        				</div>

                <!-- ==================FILTER VALUE BRANCH ==================-->
                <div class="row mg-t-20 filter-branch" style="display: none">
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Data Filter: </label>
			        		    <select name="option_filter_branch" id="option_filter_branch" class="form-control" size="20" multiple="multiple">
                      </select>
			        		</div>
			        		<div class="col-lg-2 pd-t-30">
		        		    	<div><button type="button" id="option_filter_branch_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
		        		    	<div><button type="button" id="option_filter_branch_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
		        		    	<div><button type="button" id="option_filter_branch_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
		        		    	<div><button type="button" id="option_filter_branch_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
			        		</div>
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Privilege: </label>
		        		    	<select name="filter_branch_selected" id="option_filter_branch_to" class="form-control" size="20" multiple="multiple">

                      </select>
		        			</div>
        				</div>

                <!-- ==================FILTER VALUE STORE ==================-->
                <div class="row mg-t-20 filter-store" style="display: none">
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Data Filter: </label>
			        		    <select name="option_filter_store" id="option_filter_store" class="form-control" size="20" multiple="multiple">
                      </select>
			        		</div>
			        		<div class="col-lg-2 pd-t-30">
		        		    	<div><button type="button" id="option_filter_store_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
		        		    	<div><button type="button" id="option_filter_store_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
		        		    	<div><button type="button" id="option_filter_store_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
		        		    	<div><button type="button" id="option_filter_store_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
			        		</div>
			        		<div class="col-lg-5">
			        			<label class="form-control-label">Selected Privilege: </label>
		        		    	<select name="filter_store_selected" id="option_filter_store_to" class="form-control" size="20" multiple="multiple">

                      </select>
		        			</div>
        				</div>

              </div>
              <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnCancel">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="btnSubmit" style="display: none">Submit</button>
                  <button type="button" class="btn btn-primary" id="btnTombol" onclick="tombol()">Submit</button>

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
                              <input class="form-control form-white" name="edit_username1" id="edit_username1" maxlength="30" type="text" placeholder="username" required disabled>
                              <input class="form-control form-white" name="edit_username" id="edit_username" maxlength="30" type="hidden" placeholder="username">

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
                                <a id="hide-load" style="display: none">
                                  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                  <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                                   <span> Loading...</span>
                                </a>
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
                          <strong>Edit Data Filter</strong>
                      </span>
                  </div>
                  <!--<div class="col-md-3">
                      <span class="modal-title add_addOption">
                          <a style="cursor: pointer;" onClick="write_filter_type()"><strong>Add Filter Type</strong></a>
                      </span>
                  </div>-->
                  </div>

                  <div id="edit_filterType" style="padding-top: 10px;">
                    <div class="row">
                          <div  class="col-md-12">
                              <!--<span style="font-style: italic;color: #999;"> *please add filter type. </span>-->
                              <div class='row div_filter_type select-filter-type'>
                                <div class='col-md-5'>
                                  <div class='form-group'>
                                    <label>Filter Type</label>
                                    <a class="hide-loading" style="display: none">
                                      &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                      <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 14px"></i>
                                       <span> Loading...</span>
                                    </a>
                                    <select class='form-control form-white new_selectFilterType' name='editfilterTypeList' id='editfilterTypeList' data-search='true' required >
                                      <option value=''></option>
                                    </select>
                                  </div>
                                </div>
                          </div>
                      </div>
                  </div>


                  </div>

                  <!-- ==================FILTER VALUE ACQUIRER ==================-->
                  <div class="row mg-t-20 edit-filter-acquirer" style="display: none">
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Data Filter: </label>
  			        		    <select name="edit_option_filter_acquirer" id="edit_option_filter_acquirer" class="form-control" size="20" multiple="multiple">
                          </select>
  			        		</div>
  			        		<div class="col-lg-2 pd-t-30">
  		        		    	<div><button type="button" id="edit_option_filter_acquirer_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_acquirer_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_acquirer_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_acquirer_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
  			        		</div>
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Privilege: </label>
  		        		    	<select name="edit_filter_acquirer_selected" id="edit_option_filter_acquirer_to" class="form-control" size="20" multiple="multiple">

                        </select>
  		        			</div>
          				</div>

                  <!-- ==================FILTER VALUE BRANCH ==================-->
                  <div class="row mg-t-20 edit-filter-branch" style="display: none">
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Data Filter: </label>
  			        		    <select name="edit_option_filter_branch" id="edit_option_filter_branch" class="form-control" size="20" multiple="multiple">
                        </select>
  			        		</div>
  			        		<div class="col-lg-2 pd-t-30">
  		        		    	<div><button type="button" id="edit_option_filter_branch_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_branch_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_branch_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_branch_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
  			        		</div>
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Privilege: </label>
  		        		    	<select name="edit_filter_branch_selected" id="edit_option_filter_branch_to" class="form-control" size="20" multiple="multiple">

                        </select>
  		        			</div>
          				</div>

                  <!-- ==================FILTER VALUE CORPORATE ==================-->
                  <div class="row mg-t-20 edit-filter-corporate" style="display: none">
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Data Filter: </label>
  			        		    <select name="edit_option_filter_corporate" id="edit_option_filter_corporate" class="form-control" size="20" multiple="multiple">
                          </select>
  			        		</div>
  			        		<div class="col-lg-2 pd-t-30">
  		        		    	<div><button type="button" id="edit_option_filter_corporate_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_corporate_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_corporate_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_corporate_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
  			        		</div>
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Privilege: </label>
  		        		    	<select name="edit_filter_corporate_selected" id="edit_option_filter_corporate_to" class="form-control" size="20" multiple="multiple">

                        </select>
  		        			</div>
          				</div>

                  <!-- ==================FILTER VALUE MERCHANT ==================-->
                  <div class="row mg-t-20 edit-filter-merchant" style="display: none">
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Data Filter: </label>
  			        		    <select name="edit_option_filter_merchant" id="edit_option_filter_merchant" class="form-control" size="20" multiple="multiple">
                        </select>
  			        		</div>
  			        		<div class="col-lg-2 pd-t-30">
  		        		    	<div><button type="button" id="edit_option_filter_merchant_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_merchant_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_merchant_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_merchant_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
  			        		</div>
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Privilege: </label>
  		        		    	<select name="edit_filter_merchant_selected" id="edit_option_filter_merchant_to" class="form-control" size="20" multiple="multiple">

                        </select>
  		        			</div>
          				</div>

                  <!-- ==================FILTER VALUE STORE ==================-->
                  <div class="row mg-t-20 edit-filter-store" style="display: none">
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Data Filter: </label>
  			        		    <select name="edit_option_filter_store" id="edit_option_filter_store" class="form-control" size="20" multiple="multiple">
                        </select>
  			        		</div>
  			        		<div class="col-lg-2 pd-t-30">
  		        		    	<div><button type="button" id="edit_option_filter_store_rightAll" class="btn btn-primary"><i class="glyphicon glyphicon-forward"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_store_rightSelected" class="btn btn-primary wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-right"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_store_leftSelected" class="btn btn-danger wd-100p mg-b-10"><i class="glyphicon glyphicon-chevron-left"></i></button></div>
  		        		    	<div><button type="button" id="edit_option_filter_store_leftAll" class="btn btn-secondary wd-100p mg-b-10"><i class="glyphicon glyphicon-backward"></i></button></div>
  			        		</div>
  			        		<div class="col-lg-5">
  			        			<label class="form-control-label">Selected Privilege: </label>
  		        		    	<select name="edit_filter_store_selected" id="edit_option_filter_store_to" class="form-control" size="20" multiple="multiple">

                        </select>
  		        			</div>
          				</div>

            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="btnEditSubmit" style="display: none">Submit</button>
                  <button type="button" class="btn btn-primary" id="btnEditTombol" onclick="editTombol()">Submit</button>

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

var checked = {};
var checkedParam;

var chosenAcquirer = Array();
var chosenCorporate = Array();
var chosenMerchant = Array();
var chosenBranch = Array();
var chosenStore = Array();

var chosen_acquirer = "";
var chosen_corporate = "";
var chosen_merchant = "";
var chosen_branch = "";
var chosen_store = "";

var checkedAcquirer = [];
var checkedCorporate = [];
var checkedMerchant = [];
var checkedBranch = [];
var checkedStore = [];

var load = [];
load[1] = 0;

var status_select_edit = 0;
var user_subgroup_id = 0;

	$(document).ready(function () {

        var table = $('#table1').DataTable();

        $('#option_filter_acquirer').multiselect({
    			"keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenAcquirer = [];
              checkedAcquirer = [];
              for( var i=0; i<$('#option_filter_acquirer_to option').length; i++ ) {
                chosenAcquirer[i] = $('#option_filter_acquirer_to option')[i].value;
                checkedAcquirer[chosenAcquirer[i]] = 1;
              }
              chosenAcquirer = chosenAcquirer.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedAcquirer'] = checkedAcquirer;

          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenAcquirer = [];
              checkedAcquirer = [];
              for( var i=0; i<$('#option_filter_acquirer_to option').length; i++ ) {
                chosenAcquirer[i] = $('#option_filter_acquirer_to option')[i].value;
                checkedAcquirer[chosenAcquirer[i]] = 1;
              }
              chosenAcquirer = chosenAcquirer.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedAcquirer'] = checkedAcquirer;
          }
    		});

    		$('#option_filter_corporate').multiselect({
    			"keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenCorporate = [];
              checkedCorporate = [];
              for( var i=0; i<$('#option_filter_corporate_to option').length; i++ ) {
                chosenCorporate[i] = $('#option_filter_corporate_to option')[i].value;
                checkedCorporate[$('#option_filter_corporate_to option')[i].value] = 1;
              }
              chosenCorporate = chosenCorporate.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedCorporate'] = checkedCorporate;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenCorporate = [];
              checkedCorporate = [];
              for( var i=0; i<$('#option_filter_corporate_to option').length; i++ ) {
                chosenCorporate[i] = $('#option_filter_corporate_to option')[i].value;
                checkedCorporate[$('#option_filter_corporate_to option')[i].value] = 1;
              }
              chosenCorporate = chosenCorporate.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedCorporate'] = checkedCorporate;
          }
    		});

    		$('#option_filter_merchant').multiselect({
    			"keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenMerchant = [];
              checkedMerchant = [];
              for( var i=0; i<$('#option_filter_merchant_to option').length; i++ ) {
                chosenMerchant[i] = $('#option_filter_merchant_to option')[i].value;
                checkedMerchant[$('#option_filter_merchant_to option')[i].value] = 1;
              }
              chosenMerchant = chosenMerchant.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedMerchant'] = checkedMerchant;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenMerchant = [];
              checkedMerchant = [];
              for( var i=0; i<$('#option_filter_merchant_to option').length; i++ ) {
                chosenMerchant[i] = $('#option_filter_merchant_to option')[i].value;
                checkedMerchant[$('#option_filter_merchant_to option')[i].value] = 1;
              }
              chosenMerchant = chosenMerchant.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedMerchant'] = checkedMerchant;
          }
    		});

    		$('#option_filter_branch').multiselect({
    			"keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenBranch = [];
              checkedBranch = [];
              for( var i=0; i<$('#option_filter_branch_to option').length; i++ ) {
                chosenBranch[i] = $('#option_filter_branch_to option')[i].value;
                checkedBranch[$('#option_filter_branch_to option')[i].value] = 1;
              }
              chosenBranch = chosenBranch.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedBranch'] = checkedBranch;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenBranch = [];
              checkedBranch = [];
              for( var i=0; i<$('#option_filter_branch_to option').length; i++ ) {
                chosenBranch[i] = $('#option_filter_branch_to option')[i].value;
                checkedBranch[$('#option_filter_branch_to option')[i].value] = 1;
              }
              chosenBranch = chosenBranch.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedBranch'] = checkedBranch;
          }
    		});

    	$('#option_filter_store').multiselect({
    			"keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenStore = [];
              checkedStore = [];
              for( var i=0; i<$('#option_filter_store_to option').length; i++ ) {
                chosenStore[i] = $('#option_filter_store_to option')[i].value;
                checkedStore[$('#option_filter_store_to option')[i].value] = 1;
                // console.log($('#option_filter_store_to option').length);
                // console.log(i);
              }
              chosenStore = chosenStore.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedStore'] = checkedStore;
              $(".hide-loading").css("display", "none");
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenStore = [];
              checkedStore = [];
              for( var i=0; i<$('#option_filter_store_to option').length; i++ ) {
                chosenStore[i] = $('#option_filter_store_to option')[i].value;
                checkedStore[$('#option_filter_store_to option')[i].value] = 1;
              }
              chosenStore = chosenStore.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedStore'] = checkedStore;
              $(".hide-loading").css("display", "none");
          }

    		});

        $('#edit_option_filter_acquirer').multiselect({
          "keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenAcquirer = [];
              checkedAcquirer = [];
              for( var i=0; i<$('#edit_option_filter_acquirer_to option').length; i++ ) {
                chosenAcquirer[i] = $('#edit_option_filter_acquirer_to option')[i].value;
                  checkedAcquirer[$('#edit_option_filter_acquirer_to option')[i].value] = 1;
              }
              chosenAcquirer = chosenAcquirer.toString();


              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedAcquirer'] = checkedAcquirer;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenAcquirer = [];
              checkedAcquirer = [];
              for( var i=0; i<$('#edit_option_filter_acquirer_to option').length; i++ ) {
                chosenAcquirer[i] = $('#edit_option_filter_acquirer_to option')[i].value;
                  checkedAcquirer[$('#edit_option_filter_acquirer_to option')[i].value] = 1;
              }
              chosenAcquirer = chosenAcquirer.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedAcquirer'] = checkedAcquirer;
          }
        });


        $('#edit_option_filter_corporate').multiselect({
          "keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenCorporate = [];
              checkedCorporate = [];
              for( var i=0; i<$('#edit_option_filter_corporate_to option').length; i++ ) {
                chosenCorporate[i] = $('#edit_option_filter_corporate_to option')[i].value;
                checkedCorporate[$('#edit_option_filter_corporate_to option')[i].value] = 1;
              }
              chosenCorporate = chosenCorporate.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedCorporate'] = checkedCorporate;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenCorporate = [];
              checkedCorporate = [];
              for( var i=0; i<$('#edit_option_filter_corporate_to option').length; i++ ) {
                chosenCorporate[i] = $('#edit_option_filter_corporate_to option')[i].value;
                checkedCorporate[$('#edit_option_filter_corporate_to option')[i].value] = 1;
              }
              chosenCorporate = chosenCorporate.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedCorporate'] = checkedCorporate;
          }
        });

        $('#edit_option_filter_merchant').multiselect({
          "keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenMerchant = [];
              checkedMerchant = [];
              for( var i=0; i<$('#edit_option_filter_merchant_to option').length; i++ ) {
                chosenMerchant[i] = $('#edit_option_filter_merchant_to option')[i].value;
                checkedMerchant[$('#edit_option_filter_merchant_to option')[i].value] = 1;
              }
              chosenMerchant = chosenMerchant.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedMerchant'] = checkedMerchant;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenMerchant = [];
              checkedMerchant = [];
              for( var i=0; i<$('#edit_option_filter_merchant_to option').length; i++ ) {
                chosenMerchant[i] = $('#edit_option_filter_merchant_to option')[i].value;
                checkedMerchant[$('#edit_option_filter_merchant_to option')[i].value] = 1;
              }
              chosenMerchant = chosenMerchant.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedMerchant'] = checkedMerchant;
          }
        });

        $('#edit_option_filter_branch').multiselect({
          "keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenBranch = [];
              checkedBranch = [];
              for( var i=0; i<$('#edit_option_filter_branch_to option').length; i++ ) {
                chosenBranch[i] = $('#edit_option_filter_branch_to option')[i].value;
                checkedBranch[$('#edit_option_filter_branch_to option')[i].value] = 1;
              }
              chosenBranch = chosenBranch.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedBranch'] = checkedBranch;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenBranch = [];
              checkedBranch = [];
              for( var i=0; i<$('#edit_option_filter_branch_to option').length; i++ ) {
                chosenBranch[i] = $('#edit_option_filter_branch_to option')[i].value;
                  checkedBranch[$('#edit_option_filter_branch_to option')[i].value] = 1;
              }
              chosenBranch = chosenBranch.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedBranch'] = checkedBranch;
          }
        });

        $('#edit_option_filter_store').multiselect({
          "keepRenderingSort": true,
          search: {
              left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
              right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
          },
          afterMoveToRight: function($left, $right, $options)
          {
              chosenStore = [];
              checkedStore = [];
              for( var i=0; i<$('#edit_option_filter_store_to option').length; i++ ) {
                chosenStore[i] = $('#edit_option_filter_store_to option')[i].value;
                  checkedStore[$('#edit_option_filter_store_to option')[i].value] = 1;
              }
              chosenStore = chosenStore.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedStore'] = checkedStore;
          },
          afterMoveToLeft: function($left, $right, $options)
          {
              chosenStore = [];
              checkedStore = [];
              for( var i=0; i<$('#edit_option_filter_store_to option').length; i++ ) {
                chosenStore[i] = $('#edit_option_filter_store_to option')[i].value;
                  checkedStore[$('#edit_option_filter_store_to option')[i].value] = 1;
              }
              chosenStore = chosenStore.toString();
              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);

              checked['checkedStore'] = checkedStore;
          }
        });

        $(".selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            get_subgroup( this.value );
        });

        $(".new_selectFilterType").select2({
            placeholder: "select filter type",
            allowClear: true
        }).on('change', function(event){


        });


        $(".edit_selectGroup").select2({
            placeholder: "select group",
            allowClear: true
        }).on('change', function(event){
            console.log(status_select_edit);
            edit_get_subgroup( this.value, user_subgroup_id, status_select_edit );
            status_select_edit = 1;
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



        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/filter_type_option',
            success: function (data) {

                data_list = data;

                var total_data = data.length;

                for (var i = 0; i < total_data ; i++) {

                    if(data[i].id < 6)
                    {
                      $('#filterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                    //  $('#editfilterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');

                      // disini
                      if ( data[i].id == '1') {
                        var text = 'checkedAcquirer';
                      } else if ( data[i].id == '2') {
                        var text = 'checkedCorporate';
                      } else if ( data[i].id == '3') {
                        var text = 'checkedMerchant';
                      } else if ( data[i].id == '4') {
                        var text = 'checkedBranch';
                      } else if ( data[i].id == '5') {
                        var text = 'checkedStore';
                      }

                      checked[ text ] = [];

                    }
                }

            }
        });

        /*$.ajax({
              dataType: 'JSON',
              type: 'POST',
              data: {
                chosen_acquirer          : chosenAcquirer,
                chosen_corporate         : chosenCorporate,
                chosen_merchant          : chosenMerchant,
                chosen_branch            : chosenBranch,
                chosen_store             : chosenStore,
                              },
              //headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
              url: '/filter_type_option_augmented',
              success: function (data)
              {
                  data_list = data;
                  var total_data = data.length;

                  for (var i = 0; i < total_data ; i++)
                  {
                      if(data[i].id < 6)
                      {
                        $('#filterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                        $('#editfilterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                      }
                  }
              }
            });
            */



        $('#filterTypeList').on('change', function() {

          $(".hide-loading").css("display", "inline");

          var menu;


          if ( this.value == '1') {
              $(".filter-acquirer").css('display', '');
              $(".filter-corporate").css('display', 'none');
              $(".filter-merchant").css('display', 'none');
              $(".filter-branch").css('display', 'none');
              $(".filter-store").css('display', 'none');

              menu = "#option_filter_acquirer";
              menu_to = "#option_filter_acquirer_to";
              checkedParam = "checkedAcquirer";
              //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '2') {
              $(".filter-acquirer").css('display', 'none');
              $(".filter-corporate").css('display', '');
              $(".filter-merchant").css('display', 'none');
              $(".filter-branch").css('display', 'none');
              $(".filter-store").css('display', 'none');

              menu = '#option_filter_corporate';
              menu_to = "#option_filter_corporate_to";
              checkedParam = "checkedCorporate";
              //  console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '3') {
              $(".filter-acquirer").css('display', 'none');
              $(".filter-corporate").css('display', 'none');
              $(".filter-merchant").css('display', '');
              $(".filter-branch").css('display', 'none');
              $(".filter-store").css('display', 'none');

              menu = "#option_filter_merchant";
              menu_to = "#option_filter_merchant_to";
              checkedParam = "checkedMerchant";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '4') {
              $(".filter-acquirer").css('display', 'none');
              $(".filter-corporate").css('display', 'none');
              $(".filter-merchant").css('display', 'none');
              $(".filter-branch").css('display', '');
              $(".filter-store").css('display', 'none');

              menu = "#option_filter_branch";
              menu_to = "#option_filter_branch_to";
              checkedParam = "checkedBranch";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '5') {
              $(".filter-acquirer").css('display', 'none');
              $(".filter-corporate").css('display', 'none');
              $(".filter-merchant").css('display', 'none');
              $(".filter-branch").css('display', 'none');
              $(".filter-store").css('display', '');

              menu = "#option_filter_store";
              menu_to = "#option_filter_store_to";
              checkedParam = "checkedStore";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }

          var modal_height = $('#addModal .modal-dialog').height() + 100 + 50;

          $('.modal-backdrop').css('height', modal_height );

      	  //$('.select-filter-type').css('margin-bottom', '0px');
          if(load[this.value] != 1)
          {
            // console.log(menu + " option");
            // console.log(menu_to + " option");
            $(menu + " option").remove();
            $(menu_to + " option").remove();

            var filter_type = $(this).val();

            var data_list = new Array();

            //var select = $(this).parent().parent().parent().find(".new_filterTypeValue");

            //$(this).parent().parent().parent().find(".new_filterTypeValue option").remove();
            //select.append('<option value=""></option>');

            $.ajax({


                  dataType: 'JSON',
                  type: 'POST',
                  data: {
                    chosen_acquirer          : chosenAcquirer,
                    chosen_corporate         : chosenCorporate,
                    chosen_merchant          : chosenMerchant,
                    chosen_branch            : chosenBranch,
                    chosen_store             : chosenStore,
                    filter_type              : filter_type
                                  },
                  headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                  url: '/filter_value_option_augmented',
                  success: function (data)
                  {
                    data_list = data;

                    var total_data = data.length;
                    // console.log(checkedParam + "[data[i].ID]");

                    //$(menu + " option").remove();
                    // console.log(total_data);
                    for (var i = 0; i < total_data ; i++)
                    {
                      var id = data[i].ID;
                      // console.log("checkedParam[" + data[i].ID + "] =" + checkedParam + "[" + id + "]");

                      // console.log( checked[ checkedParam ][ id ] );

                      if( checked[ checkedParam ][ id ] == 1)
                      {
                          $(menu_to).append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');
                      }
                      else {
                        $(menu).append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');
                      }
                    }

                    $(".hide-loading").css("display", "none");
                  }


                });

                /*$.ajax({
                    dataType: 'JSON',
                    type: 'GET',
                    async: false,
                    url: '/filter_value_option/'+filter_type,
                    success: function (data) {

                        data_list = data;

                        var total_data = data.length;
                        //$(menu + " option").remove();
                        for (var i = 0; i < total_data ; i++)
                        {
                            $(menu).append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');
                        }
                    }
                });*/
                if(this.value != 1)
                {
                  load[this.value] = 1;
                }

            load[(parseInt(this.value) + 1)] = 0;

            // console.log("a =" + this.value);
            // console.log("b =" + (parseInt(this.value) + 1));
            // console.log("load[" + this.value + "] = " + load[this.value]);
            // console.log("load[" + (parseInt(this.value) + 1) + "] = " + load[(parseInt(this.value) + 1)]);


          }
          else
          {
            load[(parseInt(this.value) + 1)] = 0;
            // console.log('Data already sent!');
            // console.log("load[" + this.value + "] = " + load[this.value]);
            // console.log("load[" + (parseInt(this.value) + 1) + "] = " + load[(parseInt(this.value) + 1)]);

            $(".hide-loading").css("display", "none");
          }


        });

        $('#editfilterTypeList').on('change', function() {

          $(".hide-loading").css("display", "inline");

          var menu;
          var user_id = document.getElementById("edit_user_id").value;
          console.log("user id = " +user_id);


          if ( this.value == '1') {
              $(".edit-filter-acquirer").css('display', '');
              $(".edit-filter-corporate").css('display', 'none');
              $(".edit-filter-merchant").css('display', 'none');
              $(".edit-filter-branch").css('display', 'none');
              $(".edit-filter-store").css('display', 'none');

              menu = "#edit_option_filter_acquirer";
              menu_to = "#edit_option_filter_acquirer_to";
              checkedParam = "checkedAcquirer";
              //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '2') {
              $(".edit-filter-acquirer").css('display', 'none');
              $(".edit-filter-corporate").css('display', '');
              $(".edit-filter-merchant").css('display', 'none');
              $(".edit-filter-branch").css('display', 'none');
              $(".edit-filter-store").css('display', 'none');

              menu = '#edit_option_filter_corporate';
              menu_to = "#edit_option_filter_corporate_to";
              checkedParam = "checkedCorporate";
              //  console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '3') {
              $(".edit-filter-acquirer").css('display', 'none');
              $(".edit-filter-corporate").css('display', 'none');
              $(".edit-filter-merchant").css('display', '');
              $(".edit-filter-branch").css('display', 'none');
              $(".edit-filter-store").css('display', 'none');
              checkedParam = "checkedMerchant";

              menu = "#edit_option_filter_merchant";
              menu_to = "#edit_option_filter_merchant_to";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '4') {
              $(".edit-filter-acquirer").css('display', 'none');
              $(".edit-filter-corporate").css('display', 'none');
              $(".edit-filter-merchant").css('display', 'none');
              $(".edit-filter-branch").css('display', '');
              $(".edit-filter-store").css('display', 'none');

              menu = "#edit_option_filter_branch";
              menu_to = "#edit_option_filter_branch_to";
              checkedParam = "checkedBranch";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }
          else if ( this.value == '5') {
              $(".edit-filter-acquirer").css('display', 'none');
              $(".edit-filter-corporate").css('display', 'none');
              $(".edit-filter-merchant").css('display', 'none');
              $(".edit-filter-branch").css('display', 'none');
              $(".edit-filter-store").css('display', '');

              menu = "#edit_option_filter_store";
              menu_to = "#edit_option_filter_store_to";
              checkedParam = "checkedStore";
                //console.log("load[" + this.value + "] = " + load[this.value]);
          }

          var modal_height = $('#editModal .modal-dialog').height() + 100 + 50;

          $('.modal-backdrop').css('height', modal_height );


      	  //$('.select-filter-type').css('margin-bottom', '0px');
          if(load[this.value] != 1)
          {
            var filter_type = $(this).val();

            var data_list = new Array();

            $(menu + " option").remove();
            $(menu_to + " option").remove();

            //var select = $(this).parent().parent().parent().find(".new_filterTypeValue");

            //$(this).parent().parent().parent().find(".new_filterTypeValue option").remove();
            //select.append('<option value=""></option>');



            $.ajax({

                dataType: 'JSON',
                type: 'POST',
                data: {
                  chosen_acquirer          : chosenAcquirer,
                  chosen_corporate         : chosenCorporate,
                  chosen_merchant          : chosenMerchant,
                  chosen_branch            : chosenBranch,
                  chosen_store             : chosenStore,
                  filter_type              : filter_type,
                  user_id                  : user_id
                                },
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                url: '/filter_value_option_selected_augmented',
                success: function (data)
                {
                    data_list = data;

                    var total_data = data.length;
                    //$(menu + " option").remove();
                    for (var i = 0; i < total_data ; i++)
                    {
                        var status = data[i].SSTATUS;
                        var id = data[i].ID;

                        if(status == 1 || checked[ checkedParam ][ id ] == 1)
                        {
                          $(menu_to).append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');
                        }
                        else
                        {
                            $(menu).append('<option value="'+data[i].ID+'">'+data[i].FNAME+'</option>');
                        }
                    }
                    $(".hide-loading").css("display", "none");
                }
            });

            if(this.value != 0)
            {
              load[this.value] = 1;
            }
            load[(parseInt(this.value) + 1)] = 0;

            // console.log("a =" + this.value);
            // console.log("b =" + (parseInt(this.value) + 1));
            // console.log("load[" + this.value + "] = " + load[this.value]);
            // console.log("load[" + (parseInt(this.value) + 1) + "] = " + load[(parseInt(this.value) + 1)]);
          }
          else
          {
            // console.log('Data already sent!');
            load[(parseInt(this.value) + 1)] = 0;
            // console.log('Data already sent!');
            // console.log("load[" + this.value + "] = " + load[this.value]);
            // console.log("load[" + (parseInt(this.value) + 1) + "] = " + load[(parseInt(this.value) + 1)]);

            $(".hide-loading").css("display", "none");
          }


        });


    });

    var filter_type_data = <?php echo json_encode($data['filter_type_data']); ?>;
    var filter_type_list = {};
    for( var i=0; i<filter_type_data.length; i++ )
    {
        var filter_type_id = filter_type_data[i].id;
        filter_type_list[ filter_type_id ] = filter_type_data[i].name;
    }

    /*var add_element_filter_type = "";
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

    for( var i=0; i<filter_type_data.length; i++ )
    {
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
    */

    function write_filter_type()
    {
        if( $('.div_filter_type').length == 0 )
        {
            $('#add_filterType').html( add_element_filter_type );
        }
        else
        {
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

                            for (var i = 0; i < total_data ; i++)
                            {
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

    function edit_write_filter_type()
    {
        if( $('.edit_div_filter_type').length == 0 )
        {
            $('#edit_filterType').html( edit_element_filter_type );
        }
        else
        {
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

                            for (var i = 0; i < total_data ; i++)
                            {
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

    function add_remove_filter_type( id )
    {
        // $('#div_filter_type_'+ value).remove();

        $(id).parents('.row').remove();
        // $('.modal-backdrop').height( $('#addModal .modal-content').height() + ( $('#addModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");

        if( $('.div_filter_type').length == 0 )
        {
            $('#add_filterType').html( "<div class='row' ><div class='col-md-12'><span style='font-style: italic;color: #999;'> *please add filter type. </span></div></div>" );
        }
    }

    function edit_remove_filter_type( id )
    {
        // $('#div_filter_type_'+ value).remove();

        $(id).parents('.row').remove();
        // $('.modal-backdrop').height( $('#editModal .modal-content').height() + ( $('#editModal .modal-content').height() * 20 / 100 ) );
        $('.modal-backdrop').height("100%");

        if( $('.edit_div_filter_type').length == 0 )
        {
            $('#edit_filterType').html( "<div class='row' ><div class='col-md-12'><span style='font-style: italic;color: #999;'> *please add filter type. </span></div></div>" );
        }
    }

    function initTable()
    {
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

    function get_subgroup( group_id )
    {
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/group/'+group_id,
            success: function (data) {

                $('#new_subgroupId option').remove();
                $('#new_subgroupId').append('<option value=""></option>');

                for( var i=0; i<data.length; i++ )
                {
                    $('#new_subgroupId').append('<option value="'+ data[i].id +'">'+ data[i].subgroup_name +'</option>');
                }
            }
        });
    }

    function edit_get_subgroup( group_id, subgroup_id, status_select_edit )
    {
        $("#hide-load").css("display", "inline");

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/subgroup_data/group/'+group_id,
            async: false,
            success: function (data) {

                $('#edit_subgroupId option').remove();
                $('#edit_subgroupId').append('<option value=""></option>');

                for( var i=0; i<data.length; i++ )
                {
                  if(status_select_edit == 0)
                  {
                    if(data[i].id == subgroup_id)
                    {
                      $('#edit_subgroupId').append('<option value="'+ data[i].id +'" selected>'+ data[i].subgroup_name +'</option>');
                    }
                    else
                    {
                      $('#edit_subgroupId').append('<option value="'+ data[i].id +'">'+ data[i].subgroup_name +'</option>');
                    }
                  }
                  else
                  {
                    $('#edit_subgroupId').append('<option value="'+ data[i].id +'">'+ data[i].subgroup_name +'</option>');
                  }
                }
                $("#hide-load").css("display", "none");
            }
        });
    }

    function edit( user_id, user_name, name, user_subgroup_id, description, user_active )
    {
      //$(".edit-filter-acquirer").css('display', '');
      status_select_edit = 0;
      this.user_subgroup_id = user_subgroup_id;

      $(".edit-filter-acquirer").css('display', 'none');
      $(".edit-filter-corporate").css('display', 'none');
      $(".edit-filter-merchant").css('display', 'none');
      $(".edit-filter-branch").css('display', 'none');
      $(".edit-filter-store").css('display', 'none');

        $('#edit_user_id').val(user_id);
        $('#edit_name').val(name);
        $('#edit_username').val(user_name);
        $('#edit_username1').val(user_name);
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

        if( user_active == '1' )
        {
            $('#edit_userActive').prop('checked', true);
        }
        else
        {
            $('#edit_userActive').prop('checked', false);
        }

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/filter_type_option',
            //async: false,
            success: function (data) {

                data_list = data;

                var total_data = data.length;

                  $('#editfilterTypeList option').remove();
                  $('#editfilterTypeList').append('<option value=""></option>');

                for (var i = 0; i < total_data ; i++) {
                    if(data[i].id < 6)
                    {
                      /*if(data[i].id == 1)
                      {
                        $('#filterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                        $('#editfilterTypeList').append('<option value="'+data[i].id+'"  selected>'+data[i].name+'</option>');

                      }
                      else {*/
                      //  $('#filterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');

                        $('#editfilterTypeList').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');

                        // disini
                        if ( data[i].id == '1') {
                          var text = 'checkedAcquirer';
                        } else if ( data[i].id == '2') {
                          var text = 'checkedCorporate';
                        } else if ( data[i].id == '3') {
                          var text = 'checkedMerchant';
                        } else if ( data[i].id == '4') {
                          var text = 'checkedBranch';
                        } else if ( data[i].id == '5') {
                          var text = 'checkedStore';
                        }

                        checked[ text ] = [];
                      //}


                    }
                }

            }
        });

        //$('#editfilterTypeList').on('change');

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: '/user_filter_type_data/'+user_id,
            success: function (data) {
              var data_list = new Array();

              data_list = data;

              for( var i=0; i<data_list.length; i++ ) {
                  if(data[i].data_filter_type_id == 1)
                  {
                    chosenAcquirer[i] = data_list[i].value;
                    checkedAcquirer[chosenAcquirer[i]] = 1;

                  }
                  else if(data[i].data_filter_type_id == 2)
                  {
                    chosenCorporate[i] = data_list[i].value;
                    checkedCorporate[chosenCorporate[i]] = 1;
                  }
                  else if(data[i].data_filter_type_id == 3)
                  {
                    chosenMerchant[i] = data_list[i].value;
                    checkedMerchant[chosenMerchant[i]] = 1;
                  }
                  else if(data[i].data_filter_type_id == 4)
                  {
                    chosenBranch[i] = data_list[i].value;
                    checkedBranch[chosenBranch[i]] = 1;
                  }
                  else(data[i].data_filter_type_id == 5)
                  {
                    chosenStore[i] = data_list[i].value;
                    checkedStore[chosenStore[i]] = 1;
                  }
              }
              chosenAcquirer = chosenAcquirer.toString();
              chosenCorporate = chosenCorporate.toString();
              chosenMerchant = chosenMerchant.toString();
              chosenBranch = chosenBranch.toString();
              chosenStore = chosenStore.toString();

              // console.log("Acquirer:" + chosenAcquirer);
              // console.log("Corporate:" + chosenCorporate);
              // console.log("Merchant:" + chosenMerchant);
              // console.log("Branch:" + chosenBranch);
              // console.log("Store:" + chosenStore);
              //
              // console.log("Checked Acquirer:" + checkedAcquirer);
              // console.log("Checked Corporate:" + checkedCorporate);
              // console.log("Checked Merchant:" + checkedMerchant);
              // console.log("Checked Branch:" + checkedBranch);
              // console.log("Checked Store:" + checkedStore);


              /*
              if(data)

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
                */
            }
        });

    }

    function delete_user( user_id, username )
    {
        $('#delete_user_id').val(user_id);
        $('span#delete_username').html(username);
    }

    function tombol()
    {
        $("#insertUser_form").submit();

        //e.preventDefault();

        // var multiple_select = $('select[name="filter_acquirer_selected"]').val();
        //
        // console.log(multiple_select);

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

        }
        else
        {
                  $.amaran({
                    'theme'     :'colorful',
                    'content'   :{
                       bgcolor:'#666',
                       color:'#fff',
                       message:'Please wait...',
                    },
                    'position'  :'top right',
                    'delay': 6000
                });

                //password = sha256(username+password);

                /*
                var filter_type_id = new Array();
                var filter_type_value = new Array();

                for( var i=0; i<$('.new_selectFilterType').length; i++ )
                {
                    var id = $('.new_selectFilterType')[i].value;
                    var value = $('select[name="new_filterTypeValue[]"]')[i].value;

                    filter_type_id.push( id );
                    filter_type_value.push( value );
                }
                */
                var formData = new FormData($('#insertUser_form')[0]);
                // var multiple_select = $('select[name="filter_acquirer_selected"]').map(function(){
                //     return this.value
                // }).get();

                //password = sha256(username+password);
                password = sha256(password);


                formData.set('new_password', password);
                formData.set('new_confirmPassword', password);

            		var filter_acquirer_list = [];
            		var filter_corporate_list = [];
            		var filter_merchant_list = [];
            		var filter_branch_list = [];
            		var filter_store_list = [];
            		for(var pair of formData.entries()) {
            		   	if (pair[0] == "filter_acquirer_selected") {
            		   		filter_acquirer_list.push(pair[1]);
            		   	}
            		   	if (pair[0] == "filter_corporate_selected") {
            		   		filter_corporate_list.push(pair[1]);
            		   	}
            		   	if (pair[0] == "filter_merchant_selected") {
            		   		filter_merchant_list.push(pair[1]);
            		   	}
            		   	if (pair[0] == "filter_branch_selected") {
            		   		filter_branch_list.push(pair[1]);
            		   	}
            		   	if (pair[0] == "filter_store_selected") {
            		   		filter_store_list.push(pair[1]);
            		   	}
            		}

                // formData.append('username', username);
                // formData.append('name', name);
                // formData.append('password', password);
                // formData.append('groupId', groupId);
                // formData.append('subgroupId', subgroupId);
                // formData.append('description', description);
                formData.append('filter_acquirer_list', filter_acquirer_list);
                 formData.append('filter_corporate_list', filter_corporate_list);
                 formData.append('filter_merchant_list', filter_merchant_list);
                 formData.append('filter_branch_list', filter_branch_list);
                 formData.append('filter_store_list', filter_store_list);

                 console.log(filter_store_list);


                for(var pair of formData.entries())
                {
        		   	   // console.log(pair[0]+ ', '+ pair[1]);
        		    }

                $.ajax({
                    dataType: 'JSON',
                    type: 'POST',
                    url: '/user_data_insert',
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    data : formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        if(data.success == true)
                        {
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

                            $(".filter-acquirer").css('display', 'none');
                            $(".filter-corporate").css('display', 'none');
                            $(".filter-merchant").css('display', 'none');
                            $(".filter-branch").css('display', 'none');
                            $(".filter-store").css('display', 'none');

                            $(".edit_selectFilterType").select2({
                                placeholder: "select filter type",
                                allowClear: true
                            }).on('change', function(event){
                            });

                            $('.warning_confirmPassword').css('display', '');

                            $("#option_filter_acquirer_leftAll").click();
                                $("#option_filter_corporate_leftAll").click();
                                $("#option_filter_merchant_leftAll").click();
                                $("#option_filter_branch_leftAll").click();
                                $("#option_filter_store_leftAll").click();

                        }
                        else if(data.success == false)
                        {
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
                        }
                        else if(data.success == 'error')
                        {
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
                        }
                        else
                        {
                            $('.finish-btn').prop('disabled', false);
                        }
                    }
                });
        }

        $('.btn-primary').prop('disabled', false);


    }

    function editTombol()
    {
      $("#updateUser_form").submit();

      $('.btn-primary').prop('disabled', true);

      var user_id         = $('#edit_user_id').val();
      var username        = $('#edit_username').val();
      var name            = $('#edit_name').val();
      var password        = $('#edit_password').val();
      var confirmPassword = $('#edit_confirmPassword').val();
      var groupId         = $('#edit_groupId').val();
      var subgroupId      = $('#edit_subgroupId').val();
      var description     = $('#edit_description').val();

      if( $('#edit_userActive').is(':checked') == true )
      {
          var userActive = '1';
      }
      else
      {
          var userActive = '0';
      }

      if( password != '' && password != confirmPassword )
      {
          $('.edit_warning_confirmPassword').css('display', 'block');
          $('.edit_matchPassword').css('border', '1px solid #ff5b5e');
          $('#'+ $('.edit_matchPassword')[0].getAttribute('id')).focus();
      }
      else
      {
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
                     message:'Please wait...',

                  },
                  'position'  :'top right',
                  'delay': 6000
              });

              if( password != '' ) {

                  password = sha256(username+password);

              }
              /*
              var filter_type_id      = new Array();
              var filter_type_value   = new Array();

              for( var i=0; i<$('.edit_selectFilterType').length; i++ ) {
                  var id      = $('.edit_selectFilterType')[i].value;
                  var value   = $('select[name="edit_filterTypeValue[]"]')[i].value;

                  filter_type_id.push( id );
                  filter_type_value.push( value );
              }
              */

              var formData = new FormData($('#updateUser_form')[0]);
              // var multiple_select = $('select[name="filter_acquirer_selected"]').map(function(){
              //     return this.value
              // }).get();

              var edit_filter_acquirer_list = [];
              var edit_filter_corporate_list = [];
              var edit_filter_merchant_list = [];
              var edit_filter_branch_list = [];
              var edit_filter_store_list = [];
              for(var pair of formData.entries()) {
                  if (pair[0] == "edit_filter_acquirer_selected") {
                    edit_filter_acquirer_list.push(pair[1]);
                  }
                  if (pair[0] == "edit_filter_corporate_selected") {
                    edit_filter_corporate_list.push(pair[1]);
                  }
                  if (pair[0] == "edit_filter_merchant_selected") {
                    edit_filter_merchant_list.push(pair[1]);
                  }
                  if (pair[0] == "edit_filter_branch_selected") {
                    edit_filter_branch_list.push(pair[1]);
                  }
                  if (pair[0] == "edit_filter_store_selected") {
                    edit_filter_store_list.push(pair[1]);
                  }
              }

              // formData.append('username', username);
              // formData.append('name', name);
              // formData.append('password', password);
              // formData.append('groupId', groupId);
              // formData.append('subgroupId', subgroupId);
              // formData.append('description', description);
              formData.append('edit_filter_acquirer_list', edit_filter_acquirer_list);
               formData.append('edit_filter_corporate_list', edit_filter_corporate_list);
               formData.append('edit_filter_merchant_list', edit_filter_merchant_list);
               formData.append('edit_filter_branch_list', edit_filter_branch_list);
               formData.append('edit_filter_store_list', edit_filter_store_list);


              for(var pair of formData.entries())
              {
                 console.log(pair[0]+ ', '+ pair[1]);
              }

              $.ajax({
                  dataType: 'JSON',
                  type: 'POST',
                  url: '/user_data_update',
                  headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                  data : formData,
                  processData: false,
                  contentType: false,
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
    }



    $("#insertUser_form").submit(function(e){

        e.preventDefault();

        var formData = new FormData($('#insertUser_form')[0]);

    });

    $("#updateUser_form").submit(function(e){
        e.preventDefault();

        var formData = new FormData($('#updateUser_form')[0]);
    });

    // var simpenan = Array();
    // $("#option_filter_acquirer").click(function(e){
    //   console.log(this.value);
    //
    // });



    $("#deleteUser_form").submit(function(e){
        e.preventDefault();

      //  $('.btn-primary').prop('disabled', true);

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
