@extends('backend.index')
@section('content')
<div class="content">
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12 search">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="Category">
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
                    <h1>Quản Lý sản phẩm</h1>
                    <div class="clear"></div>
                </div>
                @include('commons.alert')
                <div class="block-fluid table-sorting">
                    <a href="{{route('product.create')}}" class="btn btn-add">Thêm Sản phẩm</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                            <tr>
                                <th class="sorting"><a href="#">ID</a></th>
                                <th class="sorting"><a href="#">Tên sản phẩm</a></th>
                                <th class="sorting"><a href="#">Hãng</a></th>
                                <th class="sorting"><a href="#">Giá sản phẩm</a></th>
                                <th class="sorting"><a href="#">Hình ảnh</a></th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- START LOOP-->
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{number_format($product->price)}}<sup>đ</sup></td>
                                <td><img src="{{ Storage::url($product->image) }}" alt="{{$product->image}}" style="height:2.5cm"></img></td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Sửa</a>
                                        <input type="submit" class="btn btn-danger" value="Xóa" onClick="return confirm('Bạn có muốn xóa sản phẩm này?');">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- END LOOP-->
                        </tbody>
                    </table>
                    <div class="dataTables_paginate">
                    {{($products->links())}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">