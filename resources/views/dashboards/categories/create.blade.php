@extends('dashboards.master1')
@section('title')
Thêm hãng
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
                        <h2 class="content-header-title float-left mb-0">Thêm hãng</h2>
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
                                    <form class="form form-horizontal" action="{{route('category.store')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tên hãng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" maxlength="20" value="{{old('name')}}" name="name" placeholder="Nhập tên hãng" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Email</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="email" id="email-id" class="form-control"
                                                                name="email-id" placeholder="Email">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Mobile</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" id="contact-info" class="form-control"
                                                                name="contact" placeholder="Mobile">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="password" class="form-control"
                                                                name="password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group col-md-8 offset-md-4">
                                                    <fieldset class="checkbox">
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox">
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Remember me</span>
                                                        </div>
                                                    </fieldset>
                                                </div> -->
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1" onclick="window.history.go(-1); return true;">Huỷ</button>
                                                    <!-- <button class="btn btn-success" type="submit">Lưu</button>
                                                    <button class="btn btn-danger"
                                                        onclick="window.history.go(-1); return false;">Hủy</button> -->
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