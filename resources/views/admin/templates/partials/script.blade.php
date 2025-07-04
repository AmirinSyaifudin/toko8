<!-- jQuery 3 -->
<script src="{{ asset('admin/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('admin/assets/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/assets/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/assets/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

{{-- bootstrap Notify --}}
<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/plugins/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

<!--  Google Maps Plugin    -->
<script src="{{ asset('admin/assets/plugins/https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script>

<!-- Chartist JS -->
<script src="{{ asset('admin/assets/plugins/assets/js/plugins/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('admin/assets/plugins/assets/js/plugins/bootstrap-notify.js') }}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('admin/assets/plugins/assets/js/material-dashboard.min.js?v=2.1.0') }}" type="text/javascript"></script>

{{-- <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
  $(document).ready(function () {
     $('.rupiah').mask("#.##0", {reverse: true});
  });
  </script> --}}
@stack('scripts')