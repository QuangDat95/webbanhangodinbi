<form novalidate>
    <div class="row">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
        @endif
        @include('commons.error')
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-old-password">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="account-old-password" placeholder="Mật khẩu cũ"
                        minlength="6" required>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-new-password">Mật khẩu mới</label>
                    <input type="password" id="account-new-password" class="form-control" placeholder="Mật khẩu mới"
                        minlength="6" required>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label for="account-retype-new-password">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" id="account-retype-new-password"
                        placeholder="Nhập lại mật khẩu mới" minlength="6" required>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <input type="button" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 update_password" value="Lưu">
        </div>
    </div>
</form>
<script src="{{asset('main/dashboards.js')}}"></script>
