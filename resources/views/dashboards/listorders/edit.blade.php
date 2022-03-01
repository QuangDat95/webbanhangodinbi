@extends('dashboards.master')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('listorder.index')}}">Danh sách đơn hàng</a> <span class="divider"></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Sửa Đơn Hàng</h1>
                    <div class="clear"></div>
                </div>
                @include('commons.error')
                <div class="block-fluid">
                    <form action="{{route('listorder.update',$list->id)}}" method="POST" enctype= "multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Khách Hàng</div>
                            <div class="span9">
                                {{$list->order->name}}
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Sản Phẩm</div>
                            <div class="span9">
                                {{$list->product->name}}
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Số Lượng</div>
                            <div class="span9">
                                <input type="text" name="amount" value="{{$list->amount}}" placeholder="Nhập số lượng sản phẩm" required/>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">