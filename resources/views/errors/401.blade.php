@extends('layout')

@section('content')
<section class="content-header">
          <h1>
            401 Unauthorized to view this page. Please contact your Administrator.
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Error</a></li>
            <li class="active">404 error</li>
          </ol>
        </section>


  <!-- Main content -->
        <section class="content">

          <div class="error-page">
            <h2 class="headline text-yellow"> 401</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
              <p>
                Unauthorized!
                Meanwhile, you may <a href='/home'>return to dashboard.</a>
              </p>
              

              <!-- <form class='search-form'>
                <div class='input-group'>
                  <input type="text" name="search" class='form-control' placeholder="Search"/>
                  <div class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form> -->


            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->

@endsection

 
@section('footer_scripts')

	
     <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js" type="text/javascript"></script>
  

@endsection