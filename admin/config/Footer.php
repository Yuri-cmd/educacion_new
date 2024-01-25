<!-- /.content-wrapper -->




<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--Alert -->
<script src="../assets2/bower_components/toast/toastr.js"></script>
<!-- Input file -->
<script src="../assets2/bower_components/inputfile/bootstrap.file-input.js"></script>
<!-- Select2 -->
<script src="../assets2/bower_components/select2/select2.full.min.js"></script>
<!-- Sparkline -->
<script src="../assets2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../assets2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets2/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets2/bower_components/moment/min/moment.min.js"></script>
<script src="../assets2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../assets2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets2/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets2/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example2').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
