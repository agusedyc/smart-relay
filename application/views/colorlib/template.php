<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $appName." | ".$title;?>
    </title>
    <link rel="shortcut icon" href="<?php //echo base_url('assets/img/faviconUSM.png');?>" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <!-- <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
    <!-- Animate.css -->
    <link href="<?= base_url();?>assets/theme/gentelella/build/css/animate.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <!-- <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"> -->
    <!-- jVectorMap -->
    <!-- <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/> -->
     <!-- PNotify -->
    <!-- <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet"> -->
    <!-- Include Editor style. -->
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_editor.min.css' rel='stylesheet' type='text/css' /> -->
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_style.min.css' rel='stylesheet' type='text/css' /> -->
     <!-- Include Code Mirror style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <!-- TimePicker -->
  <link href="<?php echo base_url();?>assets/theme/gentelella/production/js/timepickerdate/css/bootstrap-datetimepicker.min.css"  rel="stylesheet">
<!-- <script src="<?php echo base_url();?>assets/theme/gentelella/production/js/datetimepicker/css/bootstrap-datetimepicker.min.css"></script> -->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/theme/gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- end: Css -->



      
    <!-- jQuery -->
    <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap -->
    <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/bootstrap/dist/js/bootstrap.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/axios/axios.min.js"></script> -->
    <!-- Include JS file. -->
    <!-- <script type='text/javascript' src='https://unpkg.com/axios/dist/axios.min.js'></script> -->
    <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/js/froala_editor.min.js'></script> -->
   <!-- <script src='//cdn.tinymce.com/4/tinymce.min.js'></script> -->
   <!-- <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script> -->
</head>

<body class="nav-md">
    <div id="a" class="container body">
        <div id="b" class="main_container">
          <?= $_sidebar;?>
          <?= $_navbar;?>
          <?= $_content;?>
          <?= $_footer;?>
        <!-- start: Javascript -->
        
        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/bootstrap/dist/js/bootstrap.js"></script> -->
        <!-- FastClick -->
        <!-- <script src="../vendors/fastclick/lib/fastclick.js"></script> -->
        <!-- NProgress -->
        <!-- <script src="../vendors/nprogress/nprogress.js"></script> -->
        <!-- Chart.js -->
        <!-- <script src="../vendors/Chart.js/dist/Chart.min.js"></script> -->
        <!-- gauge.js -->
        <!-- <script src="../vendors/gauge.js/dist/gauge.min.js"></script> -->
        <!-- bootstrap-progressbar -->
        <!-- <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
        <!-- iCheck -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/iCheck/icheck.min.js"></script> -->
        <!-- Skycons -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/skycons/skycons.js"></script> -->
        <!-- Flot -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/vendors/Flot/jquery.flot.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/vendors/Flot/jquery.flot.pie.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/vendors/Flot/jquery.flot.time.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/vendors/Flot/jquery.flot.stack.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/vendors/Flot/jquery.flot.resize.js"></script> -->
        <!-- Flot plugins -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/production/js/flot/jquery.flot.orderBars.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/production/js/flot/date.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/production/js/flot/jquery.flot.spline.js"></script> -->
        <!-- <script src="<?= base_url();?>assets/theme/gentelella/production/js/flot/curvedLines.js"></script> -->
        <!-- jVectorMap -->
        <!-- <script src="js/maps/jquery-jvectormap-2.0.3.min.js"></script> -->

        <!-- PNotify -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.js"></script> -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.buttons.js"></script> -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/pnotify/dist/pnotify.nonblock.js"></script> -->
<!-- Time Picker -->
<!-- <script src="//cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script> -->
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo base_url();?>assets/theme/gentelella/production/js/moment/moment.min.js"></script>
        <script src="<?php echo base_url();?>assets/theme/gentelella/production/js/datepicker/daterangepicker.js"></script>
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/production/js/datetimepicker/js/bootstrap-datetimepicker.js"></script> -->
        <script src="<?php echo base_url();?>assets/theme/gentelella/production/js/timepickerdate/js/bootstrap-datetimepicker.min.js"></script>
        <!-- bootstrap-datetimepicker.js -->
        <!-- Custom Theme Scripts -->
        <!-- InputMask -->
        <!-- <script src="<?php echo base_url();?>assets/theme/gentelella/vendors/jquery.inputmask/dist/min/inputmask/jquery.inputmask.min.js"></script> -->
        <script src="<?php echo base_url();?>assets/theme/gentelella/build/js/custom.min.js"></script>
        <script>
              $(document).ready(function() {
                $('#tanggal-awal').daterangepicker({
                  singleDatePicker: true,
                  timePicker: true,
                  timePickerIncrement: 1,
                  timePicker12Hour: false,
                  timePickerSeconds: true,
                  format: 'YYYY-MM-DD HH:mm:ss',
                  calender_style: "picker_2"
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#tanggal-akhir').daterangepicker({
                  singleDatePicker: true,
                  timePicker: true,
                  timePickerIncrement: 1,
                  timePicker12Hour: false,
                  timePickerSeconds: true,
                  format: 'YYYY-MM-DD HH:mm:ss',
                  calender_style: "picker_2"
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#intervalrelay').daterangepicker({
                  singleDatePicker: true,
                  alwaysShowCalendars: false,
                  timePicker: true,
                  timePickerIncrement: 1,
                  timePicker12Hour: false,
                  timePickerSeconds: true,
                  format: 'H:m:s',
                  calender_style: "picker_2"
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#single_cal4').daterangepicker({
                  singleDatePicker: true,
                  calender_style: "picker_4"
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
              });
            </script>

            <!-- <script type="text/javascript">
              $(function() {
                $('#interval-relay').datetimepicker({
                  language: 'en'
                });
              });
            </script> -->
    </body>
</html>
