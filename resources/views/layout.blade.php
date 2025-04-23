<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Disiplin-App v.1.0</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link
      rel="stylesheet"
      href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}"
    />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/js/select.dataTables.min.css') }}"
    />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  @stack('styles')
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
        >
          <a class="navbar-brand brand-logo me-5" href="/dashboard"
            >Disiplin-App</a
          >
        </div>
        <div
          class="navbar-menu-wrapper d-flex align-items-center justify-content-end"
        >
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize"
          >
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              Aplikasi Penegakan Disiplin Siswa SMKN 1 Limboto
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                data-bs-toggle="dropdown"
                id="profileDropdown"
              >
                Selamat Datang, {{ auth()->user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown" aria-labelledby="profileDropdown">
                <!-- Settings -->
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="ti-settings text-primary me-2"></i> Settings
                </a>
          
                <!-- Logout -->
                <form action="{{ url('logout') }}" method="POST" class="w-100 m-0 p-0">
                  @csrf
                  <button 
                    type="submit" 
                    class="dropdown-item d-flex align-items-center w-100"
                    style="background: none; border: none;"
                    onclick="return confirm('Apakah anda mau logout?')"
                  >
                    <i class="ti-power-off text-primary"></i> 
                    <span>Logout</span>
                  </button>
                </form>                
              </div>
            </li>
          
            <!-- Optional settings icon -->
            <li class="nav-item nav-settings d-none d-lg-flex">
              <a class="nav-link" href="#">
                <i class="icon-ellipsis"></i>
              </a>
            </li>
          </ul>
          
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas"
          >
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('kelas') }}">
                <i class="mdi mdi-school menu-icon"></i>
                <span class="menu-title">Kelas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('siswa') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Siswa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('guru') }}">
                {{-- <i class="mdi mdi-account-settings menu-icon"></i> --}}
                <i class="fa-solid fa-user-tie menu-icon"></i>
                <span class="menu-title">Guru</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('pelanggaran') }}">
                <i class="mdi mdi-alert menu-icon"></i>
                <span class="menu-title">Pelanggaran</span>
              </a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="/kasus">
                <i class="mdi mdi-alert-circle-outline menu-icon"></i>
                <span class="menu-title">Temuan Kasus</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/kasus/daftar">
                <i class="mdi mdi-auto-fix menu-icon"></i>
                <span class="menu-title">Daftar Temuan</span>
              </a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="/about">
                <i class="mdi mdi-account-box menu-icon"></i>
                <span class="menu-title">About</span>
              </a>
            </li>
            {{-- <hr>
            <li class="nav-item">
              <a href="{{ route('password.request') }}" class="nav-link">
                <i class='mdi mdi-key-change menu-icon'></i>
                <span class="menu-title">Reset Password</span>
              </a>
            </li> --}}
          </ul>
        </nav>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between"
            >
              <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                >Copyright © 2024. Ahmad Aril Samsi-RPL 2024. All rights
                reserved.</span
              >
              <span
                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                >Aplikasi ini saya dedikasikan untuk SMK Negeri 1 Limboto
                <i class="ti-heart text-danger ms-1"></i
              ></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    @stack('scripts')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> -->
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End custom js for this page-->
  </body>
</html>
