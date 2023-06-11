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
                        <li> <a class="waves-effect waves-dark" href="{{route('user.show',$user->id)}}" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="{{route('user.profile',$user->id)}}" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>

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
                        <h4 class="text-themecolor">Dashboard</h4>
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

                {{-- error  --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- end error --}}

 
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h5 class="card-title">table reservation</h5>
                            </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">marque</th>
                                    <th>type</th>
                                    <th>prix journee</th>
                                    <th>date debut</th>
                                    <th>date fin </th>
                                    <th>prix TTC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->reservations as $reserve)
                                <tr>
                                    <td class="text-center">{{App\Models\Car::findOrFail($reserve->car_id)->marque}}</td>
                                    <td class="txt-oflo">{{App\Models\Car::findOrFail($reserve->car_id)->type}}</td>
                                    <td class="txt-oflo">{{App\Models\Car::findOrFail($reserve->car_id)->prixJ}} dh</td>
                                    <td class="text-success">{{$reserve->dateL}}</td>
                                    <td>
                                        <span class="text-success{{ now()->isAfter($reserve->dateR) ? ' text-danger' : '' }}">
                                            {{ $reserve->dateR }}
                                        </span>
                                    </td>
                                    <td><span class="text-success">{{$reserve->prixTTC}} DH</span></td>
                                    <td><span class="text-success">
                                        <form action="{{route('reserve.destroy',$reserve->id)}}"  method="post" >
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" style="color:red" class="btn border-none"
                                            onclick="return confirm('Voulez vous vraiment supprimer le reservation de id : {{$reserve->id}} ')"
                                           ><i class="bi bi-trash2 class"></i></button>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$reservations->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>



{{-- code script success --}}
<script>
    setTimeout(function() {
        var successMessage = document.getElementById("success-message");
        successMessage.parentNode.removeChild(successMessage);
    }, 3000);
</script>
{{--end code script success --}}

{{--  error js --}}
<script>
    // Afficher le message d'erreur
    document.addEventListener('DOMContentLoaded', function() {
        var errorDiv = document.querySelector('.alert-danger');
        var deleteButton = document.querySelector('#deleteErrorButton');
        if (errorDiv) {
            // Afficher le message d'erreur pendant 5 secondes
            errorDiv.style.display = 'block';
            setTimeout(function() {
                // Cacher le message d'erreur après 5 secondes
                errorDiv.style.display = 'none';
            }, 3000);
        }
    });
</script>

{{-- end error js --}}

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