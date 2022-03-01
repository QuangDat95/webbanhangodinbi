// delete mini cart header 
$('.product-img i').click(function () 
{
    let url = "/deletecart/";
    let data_id = $(this).data("id");
    $.ajax({
        url: url + data_id,
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    }).done(function (response) 
    {
        $('.header-ctn').empty();
        $('.header-ctn').html(response);
        alertify.success('Đã xoá sản phẩm thành công!');
    });
});
//function big cart
function renderlistcart(response) 
{
    $('.table-bordered').empty();
    $('.table-bordered').html(response);
}

function deleteListCart(id) 
{
    $.ajax({
        url: "/deleteListCart/" + id,
        type: "GET",
    }).done(function(response) {
        renderlistcart(response);
        alertify.success('Đã xoá sản phẩm thành công!');
    });
}

function saveItemListCart(id) 
{
    $.ajax({
        url: "/saveItemListCart/" + id + "/" + $('#change_item_input_' + id).val(),
        type: "GET",
    }).done(function(response) {
        RenderListCart(response);
        alertify.success('Đã cập nhật sản phẩm!');
    });
}
//function mini cart
function rendercart(response) 
{
    $('.header-ctn').empty();
    $('.header-ctn').html(response);
}
function AddCart(id) 
{
    $.ajax({
        url: "/addCart/"+id,
        type: "GET",
    }).done(function(response) {
        RenderCart(response);
        alertify.success('Đã thêm sản phẩm thành công!');
    });
}