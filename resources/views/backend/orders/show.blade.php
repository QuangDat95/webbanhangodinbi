@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="">Chi tiết đơn hàng</a> <span class="divider"></span></li>
            <li class="active">Sửa</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Chi tiết đơn hàng</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    @if(count($items)>0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên Khách hàng</th>
                                <th colspan="3">{{$order->name}}</th>
                            </tr>
                            <tr>
                                <th>Ngày mua</th>
                                <?php 
                                $order->buy_date = date('d-m-Y', strtotime($order->buy_date));
                            ?>
                                <th colspan="3">{{$order->buy_date}}</th>
                            </tr>
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
                                <td>{{ $item->name }}</td>
                                <td> <img src="{{Storage::url($item->image)}}" width="100"> </td>
                                <td>{{$item->amount}}</td>
                                <td>{{number_format($item->price)}}<sup>đ</sup></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Tổng</td>
                                <td></td>
                                <td>{{$amount}}</td>
                                <td>{{$sum_price = number_format($sum_price)}}<sup>đ</sup></td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div style="color:green;text-align:center">
                        <h4>Khách hàng <p style="color:red">{{$order->name}}</p> Không có đơn hàng nào</h4>
                    </div>
                    @endif
                    <div class="row-form">
                        <a class="btn btn-info" onclick="window.history.back()">Trở về</a>
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