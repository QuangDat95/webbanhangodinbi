@extends('dashboards.master')
@section('title')
Chỉnh sửa thông tin khách hàng
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
                        <h2 class="content-header-title float-left mb-0">Hiệu chỉnh thông tin khách hàng</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal"
                                        action="{{route('customer.update',$customer->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tên khách hàng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" style="color:black"
                                                                value="{{$customer->name}}" name="name"
                                                                placeholder="Nhập tên khách hàng" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Ngày mua</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="span9">
                                                                <input type="date" name="buy_date"
                                                                    value="{{$customer->buy_date}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Số điện thoại</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" style="color:black"
                                                                value="{{$customer->phone}}" name="phone"
                                                                placeholder="Nhập số điện thoại" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('phone') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Địa chỉ</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" style="color:black"
                                                                value="{{$customer->address}}" name="address"
                                                                placeholder="Nhập địa chỉ" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('address') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-success mr-1 mb-1">Lưu</button>
                                                    <button type="button" class="btn btn-danger mr-1 mb-1"
                                                        onclick="window.history.go(-1); return true;">Huỷ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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