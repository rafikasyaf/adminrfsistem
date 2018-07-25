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
       <!-- datetimepicker -->
      <link rel="stylesheet" type="text/css" href="{{ asset('datetimepicker/jquery.datetimepicker.css')}}" >
    <title>Admin RF Management System</title>
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
            
            </div>
              <div class="pull-left info">
              <p class="designation">{{Auth::user()->name}}</p>
              <a>{{Auth::user()->level}}</a>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="{{url('mngrdashb')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li  class="active"><a href=""><i class="fa fa-folder"></i><span>Report</span></a>
            </li>
          </ul>
        </section>
      </aside>
    <!-- END sidenav -->
      <div class="content-wrapper">
        <div class="page-title">
            <h2><i class="fa fa-folder"></i> Report</h2>
            <div>

<!--               <div class="custom-select" value="{{(isset($data->category))?$data->category:''}}">
                <select>
                      <option value="today">Today</option>
                      <option value="thismonth">This Month</option>
                      <option value="period">Period</option></select>
              </div> -->

            <form action="{{ url('mngrreport/export') }}" method="get" class="form-inline" enctype="multipart/form-data">
            <div class="exportexcel">           
              
                <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                        <input id="datetimepicker" placeholder="Input start date"  class="form-control" name="tgl_awal">
                    </div>
                </div>
               <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                        <input id="datetimepicker2" placeholder="Input end date"  class="form-control" name="tgl_akhir">
                    </div>
              </div>

              <button class="btn btn-edit"><a><i class="fa fa-file-excel-o"></i> Export to Excel</a></button>
       
            </div>

            <div class="row">
          <div class="col-md-12">
              <div class="">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id Lend</th>
                      <th>Date Out</th>
                      <th>Date Return</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>RF ID</th>
                      <th>Station</th>
                      <th width="17%">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($show as $v)
                    <tr>
                      <td>{{$v->id_lend}}</td>
                      <td>{{$v->tgl_pinjam}}</td>
                      <td>{{$v->tgl_kembali}}</td>
                      <td>{{$v->nik}}</td>
                      <td>{{$v->name}}</td>
                      <td>{{$v->id_rf}}</td>
                      <td>{{$v->station}}</td>
                      <td>{{$v->status}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </section>
  


    <!-- Javascripts-->
    <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
   <script src="{{ asset('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script type="text/javascript">
    $(function(){
      $('#datetimepicker').datetimepicker();
        // format: 'dd-mm-yyyy hh:ii:ss',
        // autoclose: true,
        // todayHighlight: true,
      });
    </script>
    <script type="text/javascript">
    $(function(){
      $('#datetimepicker2').datetimepicker();
      });
    </script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>