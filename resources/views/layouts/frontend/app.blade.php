<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="constra" />

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  @include('layouts.frontend.partials.css')
  @stack('css')
  

</head>
<body>
  <div class="body-inner">

    @include('layouts.frontend.partials.navigation')
    @yield('slider')
    @yield('content')

  
 @include('layouts.frontend.partials.footer')

@include('layouts.frontend.partials.js')
@stack('js')
  </div><!-- Body inner end -->
  </body>

  </html>