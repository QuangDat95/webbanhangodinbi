@extends('dashboards.master1')
@section('title')
Thêm sản phẩm
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
                        <h2 class="content-header-title float-left mb-0">Thêm sản phẩm</h2>
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
                                    <form class="form form-horizontal" action="{{route('product.store')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tên sản phẩm</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập tên sản phẩm" required>
                                                            <div style="color:red">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="location1">Hãng</label>
                                                        <select class="custom-select form-control" id="location1" name="category_id">
                                                            <option value="new-york">-Chọn hãng-</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Giá sản phẩm</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Nhập giá sản phẩm">
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
                                                            <?php foreach ($features as $feature) : ?>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="<?= $feature->id; ?>" id="feature_<?= $feature->id; ?>" name="features[]">
                                                                    <label class="form-check-label" for="feature_<?= $feature->id; ?>" style="padding-left:20px">
                                                                        <?= $feature->name; ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Hình ảnh</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Nhập giá sản phẩm">
                                                            <div style="color:red">
                                                                {{ $errors->first('price') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1" onclick="window.history.go(-1); return true;">Huỷ</button>
                                                    <!-- <button class="btn btn-success" type="submit">Lưu</button>
                                                    <button class="btn btn-danger"
                                                        onclick="window.history.go(-1); return false;">Hủy</button> -->
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
@endsection