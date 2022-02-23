@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('category.index')}}">Các loại sản phẩm</a> <span class="divider">></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Thêm Loại Sản Phẩm</h1>
                    <div class="clear"></div>
                </div>
                @include('commons.error')
                <div class="block-fluid">
                    <form action="{{route('category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Tên loại sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="name" value="{{$category->name}}"
                                    placeholder="Nhập vào tên loại sản phẩm" />
                                    <div style="color:red">
                                    {{ $errors->first('name') }}
                                </div>
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