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
	Route::get('/get_logo', 													['uses' => 'GlobalController@GetLogo']);


	Route::get('/get_total_summary', 										['uses' => 'DashproviderController@get_total_summary']);

	Route::get('/dashbank', 												['uses' => 'DashbankController@index_copy']);
	//Route::get('/dashbank_copy', 											['uses' => 'DashbankController@index_copy']);
	//Route::get('/dashprovider', 											['uses' => 'DashprovController@index']);
	// Route::get('/dashprovider', 											['uses' => 'DashproviderController@index']);
	//Route::get('/dashmerchant',												['uses' => 'DashmerchantController@index']);
	Route::get('/dashprovider', 											['uses' => 'DashproviderController@index']);
	Route::get('/dashacquirer', 											['uses' => 'DashacquirerController@index']);
	Route::get('/dashcorporate', 											['uses' => 'DashcorporateController@index']);
	Route::get('/dashmerchant', 											['uses' => 'DashmerchantController@index']);
	Route::get('/dashmerchant2', 											['uses' => 'Dashmerchant2Controller@index']);
	Route::get('/dashbranch', 												['uses' => 'DashbranchController@index']);
	Route::get('/dashstore', 												['uses' => 'DashstoreController@index']);

	Route::get('/monitoring', 												['uses' => 'monitoringController@index']);
	Route::get('/mon_data', 												['uses' => 'monitoringController@getMonitoringData']);
	Route::post('/apply_config_trx_total', 									['uses' => 'monitoringController@applyConfigTrxTotal']);
	Route::get('/update_trx_total_data', 									['uses' => 'monitoringController@getTrxTotalData']);

	Route::get('/dashboard_merchant/data_dashboard_merchant',  		['uses' => 'DashmerchantController@GetDataDashboardMerchant']);
	Route::get('/dashboard_merchant/trxvolume',  		['uses' => 'DashmerchantController@GetTransactionVolume']);
	Route::get('/dashboard_merchant/trxcount',  		['uses' => 'DashmerchantController@GetTransactionCount']);
	Route::get('/dashboard_merchant/top5acq_trxvolume',  					['uses' => 'DashmerchantController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_merchant/top5acq_trxcount',  					['uses' => 'DashmerchantController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_merchant/top5bra_trxvolume',  					['uses' => 'DashmerchantController@GetTop5BranchTransactionVolume']);
	Route::get('/dashboard_merchant/top5bra_trxcount',  					['uses' => 'DashmerchantController@GetTop5BranchTransactionCount']);
	Route::get('/dashboard_merchant/top5sto_trxvolume',  					['uses' => 'DashmerchantController@GetTop5StoreTransactionVolume']);
	Route::get('/dashboard_merchant/top5sto_trxcount',  					['uses' => 'DashmerchantController@GetTop5StoreTransactionCount']);
	Route::get('/dashboard_merchant/top5ctp_trxvolume',  					['uses' => 'DashmerchantController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_merchant/top5ctp_trxcount',  					['uses' => 'DashmerchantController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_merchant/top5ttp_trxvolume',  					['uses' => 'DashmerchantController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_merchant/top5ttp_trxcount',  					['uses' => 'DashmerchantController@GetTop5TransactionTypeTransactionCount']);

	Route::get('/dashboard_provider/data_dashboard_provider',  		['uses' => 'DashproviderController@GetDataDashboardProvider']);
	Route::get('/dashboard_provider/trxvolume',  		['uses' => 'DashproviderController@GetTransactionVolume']);
	Route::get('/dashboard_provider/trxcount',  		['uses' => 'DashproviderController@GetTransactionCount']);
	Route::get('/dashboard_provider/top5acq_trxvolume',  					['uses' => 'DashproviderController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_provider/top5acq_trxcount',  					['uses' => 'DashproviderController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_provider/top5mer_trxvolume',  					['uses' => 'DashproviderController@GetTop5MerchantTransactionVolume']);
	Route::get('/dashboard_provider/top5mer_trxcount',  					['uses' => 'DashproviderController@GetTop5MerchantTransactionCount']);
	Route::get('/dashboard_provider/top5sto_trxvolume',  					['uses' => 'DashproviderController@GetTop5StoreTransactionVolume']);
	Route::get('/dashboard_provider/top5sto_trxcount',  					['uses' => 'DashproviderController@GetTop5StoreTransactionCount']);
	Route::get('/dashboard_provider/top5ctp_trxvolume',  					['uses' => 'DashproviderController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_provider/top5ctp_trxcount',  					['uses' => 'DashproviderController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_provider/top5ttp_trxvolume',  					['uses' => 'DashproviderController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_provider/top5ttp_trxcount',  					['uses' => 'DashproviderController@GetTop5TransactionTypeTransactionCount']);

	Route::get('/dashboard_acquirer/data_dashboard_acquirer',  		['uses' => 'DashacquirerController@GetDataDashboardAcquirer']);
	Route::get('/dashboard_acquirer/trxvolume',  		['uses' => 'DashacquirerController@GetTransactionVolume']);
	Route::get('/dashboard_acquirer/trxcount',  		['uses' => 'DashacquirerController@GetTransactionCount']);
	Route::get('/dashboard_acquirer/top5acq_trxvolume',  					['uses' => 'DashacquirerController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_acquirer/top5acq_trxcount',  					['uses' => 'DashacquirerController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_acquirer/top5mer_trxvolume',  					['uses' => 'DashacquirerController@GetTop5MerchantTransactionVolume']);
	Route::get('/dashboard_acquirer/top5mer_trxcount',  					['uses' => 'DashacquirerController@GetTop5MerchantTransactionCount']);
	Route::get('/dashboard_acquirer/top5ctp_trxvolume',  					['uses' => 'DashacquirerController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_acquirer/top5ctp_trxcount',  					['uses' => 'DashacquirerController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_acquirer/top5ttp_trxvolume',  					['uses' => 'DashacquirerController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_acquirer/top5ttp_trxcount',  					['uses' => 'DashacquirerController@GetTop5TransactionTypeTransactionCount']);


	Route::get('/dashboard_corporate/data_dashboard_corporate',  		['uses' => 'DashcorporateController@GetDataDashboardCorporate']);
	Route::get('/dashboard_corporate/trxvolume',  		['uses' => 'DashcorporateController@GetTransactionVolume']);
	Route::get('/dashboard_corporate/trxcount',  		['uses' => 'DashcorporateController@GetTransactionCount']);
	Route::get('/dashboard_corporate/top5acq_trxvolume',  					['uses' => 'DashcorporateController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_corporate/top5acq_trxcount',  					['uses' => 'DashcorporateController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_corporate/top5mer_trxvolume',  					['uses' => 'DashcorporateController@GetTop5MerchantTransactionVolume']);
	Route::get('/dashboard_corporate/top5mer_trxcount',  					['uses' => 'DashcorporateController@GetTop5MerchantTransactionCount']);
	Route::get('/dashboard_corporate/top5ctp_trxvolume',  					['uses' => 'DashcorporateController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_corporate/top5ctp_trxcount',  					['uses' => 'DashcorporateController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_corporate/top5ttp_trxvolume',  					['uses' => 'DashcorporateController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_corporate/top5ttp_trxcount',  					['uses' => 'DashcorporateController@GetTop5TransactionTypeTransactionCount']);

	Route::get('/dashboard_branch/data_dashboard_branch',  		['uses' => 'DashbranchController@GetDataDashboardBranch']);
	Route::get('/dashboard_branch/trxvolume',  		['uses' => 'DashbranchController@GetTransactionVolume']);
	Route::get('/dashboard_branch/trxcount',  		['uses' => 'DashbranchController@GetTransactionCount']);
	Route::get('/dashboard_branch/top5acq_trxvolume',  					['uses' => 'DashbranchController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_branch/top5acq_trxcount',  					['uses' => 'DashbranchController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_branch/top5sto_trxvolume',  					['uses' => 'DashbranchController@GetTop5StoreTransactionVolume']);
	Route::get('/dashboard_branch/top5sto_trxcount',  					['uses' => 'DashbranchController@GetTop5StoreTransactionCount']);
	Route::get('/dashboard_branch/top5ctp_trxvolume',  					['uses' => 'DashbranchController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_branch/top5ctp_trxcount',  					['uses' => 'DashbranchController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_branch/top5ttp_trxvolume',  					['uses' => 'DashbranchController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_branch/top5ttp_trxcount',  					['uses' => 'DashbranchController@GetTop5TransactionTypeTransactionCount']);

	Route::get('/dashboard_store/data_dashboard_store',  		['uses' => 'DashstoreController@GetDataDashboardStore']);
	Route::get('/dashboard_store/trxvolume',  		['uses' => 'DashstoreController@GetTransactionVolume']);
	Route::get('/dashboard_store/trxcount',  		['uses' => 'DashstoreController@GetTransactionCount']);
	Route::get('/dashboard_store/top5acq_trxvolume',  					['uses' => 'DashstoreController@GetTop5AcquirerTransactionVolume']);
	Route::get('/dashboard_store/top5acq_trxcount',  					['uses' => 'DashstoreController@GetTop5AcquirerTransactionCount']);
	Route::get('/dashboard_store/top5ctp_trxvolume',  					['uses' => 'DashstoreController@GetTop5CardTypeTransactionVolume']);
	Route::get('/dashboard_store/top5ctp_trxcount',  					['uses' => 'DashstoreController@GetTop5CardTypeTransactionCount']);
	Route::get('/dashboard_store/top5ttp_trxvolume',  					['uses' => 'DashstoreController@GetTop5TransactionTypeTransactionVolume']);
	Route::get('/dashboard_store/top5ttp_trxcount',  					['uses' => 'DashstoreController@GetTop5TransactionTypeTransactionCount']);


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

	Route::get('/download_detail_report_provider',							['uses' => 'DownloadDetailReportProviderController@index']);
	Route::get('/download_detail_report_provider/get_list_report',			['uses' => 'DownloadDetailReportProviderController@GetListReport']);
	Route::post('/download_detail_report_provider/zip_list_report',			['uses' => 'DownloadDetailReportProviderController@ZipListReport']);
	Route::post('/download_detail_report_provider/filter_report_table',			['uses' => 'DownloadDetailReportProviderController@FilterReportTable']);

	Route::get('/download_recon_report_provider',							['uses' => 'DownloadReconReportProviderController@index']);
	Route::get('/download_recon_report_provider/get_list_report',			['uses' => 'DownloadReconReportProviderController@GetListReport']);
	Route::post('/download_recon_report_provider/zip_list_report',			['uses' => 'DownloadReconReportProviderController@ZipListReport']);
	Route::post('/download_recon_report_provider/filter_report_table',			['uses' => 'DownloadReconReportProviderController@FilterReportTable']);

	Route::get('/download_detail_report_corporate',							['uses' => 'DownloadDetailReportCorporateController@index']);
	Route::get('/download_detail_report_corporate/get_list_report',			['uses' => 'DownloadDetailReportCorporateController@GetListReport']);
	Route::post('/download_detail_report_provide/zip_list_report',			['uses' => 'DownloadDetailReportCorporateController@ZipListReport']);
	Route::post('/download_detail_report_corporate/filter_report_table',			['uses' => 'DownloadDetailReportCorporateController@FilterReportTable']);

	Route::get('/download_recon_report_corporate',							['uses' => 'DownloadReconReportCorporateController@index']);
	Route::get('/download_recon_report_corporate/get_list_report',			['uses' => 'DownloadReconReportCorporateController@GetListReport']);
	Route::post('/download_recon_report_corporate/zip_list_report',			['uses' => 'DownloadReconReportCorporateController@ZipListReport']);
	Route::post('/download_recon_report_corporate/filter_report_table',			['uses' => 'DownloadReconReportCorporateController@FilterReportTable']);

	Route::get('/download_detail_report_store',							['uses' => 'DownloadDetailReportStoreController@index']);
	Route::get('/download_detail_report_store/get_list_report',			['uses' => 'DownloadDetailReportStoreController@GetListReport']);
	Route::post('/download_detail_report_provide/zip_list_report',			['uses' => 'DownloadDetailReportStoreController@ZipListReport']);
	Route::post('/download_detail_report_store/filter_report_table',			['uses' => 'DownloadDetailReportStoreController@FilterReportTable']);

	Route::get('/download_recon_report_store',							['uses' => 'DownloadReconReportStoreController@index']);
	Route::get('/download_recon_report_store/get_list_report',			['uses' => 'DownloadReconReportStoreController@GetListReport']);
	Route::post('/download_recon_report_store/zip_list_report',			['uses' => 'DownloadReconReportStoreController@ZipListReport']);
	Route::post('/download_recon_report_store/filter_report_table',			['uses' => 'DownloadReconReportStoreController@FilterReportTable']);

	Route::get('/active_inactive_terminal',							['uses' => 'ActiveTerminalController@index']);
	Route::get('/inactive_tid',							['uses' => 'InactiveTIDController@index']);
	Route::get('/terminal_location',							['uses' => 'TerminalLocationController@index']);

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
	Route::get('/filter_value_option_selected/{filter_type}/{user_id}', 						['uses' => 'UserController@getFilterValueOptionSelected']);
	Route::post('/filter_value_option_augmented', 						['uses' => 'UserController@getFilterValueOptionAugmented']);
	Route::post('/filter_value_option_selected_augmented', 						['uses' => 'UserController@getFilterValueOptionSelectedAugmented']);
	Route::get('/filter_type_option', 						['uses' => 'UserController@getFilterTypeOption']);


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
	Route::get('/branch_data_filtered',['uses' => 'GlobalController@GetBranchDataFiltered']);
	Route::get('/merchant_data_filtered',['uses' => 'GlobalController@GetMerchantDataFiltered']);
	Route::get('/host_data_filtered',['uses' => 'GlobalController@GetHostDataFiltered']);

	Route::get('/get_terminal_location',['uses' => 'TerminalLocationController@GetTerminalLocationData']);


});
