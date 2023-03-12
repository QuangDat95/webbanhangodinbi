@extends('dashboards.master')
@section('title')
Chỉnh sửa thông tin sản phẩm
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
                        <h2 class="content-header-title float-left mb-0">Hiệu chỉnh thông tin sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{route('product.update',$product->id)}}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tên sản phẩm</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" style="color:black"
                                                                value="{{$product->name}}" name="name"
                                                                placeholder="Nhập tên sản phẩm" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Hãng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control" style="color:black" name="category_id">
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}" <?php if($product->category->id == $category->id){
                                                                            echo "selected";
                                                                        } ?>>{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Giá sản phẩm</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" style="color:black" name="price"
                                                                value="{{$product->price}}"
                                                                placeholder="Nhập giá sản phẩm">
                                                            <div style="color:red">
                                                                {{ $errors->first('price') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tính năng</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php
                                                                $checked_tags = $product->features->pluck('id')->toArray();
                                                            ?>
                                                            <?php foreach( $features as $feature ):?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="<?= $feature->id; ?>"
                                                                    id="feature_<?= $feature->id; ?>" name="features[]"
                                                                    <?php if(in_array($feature->id,$checked_tags)): ?>
                                                                    checked <?php endif; ?>>
                                                                <label class="form-check-label"
                                                                    for="feature_<?= $feature->id; ?>"
                                                                    style="padding-left:20px">
                                                                    <?= $feature->name; ?>
                                                                </label>
                                                            </div>
                                                            <?php endforeach;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Hình ảnh</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="file" value="{{ $product->image }}"
                                                                name="image" id="image_product" onchange="productUrl(this)">
                                                            <img src="{{ Storage::url($product->image) }}"
                                                                id="change_image" alt="ảnh ở đây" style="height:2.5cm">
                                                            <div style="color:red">
                                                                {{ $errors->first('image') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Mô tả</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <fieldset class="form-group">
                                                                <textarea type="text" name="description"
                                                                    rows="3"
                                                                    placeholder="Nhập mô tả">{{$product->description}}</textarea>
                                                            </fieldset>
                                                            <div style="color:red">
                                                                {{ $errors->first('description') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-success mr-1 mb-1">Lưu</button>
                                                    <button type="reset" class="btn btn-danger mr-1 mb-1"
                                                        onclick="window.history.go(-1); return true;">Huỷ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('description');
</script>
@endsection