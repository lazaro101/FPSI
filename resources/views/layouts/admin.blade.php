<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FPSI | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/jvectormap/jquery-jvectormap.css') }}">

  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/select2/dist/css/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/select2-theme/dist/select2-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/fullcalendar/dist/fullcalendar.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">

  <!-- <link rel="stylesheet" href="{{ asset('validator/demo/css/screen.css') }}"> -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style type="text/css">
  .has-error .select2-container--default .select2-selection--single,
  .has-error .select2-selection .select2-selection--single {
    border: 1px solid #d60505 !important;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px;
  }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FPSI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>Findstaff</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       <!--    <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/AdminLTE/dist/img/avatar2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">UserName</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="/AdminLTE/dist/img/avatar2.png" class="img-circle" alt="User Image">

                <p>
                  UserName - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/AdminLTE/dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>UserName</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
 <!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->  
        <li class="db"><a href="/Dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview">
          <a class="mntc" href="#"><i class="fa fa-cogs"></i>
            <span><strong>Maintenance</strong></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="cty"><a href="/Maintenance/Country"><i class="fa fa-circle-o"></i>Country</a></li>
            <li class="cnc"><a href="/Maintenance/Currency"><i class="fa fa-circle-o"></i>Currency</a></li>
            <li class="bnk"><a href="/Maintenance/Banks"><i class="fa fa-circle-o"></i>Banks</a></li>
            <li class="abnk"><a href="/Maintenance/AcceptedBanks"><i class="fa fa-circle-o"></i>Accepted Banks</a></li>
            <li class="jd treeview">
              <a class="jd" href=""><i class="fa fa-circle-o"></i>Job Details <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> </a>
              <ul class="treeview-menu">
                <li class="jbc"><a href="/Maintenance/JobCategory"><i class="fa fa-circle-o"></i>Job Category</a></li>
                <li class="jbt"><a href="/Maintenance/JobType"><i class="fa fa-circle-o"></i>Job Type</a></li>
                <li class="jb"><a href="/Maintenance/Job"><i class="fa fa-circle-o"></i>Job</a></li>
                <li class="sls"><a href="/Maintenance/Skills"><i class="fa fa-circle-o"></i>Skills</a></li>
                <li class="fes"><a href="/Maintenance/Fees"><i class="fa fa-circle-o"></i>Fees</a></li>
                <li class="gr"><a href="/Maintenance/DocumentaryRequirements"><i class="fa fa-circle-o"></i>Documentary Requirements</a></li>
              </ul>
            </li>
          </ul>
        </li>


        <li class="treeview">
          <a class="trnsc" href="#"><i class="fa fa-pencil-square-o"></i>
            <span><strong>Transactions</strong></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="jd treeview">
              <a href="" class="jd"><i class="fa fa-circle-o"></i>Job Order Management <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> </a>
              <ul class="treeview-menu">
                <li class="empr"><a href="/Transactions/Employer"><i class="fa fa-circle-o"></i>Employer</a></li>
                <li class="jor"><a href="/Transactions/JobOrder"><i class="fa fa-circle-o"></i>Job Order</a></li>
              </ul>
            </li>

            <li class="jd treeview">
              <a href="" class="am"><i class="fa fa-circle-o"></i>Application Management <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> </a>
              <ul class="treeview-menu">
                <li class="app"><a href="/Transactions/Applicant"><i class="fa fa-circle-o"></i>Applicant</a></li>
                <li class="appmat"><a href="/Transactions/ApplicantMatching"><i class="fa fa-circle-o"></i>Applicant Matching</a></li>
                <li class="intin"><a href="/Transactions/InitialInterview"><i class="fa fa-circle-o"></i>Initial Interview</a></li>
                <li class="finin"><a href="/Transactions/FinalInterview"><i class="fa fa-circle-o"></i>Final Interview</a></li>
                <li class="docu"><a href="/Transactions/DocumentsCollection"><i class="fa fa-circle-o"></i>Documents Collection</a></li>
              </ul>
            </li>

            <li class="cty"><a href="/Transactions/CollectionsMonitoring"><i class="fa fa-circle-o"></i>Collections Monitoring</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i>
            <span><strong>Reports</strong></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Deployment Monitoring Report</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i>
            <span><strong>Utilities</strong></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Employee</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Findstaff Placement Services, Inc.</a>.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/moment/moment.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/bower_components/Chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE/dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/select2/dist/js/select2.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script> 
<!-- Fullcalendar -->
<script src="{{ asset('AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script> 
<!-- <script src="{{ asset('AdminLTE/bower_components/fullcalendar/dist/locale-all.js') }}"></script>  -->
<!-- InputMask -->
<script src="{{ asset('AdminLTE/bower_components/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/inputmask/dist/inputmask/phone-codes/phone.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/inputmask/dist/inputmask/phone-codes/phone-be.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/inputmask/dist/inputmask/phone-codes/phone-ru.js') }}"></script>
<!-- Jquery Validation -->
<script src="{{ asset('validator/dist/jquery.validate.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable();

    $.validator.setDefaults({
       onkeyup: false,
       onclick: false,
       onfocusout: false,
      highlight: function(element){
        $(element)
          .closest('.form-group')
          .addClass('has-error');
        $(element).closest('.form-group').find('span.glyphicon').remove();
        $(element).closest('.form-group.has-feedback').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
      },
      unhighlight: function(element){
        $(element)
          .closest('.form-group')
          .removeClass('has-error');
        $(element).closest('.form-group').find('span.glyphicon').remove();
        $(element).closest('.form-group').addClass('has-success');
        $(element).closest('.form-group.has-feedback').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
      },
      errorPlacement: function(error, element){
        if (element.prop('type') == 'checkbox') {
          // element.parent().parent().parent().append(error);
        } else if(element.hasClass('select2')) {
          element.closest('.form-group').append(error);
        } else if(element.hasClass('ingrp')) {
          element.parent().parent().append(error);
        } else if(element.prop('id') == 'datepicker') {
          element.closest('.form-group').append(error);
        } else { 
            error.insertAfter(element); 
        }
      }
    });
  });

  function clearform(){
    $('.form-group').each(function () { $(this).removeClass('has-success'); });
    $('.form-group').each(function () { $(this).removeClass('has-error'); });
    $('.form-group').each(function () { $(this).find('span.glyphicon').remove(); });
    $('form').validate().resetForm();
  }
</script>

@yield('script')

</body>
</html>
