<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
@yield('title')
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('admin.include.css')

@yield('stylesheet')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
   
@include('admin.include.header')

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     <!-- left Side bar -->

@include('admin.include.left_sidebar')







    </section>
    <!-- /.sidebar -->
  </aside>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 @include('partials._message')
    <!-- Home Content -->

@yield('maincontent')




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








  <footer class="main-footer">
   
@include('admin.include.footer')



  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.include.js')
@yield('script')
</body>
</html>
