<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Journal Management System</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('back_temp/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/toastr.css') }}">
    {{--    bootstrap 5 cdn--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('back_temp/dist/img/Jm_logo.jpg')}}" type="image/x-icon">

    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css
'>

    {{-- select2 --}}

    {{-- summernote --}}
    @stack('base.css')


    <style>
        [class*=sidebar-dark-] {
            background-color: #2c3e50;
        }

        .navbar-white {
            background-color: #1abc9c;

        }

        .badge{
            font-size: 52%;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1abc9c;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color: #fff" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a style="color: #fff" href="{{ url('dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>
            @if(Auth::user()->status != 3)
            <!-- SEARCH FORM -->
            {{--  <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>  --}}

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                {{--  <li class="nav-item dropdown">

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('back_temp/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('back_temp/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('back_temp/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>  --}}
                 @if(auth()->user()->user_type_id == 0)
                <!-- Notifications Dropdown Menu -->
                @php
                $total = 0;
                $total = $new_user_admin->count();
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="far fa-bell"></i>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge">
                            {{ $total }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"> {{ $total }} Notifications </span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('pending.users') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $new_user_admin->count() }}
                            Registration
                            <span class="float-right text-muted text-sm">
                                {{ $new_user_admin->first()? $new_user_admin->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        {{--  <a href="" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-file mr-2"></i> {{$new_menuscript->count()}} Menuscript
                            <span
                                class="float-right text-muted text-sm">{{ $new_menuscript->first() ? $new_menuscript->first()->created_at->diffForHumans() : '' }}</span>
                        </a>  --}}
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->user_type_id == 2)
                <!-- Notifications Dropdown Menu -->
                {{--  {{dd($marked_menuscript->count())}}  --}}
                @php
                $total = 0;
                $total = $new_reviewer->count() + $new_menuscript->count() + $marked_menuscript->count();
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="far fa-bell"></i>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge">{{ $total }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"> {{ $total }} Notifications </span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('publisher.pending.reviewers') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $new_reviewer->count() }}
                            Registration
                            <span class="float-right text-muted text-sm">
                                {{ $new_reviewer->first() ?$new_reviewer->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('publisher.pending.menuscript') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $new_menuscript->count() }}
                            Menuscript
                            <span class="float-right text-muted text-sm">
                                {{ $new_menuscript->first() ? $new_menuscript->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('publisher.marked.menuscript') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $marked_menuscript->count() }}
                            Checked Menuscript
                            <span class="float-right text-muted text-sm">
                                {{ $marked_menuscript->first() ?$marked_menuscript->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->user_type_id == 3)
                <!-- Notifications Dropdown Menu -->
                @php
                $total = 0;
                $total = $assign_menuscript_reviewer->count();

                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="far fa-bell"></i>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge">
                            {{ $total }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"> {{ $total }} Notifications </span>
                       
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('reviewer.assigned.menuscript') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $assign_menuscript_reviewer->count() }}
                            Menuscript New Assigned
                            <span class="float-right text-muted text-sm">
                                {{ $assign_menuscript_reviewer->first() ? $assign_menuscript_reviewer->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                @endif

                @if(auth()->user()->user_type_id == 1)
                <!-- Notifications Dropdown Menu -->
                @php
                $total = 0;
                $total = $menuscript_revision->count() + $checked_menuscript->count();

                $totalchecked = $menuscript_revision->count() + $checked_published_menuscript->count() + $checked_rejected_menuscript->count();
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="far fa-bell"></i>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge">
                            {{ $totalchecked }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"> {{ $total }} Notifications </span>
                       
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('author.pending.menuscript') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{ $menuscript_revision->count()  }}
                            Menuscript Under Revision
                            <span class="float-right text-muted text-sm">
                                {{ $menuscript_revision->first() ? $menuscript_revision->first()->created_at->diffForHumans() : '' }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('author.checked.menuscript') }}" class="dropdown-item">
                            <i style="color: #1abc9c" class="fas fa-users mr-2"></i>{{$totalchecked}}
                            Checked Menuscripts
                            <span class="float-right text-muted text-sm">
                                {{ $checked_menuscript->first() ? $checked_menuscript->first()->updated_at->diffForHumans() : '' }}</span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                @endif

            </ul>
            @endif
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('journal-front.home') }}" class="brand-link">
                <img src="{{ asset('back_temp/dist/img/Jm_logo.jpg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Journal Management</span>
            </a>
            @if(Auth::user()->status != 3)

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('profile/'. Auth::user()->image) }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a style="text-transform: capitalize;" href="{{ url('profile', Auth::id()) }}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column co" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        {{--  Users  --}}
                        @if(Auth::user()->user_type_id == 0)
                        {{--  {{ dd(Auth::user()->user_type_id)}} --}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #1abc9c" class="fas fa-tags"></i>
                                <p>Registered Users</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('approved.uesrs') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Approved</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pending.users') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="far fa-circle nav-icon"></i>
                                        <p>Pending</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        {{--  Publisher Panel  --}}
                        @if(Auth::user()->user_type_id == 2 && Auth::user()->status == 1)
                        {{--  Reviewer  --}}
                        <li class="nav-item has-treeview">
                            <a href="#" class=" nav-link">
                                <i style="color: #1abc9c" class="fa fa-user-circle"></i>
                                <p>Registered Reviewer</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('publisher.approved.reviewers') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fa fa-check nav-icon"></i>
                                        <p>Approved</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('publisher.pending.reviewers') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fa fa-eye-slash nav-icon"></i>
                                        <p>Pending</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{--  Menuscript  --}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #1abc9c" class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                <p>Manuscripts</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('publisher.pending.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>New Comming</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('publisher.revision.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fa fa-reply nav-icon"></i>
                                        <p>Under Revision</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('publisher.marked.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fa fa-share nav-icon"></i>
                                        <p>Reviewed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('publisher.checked.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fa fa-check nav-icon"></i>
                                        <p>Published/Rejected</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{--  manuscript category  --}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #1abc9c" class="fa fa-arrow-circle-right"></i>
                                <p>Manuscript Categories</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('menuscript.category.create') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('menuscript.category') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="far fa-circle nav-icon"></i>
                                        <p>Category List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @elseif(Auth::user()->user_type_id == 1 && Auth::user()->status == 1)
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #1abc9c" class="fas fa-tags"></i>
                                <p>Manuscripts</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('author.create.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('author.pending.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Pending</p>
                                    </a>
                                </li>
                                {{--  <li class="nav-item">
                                    <a href="{{ route('author.revision.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="far fa-circle nav-icon"></i>
                                        <p>Under Revision</p>
                                    </a>
                                </li>  --}}
                                <li class="nav-item">
                                    <a href="{{ route('author.checked.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="far fa-circle nav-icon"></i>
                                        <p>Checked</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @elseif(Auth::user()->user_type_id == 3 && Auth::user()->status == 1)
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #1abc9c" class="fas fa-tags"></i>
                                <p>Manuscripts</p>
                                <i style="color: #1abc9c" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('reviewer.assigned.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Assigned</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('reviewer.checked.menuscript') }}" class="nav-link">
                                        <i style="color: #1abc9c" class="fas fa-plus nav-icon"></i>
                                        <p>Checked</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-header">Your Account</li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile', Auth::id()) }}" class="nav-link">
                                <i style="color: #1abc9c" class="far fa-user-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" class=" nav-link">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <i style="color: #1abc9c" class="fas fa-sign-out-alt nav-icon"></i>
                                <p style="color: #1abc9c; font-weight:bold; text-transform: uppercase">Logout</p>
                            </a>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>

            @else
                <a href="{{ route('user.profile', Auth::id()) }}">
                    <i style="color: #1abc9c; margin-top: 100%; margin-left: 40%" class="far fa-user-circle nav-icon"></i> <span style="color: #1abc9c; ">  Profile </span> 
                </a>
            @endif


            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
<!-- Main content -->

            @include('sweetalert::alert')
            @yield('back.content')
            @if(Auth::user()->status == 3)
            <p  style="color: rgb(228, 19, 19); font-weight: bold; font-size: 24px; padding: 25% 0  0 40%">Update Your Profile Info First</p>
                @endif
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="#">Sanjida Silvy</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('back_temp/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back_temp/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back_temp/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/custom-file-input.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/toastr.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}")
        @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
        @endif
        //bs-custom-file-input
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
            $(document).ready(function() {
    $('#joy').DataTable();
} );


    </script>
    {{-- select2 --}}

    {{-- summernote --}}
    @stack('base.js')
</body>

</html>
