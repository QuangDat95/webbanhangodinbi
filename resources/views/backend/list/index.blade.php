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
                @if (Session::has('success'))
                <h5 class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </h5>
                @endif
                <div class="block-fluid">
                    <a href="{{route('danhsach.create')}}" class="btn btn-add">Thêm</a>
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
                            @foreach($danhsachs as $danhsach)
                            <tr>
                                <td>{{$danhsach->don_hang->ten_KH}}</td>
                                <td>{{date('d/m/Y', strtotime($danhsach->don_hang->ngay_mua))}}</td>
                                <td>{{$danhsach->san_pham->ten_sp}}</td>
                                <td> <img src="{{Storage::url($danhsach->san_pham->hinh_anh)}}" width="100"> </td>
                                <td>{{$danhsach->so_luong}}</td>
                                <td>
                                    <form action="{{route('danhsach.destroy',$danhsach->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('danhsach.edit', $danhsach->id)}}" class="btn btn-primary">Sửa</a>
                                        <input type="submit" class="btn btn-danger" value="Xóa" onClick="return confirm('Bạn có muốn xóa sản phẩm này?');">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="dataTables_paginate">
                    {{($danhsachs->links())}}
                    </div>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>
@endsection