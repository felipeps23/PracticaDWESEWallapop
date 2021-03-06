<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wallapop Backend</title>
        @yield('prestyle')
        <link rel="shortcut icon" href="{{ url('/assets/frontend/images/wallapop.png')}}">
        <link rel="stylesheet" href="{{ url('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/backend/dist/css/adminlte.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        @yield('poststyle')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <!-- SEARCH FORM -->
                <form action="" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input name="search" value="{{$search ?? ''}}" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ url('assets/backend/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
                                    <img src="{{ url('assets/backend/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                                    <img src="{{ url('assets/backend/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
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
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('backend') }}" class="brand-link">
                  <img src="{{ url('assets/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                  <span class="brand-text font-weight-light">Wallapop Backend</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ url('assets/backend/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Administrador IZV</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                  <i class="fab fa-product-hunt nav-icon"></i>
                                  <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="{{ route('backend.product.index') }}" class="nav-link ">
                                      <i class="fas fa-eye nav-icon"></i>
                                      <p>View products</p>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="{{ route('backend.product.create') }}" class="nav-link">
                                      <i class="fas fa-plus nav-icon"></i>
                                      <p>Create product</p>
                                    </a>
          
                                  </li>
                                  <!--<li class="nav-item">-->
                                  <!--  <a href="" class="nav-link ">-->
                                  <!--    <i class="far fa-circle nav-icon"></i>-->
                                  <!--    <p>Create Complete</p>-->
                                  <!--  </a>-->
                                  <!--</li>-->
                                </ul>
                              </li>
                              <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                      <i class="fas fa-tags nav-icon"></i>
                                      <p>
                                        Categories
                                        <i class="right fas fa-angle-left"></i>
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a href="{{ route('backend.category.index') }}" class="nav-link {{ $viewOpenTicket ?? '' }}"> {{-- if(isset($viewOpenTicket)) $viewOpenTicket else '' --}}
                                          <i class="fas fa-eye nav-icon"></i>
                                          <p>View categories</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <!--{{-- GET show {{ url('backend/ticket/1') }} --}}-->
                                        <!--{{-- GET show {{ route('backend.ticket.show',['ticket'  => 1]) }}  --}}-->
                                        <a href="{{ route('backend.category.create') }}" class="nav-link {{ $viewCreateTicket ?? '' }}">
                                          <i class="fas fa-plus nav-icon"></i>
                                          <p>Create category</p>
                                        </a>
                                      </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                      <i class="fas fa-id-card-alt nav-icon"></i>
                                      <p>
                                        Contacts
                                        <i class="right fas fa-angle-left"></i>
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a href="{{ route('backend.contact.index') }}" class="nav-link {{ $viewOpenTicket ?? '' }}"> {{-- if(isset($viewOpenTicket)) $viewOpenTicket else '' --}}
                                          <i class="fas fa-eye nav-icon"></i>
                                          <p>View contacts</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <!--{{-- GET show {{ url('backend/ticket/1') }} --}}-->
                                        <!--{{-- GET show {{ route('backend.ticket.show',['ticket'  => 1]) }}  --}}-->
                                        <a href="{{ route('backend.contact.create') }}" class="nav-link {{ $viewCreateTicket ?? '' }}">
                                          <i class="fas fa-plus nav-icon"></i>
                                          <p>Create contact</p>
                                        </a>
                                      </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                      <i class="fas fa-shopping-cart nav-icon"></i>
                                      <p>
                                        Wanteds
                                        <i class="right fas fa-angle-left"></i>
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a href="{{ route('backend.wanted.index') }}" class="nav-link {{ $viewOpenTicket ?? '' }}"> {{-- if(isset($viewOpenTicket)) $viewOpenTicket else '' --}}
                                          <i class="fas fa-eye nav-icon"></i>
                                          <p>View wanteds</p>
                                        </a>
                                      </li>
                                      <li class="nav-item">
                                        <!--{{-- GET show {{ url('backend/ticket/1') }} --}}-->
                                        <!--{{-- GET show {{ route('backend.ticket.show',['ticket'  => 1]) }}  --}}-->
                                        <a href="{{ route('backend.wanted.create') }}" class="nav-link {{ $viewCreateTicket ?? '' }}">
                                          <i class="fas fa-cart-plus nav-icon"></i>
                                          <p>Create wanted</p>
                                        </a>
                                      </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-user"></i>
                                  <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="{{ route('backend.user.index') }}" class="nav-link {{ $viewOpenTicket ?? '' }}"> 
                                      <i class="fas fa-eye nav-icon"></i>
                                      <p>View users</p>
                                    </a>
                                  </li>
                                </ul>
                            </li>
                                
                                

                            <!--<li class="nav-item">-->
                            <!--    <a href="#" class="nav-link">-->
                            <!--        <i class="nav-icon fas fa-th"></i>-->
                            <!--        <p>-->
                            <!--            Simple Link-->
                            <!--            <span class="right badge badge-danger">New</span>-->
                            <!--        </p>-->
                            <!--    </a>-->
                            <!--</li>-->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Wallapop Backend App</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active"><a href="{{ url('backend') }}">Backend Home</a></li>
                                    <!--<li class="breadcrumb-item active">Starter Page</li>-->
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
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
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!--*****************************************************************-->
        @yield('prescript')
        <script src="{{ url('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ url('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/backend/dist/js/adminlte.js') }}"></script>
        @yield('postscript')
    </body>
</html>