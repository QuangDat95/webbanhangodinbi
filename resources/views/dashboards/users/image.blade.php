<a href="javascript: void(0);">
    <img src="{{Storage::url(Auth::user()->image)}}" class="rounded mr-75" alt="{{Auth::user()->image}}" height="64"
        width="64">
</a>
<div class="media-body mt-75">
    <form type="POST">
    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Cập nhật ảnh
            mới</label>
        <input type="file" id="account-upload" hidden>
        <input type="button" value="Lưu" class="save-image-account btn btn-sm btn-outline-warning ml-50">
    </div>
    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG.
            Max
            size of
            800kB</small></p>
    </form>
</div>