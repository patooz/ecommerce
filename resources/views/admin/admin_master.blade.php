<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset ('backend/images/favicon.ico')}}">

    <title>Ndonyo Admin - Dashboard</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset ('backend/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset ('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset ('backend/css/skin_color.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('admin.body.header')
    @include('sweetalert::alert')

    @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    @yield('admin')




  </div>
  <!-- /.content-wrapper -->
  @include('admin.body.footer')



  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


	<!-- Vendor JS -->
	<script src="{{asset ('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset ('../assets/icons/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset ('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset ('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset ('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{asset ('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset ('backend/js/pages/data-table.js')}}"></script>

    {{-- input tags --}}
    <script src=" {{asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>

    {{-- CK Editor --}}
    <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
	<script src="{{asset('backend/js/pages/editor.js')}}"></script>


	<!-- Sunny Admin App -->
	<script src="{{asset ('backend/js/template.js')}}"></script>
	<script src="{{asset ('backend/js/pages/dashboard.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset ('frontend/assets/js/jquery.min.js')}}"></script>



<script>
  @if (Session::has('message'))
  var type="{{Session::get('alert-type', 'info') }}"
    switch (type){
      case 'info':
      toaster.info("{{ Session::get('message') }}");
      break;

      case 'success':
      toaster.success("{{ Session::get('message') }}");
      break;

      case 'warning':
      toaster.warning("{{ Session::get('message') }}");
      break;

      case 'error':
      toaster.error("{{ Session::get('message') }}");
      break;

    }


  @endif



</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })




        });
    });

</script>


</body>
</html>
