@extends('dashboards.master')
@section('content')
<div class="content">
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12 search">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="PhanLoai">
                    <input type="text" class="span11" placeholder="Nhập từ khóa" name="tu_khoa" autocomplete="off" />
                    <button class="btn span1" type="submit">Tìm</button>
                    <input type="hidden" name="action" value="search">
                </form>
            </div>
        </div>
        <!-- /row-fluid-->
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Quản Lý khách mua hàng</h1>
                    <div class="clear"></div>
                </div>
                @include('commons.alert')
                <div class="block-fluid">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        @if(count($orders)>0)
                        <thead>
                            <tr>
                                <th class="sorting"><a href="#">ID</a></th>
                                <th class="sorting"><a href="#">Tên khách hàng</a></th>
                                <th class="sorting"><a href="#">Ngày mua</a></th>
                                <th class="sorting"><a href="#">Số điện thoại</a></th>
                                <th class="sorting"><a href="#">Địa chỉ</a></th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- START LOOP-->

                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{date('d/m/Y', strtotime($order->buy_date))}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>
                                    <form action="{{route('order.destroy',$order->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('order.edit', $order->id)}}" class="btn btn-primary">Sửa</a>
                                        <input type="submit" class="btn btn-danger" value="Xóa"
                                            onClick="return confirm('Bạn có muốn xóa khách hàng này?');">
                                        <a href="{{ route('order.show', $order->id)}}" class="btn btn-info">Chi tiết đơn
                                            hàng</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">
                                    <h4 style="color:green;text-align:center">Không có khách mua hàng nào</h4>
                            </tr>
                            @endif
                            <!-- END LOOP-->
                        </tbody>
                    </table>
                    <div style="float:right">
                        {{($orders->links())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">