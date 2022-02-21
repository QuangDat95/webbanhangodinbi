@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('danhsach.index')}}">Danh sách</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Thêm Danh Sách Đơn Hàng</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('danhsach.store')}}" method="POST" enctype= "multipart/form-data">
                        @csrf
                        <div class="row-form">
                            <div class="span3">Khách Hàng</div>
                            <div class="span9">
                                <select name="don_hang_id">
                                    <option value=""></option>
                                    @foreach($donhangs as $donhang)
                                    <option value="{{$donhang->id}}">{{$donhang->ten_KH}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Sản Phẩm</div>
                            <div class="span9">
                                <select name="san_pham_id">
                                    <option value=""></option>
                                    @foreach($sanphams as $sanpham)
                                    <option value="{{$sanpham->id}}">{{$sanpham->ten_sp}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Số Lượng</div>
                            <div class="span9">
                                <input type="text" name="so_luong" placeholder="Nhập số lượng sản phẩm" />
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