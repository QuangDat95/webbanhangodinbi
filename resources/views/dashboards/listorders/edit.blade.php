@extends('dashboards.master')
@section('title')
Chỉnh sửa đơn hàng
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
                        <h2 class="content-header-title float-left mb-0">Chỉnh sửa đơn hàng</h2>
                    </div>
                </div>
                @include('commons.error')
            </div>
        </div>
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{route('listorder.update',$list->id)}}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Khách hàng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{$list->customer->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Sản phẩm</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{$list->product->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Số lượng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input style="color:black" class="form-control" type="text" name="amount"
                                                                value="{{$list->amount}}"
                                                                placeholder="Nhập số lượng sản phẩm" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Lưu</button>
                                                    <button type="button" class="btn btn-outline-warning mr-1 mb-1"
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