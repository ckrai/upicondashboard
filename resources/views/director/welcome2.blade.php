<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UPICON Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/theme/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme/assets/css/style.css') }}">
    <!-- End layout styles -->
    <style>
        body,
        html {
            height: 100%;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center pt-0 mt-0">
            <a class="navbar-brand brand-logo" href="/"><img
                    src="{{ asset('assets/theme/assets/images/upicon.png') }}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="/"><img
                    src="{{ asset('assets/theme/assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"
                data-toggle="tooltip" data-placement="bottom" title="Collapse Menu">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0"
                            placeholder="Search projects">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link text-danger" data-toggle="tooltip" data-placement="bottom" title="Logout"
                        href="logout">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Fullscreen">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="color: purple;">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{ asset('assets/theme/assets/images/faces-clipart/pic-1.png') }}" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2 fs-5">{{ $data['name'] }}
                                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i></span>
                            <span class="text-secondary text-small">{{ $data['role'] }}</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/director/project">
                        <span class="menu-title">Projects</span>
                        <i class="mdi mdi-clipboard-outline menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-title">Verticals</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-briefcase menu-icon"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            @foreach ($data['verticals'] as $item)
                                <li class="nav-item">
                                    <a class="nav-link" href="verticals/{{ $item['id'] }}">{{ $item['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/director/vendor">
                        <span class="menu-title">Vendors</span>
                        <i class="mdi mdi-clipboard-account menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/forms/basic_elements.html">
                        <span class="menu-title">Reports</span>
                        <i class="mdi mdi-file-check menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                        <span class="menu-title">Users</span>
                        <i class="mdi mdi-account-circle menu-icon"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                        <span class="menu-title">Tables</span>
                        <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                        aria-controls="general-pages">
                        <span class="menu-title">Sample Pages</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                                    Page </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="nav-item sidebar-actions">
                    <span class="nav-link">
                        <div class="border-bottom">
                            <h6 class="font-weight-normal mb-3">Projects</h6>
                        </div>
                        <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                        <div class="mt-4">
                            <div class="border-bottom">
                                <p class="text-secondary">Categories</p>
                            </div>
                            <ul class="gradient-bullet-list mt-4">
                                <li>Free</li>
                                <li>Pro</li>
                            </ul>
                        </div>
                    </span>
                </li> --}}
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper py-2">
                <div class="page-header pb-0 mb-1">
                    <h3 class="page-title text-dark">
                        Projects Summary as of {{ $data['date'] }},
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page" data-toggle="tooltip"
                                data-placement="bottom" title="Analytics Dashboard">
                                <span></span>Overview <i
                                    class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}"
                                    class="card-img-absolute" alt="circle-image" />
                                <h3 class="font-weight-normal mb-3">Training
                                </h3>
                                <h1 class="mb-5">{{ $data['projects']['Training'] }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}"
                                    class="card-img-absolute" alt="circle-image" />
                                <h3 class="font-weight-normal mb-3">Consultancy
                                </h3>
                                <h1 class="mb-5">{{ $data['projects']['Consultancy'] }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}"
                                    class="card-img-absolute" alt="circle-image" />
                                <h3 class="font-weight-normal mb-3">Retail
                                </h3>
                                <h1 class="mb-5">{{ $data['projects']['Retail'] }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Project Status</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Name </th>
                                                <th> Due Date </th>
                                                <th> Progress </th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-bold ">
                                            <tr>
                                                <td> 1 </td>
                                                <td> Mission Shakti </td>
                                                <td> May 15, 2024 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success"
                                                            role="progressbar" style="width: 25%" aria-valuenow="75"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 2 </td>
                                                <td> GIS Tagging </td>
                                                <td> Jul 01, 2025 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-danger"
                                                            role="progressbar" style="width: 75%" aria-valuenow="75"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 3 </td>
                                                <td> ODOP </td>
                                                <td> Apr 12, 2025 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-warning"
                                                            role="progressbar" style="width: 90%" aria-valuenow="90"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 4 </td>
                                                <td> VSSY </td>
                                                <td> May 15, 2025 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-primary"
                                                            role="progressbar" style="width: 50%" aria-valuenow="50"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 5 </td>
                                                <td> DDU GKY </td>
                                                <td> May 03, 2025 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-danger"
                                                            role="progressbar" style="width: 35%" aria-valuenow="35"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 6 </td>
                                                <td> PM JJY </td>
                                                <td> Jun 05, 2027 </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar"
                                                            style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Projects per Vertical</h4>
                                <canvas id="traffic-chart"></canvas>
                                <div id="traffic-chart-legend"
                                    class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            {{-- <footer class="footer mt-0">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                        UPICON 2024</span>

            </footer> --}}
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/theme/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/theme/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/theme/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/theme/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/theme/assets/js/hoverable-collapse.j') }}"></script>
    <script src="{{ asset('assets/theme/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/theme/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/theme/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
