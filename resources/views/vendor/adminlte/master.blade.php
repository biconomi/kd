<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>| Nguyen-Nha |@yield('title_prefix')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" type="image/png" href="{{asset('adminlte/upload/favicon/'.'favicon.png')}}">
  <meta property="og:url" content="https://www.hyundaiphuquoc.net/">
  <meta property="og:title" content="Thi online">
  <meta property="og:image" content="{{asset('adminlte/upload/favicon/'.'favicon.png')}}">
  <meta property="og:description" content="Trang thông tin cho hyundai">

  @yield('adminlte_css')
  @yield('adminlte_css_custom')

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini
|               | hold-transition                         |
|---------------------------------------------------------|
-->
<body class="sidebar-mini skin-black fixed">
<div class="wrapper">
  
  @yield('body')
</div>
<!-- ./wrapper -->


@yield('adminlte_js')

@yield('adminlte_js_custom')


</body>
</html>
