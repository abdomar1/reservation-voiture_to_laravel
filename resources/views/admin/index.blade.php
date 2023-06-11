<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assetsD/images/favicon.png')}}">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{url('assetsD/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="{{url('assetsD/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('dist/css/style.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{url('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">loading</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <img src="{{url('imageHome/logo-car-lux.png')}}" alt="Logo" width="100" height="30" class="d-inline-block align-text-top">
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('users/'.$user->path) }}" alt="{{ $user->name }}" width="30px"></a>


                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span>MENU</span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{route('admin.index',$user->id)}}" aria-expanded="false"><i
                            class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="{{route('admin.cars',$user->id)}}" aria-expanded="false"><i
                                class="fa fa-car"></i><span class="hide-menu">Tout les cars</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="{{route('admin.reservation',$user->id)}}" aria-expanded="false">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">reservation</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{route('admin.profile',$user->id)}}" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{route('admin.users',$user->id)}}" aria-expanded="false"><i
                            class="fa fa-users" aria-hidden="true"></i><span class="hide-menu">users</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="{{route('categorie.index')}}" aria-expanded="false"><i
                                class="fa fa-caret-square-o-right"aria-hidden="true"></i><span class="hide-menu">categorie</span></a></li>

                        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i><span>{{ __('Logout') }}</span> 
              
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                           </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('car.index')}}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>


                @if(session()->has("success"))
                <div id="success-message"  class="alert alert-success">
                    {{session("success")}}
                </div>
                 @endif


        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h5 class="card-title">table de Statistics </h5>
                            </div>
                    </div>
                    <div class="table-responsive">
                        
                        <div class="row">
                            <div class="col ">
                                <div class="card bg-info lesCards" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $userStats }}</h5>
                                        <p class="card-text">Nombre d'utilisateurs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col ">
                                <div class="card bg-danger lesCards" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $reservationCounts  }}</h5>
                                        <p class="card-text">Nombre d'reservation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col ">
                                <div class="card bg-warning lesCards" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $totalCars }}</h5>
                                        <p class="card-text">Nombre d'voitures</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col ">
                                <div class="card bg-primary lesCards" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $TotalCategorie }}</h5>
                                        <p class="card-text">Nombre d'Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <h5>Reservation Statistics</h5>
                        
                            <div class="row">
                                <div class="col-md-6 float-left">
                                    <div id="chart_div"></div>
                                </div>
                                
                                <div class="col-md-6 float-right">
                                    <div class="table-responsive">
                                        <div class="card">
                                            <h5>le prix total Statistics</h5>
                                            <div class="card-body">
                                                <table class="table border">
                                                    <thead>
                                                        <tr>
                                                            <th>Year/Month</th>
                                                            <th>Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($reservationStats as $reservation)
                                                            <tr>
                                                                <td>{{ $reservation->year }}/{{ $reservation->month }}</td>
                                                                <td>{{ $reservation->totalPrice }} DH</td>
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
                </div>
            </div>
        </div>

{{--  --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Car');
        data.addColumn('number', 'Number of Reservations');

        var carData = [
            @foreach($carStatistics as $carStat)
                ['{{ $carStat['car']->marque }}', {{ $carStat['reservationCount'] }}],
            @endforeach
        ];

        data.addRows(carData);

        var options = {
            title: 'Reservations by Car',
            vAxis: {title: 'Number of Reservations'},
            hAxis: {title: 'Car'},
            legend: 'none'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
{{--  --}}
{{-- code script success --}}
<script>
    setTimeout(function() {
        var successMessage = document.getElementById("success-message");
        successMessage.parentNode.removeChild(successMessage);
    }, 3000);
</script>
{{--end code script success --}}

    <script src="{{url('assetsD/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{url("assetsD/node_modules/popper/popper.min.js")}}"></script>
    <script src="{{url('assetsD/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('dist/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{url('assetsD/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{url('assetsD/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{url('assetsD/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{url('assetsD/node_modules/d3/d3.min.js')}}"></script>
    <script src="{{url('assetsD/node_modules/c3-master/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{url('dist/js/dashboard1.js')}}"></script>
</body>

</html> 


