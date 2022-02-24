@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('order.index')}}">Danh sách khách hàng</a> <span class="divider"></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Hiệu chỉnh TT khách hàng</h1>
                    @include('commons.error')
                    <div class="clear"></div>
                </div>
                @include('commons.error')
                <div class="block-fluid">
                    <form action="{{route('order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Tên khách hàng:</div>
                            <div class="span9">
                                <input type="text" name="name" value="{{$order->name}}"
                                    placeholder="Nhập vào tên khách hàng" />
                                <div style="color:red">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Ngày mua:</div>
                            <div class="span9">
                                <input type="date" name="buy_date" value="{{$order->buy_date}}"
                                    placeholder="Nhập vào ngày mua" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Số điện thoại:</div>
                            <div class="span9">
                                <input type="text" name="phone" value="{{$order->phone}}"
                                    placeholder="Nhập vào số điện thoại" />
                                <div style="color:red">
                                    {{ $errors->first('phone') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Địa chỉ:</div>
                            <div class="span9">
                                <input type="text" name="address" value="{{$order->address}}"
                                    placeholder="Nhập vào địa chỉ">
                                <div style="color:red">
                                    {{ $errors->first('address') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <button class="btn btn-success" type="submit">Lưu</button>
                            <button class="btn btn-danger"
                                            onclick="window.history.go(-1); return false;">Hủy</button>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">