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
            <li><a href="{{url('rfdashb')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=""><i class="fa fa-pencil"></i><span>Transaction</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li  class="active"><a href=""><i class="fa fa-mail-reply"></i>Out</a></li>
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
          <h2><i class="fa fa-mail-reply"></i>Out</h2>

		      @if(Session::has('success'))
            <div id="app" class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @elseif(Session::has('error'))
            <div class="alert alert-error">
              {{ Session::get('error') }}
            </div>
          @endif
			
		<div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            
        <!-- <form class="form-horizontal"> -->
        <form role="form" action="#" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
<!-- baris 1 -->
        <div class="row">
				<div class="col-sm-1"></div>
            <label for="NIK" class="col-sm-1">NIK :</label>
                <div class="col-sm-3">
                    <input class="form-control" id="nik" name="nik" placeholder="NIK" type="text">
                    @if ($errors->has('nik'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('nik') }}</strong>
                  </span>
              @endif
                </div>
				<div class="col-sm-1"></div>
            <label for="IDRF" class="col-sm-1">RF ID :</label>
                <div class="col-sm-3">
                    <input class="form-control" id="id_rf" name="id_rf" placeholder="Id Rf" type="text">
                    @if ($errors->has('id_rf'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('id_rf') }}</strong>
                  </span>
              @endif
                </div>
        </div>

<!-- baris 2 -->
				<div class="row">
				<div class="col-sm-1"></div>
            <label for="IDRF" class="col-sm-1">NAME :</label>
              <div class="col-sm-3">
                <input class="form-control" id="name" name="name" placeholder="Name" type="text" readonly>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
              </div>
					
				<div class="col-sm-1"></div>
            <label for="IDRF" class="col-sm-1">STATION :</label>
              <div class="col-sm-3">
                <input class="form-control" id="station" name="station" placeholder="Station" type="text" readonly>
                @if ($errors->has('station'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('station') }}</strong>
                  </span>
              @endif
              </div>         
        </div>

<!-- baris 3 -->
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="IDRF" class="col-sm-1">JOB :</label>
              <div class="col-sm-3">
                <input class="form-control" id="job" name="job" placeholder="Job" type="text" readonly>
                @if ($errors->has('job'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('job') }}</strong>
                  </span>
              @endif
              </div>
          
        <div class="col-sm-1"></div>
            <label for="IDRF" class="col-sm-1">STATUS :</label>
              <div class="col-sm-3">
                <input class="form-control" id="status" name="status" placeholder="Status" type="text" readonly>
                @if ($errors->has('status'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
              </div>         
        </div>
        <br><br><br>

<!-- button -->		
        <div align="center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div> 
      </div> <!-- /.box-body -->
              
  </form>

<!-- otomatis muncul -->           
            <script type="text/javascript" src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
            <script type="text/javascript">
              $(document).ready(function(){
              $('#nik').change(function(){
                var nikfromfield = $('#nik').val();
                var url= "{{url('rfout')}}/"+nikfromfield+"/getData"
                $.get(url).done(function(result){
                  $('#name').val(result.name)
                  $('#job').val(result.job)
                })
              });
            });
            </script>

            <script type="text/javascript">
              $(document).ready(function(){
              $('#id_rf').change(function(){
                var id_rffromfield = $('#id_rf').val();
                var url= "{{url('rfout')}}/"+id_rffromfield+"/getDevice"
                $.get(url).done(function(result){
                  $('#station').val(result.station)
                  $('#status').val(result.status)
                })
              });
            });
            </script>

  

    <!-- Javascripts-->
    
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js')}}">
      
      
    </script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script type="text/javascript">$('#app').fadeTo(300,1).fadeOut(1000);</script>
  </body>
</html>