<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="{{ asset('/assets/image/png')}}" href="{{ asset('/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css')}}" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href={{ route('projects.index') }} class="text-nowrap logo-img">
            <img src="{{ asset('/assets/images/logos/favicon.png')}}" width="50" alt="" >
          </a>TASK MANAGEMENT
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route('projects.index') }} aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href={{ route('projects.create') }} aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Create Project</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('show_task') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Add Task/Tag</span>
                </a>
              </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                @yield('search')
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">

                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      @yield('content')

    </div>
  </div>
  <script src="..{{ asset('/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="..{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="..{{ asset('/assets/js/sidebarmenu.js')}}"></script>
  <script src="..{{ asset('/assets/js/app.min.js')}}"></script>
  <script src="..{{ asset('/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="..{{ asset('/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="..{{ asset('/assets/js/dashboard.js')}}"></script>
</body>

</html>
