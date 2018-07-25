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
              <img class="img-circle" src="{{asset('images/profile.png')}}">
              @else
              <img class="img-circle" src="{{asset('images/'. Auth::user()->image)}}">
              @endif -->
            </div>
              <div class="pull-left info">
              <p class="designation">{{Auth::user()->name}}</p>
              <a>{{Auth::user()->level}}</a>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li><a href="{{url('dashb')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href=#><i class="fa fa-pencil"></i><span>Master Data</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{url('adminrf')}}"><i class="fa fa-id-card"></i>RF Admin</a></li>
                <li class="active"><a href="{{url('adminuser')}}"><i class="fa fa-users"></i>Operators</a></li>
                <li><a href="{{url('admindevice')}}"><i class="fa fa-inbox"></i>Devices</a></li>
              </ul>
              </li>
            <li><a href="{{url('report')}}"><i class="fa fa-folder"></i><span>Transaction Data</span></a>
              <!-- <ul class="treeview-menu">
                <li><a href="{{url('report')}}"><i class="fa fa-file-excel-o"></i>Data Transaction</a></li>
              </ul> -->
            </li>
          </ul>
        </section>
      </aside>
    <!-- END sidenav -->
      <div class="content-wrapper">
        <div class="page-title">
            <h2><i class="fa fa-user"></i> Add Operators</h2>
            
            @if(Session::has('error'))
            <div class="alert alert-error">
              {{ Session::get('error') }}
            </div>
            @endif

            <div>
            @if(collect(request()->segments())->last()=='edit')
              <form method="post" action="{{url('adduser/'.$data['nik'].'/update')}}" enctype="multipart/form-data">
                @else
              <form  action="{{route('adduser.store')}}" method="post" enctype="multipart/form-data">
              @endif
                {{csrf_field()}}
      <div class="col-md-3">
        <div class="text-center">
          <img class="peteditor" src="" id="showgambar" style="max-width:200px;max-height:200px;float:left;" alt="Image not found"><br><br>
          <p type="upload image:"><input type="file" id="inputgambar" name="image" accept="image/*" ></input></p>
        </div>
        @if ($errors->has('image'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('image') }}</strong>
                  </span>
              @endif
      <p style="color: red">*Image size max 2 MB</p>
      </div>

                    <!-- edit form column -->
      <div class="col-md-9 personal-info">
        

          <div class="form-group">
            <label class="col-lg-3 control-label">NIK :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nik" placeholder="Nik" value="{{(isset($data->nik))?$data->nik:''}}">
              @if ($errors->has('nik'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('nik') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Name :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name" placeholder="Name" value="{{(isset($data->name))?$data->name:''}}">
              @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Job :</label>
            <div class="col-lg-8">
              <select class="form-control nav" name="job" placeholder="Job" value="{{(isset($data->job))?$data->job:''}}">
                      <option value="picker">Picker</option>
                      <option value="checker">Checker</option>
                      <option value="rr">RR</option></select>
              @if ($errors->has('job'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('job') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">ID SAP :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="id_sap" placeholder="Id SAP" value="{{(isset($data->id_sap))?$data->id_sap:''}}">
              @if ($errors->has('id_sap'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('id_sap') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary">Save</button>
              <span></span>
              <button type="reset" class="btn btn-default">Reset</button>
              <!-- <input type="reset" class="btn btn-default" value="Cancel"> -->
            </div>
          </div>
        </form>
        </form>
      </div>
  </div>
      </div>
    </div>
  </div>

    </section>


    <!-- Javascripts-->
    <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <script type="text/javascript">$('#app').fadeTo(300,1).fadeOut(1000);</script>
  </body>
</html>