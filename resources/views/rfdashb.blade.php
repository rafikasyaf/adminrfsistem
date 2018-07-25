<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css')}}">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- logo taskbar -->
      <link rel="shortcut icon" href="{{ asset('images/linfox.gif')}}">
    <title>Admin RF Management System</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
      <!-- Navbar-->
      <!-- Navbar-->
      <div class="navbar-top">
      <header class="main-header hidden-print">
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img class="image-logo2" src="{{asset('rf/images/linfox.gif')}}"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img class="image-logo" src="{{asset('rf/images/linfox.gif')}}"></span>
        </a>
        <div class="top-navig">
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
                  <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
      </header>
    </div>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img class="img-circle" src="{{asset('images/profile.png')}}">
              <!-- @if(Auth::user()->image == '')
              <img class="img-circle" src="{{asset('images/profile.png')}}" >
              @else
              <img class="img-circle" src="{{asset('images/'. Auth::user()->image)}}" >
              @endif -->
              </div>
              <div class="pull-left info">
              <p class="designation">{{Auth::user()->name}}</p>
              <a>{{Auth::user()->level}}</a>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href=""><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-pencil"></i><span>Transaction</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('rfout')}}"><i class="fa fa-mail-reply"></i>Out</a></li>
                <li><a href="{{url('rfreturn')}}"><i class="fa fa-mail-forward"></i>Return</a></li>
              </ul>
            </li>
                <li><a href="{{url('rfreport')}}"><i class="fa fa-file-excel-o"></i><span>Transaction Data</span></a></li>
          </ul>
        </section>
      </aside>
    <!-- END sidenav -->
      <div class="content-wrapper">
        <div class="page-title">
            <h2><i class="fa fa-tachometer"></i> Dashboard</h2>
          </div>

   <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-grey"><i class="fa fa-archive"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total</span>
              <span class="info-box-number">
                {{$total}}
              </span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa fa-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Available</span>
              <span class="info-box-number">
                {{$available}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-grey"><i class="fa fa-signing"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lended</span>
              <span class="info-box-number">
                {{$lend}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa fa-remove"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Broken</span>
              <span class="info-box-number">
                {{$broken}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <br><br><br>
      <div id="chart1"></div>
    {!! $chart1 !!}
    </section>
  </div>




    <!-- Javascripts-->
    <!-- jQuery 3 -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap  -->
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/bower_components/Chart.js/Chart.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/dist/js/pages/dashboard2.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js')}}"></script>


    <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/chart.js')}}"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "Red"
      	},
      	{
      		value: 50,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Green"
      	},
      	{
      		value: 100,
      		color: "#FDB45C",
      		highlight: "#FFC870",
      		label: "Yellow"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      
      var ctxr = $("#radarChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxr).Radar(data);
      
      var ctxpo = $("#polarChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxpo).PolarArea(pdata);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxp).Pie(pdata);
      
      var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxd).Doughnut(pdata);
    </script>
  </body>
</html>