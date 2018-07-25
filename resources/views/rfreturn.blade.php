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
      <!-- <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
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
      <!-- logo taskbar -->
      <link rel="shortcut icon" href="{{ asset('images/linfox.gif')}}">
      <!-- Font-icon css-->
      <jn0link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
              <img class="img-circle" src="{{asset('images/profile.png')}}" >
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
                <li><a href="{{url('rfout')}}"><i class="fa fa-mail-reply"></i>Out</a></li>
                <li  class="active"><a href=""><i class="fa fa-mail-forward"></i>Return</a></li>
              </ul>
            </li>
                <li><a href="{{url('rfreport')}}"><i class="fa fa-file-excel-o"></i><span>Transaction Data</span></a></li>
          </ul>
        </section>
      </aside>
    <!-- END sidenav -->
    
      <div class="content-wrapper">
        <div class="page-title">
          <h2><i class="fa fa-mail-forward"></i> Return</h2>
          
          @if(Session::has('success'))
            <div id="app" class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @elseif(Session::has('error'))
            <div class="alert alert-error">
              {{ Session::get('error') }}
            </div>
          @endif

          <div>
          <div class="box box-info">
            <!-- form start -->
            
              <form role="form"  action="{{url('rfreturn/{nik}/update')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div>
                  <div class="col-sm-1"></div>
                  <label for="userid" class="col-sm-1">NIK :</label>
                  <div class="col-sm-3">
                    <input class="form-control" name="nik" placeholder="Nik" type="text" value="{{(isset($updt->nik))?$updt->nik:''}}">
                    @if ($errors->has('nik'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('nik') }}</strong>
                  </span>
              @endif
                  </div>
                  <div class="col-sm-1"></div>
                  <label for="rfid" class="col-sm-1">RF ID :</label>
                  <div class="col-sm-3">
                    <input class="form-control" name="id_rf" placeholder="RF ID" type="text" value="{{(isset($updt->id_rf))?$updt->id_rf:''}}">
                    @if ($errors->has('id_rf'))
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $errors->first('id_rf') }}</strong>
                  </span>
              @endif
                  </div>
                </div>
              </div>
              <div class="box-footer" align="center">
                <button type="submit" class="btn btn-info btn-sm">Ok</button>
                <a data-toggle="modal" data-target="#myModal" class="btn btn-warning">Report</a>
              </div> 
              
            </form>
            
                       
          </div>
        

<img id="book" src="book.png" alt="" width="100" height="123">

        <div class="row">
          <div class="col-md-12">
              <div class="">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id Lend</th>
                      <th>Out Date</th>
                      <!-- <th>Return Date</th> -->
                      <th>NIK</th>
                      <!-- <th>Name</th> -->
                      <th>RF ID</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($show as $v)
                    <tr>
                      <td>{{$v['id_lend']}}</td>
                      <td>{{$v['tgl_pinjam']}}</td>
                      <!-- <td>{{$v['tgl_kembali']}}</td> -->
                      <td>{{$v['nik']}}</td>
                      <!-- <td>Bambang</td> -->
                      <td>{{$v['id_rf']}}</td>
                      <td>{{$v['status']}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
    </div>
  </div>  


</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></a>
        <center><h2 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle"></i> Report</h2></center>
      </div>
      
      
      <div class="modal-body">        
        <form action="{{url('rfreturn/{nik}/report')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          
          <div class="form-group">
            <label class="col-lg-3 control-label">NIK:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nik" value="{{(isset($updt->nik))?$updt->nik:''}}">
            </div>
            <br>
            <label class="col-lg-3 control-label">RF ID:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="id_rf" value="{{(isset($updt->id_rf))?$updt->id_rf:''}}">
            </div>
            <br>
            <label class="col-lg-3 control-label">Status:</label>
            <div class="col-lg-8">
              <select class="form-control" type="text" name="status" value="{{(isset($updt->status))?$updt->status:''}}">
                <option value="lost"> Return without the device</option>
                <option value="broken"> Return with the broken device</option>
                <option value="other"> Other</option>
                </select>
            </div>
            <br>
            <label class="col-lg-3 control-label">Other:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="other" value="{{(isset($updt->other))?$updt->other:''}}">
            </div>
            </div>
          <br>
          <br>
          <br>
          <br>
          <br>


          
            <center><button type="submit" class="btn btn-warning">Report</button></center>
        </form>
      </div>
    </div>
  </div>
</div>


    <!-- Javascripts-->
    <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Here -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}</script>

<script>function myReport() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar_report");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<!-- <script type="text/javascript">$('#submit').click(function()
{
    setTimeout(function(){ window.location.href='rfreturn'; }, 10000);       
});</script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    $("#btnRedirect").click(function () {
        var seconds = 5;
        $("#dvCountDown").show();
        $("#lblCount").html(seconds);
        setInterval(function () {
            seconds--;
            $("#lblCount").html(seconds);
            if (seconds == 0) {
                $("#dvCountDown").hide();
                window.location = 'rfreturn';
            }
        }, 500);
    });
});
</script> 
<script type="text/javascript">$('#app').fadeTo(300,1).fadeOut(1000);</script>
  </body>
</html>