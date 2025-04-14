{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <script src="https://kit.fontawesome.com/d24639e9bf.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-opacity-50 navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-light"><i class="fa fa-user-edit me-2 text-light"></i>GoalFit</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-light">Jhon Doe</h6>
                        <span class="text-light">Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active border border-dark text-light"><i class="fa fa-tachometer-alt me-2 bg-primary bg-opacity-50 text-light"></i>Dashboard</a>
                    <a href="widget.html" class="nav-item nav-link text-light"><i class="fa fa-th me-2 bg-primary bg-opacity-50 text-light"></i>Admins</a>
                    <a href="form.html" class="nav-item nav-link text-light"><i class="fa fa-keyboard me-2 bg-primary bg-opacity-50 text-light"></i>Users</a>
                    <a href="table.html" class="nav-item nav-link text-light"><i class="fa fa-table me-2 bg-primary bg-opacity-50 text-light"></i>Gyms</a>
                    <a href="chart.html" class="nav-item nav-link text-light"><i class="fa fa-chart-bar me-2 bg-primary bg-opacity-50 text-light"></i>Videos</a>
                    <a href="chart.html" class="nav-item nav-link text-light"><i class="fa fa-chart-bar me-2 bg-primary bg-opacity-50 text-light"></i>Categories</a>
                    <a href="chart.html" class="nav-item nav-link text-light"><i class="fa fa-chart-bar me-2 bg-primary bg-opacity-50 text-light"></i>food_items</a>
                </div>
            </nav>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand bg-primary bg-opacity-50 navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-light mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars text-light"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex text-light">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-primary bg-opacity-50 border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item text-light">My Profile</a>
                            <a href="#" class="dropdown-item text-light">Settings</a>
                            <a href="#" class="dropdown-item text-light">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-light"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-light">Today Sale</p>
                                <h6 class="mb-0 text-light">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-light"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-light">Total Sale</p>
                                <h6 class="mb-0 text-light">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-light"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-light">Today Revenue</p>
                                <h6 class="mb-0 text-light">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-light"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-light">Total Revenue</p>
                                <h6 class="mb-0 text-light">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-primary bg-opacity-50 text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-light">Worldwide Sales</h6>
                                <a href="" class="text-light">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-primary bg-opacity-50 text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-light">Salse & Revenue</h6>
                                <a href="" class="text-light">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-primary bg-opacity-50 rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start text-light">
                            &copy; <a href="#">GoalFit,</a> All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="btn btn-lg btn-black btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html> --}}

@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-light"></i>
                <div class="ms-3">
                    <p class="mb-2 text-light">Today Sale</p>
                    <h6 class="mb-0 text-light">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-light"></i>
                <div class="ms-3">
                    <p class="mb-2 text-light">Total Sale</p>
                    <h6 class="mb-0 text-light">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-light"></i>
                <div class="ms-3">
                    <p class="mb-2 text-light">Today Revenue</p>
                    <h6 class="mb-0 text-light">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-primary bg-opacity-50 rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-light"></i>
                <div class="ms-3">
                    <p class="mb-2 text-light">Total Revenue</p>
                    <h6 class="mb-0 text-light">$1234</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-primary bg-opacity-50 text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Worldwide Sales</h6>
                    <a href="" class="text-light">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-primary bg-opacity-50 text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Salse & Revenue</h6>
                    <a href="" class="text-light">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection