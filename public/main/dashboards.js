var csrf = { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") };
function productUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#change_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('#image_product').change(function () {
    ProductUrl(this);
});

$('#upload-image-form').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $('#image-input-error').text('');
    let userImageUrl = '/setting/account/user/image';
    $.ajax({
        url: userImageUrl,
        type:'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers:csrf
      }).done(function(response){
        if(response){
          alertify.success("Cập nhật ảnh thành công!");
          $("#account_img_reset").load(location.href + " #account_img_reset");
        }
      }).fail(function(){
          alert("Định dạng file không phù hợp hoặc dung lượng file quá lớn");
      });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.rounded').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#account-upload").change(function () {
    readURL(this);
});

$('.cancel_update_user').click(function(){
  $('#account-vertical-general').load(location.href + " #account-vertical-general");
});

$('.cancel_update_password').click(function(){
  $('#account-old-password').val('');
  $('#account-new-password').val('');
  $('#account-retype-new-password').val('');
});

$('.update_account').click(function () {
    let account_username = $('#account_username').val();
    let account_name = $('#account_name').val();
    let account_company = $('#account_company').val();
    let account_address = $('#account_address').val();
    let updateAccountGeneralUrl = "/setting/account/user/update";
    $.ajax({
        url: updateAccountGeneralUrl,
        type: "POST",
        data:
        {
            name: account_name,
            username: account_username,
            company: account_company,
            address: account_address
        },
        headers: csrf
    }).done(function (response) {
        $('#account-vertical-general').empty();
        $('#account-vertical-general').html(response);
        $('.user-name-account').empty();
        $('.user-name-account').text(account_name);
        alertify.success("Cập nhật thành công!");
    });
});

$('.update_password').click(function () {
    let oldpassword = $('#account-old-password').val();
    let newpassword = $('#account-new-password').val();
    let repassword = $('#account-retype-new-password').val();
    let updatePasswordUserUrl = "/setting/account/password/update";
        $.ajax({
            url: updatePasswordUserUrl,
            type: "POST",
            data:
            {
                oldpassword: oldpassword,
                newpassword: newpassword,
                repassword: repassword,
            },
            headers: csrf
        }).done(function (response) {
            $('.account-vertical-password').empty();
            $('.account-vertical-password').html(response);
        });
});
