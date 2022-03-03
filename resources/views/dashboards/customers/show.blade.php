@extends('dashboards.master')
@section('title')
Chi tiết đươn hàng
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Chi tiết đơn hàng</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        @if(count($items)>0)
                                        <table class="table zero-configuration">
                                            <thead>
                                                <thead>
                                                    <tr>
                                                        <th>Tên Khách hàng</th>
                                                        <th colspan="3">{{$customer->name}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Ngày mua</th>
                                                        <?php 
                                                            $customer->buy_date = date('d-m-Y', strtotime($customer->buy_date));
                                                        ?>
                                                        <th colspan="3">{{$customer->buy_date}}</th>
                                                    </tr>
                                                </thead>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tên Sản Phẩm</td>
                                                    <td>Hình ảnh</td>
                                                    <td>Số lượng</td>
                                                    <td>Giá sản phẩm</td>
                                                </tr>
                                                @foreach($items as $key => $item)
                                                <tr>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td> <img src="{{Storage::url($item->product->image)}}" width="100">
                                                    </td>
                                                    <td>{{$item->amount}}</td>
                                                    <td>{{number_format($item->product->price)}}<sup>đ</sup></td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>Tổng</td>
                                                    <td></td>
                                                    <td>{{$amount}}</td>
                                                    <td>{{number_format($sum_price)}}<sup>đ</sup></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @else
                                        <div style="color:green;text-align:center">
                                            <h4>Khách hàng <p style="color:green">{{$customer->name}}</p> Không có đơn
                                                hàng nào</h4>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row-form">
                                    <button class="btn btn-info" onclick="window.history.back()" style="color:black">Trở về</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection