@extends('frontend.index')
@section('content')
<section class="page-title-area page-title-bg1">
    <div class="container">
        <div class="page-title-content">
            <h1 title="Cart" style="text-align: center; margin-top:20px">Giỏ hàng</h1>
        </div>
    </div>
</section>
<section class="cart-area ptb-100">
    <div class="container">
        <div class="cart-table table-responsive" id="list-cart">
            <table class="table table-bordered">
                @if(Session::has('cart') != null)
                <thead>
                    <tr>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên Sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Session::get('cart')->products as $item)
                    <?php $productid = $item['productInfo']->id; ?>
                    <tr>
                        <td style="width:100px">
                            <a href="#">
                                <img src="{{ Storage::url($item['productInfo']->image) }}" style="width:100%">
                            </a>
                        </td>
                        <td class="product-name">
                            <a href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                        </td>
                        <td class="product-price">
                            <span class="unit-amount"><strong>{{number_format($item["productInfo"]->price)}}</strong><sup>vnđ</sup></span>
                        </td>
                        <td>
                            <input onchange="saveItemListCart('{{$productid}}')" id="change_item_input_{{$productid}}" type="number" value="{{$item['amount']}}" />
                        </td>
                        <td>
                            <strong>{{number_format($item["price"])}}</strong><sup>vnđ</sup>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="deleteListCart('{{$productid}}')">Xóa</i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan='4'>
                            <h4>Thành tiền</h4>
                        </td>
                        <td colspan='2'>
                            <h4><span>{{number_format(Session::get('cart')->totalPrice)}}<sup>vnđ</sup></span></h4>
                            <a class="btn btn-warning" href="{{route('getCheckout')}}" style="color:red"><strong>Tiến hành thanh toán</strong></a>
                        </td>
                    </tr>
                </tbody>
                @else
                <h1 style="color:red; text-align:center">Không có sản phẩm nào trong giỏ hàng!</h1>
                @endif
            </table>
        </div>
    </div>
</section>
@endsection
<script>
    function RenderListCart(response) {
        $('#list-cart').empty();
        $('#list-cart').html(response);
    }

    function deleteListCart(id) {
        $.ajax({
            url: "deleteListCart/" + id,
            type: "GET",
        }).done(function(response) {
            RenderListCart(response);
            alertify.success('Đã xoá sản phẩm thành công!');
        });
        window.location.reload();
    }

    function saveItemListCart(id) {
        $.ajax({
            type: "GET",
            url: "saveItemListCart/" + id + "/" + $('#change_item_input_' + id).val(),
            dataType: "dataType",
            success: function(response) {
                $('#list-cart').empty();
                $('#list-cart').html(response);
            }
        });
        window.location.reload();
    }
</script>