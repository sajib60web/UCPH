<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
{{--    <link href="{{ asset('assets') }}/images/logo.png" rel="shortcut icon" type="image/x-icon">--}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .btnDemo{
            text-align: center;
            width: 30px;
            height: 30px;
            padding: 0;
            margin: 0;
        }
        tbody td {
            font-weight: 500 !important;
        }
        .payment{
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>{{ config('app.name') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
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
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth()->user()->name }}
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div style="text-align: center;">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Logout</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
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
                    <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Request::is('home')?'active':'' }}">
                    <a href="{{ url('/home') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('customers')?'active':'' }}">
                    <a href="{{ route('customers.index') }}">
                        <i class="fa fa-user"></i> <span>Manage Customer</span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('meters') || Request::is('change/owner/ship')?'active':'' }}">
                    <a href="#">
                        <i class="fa fa-clock-o"></i> <span> Meter</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('meters')?'active':'' }}">
                            <a href="{{ route('meters.index') }}"><i class="fa fa-list"></i> Manage Meter</a>
                        </li>
                        <li class="{{ Request::is('change/owner/ship')?'active':'' }}">
                            <a href="{{ route('change.owner.ship') }}"><i class="fa fa-list"></i> Change OwnerShip</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('create/bill') || Request::is('manage/bill') || Request::is('due/bill')?'active':'' }}">
                    <a href="#">
                        <i class="fa fa-credit-card"></i> <span> Billing</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('create/bill')?'active':'' }}">
                            <a href="{{ route('create.bill') }}"><i class="fa fa-plus-square"></i> Create Bill</a>
                        </li>
                        <li class="{{ Request::is('manage/bill')?'active':'' }}">
                            <a href="{{ route('manage.bill') }}"><i class="fa fa-list"></i> Manage Bill</a>
                        </li>
                        <li class="{{ Request::is('due/bill')?'active':'' }}">
                            <a href="{{ route('due.bill') }}"><i class="fa fa-list"></i> Due Bill</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('collect/payment') || Request::is('payment/receipt') || Request::is('payment/gateway')?'active':'' }}">
                    <a href="#">
                        <i class="fa fa-credit-card"></i> <span> Payments</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('collect/payment')?'active':'' }}">
                            <a href="{{ route('collect.payment') }}"><i class="fa fa-plus-square"></i> Collect Payment</a>
                        </li>
                        <li class="{{ Request::is('payment/receipt')?'active':'' }}">
                            <a href="{{ route('payment.receipt') }}"><i class="fa fa-list"></i> Payment Receipt</a>
                        </li>
                        <li class="{{ Request::is('payment/gateway')?'active':'' }}">
                            <a href="{{ route('payment.gateway') }}"><i class="fa fa-list"></i> Payment Gateway</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is('sms/reminder') || Request::is('custom/sms')?'active':'' }}">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span> Reminder</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('sms/reminder')?'active':'' }}">
                            <a href="{{ route('sms.reminder') }}"><i class="fa fa-mobile"></i> SMS Reminder</a>
                        </li>
                        <li class="{{ Request::is('custom/sms')?'active':'' }}">
                            <a href="{{ route('custom.sms') }}"><i class="fa fa-mobile"></i> Custom SMS</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('reports')?'active':'' }}">
                    <a href="{{ route('reports') }}">
                        <i class="fa fa-area-chart"></i> <span>Reports</span>
                    </a>
                </li>
                <li class="treeview {{ Request::is('set/rates') || Request::is('users')?'active':'' }}">
                    <a href="#">
                        <i class="fa fa-gear"></i> <span> Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('set/rates')?'active':'' }}">
                            <a href="{{ route('set.rates') }}"><i class="fa fa-server"></i> Set Rates</a>
                        </li>
                        <li class="{{ Request::is('users')?'active':'' }}">
                            <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Manage User</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('main-content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 - {{ date('Y') }} <a target="_blank" href="https://trickssoft.com/">Tricks Toft</a>.</strong> All rights
        reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin') }}/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('assets/admin') }}/dist/js/pages/dashboard2.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin') }}/dist/js/demo.js"></script>
<!-- CK Editor -->
{{--<script src="{{ asset('assets/admin') }}/bower_components/ckeditor/ckeditor.js"></script>--}}
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
@yield('script')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select1').select2();
        $('.select2').select2();
        // CKEDITOR.replace('editor1');
        // CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
        //Date picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    })
</script>
<script>
    $(function () {
        $('#example1').DataTable();
        $('#exampleTwo').DataTable();
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    })
</script>
</body>
</html>

