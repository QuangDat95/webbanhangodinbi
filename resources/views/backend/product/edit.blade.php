@extends('backend.index')
@section('content')
<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="{{route('product.index')}}">Sản phẩm</a> <span class="divider"></span></li>
            <li class="active">Thêm</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row-form">
                            <div class="span3">Tên sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="name" placeholder="Nhập vào tên sản phẩm"
                                    value="{{$product->name}}" required />
                                <div style="color:red">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Hãng:</div>
                            <div class="span9">
                                <select name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" <?php if($product->category->id == $category->id){
                                        echo "selected";
                                    } ?>>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Giá sản phẩm:</div>
                            <div class="span9">
                                <input type="text" name="price" placeholder="Nhập vào giá sản phẩm"
                                    value="{{$product->price}}" required />
                                <div style="color:red">
                                    {{ $errors->first('price') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Tính năng:</div>
                            <div class="span9">
                                <?php
                                    $checked_tags = $product->features->pluck('id')->toArray();
                                ?>
                                <?php foreach( $features as $feature ):?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $feature->id; ?>"
                                        id="feature_<?= $feature->id; ?>" name="features[]"
                                        <?php if(in_array($feature->id,$checked_tags)): ?> checked <?php endif; ?>>
                                    <label class="form-check-label" for="feature_<?= $feature->id; ?>"
                                        style="padding-left:20px">
                                        <?= $feature->name; ?>
                                    </label>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Hình ảnh:</div>
                            <div class="span9">
                                <input type="file" name="image" value="{{ $product->image }}" />
                                <img src="{{ Storage::url($product->image) }}" style="height:2.5cm"></img>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Mô tả:</div>
                            <div class="span9">
                                <textarea type="text" name="description"
                                    placeholder="Nhập vào tên sản phẩm">{{$product->description}}</textarea>
                                <div style="color:red">
                                    {{ $errors->first('description') }}
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <button class="btn btn-success" type="submit">Lưu</button>
                            <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Hủy</button>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('description');
</script>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">