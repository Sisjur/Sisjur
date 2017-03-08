@if(!session("users"))
    <script>window.location.href="/"</script>

@endif
<!DOCTYPE html>
<html>
@include("admin/pages/head")
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
    <!--header-->
    
    @include('admin/pages/header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin/pages/menu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="padding-top : 50px;">
    <!-- ./wrapper -->
    @yield("content")

    @include("admin/pages/footer")
<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>
<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!--Vue-->
<script src="{{URL::asset('plugins/vue/vue.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/app.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('plugins/dataTables/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('plugins/dataTables/dataTables.select.min.js')}}"></script>
<script src="{{URL::asset('plugins/dataTables/dataTables.editor.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{URL::asset('plugins/chartjs/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- InputMask -->

<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- hecho estudiantes -->
<script src="{{URL::asset('dist/js/genericAnimations.js')}}"></script>
<script src="{{URL::asset('dist/js/abogado/listarAbogado.js')}}"></script>
<script src="{{URL::asset('dist/js/abogado/modificarAbogado.js')}}"></script>
<script src="{{URL::asset('dist/js/cliente/listarClientes.js')}}"></script>
<script src="{{URL::asset('dist/js/cliente/registrarCliente.js')}}"></script>
<script src="{{URL::asset('dist/js/proceso/registrarProceso.js')}}"></script>
<script src="{{URL::asset('dist/js/proceso/listarProcesos.js')}}"></script>
<script src="{{URL::asset('dist/js/proceso/actualizarProcesos.js')}}"></script>
<script src="{{URL::asset('dist/js/proceso/avances.js')}}"></script>
<script src="{{URL::asset('dist/js/pages/contenedor.js')}}"></script>
<!--Single-Page-Aplication-Control-->
<!--<script src="dist/js/spa.js"></script>-->
<!-- Datepicker-->
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
@yield("scripts")

<script>

    $(document).on("click", ".select2", function (e) {

        $(this).select2();
    })
    $('body').on('focus', "#datepicker", function () {
        $(this).datepicker({
            autoclose: true
        });
    });
    $('body').on('focus', "#txt_fecha_acta", function () {
        $(this).datepicker({
            autoclose: true
        });
    });
    $("body").on("focus", "#example1", function () {
        $(this).DataTable();
    })
    $(function () {
        $("#example1").DataTable();

    });
</script>

        
        
    </div>
</div>


</body>
</html>
