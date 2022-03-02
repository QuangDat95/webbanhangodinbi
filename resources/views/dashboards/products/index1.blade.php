@extends('dashboards.master1')
@section('title')
Danh sách sản phẩm
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
                        <h2 class="content-header-title float-left mb-0">Các hãng laptop</h2>
                        <a class="btn btn-primary" href="{{route('product.create')}}">Thêm mới</a>
                    </div>
                    @include('commons.alert')
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            @if(count($products)>0)
                                            <thead>
                                                <tr>
                                                    <th class="sorting"><a href="#">ID</a></th>
                                                    <th class="sorting"><a href="#">Tên sản phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hãng</a></th>
                                                    <th class="sorting"><a href="#">Giá sản phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hình ảnh</a></th>
                                                    <th class="sorting"><a href="#">Tính năng</a></th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{number_format($product->price)}}<sup>đ</sup></td>
                                                    <td><img src="{{ Storage::url($product->image) }}" alt="{{$product->image}}" style="height:2.5cm"></img></td>
                                                    <td>
                                                        <?php
                                                        foreach ($product->features as $feature) {
                                                            echo $feature->name . "<br>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form action="{{route('product.destroy',$product->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                                                            <input type="submit" class="btn btn-danger btn-sm" style="width:25px" value="Xóa" onclick="return confirm('Bạn có muốn xóa sản phẩm này?');">
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th class="sorting"><a href="#">ID</a></th>
                                                    <th class="sorting"><a href="#">Tên sản phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hãng</a></th>
                                                    <th class="sorting"><a href="#">Giá sản phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hình ảnh</a></th>
                                                    <th class="sorting"><a href="#">Tính năng</a></th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            @else
                                            <tr>
                                                <td colspan="6">
                                                    <h4 style="color:green;text-align:center">Không có sản phẩm nào
                                                    </h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection