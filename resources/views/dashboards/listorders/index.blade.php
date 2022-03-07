@extends('dashboards.master')
@section('title')
Danh sách đơn hàng
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
                        <h2 class="content-header-title float-left mb-0">Danh sách đơn hàng</h2>
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
                                            @if(count($lists)>0)
                                            <thead>
                                                <tr>
                                                    <th class="sorting"><a href="#">Khách hàng</a></th>
                                                    <th class="sorting"><a href="#">Ngày mua</a></th>
                                                    <th class="sorting"><a href="#">Sản Phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hình ảnh</a></th>
                                                    <th class="sorting"><a href="#">Số lượng</a></th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lists as $list)
                                                <tr>
                                                    <td>{{$list->customer->name}}</td>
                                                    <td>{{date('d/m/Y', strtotime($list->customer->buy_date))}}</td>
                                                    <td>{{$list->product->name}}</td>
                                                    <td> <img src="{{Storage::url($list->product->image)}}" width="100">
                                                    </td>
                                                    <td>{{$list->amount}}</td>
                                                    <td>
                                                        <form action="{{route('listorder.destroy',$list->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                                <a style="color:green"
                                                                href="{{ route('listorder.edit', $list->id)}}"><i
                                                                    class="fa fa-pencil-square"></i></a>
                                                            <button class="btn"
                                                                onclick="return confirm('Bạn có muốn xóa sản phẩm này?');"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th class="sorting"><a href="#">Khách hàng</a></th>
                                                    <th class="sorting"><a href="#">Ngày mua</a></th>
                                                    <th class="sorting"><a href="#">Sản Phẩm</a></th>
                                                    <th class="sorting"><a href="#">Hình ảnh</a></th>
                                                    <th class="sorting"><a href="#">Số lượng</a></th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
                                            @else
                                            <tr>
                                                <td colspan="6">
                                                    <h4 style="color:green;text-align:center">Không có đơn hàng nào
                                                        nào</h4>
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
@endsection