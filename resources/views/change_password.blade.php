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
        <h2><i class="fas fa-user" aria-hidden="true"></i><strong> Change Password </strong></h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
				<div class="panel-header">
					<div class="row">
					 	<div class="col-sm-12" style="margin-top: 4px">
							<h3>
                                <span style="color: #ff9122"><i class="fa fa-warning" aria-hidden="true"></i> <strong>Warning!</strong></span> 
                                IMPORTANT: You will automatically be logged out after you change your password!
                            </h3>
					  	</div>
                        
                        <!-- <div class="col-sm-6">
                            <a data-toggle="modal" data-target="#addModal" ><button type="button" class="btn btn-white add-cluster"><i class="fa fa-plus"></i> Add Subgroup</button></a>
                        </div> -->
                        
					</div>                  
				</div>
				<div class="panel-content pagination2 table-responsive">
                    <form role="form" class="form-validation" id="form_password" autocomplete="off">
                        <div class="row">

                            <div class="col-md-6" style="padding:0px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="control-label">Old Password</label>
                                      <input class="form-control form-white" name="old_password" id="old_password" minlength="6" maxlength="20" type="password" placeholder="old password" required>
                                    </div>
                                </div>
                                <div id="msg_unmatch" class="mg-t-35 tx-danger" style="display: none"><span class="ion-close tx-12"></span><h7 class="tx-14"> Old password incorrect!</h7></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                      <input class="form-control form-white" name="new_password" id="new_password" minlength="6" maxlength="20" type="password" placeholder="new password" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm New Password</label>
                                      <input class="form-control form-white" name="conf_new_password" id="conf_new_password" minlength="6" maxlength="20" type="password" placeholder="confirm new password">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="float: right">
                                    <button type="button" class="btn btn-warning" id="btn-cancel">Cancel</button>
                                    <button type="submit" class="btn btn-primary" style="margin-right: 0px" id="btn-submit">Submit</button>  
                                </div>
                            </div>
                        </div>
                      
                    </form>
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
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- END PAGE SCRIPTS -->

