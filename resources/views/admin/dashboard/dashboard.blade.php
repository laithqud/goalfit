@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-black bg-opacity-75 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-light"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Today Sale</p>
                        <h6 class="mb-0 text-light">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-black bg-opacity-75 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-light"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Total Sale</p>
                        <h6 class="mb-0 text-light">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-black bg-opacity-75 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-light"></i>
                    <div class="ms-3">
                        <p class="mb-2 text-light">Today Revenue</p>
                        <h6 class="mb-0 text-light">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-black bg-opacity-75 rounded d-flex align-items-center justify-content-between p-4">
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
                <div class="bg-black bg-opacity-75 text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Worldwide Sales</h6>
                        <a href="" class="text-light">Show All</a>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-black bg-opacity-75 text-center rounded p-4">
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