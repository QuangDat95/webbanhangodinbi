@extends('dashboards.master')
@section('title')
Hãng sản phẩm
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
                        <a class="btn btn-primary" href="{{route('categoryCreate')}}">Thêm mới</a>
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
                                            @if(count($categories)>0)
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Hãng sản phẩm</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>
                                                        <form action="{{route('category.destroy',$category->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a style="color:green" href="{{ route('category.edit', $category->id)}}"><i
                                                                    class="fa fa-pencil-square"></i></a>
                                                            <button class="btn"
                                                                onclick="return confirm('Bạn có muốn xóa hãng sản phẩm này?');"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">
                                                        <h4 style="color:green;text-align:center">Không có hãng nào
                                                        </h4>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Hãng sản phẩm</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </tfoot>
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
