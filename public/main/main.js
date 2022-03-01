// delete mini cart header
var csrf = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
$('.product-img i').click(function() 
{
    let url = "/deletecart/";
    let id = $(this).data("id");

    $.ajax({
        url: url + id,
        type: "POST",
        headers: csrf,
    }).done(function (response) 
    {
        $('.header-ctn').empty();
        $('.header-ctn').html(response);
        alertify.success('Đã xoá sản phẩm thành công!');
    });
});

//function big cart (layouts.carts.carts)
function renderlistcart(response) 
{
    $('.table-bordered').empty();
    $('.table-bordered').html(response);
}

$('#deletelistcart').click(function()
{
    let listCardDestroyUrl = "/deletelistcart/";
    let id = $('#delete_listcart').val();

    $.ajax({
        url: url + id,
        type: "POST",
        headers: csrf,
    }).done(function(response) {
        renderlistcart(response);
        alertify.success('Đã xoá sản phẩm thành công!');
    });
})

    // var id = $('#updateitem_cart').val();
    $('.updateitemlistcart').click(function()
    {
        let id = $(this).attr('id-product');
        let url = "/saveitemlistcart/";
        // let id = $('.updateitem_cart').val();
        let amount = $('.change_item_input_' + id).val();
    
        $.ajax({
            url: url + id + "/" + amount,
            type: "POST",
            headers: csrf,
        }).done(function(response) {
            renderlistcart(response);
            alertify.success('Đã cập nhật sản phẩm!');
        });
    });


//function mini cart layouts.properties
function rendercart(response) 
{
    $('.header-ctn').empty();
    $('.header-ctn').html(response);
}

$('.add-to-cart-btn').click(function()
{

    let id = $('#add_cart').val();
    let url = "/addcart/";

    $.ajax({
        url: url + id,
        type: "POST",
        headers: csrf,
    }).done(function(response) {
        rendercart(response);
        alertify.success('Đã thêm sản phẩm thành công!');
    });
});