<script type="text/javascript">

    $("#btn-cancel").click( function(event) {
        event.preventDefault();
        $("#form_password")[0].reset();
        // $("#form_password").parsley().reset();
    });

    $("#old_password").focus(function(){
        $(this).prop('style', 'borderStyle: initial');
        $('#msg_unmatch').hide();
    });

    $( "#form_password" ).validate({
        rules: {
            new_password: "required",
            conf_new_password: {
                equalTo: "#new_password"
            }
        }
    });

    $("#btn-submit").click( function(event) {
        event.preventDefault();

        
        $("#btn-submit").prop('disabled', true);
        // $("#load").css('display', 'block');
        // $("#btn-submit").html( $(".load_loader").html() );
        // $('#old_password').removeClass('animated shake');

        var formData = new FormData($('#form_password')[0]);

        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }

        var old_password    = $('#old_password').val();
        var new_password    = $('#new_password').val();

        $.ajax({
            dataType: 'JSON',
            type: 'POST',
            url: '/change_password_data',
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data : {
                old_password    : old_password,
                new_password    : new_password
            },
            //data : formData,
            // processData: false,
            success: function(data){   
                console.log(data);
                if(data.result == "UNMATCH"){
                    $("#btn-submit").html('Submit');
                    $("#btn-submit").prop('disabled', false);
                    $("#msg_unmatch").show();
                    $("#old_pass").prop('style', 'border-color: #D61313'); //border : red
                    // $('#input_old_pass').addClass('animated shake');

                }else if(data.result == "FAILED"){
                    $("#btn-submit").html('Submit');
                    $("#btn-submit").prop('disabled', false);
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Change password failed, please contact administrator !'
                        },
                        'position'  :'top right'
                    });
                }       
                else if(data.result == "SUCCESS"){
                    $("#btn-submit").html('Submit');
                    $("#btn-submit").prop('disabled', false);
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Change password success, redirecting to login page...'
                        },
                        'position'  :'top right'
                    });

                    setTimeout(function(){ $(".icon-logout").click(); }, 500);
                    // alertify.alert(header_success, 'Well done, Your password has been changed!').set('onok', function(closeEvent){ 
                    //     
                    // }); 
                }else{
                    $("#btn-submit").html('Submit');
                    $("#btn-submit").prop('disabled', false);
                    $.amaran({
                        'theme'     :'colorful',
                        'content'   :{
                           bgcolor:'#d6d6d6',
                           color:'#666',
                           message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Change password failed, please contact administrator !'
                        },
                        'position'  :'top right'
                    });
                }
                $("#form_password")[0].reset();
                // $("#form_password").parsley().reset();
            },
            error: function(){
                $("#btn-submit").html('Submit');
                $("#btn-submit").prop('disabled', false);
                // $("#expiredModal").modal(); 
            }
        });
    });
 //    $("#insertSubgroup_form").submit(function(e){
 //        e.preventDefault();

 //        $('.btn-primary').prop('disabled', true);

 //        var subgroupName    = $('#new_subgroupName').val();
 //        var groupId         = $('#new_groupId').val();
 //        var description     = $('#new_description').val();
 //        description         = description.replace(/\r?\n/g, '<br />');

 //        var privilege_select = $(".new_privilege:checked").map(function(){
 //            return $(this).val();
 //        }).toArray();

 //        if( privilege_select.length == 0) {
 //            $.amaran({
 //                'theme'     :'colorful',
 //                'content'   :{
 //                   bgcolor:'#f4d742',
 //                   color:'#666',
 //                   message:'<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select privilege !'
 //                },
 //                'position'  :'top right'
 //            });
 //        } else {
 //            $.amaran({
 //                'theme'     :'colorful',
 //                'content'   :{
 //                    bgcolor:'#666',
 //                    color:'#fff',
 //                    message:'Please wait...'
 //                },
 //                'position'  :'top right'
 //            });

 //            privilege_select = JSON.stringify(privilege_select);

 //            $.ajax({
 //                dataType: 'JSON',
 //                type: 'POST',
 //                url: '/subgroup_data_insert',
 //                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
 //                data : {
 //                    subgroupName    : subgroupName,
 //                    groupId         : groupId,
 //                    description     : description,
 //                    privilege       : privilege_select
 //                },
 //                success: function (data) {

 //                    if(data.success == true) {
 //                        $.amaran({
 //                            'theme'     :'colorful',
 //                            'content'   :{
 //                               bgcolor:'#d6d6d6',
 //                               color:'#666',
 //                               message:'<span style="color: #70c934;"><i class="fa fa-check" aria-hidden="true"></i> </span> Insert data success !'
 //                            },
 //                            'position'  :'top right'
 //                        });

 //                        $('#addModal').modal('hide');
 //                        initTable();
 //                        $('#insertSubgroup_form')[0].reset();
 //                    } else if(data.success == false) {
 //                        $.amaran({
 //                            'theme'     :'colorful',
 //                            'content'   :{
 //                               bgcolor:'#d6d6d6',
 //                               color:'#666',
 //                               message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> '+data.message+' !'
 //                            },
 //                            'position'  :'top right'
 //                        });

 //                        $('.finish-btn').prop('disabled', false);
 //                    } else if(data.success == 'error') {
 //                        $.amaran({
 //                            'theme'     :'colorful',
 //                            'content'   :{
 //                               bgcolor:'#d6d6d6',
 //                               color:'#666',
 //                               message:'<span style="color: #f44242;"><i class="fa fa-times" aria-hidden="true"></i> </span> Insert data error, please contact administrator !'
 //                            },
 //                            'position'  :'top right'
 //                        });

 //                        $('.finish-btn').prop('disabled', false);
 //                    } else {
 //                        $('.finish-btn').prop('disabled', false);
 //                    }
 //                }
 //            });
 //        }
		
 //        $('.btn-primary').prop('disabled', false);

 //    });

</script>
@endsection