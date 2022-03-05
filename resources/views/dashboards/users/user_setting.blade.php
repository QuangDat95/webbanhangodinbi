<div class="media image_account">
    <a href="javascript: void(0);">
        <img src="{{Storage::url(Auth::user()->image)}}" class="rounded mr-75" alt="{{Auth::user()->image}}" height="64" width="64">
    </a>
    <div class="media-body mt-75">
        <form method="post" id="upload-image-form" enctype="multipart/form-data">
            @csrf
            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Cập nhật ảnh
                    mới</label>
                <input type="file" name="file" id="account-upload" hidden>
                <span class="text-danger" id="image-input-error"></span>
                <button type="submit" class="btn btn-sm btn-outline-warning ml-50">Lưu</button>
            </div>
        </form>
    </div>
</div>
@include('commons.alert')
@include('commons.error')
<hr>
<form novalidate>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-username">Tên người dùng</label>
                    <input type="text" class="form-control" id="account_username" placeholder="Nhập tên người dùng" value="{{$user->username}}" required data-validation-required-message="This username field is required">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-name">Họ và tên</label>
                    <input type="text" class="form-control" id="account_name" placeholder="Nhập họ và tên" value="{{$user->name}}" required data-validation-required-message="This name field is required">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-e-mail">Địa chỉ email</label>
                    <input type="email" class="form-control" id="account_email" placeholder="Nhập địa chỉ email" readonly value="{{$user->email}}" required data-validation-required-message="This email field is required">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-company">Công ty</label>
                <input type="text" class="form-control" id="account_company" value="{{$user->company}}" placeholder="Tên công ty">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="account-company">Địa chỉ</label>
                <input type="text" class="form-control" id="account_address" value="{{$user->address}}" placeholder="Nhập địa chỉ">
            </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <input type="button" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 update_account" value="Lưu">
            <button type="reset" class="btn btn-outline-warning">Hủy</button>
        </div>
    </div>
</form>
<script src="{{asset('main/dashboards.js')}}"></script>