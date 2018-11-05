      

<?php $__env->startSection('content'); ?>
<script>
  // FontAwesomeConfig = { searchPseudoElements: true };
</script>
<style type="text/css">
    .widget-info .left svg {
        border-radius: 50%;
        color: #ffffff;
        font-size: 45px;
        padding: 8px;
        text-align: center;
    }

    .widget-icon {
        float: right;
    }
    .widget-icon .icon {
        /*color: #18A689;*/
        /*fill: currentcolor;*/
        font-size: 20px;
        height: 67px;
        /*left: 80%;*/
        /*position: absolute;*/
        top: 13px;
        width: 67px;
        opacity: 0.1;
        filter: blur(1px);
    }

    .icon.master-icon {
        color: #18A689;
        fill: currentcolor;
    }

    .icon.template-icon {
        color: #4584D1;
        fill: currentcolor;
    }

    .icon.terminal-icon {
        color: #C9625F;
        fill: currentcolor;
    }

    .main-content .page-content .panel-content {
        padding: 10px 20px 10px;
    }

    .tile_stats_count .count {
        font-size: 40px;
        /*font-weight: 600;*/
        line-height: 47px;
        font-weight: normal;
    }

    .tile_stats_count .right {
        height: 100%;
        overflow: hidden;
        padding-left: 10px;
        text-overflow: ellipsis;
    }

    .tile_stats_count .right span {
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .count_bottom i {
        width: 12px;
    }

    .blue {
        color: #2CA3DE;
    }

    .green {
        color: #1abb9c;
    }

    .red {
        color: #e74c3c;
    }

    .yellow {
        color: #DBDB27;
    }

    .orange {
        color: #DEA92C;
    }

    .tile_stats_count {
      border-top: 1px solid #ddd;
      padding-top: 10px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
    }

    .tile_stats_count .left {
        border-left: 2px solid #adb2b5;
        float: left;
        height: 65px;
        margin-top: 10px;
        width: 15%;
    }

    .main-content .page-content .panel {
        border-left: 0px solid #666;
    }

    .panel-header {
        border-bottom: 1px solid #d6d6d6;
    }

    .main-content .page-content .panel.transparent {
      background: transparent;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0);
    }

    /*f1b2*/
</style>

    <div class="header panel-header" style="border-bottom: none;">
        <h2><i class="fas fa-home"></i> <strong>Home</strong></h3>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('assets/plugins/charts-highstock/js/highstock.min.js')); ?>"></script> <!-- financial Charts -->
    <script src="<?php echo e(asset('assets/plugins/maps-amcharts/ammap/ammap.min.js')); ?>"></script> <!-- Vector Map -->
    <script src="<?php echo e(asset('assets/plugins/countup/countUp.min.js')); ?>"></script> <!-- Animated Counter Number -->
    <script src="<?php echo e(asset('assets/plugins/charts-chartjs/Chart.min.js')); ?>"></script>  <!-- ChartJS Chart -->
    <!-- <script src="<?php echo e(asset('assets/js/pages/dashboard.js')); ?>"></script> -->

    <script type="text/javascript">
    
        $('.panel-header-section').click(function() {
            $(this).toggleClass("closed").parents(".panel:first").find(".panel-content").slideToggle();
            $(this).find(".svg-inline--fa.icon").slideToggle();
        });

    </script>

    <script type="text/javascript">
      var data = <?php echo json_encode($priv);?>;
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>