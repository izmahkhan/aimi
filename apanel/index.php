<?php
include_once("../includes/conn.php");
include_once('../includes/SimpleImage.php');
include_once('../includes/baseFunctions.php');
include_once('../includes/siteFunctions.php');
include_once('./includes/adminFunctions.php');
include_once("includes/confg.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= $apath; ?>assets/images/admin-favicon.png" type="image/x-icon">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= $apath; ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $apath; ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/dist/css/skins/_all-skins.css">
           <!-- iCheck -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/iCheck/flat/blue.css">
           <!-- Morris chart -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/morris/morris.css">
           <!-- jvectormap -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
           <!-- Date Picker -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/datepicker/datepicker3.css">
           <!-- Daterange picker -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
           <!-- bootstrap wysihtml5 - text editor -->
           <link rel="stylesheet" href="<?= $apath; ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
           <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

           <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
           <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= $apath; ?>assets/custom.css">

        <!-- jQuery 2.1.4 -->
        <script src="<?= $apath; ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?= $apath; ?>assets/ajax.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    </head>
    <body class="hold-transition fixed skin-purple sidebar-mini">
        <div class="wrapper">

            <!--HEADER-->
            <!-- Left side column. contains the logo and sidebar -->

            <!--LEFT SIDEBAR-->

            <?php include_once('pages/shared/header.php'); ?>
            <?php @include_once($includefile); ?>
            <?php include_once('pages/shared/footer.php'); ?>
            <!-- Content Wrapper. Contains page content -->

            <!-- /.content-wrapper -->

            <!--FOOTER-->

            <!--SIDEBAR-->
            <!-- Add the sidebar's background. This div must be placed
               immediately after the control sidebar -->
               <div class="control-sidebar-bg"></div>
           </div><!-- ./wrapper -->


           <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?= $apath; ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?= $apath; ?>assets/plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="<?= $apath; ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?= $apath; ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?= $apath; ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= $apath; ?>assets/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?= $apath; ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

        <!-- datepicker -->
        <script src="<?= $apath; ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= $apath; ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?= $apath; ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= $apath; ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= $apath; ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?= $apath; ?>assets/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= $apath; ?>assets/dist/js/demo.js"></script>

        <script src="http://localhost/oya/adminassets/js/jquery.dataTables.min.js"></script>
        <script src="http://localhost/oya/adminassets/js/datatables/TableTools.min.js"></script>        
        <link href="http://localhost/oya/adminassets/js/datatables/responsive/css/datatables.responsive.css" rel="stylesheet">
        <link href="http://localhost/oya/adminassets/js/select2/select2-bootstrap.css" rel="stylesheet">
        <link href="http://localhost/oya/adminassets/js/select2/select2.css" rel="stylesheet">
        <script src="http://localhost/oya/adminassets/js/dataTables.bootstrap.js"></script>
        <script src="http://localhost/oya/adminassets/js/datatables/jquery.dataTables.columnFilter.js"></script>
        <script src="http://localhost/oya/adminassets/js/datatables/lodash.min.js"></script>
        <script src="http://localhost/oya/adminassets/js/datatables/responsive/js/datatables.responsive.js"></script>
        <script src="http://localhost/oya/adminassets/js/select2/select2.min.js"></script>
        <script type="text/javascript">
            var responsiveHelper;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };
            var tableContainer;
            jQuery(document).ready(function ($)
            {
                tableContainer = $("#table-1");

                tableContainer.dataTable({
                    "sPaginationType": "bootstrap",
                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "bStateSave": true,
                    // Responsive Settings
                    bAutoWidth: false,
                    fnPreDrawCallback: function () {
                        // Initialize the responsive datatables helper once.
                        if (!responsiveHelper) {
                            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
                        }
                    },
                    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        responsiveHelper.createExpandIcon(nRow);
                    },
                    fnDrawCallback: function (oSettings) {
                        responsiveHelper.respond();
                    }
                });

                $(".dataTables_wrapper select").select2({
                    minimumResultsForSearch: -1
                });
            });
        </script>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    </body>
    </html>