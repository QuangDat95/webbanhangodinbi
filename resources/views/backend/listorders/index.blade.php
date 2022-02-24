@extends('backend.index')
@section('content')
<div class="content">
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12 search">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="SanPham">
                    <input type="text" class="span11" placeholder="Nhập từ khóa" name="tu_khoa" autocomplete="off" />
                    <button class="btn span1" type="submit">Tìm</button>
                    <input type="hidden" name="action" value="search">
                </form>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Danh sách đơn hàng</h1>
                    <div class="clear"></div>
                </div>
                @include('commons.alert')
                <div class="block-fluid">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên Khách hàng</th>
                                <th>Ngày mua</th>
                                <td>Tên Sản Phẩm</td>
                                <td>Hình ảnh</td>
                                <td>Số lượng</td>
                                <td>Hành động</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lists)>0)
                            @foreach($lists as $list)
                            <tr>
                                <td>{{$list->order->name}}</td>
                                <td>{{date('d/m/Y', strtotime($list->order->buy_date))}}</td>
                                <td>{{$list->product->name}}</td>
                                <td> <img src="{{Storage::url($list->product->image)}}" width="100"> </td>
                                <td>{{$list->amount}}</td>
                                <td>
                                    <form action="{{route('listorder.destroy',$list->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('listorder.edit', $list->id)}}"
                                            class="btn btn-primary">Sửa</a>
                                        <input type="submit" class="btn btn-danger" value="Xóa"
                                            onClick="return confirm('Bạn có muốn xóa?');">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">
                                    <h4 style="color:green;text-align:center">Không có đơn hàng nào</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                    <div class="dataTables_paginate">
                        {{($lists->links())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">