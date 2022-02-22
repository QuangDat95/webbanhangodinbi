@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('order.index')}}">Khách mua hàng</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Thêm khách Hàng</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="row-form">
                            <div class="span3">Tên khách hàng:</div>
                            <div class="span9">
                                <input type="text" name="name" placeholder="Nhập vào tên khách hàng"
                                    autocomplete="off" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Ngày mua:</div>
                            <div class="span9">
                                <input type="date" name="buy_date" placeholder="Nhập vào ngày mua" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Số điện thoại:</div>
                            <div class="span9">
                                <input type="text" name="phone" placeholder="Nhập vào số điện thoại"
                                    autocomplete="off" />
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Địa chỉ:</div>
                            <div class="span9">
                                <input type="text" name="address" placeholder="Nhập vào địa chỉ" autocomplete="off">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <button class="btn btn-success" type="submit">Lưu</button>
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