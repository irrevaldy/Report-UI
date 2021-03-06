<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


	Route::get('/terminal_management', function () { return view('terminal_management'); });

	/* ajax dummy */
	Route::get('/ajax_dummy',  												['uses' => 'ajaxController@dummy']);

	/* login */
	Route::get('/', 														[ 'as' => 'loginPage', 'uses' => 'LoginController@login_page'] );
	Route::post('/login_proc', 												['uses' => 'LoginController@login_proccess']);
	Route::get('/logout', 													['as' => 'logout', 'uses' => 'LoginController@logout_proccess']);
	Route::get('/re-token', 												['uses' => 'tokenController@create']);
	//Route::get('/index', function () { return view('home'); });

Route::group(['middleware' => 'global_middleware' ], function()
{
	Route::get('/index', 													['uses' => 'indexController@index']);

	Route::get('/dashbank', 												['uses' => 'DashbankController@index_copy']);
	Route::get('/dashbank_copy', 											['uses' => 'DashbankController@index_copy']);
	Route::get('/dashprovider', 											['uses' => 'DashprovController@index']);
	// Route::get('/dashprovider', 											['uses' => 'DashproviderController@index']);
	Route::get('/dashmerchant',												['uses' => 'DashmerchantController@index']);

	Route::get('/dashserviceprovider', 										['uses' => 'DashserviceprovController@index']);

	Route::get('/monitoring', 												['uses' => 'monitoringController@index']);
	Route::get('/mon_data', 												['uses' => 'monitoringController@getMonitoringData']);
	Route::post('/apply_config_trx_total', 									['uses' => 'monitoringController@applyConfigTrxTotal']);
	Route::get('/update_trx_total_data', 									['uses' => 'monitoringController@getTrxTotalData']);

	Route::get('/dashboard_merchant/monthly_branch',  						['uses' => 'DashmerchantController@GetMonthlyBranchTransactionTop5']);
	Route::get('/dashboard_merchant/monthly_branchlow',  					['uses' => 'DashmerchantController@GetMonthlyBranchTransactionLow5']);
	Route::get('/dashboard_merchant/monthly_storehigh',  					['uses' => 'DashmerchantController@GetMonthlyStoreTransactionTop5']);
	Route::get('/dashboard_merchant/monthly_storelow',  					['uses' => 'DashmerchantController@GetMonthlyStoreTransactionLow5']);


	//Search Transaction
	Route::get('/search_transaction', 													['uses' => 'SearchController@index']);
	Route::post('/search_transaction/main_data', ['as' => 'search_transaction_main','uses' => 'SearchController@getDataSearchTransaction']);


	Route::get('/download_detail_report_acquirer',							['uses' => 'DownloadDetailReportAcquirerController@index']);
	Route::get('/download_detail_report_acquirer/get_list_report',			['uses' => 'DownloadDetailReportAcquirerController@GetListReport']);
	Route::post('/download_detail_report_acquirer/zip_list_report',			['uses' => 'DownloadDetailReportAcquirerController@ZipListReport']);
	Route::post('/download_detail_report_acquirer/filter_report_table',			['uses' => 'DownloadDetailReportAcquirerController@FilterReportTable']);


	Route::get('/download_recon_report_acquirer',							['uses' => 'DownloadReconReportAcquirerController@index']);
	Route::get('/download_recon_report_acquirer/get_list_report',			['uses' => 'DownloadReconReportAcquirerController@GetListReport']);
	Route::post('/download_recon_report_acquirer/zip_list_report',			['uses' => 'DownloadReconReportAcquirerController@ZipListReport']);
	Route::post('/download_recon_report_acquirer/filter_report_table',			['uses' => 'DownloadReconReportAcquirerController@FilterReportTable']);


	Route::get('/download_detail_report_merchant',							['uses' => 'DownloadDetailReportMerchantController@index']);
	Route::get('/download_detail_report_merchant/get_list_report',			['uses' => 'DownloadDetailReportMerchantController@GetListReport']);
	Route::post('/download_detail_report_merchant/zip_list_report',			['uses' => 'DownloadDetailReportMerchantController@ZipListReport']);
	Route::post('/download_detail_report_merchant/filter_report_table',			['uses' => 'DownloadDetailReportMerchantController@FilterReportTable']);


	Route::get('/download_recon_report_merchant',							['uses' => 'DownloadReconReportMerchantController@index']);
	Route::get('/download_recon_report_merchant/get_list_report',			['uses' => 'DownloadReconReportMerchantController@GetListReport']);
	Route::post('/download_recon_report_merchant/zip_list_report',			['uses' => 'DownloadReconReportMerchantController@ZipListReport']);
	Route::post('/download_recon_report_merchant/filter_report_table',			['uses' => 'DownloadReconReportMerchantController@FilterReportTable']);

	Route::get('/download_detail_report_branch',							['uses' => 'DownloadDetailReportBranchController@index']);
	Route::get('/download_detail_report_branch/get_list_report',			['uses' => 'DownloadDetailReportBranchController@GetListReport']);
	Route::post('/download_detail_report_branch/zip_list_report',			['uses' => 'DownloadDetailReportBranchController@ZipListReport']);
	Route::post('/download_detail_report_branch/filter_report_table',			['uses' => 'DownloadDetailReportBranchController@FilterReportTable']);

	Route::get('/download_recon_report_branch',							['uses' => 'DownloadReconReportBranchController@index']);
	Route::get('/download_recon_report_branch/get_list_report',			['uses' => 'DownloadReconReportBranchController@GetListReport']);
	Route::post('/download_recon_report_branch/zip_list_report',			['uses' => 'DownloadReconReportBranchController@ZipListReport']);
	Route::post('/download_recon_report_branch/filter_report_table',			['uses' => 'DownloadReconReportBranchController@FilterReportTable']);

	/* Change Password */
	Route::get('/change_password', 											['uses' => 'PasswordController@index']);
	Route::post('/change_password_data', 									['uses' => 'PasswordController@ChangePasswordData']);


	/* User Setup */
	Route::get('/user_setup', 												['uses' => 'UserController@index']);
	Route::get('/user_data', 												['uses' => 'UserController@getUserData']);
	Route::post('/user_data_insert', 										['uses' => 'UserController@insertUserData']);
	Route::post('/user_data_update', 										['uses' => 'UserController@updateUserData']);
	Route::post('/user_data_delete', 										['uses' => 'UserController@deleteUserData']);
	Route::get('/user_filter_type_data/{id_user}', 							['uses' => 'UserController@getUserFilterTypeData']);
	Route::get('/filter_value_option/{filter_type}', 						['uses' => 'UserController@getFilterValueOption']);


	/* Subgroup Setup */
	Route::get('/subgroup_setup', 											['uses' => 'SubgroupController@index']);
	Route::get('/subgroup_data/group/{id_group}', 							['uses' => 'SubgroupController@getSubgroupPerGroupData']);
	Route::get('/subgroup_data/{id_subgroup}', 								['uses' => 'SubgroupController@getSubgroupData']);
	Route::post('/subgroup_data_insert', 									['uses' => 'SubgroupController@insertSubgroupData']);
	Route::post('/subgroup_data_update', 									['uses' => 'SubgroupController@updateSubgroupData']);
	Route::post('/subgroup_data_delete', 									['uses' => 'SubgroupController@deleteSubgroupData']);

	/* Group Setup */
	Route::get('/group_setup', 												['uses' => 'GroupController@index']);
	Route::get('/group_data/{id_group}', 									['uses' => 'GroupController@getGroupData']);
	Route::post('/group_data_insert', 										['uses' => 'GroupController@insertGroupData']);
	Route::post('/group_data_update', 										['uses' => 'GroupController@updateGroupData']);
	Route::post('/group_data_delete', 										['uses' => 'GroupController@deleteGroupData']);
	Route::get('/group_privilege_data/{id_group}', 							['uses' => 'GroupController@getGroupPrivilegeData']);
	Route::get('/group_filter_type_data/{id_group}', 						['uses' => 'GroupController@getGroupFilterTypeData']);

	/* Package Setup */
	Route::get('/package_setup', 											['uses' => 'PackageController@index']);
	Route::get('/package_data/{id_package}', 								['uses' => 'PackageController@getPackageData']);
	Route::post('/package_data_insert', 									['uses' => 'PackageController@insertPackageData']);
	Route::post('/package_data_update', 									['uses' => 'PackageController@updatePackageData']);
	Route::post('/package_data_delete', 									['uses' => 'PackageController@deletePackageData']);

	/* Tran Package Privilege */
	Route::get('/tran_host_package_privilege_data/{id_package}', 			['uses' => 'PackageController@getTranPackagePrivilegeData']);
	Route::get('/tran_subgroup_privilege_data/{id_subgroup}', 				['uses' => 'SubgroupController@getTranSubgroupPrivilegeData']);

	/* Privilege Setup */
	Route::get('/privilege_setup', 											['uses' => 'PrivilegeController@index']);
	Route::get('/privilege_data/{id_privilege}', 							['uses' => 'PrivilegeController@getPrivilegeData']);
	Route::post('/privilege_data_insert', 									['uses' => 'PrivilegeController@insertPrivilegeData']);
	Route::post('/privilege_data_update', 									['uses' => 'PrivilegeController@updatePrivilegeData']);
	Route::post('/privilege_data_delete', 									['uses' => 'PrivilegeController@deletePrivilegeData']);

	/* Data Filter Type Setup */
	Route::get('/filter_type_setup', 										['uses' => 'FiltertypeController@index']);
	Route::get('/filter_type_data/{id_filter_type}', 						['uses' => 'FiltertypeController@getFilterTypeData']);
	Route::post('/filter_type_data_insert', 								['uses' => 'FiltertypeController@insertFilterTypeData']);
	Route::post('/filter_type_data_update', 								['uses' => 'FiltertypeController@updateFilterTypeData']);
	Route::post('/filter_type_data_delete', 								['uses' => 'FiltertypeController@deleteFilterTypeData']);

	Route::get('/branch_data',['uses' => 'GlobalController@GetBranchData']);
	Route::get('/merchant_data',['uses' => 'GlobalController@GetMerchantData']);
	Route::get('/host_data',['uses' => 'GlobalController@GetHostData']);


});
