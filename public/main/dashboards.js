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

    $.ajax({
       type:'POST',
       url: `/setting/account/user/image`,
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
          if (response) {
            this.reset();
            alert('Image has been uploaded successfully');
          }
        },
        error: function(response){
           console.log(response);
             $('#image-input-error').text(response.responseJSON.errors.file);
        }
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


var csrf = { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") };

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
            $('#account-vertical-password').empty();
            $('#account-vertical-password').html(response);
        });
});
