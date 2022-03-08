@extends('dashboards.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Biểu đồ tổng hợp</h2>
                        <!-- <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Charts &amp; Maps</a>
                                </li>
                                <li class="breadcrumb-item active">Chartjs
                                </li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- <div class="row">
                <div class="col-12">
                    <p>You can easily create reuseable chart components. Read full documnetation <a
                            href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank">here</a></p>
                </div>
            </div> -->
            <!-- line chart section start -->
            <section id="chartjs-charts">
                <!-- Line Chart -->
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Số lượng đơn hàng theo hãng trong năm</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body pl-0">
                                    <div class="height-300">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bar Chart -->
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Biểu đồ đơn hàng</h4>
                                <div class="card-title" style="float:right">
                            <select id="select_month">
                                <option value="">-chọn tháng-</option>
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body pl-0 chart_once_month">
                                    <div class="height-300">
                                        <canvas id="bar-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Horizontal Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Horizontal Bar Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div class="height-300">
                                            <canvas id="horizontal-bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- Pie Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pie Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div class="height-300">
                                            <canvas id="simple-pie-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
                <div class="row">
                    <!-- Doughnut Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Doughnut Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="height-300">
                                            <canvas id="simple-doughnut-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- Radar Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Radar Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="height-300">
                                            <canvas id="radar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
                <!-- Polar & Radar Chart -->
                <div class="row">
                    <!-- Polar Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Polar Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="height-300">
                                            <canvas id="polar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- Bubble Chart -->
                    <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bubble Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="height-300">
                                            <canvas id="bubble-chart" width="300"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
                <!-- Scatter logX Chart -->
                <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Scatter Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="height-300">
                                            <canvas id="scatter-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </section>
            <!-- // line chart section end -->
        </div>
    </div>
</div>
@include('dashboards.dashboards.js')
@endsection