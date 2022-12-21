
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  @include('layouts.backend.partials.css')
   @stack('css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
@include('layouts.backend.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layouts.backend.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     @yield('Content_header')
   
    <!-- /.content-header -->

    <!-- Main content -->
     @yield('content')
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer part -->
  @include('layouts.backend.partials.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.backend.partials.scripts')
 @stack('js')
</body>
</html>
