function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#change_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image_product").change(function () {
    readURL(this);
});

var csrf = { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") };
$('.update_account').click(function () {
    let account_username = $('#account_username').val();
    let account_name = $('#account_name').val();
    let account_company = $('#account_company').val();
    let account_address = $('#account_address').val();
    let updateAccountGeneralUrl = "/setting/account/update/general";
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
        console.log(response);
    });
});