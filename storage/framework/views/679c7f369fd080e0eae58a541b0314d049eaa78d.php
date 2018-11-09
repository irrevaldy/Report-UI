<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/index.ico')); ?>" type="image/png">
    <title>Wirecard Reporting</title>
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/theme.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/ui.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2-4.0.3/dist/css/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/font-awesome/css/fontawesome-all.css')); ?>">

   <!--  <script>
      FontAwesomeConfig = { searchPseudoElements: true };
    </script> -->
  </head>
  <!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
  <!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
  <!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
  <!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
  <!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
  <!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
  <!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
  <!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
  <!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

  <!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
  <!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->

  <!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
  <!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
  <!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
  <!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
  <!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
  <!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
  <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
  <!-- BEGIN BODY -->
  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <div class="logoimage">
            <img id="display_logo" src="" style="width: 135px;"/>
            <!--<img src="<?php echo e(asset('assets/images/logo/wirecard-logo-home-small.png')); ?>">-->
          </div>

          <style type="text/css">

            .sidebar .sidebar-inner .nav-sidebar {
                margin-bottom: 0;
            }

            body > section {
                background: #F0F0F0 none repeat scroll 0 0;
            }

            body a {

              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;

            }

            body a:hover {
              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }

            .cluster-list {
              display: inline-block;
              width: 100%;
              padding: 8px 5px;
            }

            .cluster-list a {
              cursor: pointer;
            }

            span.cluster-list:hover{
              background-color: #eee;
            }

            .logopanel img {
              width: 100%;

            }

            .logoimage {
              border: 0px solid #f00;
              width: 150px;
              margin: auto;

            }

            .panel-header {
              border-bottom: 3px solid #D6D6D6;
            }

            .panel-header.border-less {
              border: 0;
            }

            .sidebar .sidebar-inner .nav-sidebar > li > a:hover {
              /*color: #7295E5;*/
              color: #e00000;
            }

            .sidebar .logopanel {
              padding: 5px;
            }

            .theme-sdtl.color-default:not(.sidebar-top) .logopanel {
                background: #f5f5f5  none repeat scroll 0 0;
            }

            /*.page-content .header h2,*/
            .main-content .page-content .panel {
              border-left: 3px solid #666;
            }

            .form-control.form-white {
                background-color: #ffffff;
                border: 1px solid #ccc;
                color: #555555;
            }

            .form-control.form-white:hover {
                background-color: #ffffff;
                border: 1px solid #666;
                color: #555555;
                outline: medium none;
            }

            .prepend-icon input {
                border: 1px solid #ccc;
                padding-left: 36px;
            }

            .select2-container {
                display: inherit;
            }

            .modal-open .modal {
              z-index: 1000;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #bbb;
                border-radius: 2px;
            }
            .select2-container .select2-selection--single {
                -moz-user-select: none;
                box-sizing: border-box;
                cursor: pointer;
                display: block;
                height: 34px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 26px;
                position: absolute;
                right: 1px;
                top: 4px;
                width: 20px;
            }

            .modal-content {
                border-radius: 3px;
            }

            .mCSB_container {
              min-height: 101%;

            }

            .modal-header.body {
              border-top: 1px solid #ccc;
              border-bottom: 1px solid #ccc;
              padding: 5px 15px;
              background: #eee;
            }

            .modal-header.body .modal-title {
                font-size: 11px;
            }

            .main-content .page-content > .footer {
                background: #F0F0F0;
                width: 100%;
                z-index: 999;
            }

            .main-content, .main-content .page-content {
                background: #F0F0F0 none repeat scroll 0 0;
            }

            .button-inform {
              margin-top: 25px;
              border: 1px solid #bbb;
              background: transparent;
              color : #777;
              border-radius: 1px;
            }

            .button-inform:focus {
              color : #777;
            }

            .button-inform:hover {
              border: 1px solid #319DB4;
              color: #000;
              -webkit-box-shadow: 0 0 10px 0 #319DB4;
              box-shadow: 0 0 10px 0 #319DB4;
            }

            .button-inform.yellow:hover {
              border: 1px solid #cccc00;
              color: #000;
              -webkit-box-shadow: 0 0 10px 0 #cccc00;
              box-shadow: 0 0 10px 0 #cccc00;
            }

            .button-inform.top-less {
              margin-top: 0px;
            }

            .table > thead > tr > th {
                border-bottom: 2px solid #666;
            }

            .btn-blue {
              background: #3C4C71;
              color: #D6D6D6;
            }

            .btn-blue:hover, .btn-blue:focus, .btn-blue:active, .btn-blue.active, .open .dropdown-toggle.btn-blue {
                background-color: #1D5966;
                border-color: #292d32;
                color: #fff !important;
            }

            .theme-sdtl.color-default:not(.sidebar-top) .logopanel {
                background: #F0F0F0 none repeat scroll 0 0;
            }

            .theme-sdtl.color-default .sidebar .sidebar-inner {
                /*background: #333 none repeat scroll 0 0;*/
                background: #000f23 none repeat scroll 0 0;
            }

            .theme-sdtl.color-default .sidebar .sidebar-inner .nav-sidebar .nav-parent .children, .theme-sdtl.color-default .sidebar .sidebar-inner .sidebar-footer, .theme-sdtl.color-default .sidebar .sidebar-inner .sidebar-top .searchform input {
                background: #002846 none repeat scroll 0 0;
            }

            .btn-white {
              border-radius: 2px;
            }

            .dropdown-menu > li > a:hover {
              cursor: pointer;
            }

            .form-control.form-white {
                border: 1px solid #bbb;
            }

            .modal-header {
              border-bottom: 1px solid #666;
            }

            .no-padding-right {
              padding-right: 0;
            }

            .no-padding-left {
              padding-left: 0;
            }

            form .file-button {
              border-bottom-right-radius: 0;
              border-top-right-radius: 0;
            }

            .float-right {
              float: right;
            }

            .border-bottom-1px {
              border-bottom: 1px solid #455882;
            }

            .margin-bottom-5px {
              margin-bottom: 5px;
            }

            .margin-bottom-10px {
              margin-bottom: 10px;
            }

            .margin-bottom-15px {
              margin-bottom: 15px;
            }

            a.list-link {
              cursor: pointer;
              color: #444;

              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }

            a.list-link.active {
              font-weight: bold;
            }

            a.list-link:hover {
              color: #319DB5;
              font-weight: bold;

              -webkit-transition: all 0.1s ease-in-out;
              -moz-transition: all 0.1s ease-in-out;
              -ms-transition: all 0.1s ease-in-out;
              -o-transition: all 0.1s ease-in-out;
              transition: all 0.1s ease-in-out;
            }

            a.list-link.delete:hover {
              color: red;

              -webkit-transition: all 0.1s ease-in-out;
              -moz-transition: all 0.1s ease-in-out;
              -ms-transition: all 0.1s ease-in-out;
              -o-transition: all 0.1s ease-in-out;
              transition: all 0.1s ease-in-out;
            }

            .child-card-list {
              padding-left: 20px;
            }

            /*.hostList-item,*/
            .ridList-item {
              padding: 5px;

              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }

            .hostList-item:hover,
            .ridList-item:hover, {
              background-color: #eee;
              border-radius: 5px;

              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }

            /* menu tree */
            .jstree-default .jstree-themeicon-custom {
                display: none !important;
            }

            .info{
              color: #999;
            }

            .icheckbox_square-blue.disabled {
                border: 1px solid #fff;
            }

            .icheckbox_square-blue.checked.disabled {
              background-color: rgba(196, 131, 19, 0.5);
            }

            .sf-viewport {
              overflow: visible;
            }

            .centang {
              padding-top: 25px;
            }

            .form-control.form-white[disabled], .form-control.form-white[readonly], fieldset[disabled] .form-control.form-white {
                background-color: #eee;
                cursor: not-allowed;
                opacity: 1;
            }

            .panel-header.panel-header-child {
              border-bottom: 1px solid #d6d6d6;
            }

            .sidebar .sidebar-inner .nav-sidebar > li > a span {
              margin-left: 10px;
            }

            .theme-sdtl.color-default:not(.sidebar-top) .sidebar .sidebar-inner .nav-sidebar .children > li.active > a {
                /*color: #6697FF !important;*/
                color: #ff4137 !important;
            }

            .sidebar .sidebar-inner .nav-sidebar > li.active > a {
                background-color: #00559e;
                color: #ffffff;
                opacity: 1;
            }

            .sidebar .sidebar-inner .nav-sidebar .children > li > a {
                color: #fff;
                display: block;
                font-family: "Open Sans",arial;
                font-size: 13px;
                height: 34px;
                line-height: 24px;
                overflow: hidden;
                padding: 7px 20px 7px 49px;
                text-align: left;
                text-overflow: ellipsis;
                transition: all 0.2s ease-out 0s;
                white-space: nowrap;
            }

            .sidebar .sidebar-inner .nav-sidebar .children li::before {
                background: #fff none repeat scroll 0 0;
                border-radius: 50%;
                bottom: auto;
                content: "";
                height: 8px;
                left: 23px;
                margin-top: 15px;
                position: absolute;
                right: auto;
                width: 8px;
                z-index: 1;
            }

            .sidebar .sidebar-inner .nav-sidebar .children > li > a:hover {
                color: #ff4137;
                text-decoration: none;
            }

            .rotate180 {
              -ms-transform: rotate(180deg); /* IE 9 */
              -webkit-transform: rotate(180deg); /* Safari 3-8 */
              transform: rotate(180deg);
            }

            .sidebar .sidebar-inner .nav-sidebar > li > a span:not(.badge) {
                opacity: 1;
            }

            .sidebar-collapsed .topbar .header-left .topnav .menutoggle {
                background: #455882 none repeat scroll 0 0;
                color: #ffffff;
                opacity: 0.9;
                transition: all 0s ease-out 0s;
                width: 50px;
            }

            .topbar .header-left .topnav .menutoggle {
                background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                color: #2b2e33;
                cursor: pointer;
                float: left;
                font-size: 22px;
                height: 50px;
                position: relative;
                text-decoration: none !important;
                width: 26px;
            }

            .theme-sdtl.color-default:not(.sidebar-top) .logopanel {
                background: #000f23 none repeat scroll 0 0;
                border-bottom: 2px solid #666666;
            }

            .dataTables_wrapper td:last-child {
              white-space: nowrap;
            }

            .main-content .page-content .breadcrumb > li + li::before {
                color: #cccccc;
                content: "/";
                padding: 0 8px 0 5px;
            }

            .sidebar .sidebar-inner .nav-sidebar > li > a span {
                white-space: normal;
            }

          </style>

        </div>
        <div class="sidebar-inner">
         <!--  <div class="menu-title">
    			 Navigation
    		  </div> -->
          <?php
          $dashboard = Session::get('dashboard');
          ?>

          <?php if(Session::get('total_dashboard') != 1): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('index') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/index')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php else: ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is($dashboard) ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/'.$dashboard)); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php endif; ?>
          <!--
          <?php if(Session::get('name') == 'fadhli'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashbank') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashbank')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'valdy'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashmerchant') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashmerchant')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'adly'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('monitoring') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/monitoring')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'Merchant One'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashmerchant') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashmerchant')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'Provider One'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashserviceprovider') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashserviceprovider')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'Acquirer One'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashserviceprovider') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashbank')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php elseif(Session::get('name') == 'Branch One'): ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('dashmerchant') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/dashmerchant')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php else: ?>
          <ul class="nav nav-sidebar navigation" id="navigation">
            <li class="<?php echo e(Request::is('index') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/index')); ?>"><i class="fas fa-home"></i><span data-translate="Home">Home</span></a></li>
          </ul>
          <?php endif; ?>-->
          <ul class="nav nav-sidebar navigation" id="navigation">
            <?php if( in_array('SEARCH_TRX_V', $priv)  ): ?> <li class="<?php echo e(Request::is('search_transaction') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('/search_transaction')); ?>"><i class="fas fa-search"></i><span data-translate="Search Transaction">Search Transaction</span></a></li> <?php endif; ?>
          </ul>

          <?php if(
            in_array('DASH_PROV_V', $priv) ||
            in_array('DASH_ACQ_V', $priv) ||
            in_array('DASH_CORP_V', $priv) ||
            in_array('DASH_MER_V', $priv) ||
            in_array('DASH_BRA_V', $priv) ||
            in_array('DASH_STO_V', $priv)
          ): ?>

            <?php if(Session::get('total_dashboard') != 1): ?>
            <div class="menu-title">
              Dashboard
            </div>
            <ul class="nav nav-sidebar navigation" id="navigation">
              <?php if( in_array('DASH_PROV_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashprovider')); ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="box-open" class="svg-inline--fa fa-box-open fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9zm585.1 102.8L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9z"></path></svg><span data-translate="Terminal Profile">Service Provider</span></a></li> <?php endif; ?>

              <?php if( in_array('DASH_ACQ_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashacquirer')); ?>"><i class="fa fa-building" aria-hidden="true"></i><span data-translate="Terminal Profile">Acquirer</span></a></li> <?php endif; ?>

              <?php if( in_array('DASH_CORP_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashcorporate')); ?>"><i class="fa fa-university" aria-hidden="true"></i><span data-translate="Terminal Profile">Corporate</span></a></li> <?php endif; ?>

              <?php if( in_array('DASH_MER_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashmerchant')); ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="school" class="svg-inline--fa fa-school fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"></path></svg><span data-translate="Terminal Profile">Merchant</span></a></li> <?php endif; ?>

              <?php if( in_array('DASH_BRA_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashbranch')); ?>"><i class="fa fa-sitemap" aria-hidden="true"></i><span data-translate="Terminal Profile">Branch</span></a></li> <?php endif; ?>

              <?php if( in_array('DASH_STO_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/dashstore')); ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="store" class="svg-inline--fa fa-store fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616 512"><path fill="currentColor" d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"></path></svg><span data-translate="Terminal Profile">Store</span></a></li> <?php endif; ?>
            </ul>
            <?php else: ?>

            <?php endif; ?>

          <?php endif; ?>

          <?php if(
            in_array('SERPRO_TRX_V', $priv) ||
            in_array('SERPRO_CTP_V', $priv) ||
            in_array('SERPRO_CSC_V', $priv) ||
            in_array('SERPRO_ACQ_V', $priv) ||
            in_array('SERPRO_ISS_V', $priv) ||
            in_array('SERPRO_CORP_V', $priv) ||
            in_array('SERPRO_MER_V', $priv) ||
            in_array('SERPRO_BRA_V', $priv) ||
            in_array('SERPRO_STO_V', $priv) ||
            in_array('SERPRO_AREA_V', $priv) ||
            in_array('SERPRO_T5ACQ_V', $priv) ||
            in_array('SERPRO_T5CORP_V', $priv) ||
            in_array('SERPRO_T5MER_V', $priv) ||
            in_array('SERPRO_ONOFF_V', $priv) ||
            in_array('SERPRO_DREP_V', $priv) ||
            in_array('SERPRO_DREC_V', $priv) ||
            in_array('ACQ_TRX_V', $priv) ||
            in_array('ACQ_CTP_V', $priv) ||
            in_array('ACQ_CORP_V', $priv) ||
            in_array('ACQ_MER_V', $priv) ||
            in_array('ACQ_ONOFF_V', $priv) ||
            in_array('ACQ_DREP_V', $priv) ||
            in_array('ACQ_DREC_V', $priv) ||
            in_array('CORP_TRX_V', $priv) ||
            in_array('CORP_ACQ_V', $priv) ||
            in_array('CORP_MER_V', $priv) ||
            in_array('CORP_T5MER_V', $priv) ||
            in_array('CORP_DREP_V', $priv) ||
            in_array('CORP_DREC_V', $priv) ||
            in_array('MER_TRX_V', $priv) ||
            in_array('MER_ACQ_V', $priv) ||
            in_array('MER_BRA_V', $priv) ||
            in_array('MER_STO_V', $priv) ||
            in_array('MER_T5BRA_V', $priv) ||
            in_array('MER_DREP_V', $priv) ||
            in_array('MER_DREC_V', $priv) ||
            in_array('BRA_TRX_V', $priv) ||
            in_array('BRA_ACQ_V', $priv) ||
            in_array('BRA_STO_V', $priv) ||
            in_array('BRA_T5STO_V', $priv) ||
            in_array('BRA_DREP_V', $priv) ||
            in_array('BRA_DREC_V', $priv) ||
            in_array('STO_TRX_V', $priv) ||
            in_array('STO_ACQ_V', $priv) ||
            in_array('STO_DREP_V', $priv) ||
            in_array('STO_DREC_V', $priv)
          ): ?>
          <div class="menu-title">
            Transaction Report
          </div>

          <ul class="nav nav-sidebar navigation" id="navigation">
            <?php if(
              in_array('SERPRO_TRX_V', $priv) ||
              in_array('SERPRO_CTP_V', $priv) ||
              in_array('SERPRO_CSC_V', $priv) ||
              in_array('SERPRO_ACQ_V', $priv) ||
              in_array('SERPRO_ISS_V', $priv) ||
              in_array('SERPRO_CORP_V', $priv) ||
              in_array('SERPRO_MER_V', $priv) ||
              in_array('SERPRO_BRA_V', $priv) ||
              in_array('SERPRO_STO_V', $priv) ||
              in_array('SERPRO_AREA_V', $priv) ||
              in_array('SERPRO_T5ACQ_V', $priv) ||
              in_array('SERPRO_T5CORP_V', $priv) ||
              in_array('SERPRO_T5MER_V', $priv) ||
              in_array('SERPRO_ONOFF_V', $priv) ||
              in_array('SERPRO_DREP_V', $priv) ||
              in_array('SERPRO_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><svg aria-hidden="true" data-prefix="fas" data-icon="box-open" class="svg-inline--fa fa-box-open fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9zm585.1 102.8L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9z"></path></svg><span data-translate="Service Provider"> Service Provider</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('SERPRO_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_CTP_V', $priv)  ): ?> <li><a href="#"> By Card Type </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_CSC_V', $priv)  ): ?> <li><a href="#"> By Card Scheme </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_ISS_V', $priv)  ): ?> <li><a href="#"> By Issuer </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_CORP_V', $priv)  ): ?> <li><a href="#"> By Corporate </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_MER_V', $priv)  ): ?> <li><a href="#"> By Merchant </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_BRA_V', $priv)  ): ?> <li><a href="#"> By Branch </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_STO_V', $priv)  ): ?> <li><a href="#"> By Store </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_AREA_V', $priv)  ): ?> <li><a href="#"> By Area </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_T5ACQ_V', $priv)  ): ?> <li><a href="#"> Top Five Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_T5CORP_V', $priv)  ): ?> <li><a href="#"> Top Five Corporate </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_T5MER_V', $priv)  ): ?> <li><a href="#"> Top Five Merchant </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_ONOFF_V', $priv)  ): ?> <li><a href="#"> On Us & Off Us </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_provider"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('SERPRO_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_provider"> Download Reconciliation Report </a></li> <?php endif; ?>

              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('ACQ_TRX_V', $priv) ||
              in_array('ACQ_CTP_V', $priv) ||
              in_array('ACQ_CORP_V', $priv) ||
              in_array('ACQ_MER_V', $priv) ||
              in_array('ACQ_ONOFF_V', $priv) ||
              in_array('ACQ_DREP_V', $priv) ||
              in_array('ACQ_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="fa fa-building" aria-hidden="true"></i><span data-translate="Service Provider"> Acquirer</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('ACQ_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_CTP_V', $priv)  ): ?> <li><a href="#"> By Card Type </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_CORP_V', $priv)  ): ?> <li><a href="#"> By Corporate </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_MER_V', $priv)  ): ?> <li><a href="#"> By Merchant </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_ONOFF_V', $priv)  ): ?> <li><a href="#"> On Us & Off Us </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_acquirer"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('ACQ_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_acquirer"> Download Reconciliation Report </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('CORP_TRX_V', $priv) ||
              in_array('CORP_ACQ_V', $priv) ||
              in_array('CORP_MER_V', $priv) ||
              in_array('CORP_T5MER_V', $priv) ||
              in_array('CORP_DREP_V', $priv) ||
              in_array('CORP_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="fa fa-university" aria-hidden="true"></i><span data-translate="Service Provider"> Corporate</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('CORP_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('CORP_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('CORP_MER_V', $priv)  ): ?> <li><a href="#"> By Merchant </a></li> <?php endif; ?>
                <?php if( in_array('CORP_T5MER_V', $priv)  ): ?> <li><a href="#"> Top Ten Merchant </a></li> <?php endif; ?>
                <?php if( in_array('CORP_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_corporate"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('CORP_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_corporate"> Download Reconciliation Report </a></li> <?php endif; ?>

              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('MER_TRX_V', $priv) ||
              in_array('MER_ACQ_V', $priv) ||
              in_array('MER_BRA_V', $priv) ||
              in_array('MER_STO_V', $priv) ||
              in_array('MER_T5BRA_V', $priv) ||
              in_array('MER_DREP_V', $priv) ||
              in_array('MER_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><svg aria-hidden="true" data-prefix="fas" data-icon="school" class="svg-inline--fa fa-school fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M0 224v272c0 8.84 7.16 16 16 16h80V192H32c-17.67 0-32 14.33-32 32zm360-48h-24v-40c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v64c0 4.42 3.58 8 8 8h48c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zm137.75-63.96l-160-106.67a32.02 32.02 0 0 0-35.5 0l-160 106.67A32.002 32.002 0 0 0 128 138.66V512h128V368c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v144h128V138.67c0-10.7-5.35-20.7-14.25-26.63zM320 256c-44.18 0-80-35.82-80-80s35.82-80 80-80 80 35.82 80 80-35.82 80-80 80zm288-64h-64v320h80c8.84 0 16-7.16 16-16V224c0-17.67-14.33-32-32-32z"></path></svg><span data-translate="Service Provider"> Merchant</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('MER_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('MER_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('MER_BRA_V', $priv)  ): ?> <li><a href="#"> By Branch </a></li> <?php endif; ?>
                <?php if( in_array('MER_STO_V', $priv)  ): ?> <li><a href="#"> By Store </a></li> <?php endif; ?>
                <?php if( in_array('MER_T5BRA_V', $priv)  ): ?> <li><a href="#"> Top Ten Branch </a></li> <?php endif; ?>
                <?php if( in_array('MER_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_merchant"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('MER_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_merchant"> Download Reconciliation Report </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('BRA_TRX_V', $priv) ||
              in_array('BRA_ACQ_V', $priv) ||
              in_array('BRA_STO_V', $priv) ||
              in_array('BRA_T5STO_V', $priv) ||
	      in_array('BRA_DREP_V', $priv) ||
	      in_array('BRA_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="fa fa-sitemap" aria-hidden="true"></i><span data-translate="Service Provider"> Branch</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('BRA_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('BRA_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('BRA_STO_V', $priv)  ): ?> <li><a href="#"> By Store </a></li> <?php endif; ?>
                <?php if( in_array('BRA_T5STO_V', $priv)  ): ?> <li><a href="#"> Top Ten Store </a></li> <?php endif; ?>
                <?php if( in_array('BRA_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_branch"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('BRA_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_branch"> Download Reconciliation Report </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('STO_TRX_V', $priv) ||
              in_array('STO_ACQ_V', $priv) ||
              in_array('STO_DREP_V', $priv) ||
              in_array('STO_DREC_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><svg aria-hidden="true" data-prefix="fas" data-icon="store" class="svg-inline--fa fa-store fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616 512"><path fill="currentColor" d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"></path></svg><span data-translate="Service Provider"> Store</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('STO_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('STO_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('STO_DREP_V', $priv)  ): ?> <li><a href="/download_detail_report_store"> Download Detail Report </a></li> <?php endif; ?>
                <?php if( in_array('STO_DREC_V', $priv)  ): ?> <li><a href="/download_recon_report_store"> Download Reconciliation Report </a></li> <?php endif; ?>

              </ul>
            </li>
            <?php endif; ?>
          </ul>
          <?php endif; ?>

          <?php if(
            in_array('TRXSR_TRX_V', $priv) ||
            in_array('TRXSR_ACQ_V', $priv) ||
            in_array('DECTRX_TRX_V', $priv) ||
            in_array('DECTRX_ACQ_V', $priv) ||
            in_array('DECTRX_ERR_V', $priv) ||
            in_array('PROCTIME_ACQ_V', $priv) ||
            in_array('PROCTIME_TRX_V', $priv)
          ): ?>
          <div class="menu-title">
            Performance Report
          </div>


          <ul class="nav nav-sidebar navigation" id="navigation">
            <?php if(
              in_array('TRXSR_TRX_V', $priv) ||
              in_array('TRXSR_ACQ_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="fa fa-check-square" aria-hidden="true"></i><span data-translate="Transaction Success Rate"> Transaction Success Rate</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('TRXSR_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('TRXSR_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('DECTRX_TRX_V', $priv) ||
              in_array('DECTRX_ACQ_V', $priv) ||
              in_array('DECTRX_ERR_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="fa fa-times-circle" aria-hidden="true"></i><span data-translate="Declined Transaction"> Declined Transaction</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('DECTRX_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
                <?php if( in_array('DECTRX_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('DECTRX_ERR_V', $priv)  ): ?> <li><a href="#"> By Error Code </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(
              in_array('PROCTIME_ACQ_V', $priv) ||
              in_array('PROCTIME_TRX_V', $priv)
            ): ?>
            <li class="nav-parent ">
              <a><i class="far fa-clock" aria-hidden="true"></i><span data-translate="Processing Time"> Processing Time</span><span class="fas fa-angle-down arrow"></span></a>
              <ul class="children collapse">
                <?php if( in_array('PROCTIME_ACQ_V', $priv)  ): ?> <li><a href="#"> By Acquirer </a></li> <?php endif; ?>
                <?php if( in_array('PROCTIME_TRX_V', $priv)  ): ?> <li><a href="#"> By Transaction Type </a></li> <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>
          </ul>
          <?php endif; ?>

          <?php if(
            in_array('TERMACTIVE_V', $priv) ||
            in_array('INACTIVETID_V', $priv) ||
            in_array('TERMSOFTVER_V', $priv) ||
            in_array('TERMSTATREP_V', $priv) ||
            in_array('SIGNALSTR_V', $priv)
          ): ?>
          <div class="menu-title">
            Terminal Report
          </div>

          <ul class="nav nav-sidebar navigation" id="navigation">
            <?php if( in_array('TERMACTIVE_V', $priv)  ): ?>
            <li>
              <a href="/active_inactive_terminal">
                <i class="fa fa-adjust" aria-hidden="true"></i><span data-translate="Active & Inactive Terminal">Active & Inactive Terminal</span>
              </a>
            </li>
            <?php endif; ?>

            <?php if( in_array('INACTIVETID_V', $priv)  ): ?>
            <li>
              <a href="/inactive_tid">
                <svg aria-hidden="true" data-prefix="fas" data-icon="check-double" class="svg-inline--fa fa-check-double fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.5 171.95l-36.2-36.41c-10-10.05-26.21-10.05-36.2 0L192 377.02 79.9 264.28c-10-10.06-26.21-10.06-36.2 0L7.5 300.69c-10 10.05-10 26.36 0 36.41l166.4 167.36c10 10.06 26.21 10.06 36.2 0l294.4-296.09c10-10.06 10-26.36 0-36.42zM166.57 282.71c6.84 7.02 18.18 7.02 25.21.18L403.85 72.62c7.02-6.84 7.02-18.18.18-25.21L362.08 5.29c-6.84-7.02-18.18-7.02-25.21-.18L179.71 161.19l-68.23-68.77c-6.84-7.02-18.18-7.02-25.2-.18l-42.13 41.77c-7.02 6.84-7.02 18.18-.18 25.2l122.6 123.5z"></path></svg>
                <span data-translate="Inactive TID">Inactive TID</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if( in_array('TERMSOFTVER_V', $priv)  ): ?>
            <li>
              <a href="#">
                <i class="far fa-file-alt" aria-hidden="true"></i><span data-translate="Terminal Software Version">Terminal Software Version</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if( in_array('TERMSTATREP_V', $priv)  ): ?>
            <li>
              <a href="#">
                <svg aria-hidden="true" data-prefix="fas" data-icon="signature" class="svg-inline--fa fa-signature fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M496 320h-91.86c-9.27 0-19.72-11.31-25.78-28.52-15.23-43.36-48.11-70.3-85.8-70.3-30.84 0-58.47 18.05-76.11 49.23L194.8 106.5C188.84 81.08 169.34 64 146.28 64c-23.05 0-42.55 17.08-48.5 42.5L56.16 284.2C50.7 307.45 37.75 320 28.33 320H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h12.33c41.97 0 78.19-34.23 90.14-85.2l23.84-101.78 29.25 222.11c1.98 15.05 13.82 27.45 28.94 28.75.99.09 1.96.13 2.93.13 14.08 0 26.64-9.27 30.69-22.95l33.03-112.34c5.88-16.72 15.84-27.52 25.41-27.52 9.58 0 19.55 10.8 25.78 28.52 15.23 43.36 48.11 70.3 85.8 70.3H496c8.84 0 16-7.16 16-16v-32c0-8.86-7.16-16.02-16-16.02z"></path></svg>
                <span data-translate="Terminal Statistic Report (Healthiness Index)">Terminal Statistic Report (Healthiness Index)</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if( in_array('SIGNALSTR_V', $priv)  ): ?>
            <li>
              <a href="#">
                <i class="fas fa-signal" aria-hidden="true"></i><span data-translate="Signal Strength by Provider">Signal Strength by Provider</span>
              </a>
            </li>
            <?php endif; ?>
            <?php if( in_array('TERMLOC_V', $priv)  ): ?>
            <li>
              <a href="/terminal_location">
                <i class="fas fa-globe" aria-hidden="true"></i><span data-translate="Terminal Location">Terminal Location</span>
              </a>
            </li>
            <?php endif; ?>
          </ul>
          <?php endif; ?>

          <?php if(
            in_array('USER_V', $priv) ||
            in_array('SUBGROUP_V', $priv) ||
            in_array('GROUP_V', $priv) ||
            in_array('PACKAGE_V', $priv)
          ): ?>
          <div class="menu-title">
            User Management
          </div>

          <ul class="nav nav-sidebar navigation" id="navigation">
            <?php if( in_array('USER_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/user_setup')); ?>"><i class="fas fa-user-circle" aria-hidden="true"></i><span data-translate="Terminal Profile">User Setup</span></a></li> <?php endif; ?>
            <?php if( in_array('SUBGROUP_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/subgroup_setup')); ?>"><i class="fas fa-user" aria-hidden="true"></i><span data-translate="Terminal Profile">Subgroup Setup</span></a></li> <?php endif; ?>
            <?php if( in_array('GROUP_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/group_setup')); ?>"><i class="fas fa-users" aria-hidden="true"></i><span data-translate="Terminal Profile">Group Setup</span></a></li> <?php endif; ?>
            <?php if( in_array('PACKAGE_V', $priv)  ): ?> <li><a href="<?php echo e(URL::to('/package_setup')); ?>"><i class="fab fa-get-pocket" aria-hidden="true"></i><span data-translate="Terminal Profile">Package Setup</span></a></li> <?php endif; ?>
            <!-- <li><a href="<?php echo e(URL::to('/privilege_setup')); ?>"><i class="fas fa-check-square" aria-hidden="true"></i><span data-translate="Terminal Profile">Privilege Setup</span></a></li> -->
            <!-- <li><a href="<?php echo e(URL::to('/filter_type_setup')); ?>"><i class="fas fa-filter" aria-hidden="true"></i><span data-translate="Terminal Profile">Data Filter Type Setup</span></a></li> -->
            <!-- <li><a href="<?php echo e(URL::to('/audit_trail')); ?>"><i class="fa fa-check-square-o"></i><span data-translate="Terminal Profile">Audit Trail</span></a></li> -->
          </ul>
          <?php endif; ?>
        </div>
      </div>
      <!-- END SIDEBAR -->

      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed">
                <span class="menu__handle" style="left: 10px;"><span>Menu</span></span>
                <span class="menu__handle"><span>Menu</span></span>
              </a>

            </div>
          </div>
          <div class="col-xs-6">
            <!-- <h2 style="margin-top: 11px; color: #1d2939" ><strong>REPORTING</strong></h2> -->
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">

              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="username">[ <?php echo e(Session::get('name')); ?> ]</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="<?php echo e(URL::to('/change_password')); ?>"><i class="icon-lock-open"></i><span>Change Password</span></a>
                  </li>
                  <li>
                    <a href="<?php echo e(route('logout')); ?>"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <!-- <div class="header">
            <h2><i class="icon-layers"></i> <strong>Terminal</strong> Management System</h3>
          </div>
          <div class="row">
            <div class="col-lg-12" style="height:720px">

            </div>
          </div> -->

          <!-- page content -->
          <?php echo $__env->yieldContent('content'); ?>
          <!-- /page content -->

          <div class="footer" style="display: none;">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2017 </span>
                <span>Wirecard | Prima Vista Solusi</span>.
                <span>All rights reserved. </span>
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->

    </section>


    <!-- BEGIN PRELOADER -->
    <!-- <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div> -->
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/gsap/main-gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-cookies/jquery.cookies.min.js')); ?>"></script> <!-- Jquery Cookies, for theme -->
    <script src="<?php echo e(asset('assets/plugins/jquery-block-ui/jquery.blockUI.min.js')); ?>"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="<?php echo e(asset('assets/plugins/translate/jqueryTranslator.min.js')); ?>"></script> <!-- Translate Plugin with JSON data -->
    <script src="<?php echo e(asset('assets/plugins/bootbox/bootbox.min.js')); ?>"></script> <!-- Modal with Validation -->
    <script src="<?php echo e(asset('assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js')); ?>"></script> <!-- Custom Scrollbar sidebar -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js')); ?>"></script> <!-- Show Dropdown on Mouseover -->
    <script src="<?php echo e(asset('assets/plugins/charts-sparkline/sparkline.min.js')); ?>"></script> <!-- Charts Sparkline -->
    <script src="<?php echo e(asset('assets/plugins/retina/retina.min.js')); ?>"></script> <!-- Retina Display -->
    <script src="<?php echo e(asset('assets/plugins/select2-4.0.3/dist/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/icheck/icheck.min.js')); ?>"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?php echo e(asset('assets/plugins/backstretch/backstretch.min.js')); ?>"></script> <!-- Background Image -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script> <!-- Animated Progress Bar -->
    <script src="<?php echo e(asset('assets/plugins/charts-chartjs/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/charts-chartjs/utils.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/notify.js')); ?>"></script> <!-- Notify -->
    <script src="<?php echo e(asset('assets/plugins/multiselect.js/multiselect.js')); ?>"></script> <!-- Notify -->
    <script src="<?php echo e(asset('assets/js/plugins.js')); ?>"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?php echo e(asset('assets/js/application.js')); ?>"></script> <!-- Main Application Script -->
    <script src="<?php echo e(asset('assets/js/CryptoJS/rollups/aes.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/font-awesome/js/fontawesome-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/font-awesome/js/fa-v4-shims.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>

<script>


//The key and iv should be 32 hex digits each, any hex digits you want, but it needs to be 32 on length each
var key = CryptoJS.enc.Hex.parse("0123456789abcdef0123456789abcdef");
var iv =  CryptoJS.enc.Hex.parse("abcdef9876543210abcdef9876543210");
/*
if you wish to have a more friendly key, you can convert letters to Hex this way:
var a = "D";
var hex_D = a.charCodeAt(0).toString(16);
just to mention,
if it were to binary, it would be:
var binary_D = a.charCodeAt(0).toString(2);
*/

var secret = "Wirecard Asia Pasific";

//crypted
var encrypted = CryptoJS.AES.encrypt(secret, key, {iv:iv});
//and the ciphertext put to base64
encrypted = encrypted.ciphertext.toString(CryptoJS.enc.Base64);
//Assuming you have control on the server side, and know the key and iv hexes(we do),
//the encrypted var is all you need to pass through ajax,
//Let's follow with welcomed pure JS style, to reinforce one and other concept if needed
//console.log( encrypted );
// alert( encrypted );

</script>

    <script type="text/javascript">

    $(document).ready(function()
    {
      $.ajax({
        url: "/get_logo",
        method: "GET",
        async:false,
        success: function(data)
        {
          var merchlogo = data.merchlogo;

          $('#display_logo').attr("src","storage/logo/wirecard.png"/* + merchlogo*/);
        },
        error: function(data) {
        	console.log(data);
        }
        });
    });

      $(function () {
        var $displayarea = $(".page-content");
        var parentWidth = $('.main-content').height();
        var footer = $('.footer');

        if ($displayarea.height()+footer.height() > parentWidth) {
            /* alert('lebih besar');
            alert($displayarea.height()); */
            footer.css({
                    position: 'static'
                });
        } else {
            /* alert('lebih kecil');
            alert($displayarea.height()); */
            footer.css({
                    position: 'fixed'
                });
        }

      });

      /*
        variable for check variable is exist in array or no
        example: if(contains.call(selectedCard, $('.edit_cardNameCheck')[i].value) == true)
      */
      var contains = function(needle) {
          // Per spec, the way to identify NaN is that it is not equal to itself
          var findNaN = needle !== needle;
          var indexOf;

          if(!findNaN && typeof Array.prototype.indexOf === 'function') {
              indexOf = Array.prototype.indexOf;
          } else {
              indexOf = function(needle) {
                  var i = -1, index = -1;

                  for(i = 0; i < this.length; i++) {
                      var item = this[i];

                      if((findNaN && item !== item) || item === needle) {
                          index = i;
                          break;
                      }
                  }

                  return index;
              };
          }

          return indexOf.call(this, needle) > -1;
      };

      function cleanArray(actual) {
        var newArray = new Array();
        for (var i = 0; i < actual.length; i++) {
          if (actual[i]) {
            newArray.push(actual[i]);
          }
        }
        return newArray;
      }

      function fixed_footer(){
        var $displayarea = $(".page-content");
        var parentWidth = $('.main-content').height();
        var footer = $('.footer');

        if ($displayarea.height()+footer.height() > parentWidth) {
          //alert('lebih besar');
            //alert($displayarea.height() + ' + ' + footer.height() + ' > ' + parentWidth);
            footer.css({
                    //position: 'static'
                    position: 'fixed'
                });
        } else {
            //alert('lebih kecil');
            //alert($displayarea.height() + ' + ' + footer.height() + ' < ' + parentWidth);
            footer.css({
                    position: 'fixed'
                });
        }
      }

      $('.main-content').height('70%');

      // $('input').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue'});

      function objectLength(obj) {
        var result = 0;
        for(var prop in obj) {
          if (obj.hasOwnProperty(prop)) {
          // or Object.prototype.hasOwnProperty.call(obj, prop)
            result++;
          }
        }
        return result;
      }

      var $page = window.location.href;
      var $page_stack = $page.split('/');
      var $curr_page = $page_stack[ $page_stack.length - 1 ];


      $('ul.navigation li a').each(function(){
        var $href = $(this).attr('href');

        if( $href != undefined ) {

          var $href_stack = $href.split('/');
          var $url = $href_stack[ $href_stack.length - 1 ];

        }

        if ( ($url == $curr_page) || ($href == '') ) {
            $(this).parent().addClass('active');

            if( $(this).closest("li.nav-parent").length == 1 ) {

                $(this).closest("li.nav-parent").addClass('active');
                $(this).closest("li.nav-parent").find('ul.children').css('display', 'block');

            }

        } else {
            $(this).parent().removeClass('active');
        }
    });

    </script>

    <?php echo $__env->yieldContent('javascript'); ?>

  </body>
</html>
