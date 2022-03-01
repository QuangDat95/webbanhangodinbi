// delete mini cart header
var csrf = { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") };
$(".product-img i").click(function() 
{
    let deleteCartUrl = "/delete/cart/";
    let id = $(this).data("id");

    $.ajax({
        url: deleteCartUrl + id,
        type: "POST",
        headers: csrf,
    }).done(function (response) {
        $(".header-ctn").empty();
        $(".header-ctn").html(response);
        alertify.success("Đã xoá sản phẩm thành công!");
    });
});

//function big cart (layouts.carts.carts)
function renderlistcart(response) 
{
    $(".table-bordered").empty();
    $(".table-bordered").html(response);
}

$("#deletelistcart").click(function () 
{
    let listCartDestroyUrl = "/delete/listcart/";
    let id = $("#delete_listcart").val();

    $.ajax({
        url: listCartDestroyUrl + id,
        type: "POST",
        headers: csrf,
    }).done(function (response) {
        renderlistcart(response);
        alertify.success("Đã xoá sản phẩm thành công!");
    });
});

$(".updateitemlistcart").click(function() 
{
    let updateListItemUrl = "/update/listcart";
    let id_quanty = $(this).attr("id-product");
    let num_quanty = $(".change_item_input_" + id_quanty).val();

    $.ajax({
        url: updateListItemUrl,
        type: "POST",
        data: { id: id_quanty, quanty: num_quanty },
        headers: csrf,
    }).done(function (response) {
        renderlistcart(response);
        alertify.success("Đã cập nhật sản phẩm!");
    });
});

//function mini cart (layouts.properties)
function rendercart(response) 
{
    $(".header-ctn").empty();
    $(".header-ctn").html(response);
}

$(".add-to-cart-btn").click(function() 
{
    let id = $("#add_cart").val();
    let url = "/addcart/";

    $.ajax({
        url: url + id,
        type: "POST",
        headers: csrf,
    }).done(function (response) {
        rendercart(response);
        alertify.success("Đã thêm sản phẩm thành công!");
    });
});
