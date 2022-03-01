@extends('layouts.master')
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
        <div class="cart-table table-responsive">
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
                    @foreach(Session('cart')->products as $item)
                    <?php $productid = $item['productInfo']->id; ?>
                    <tr>
                        <td style="width:100px">
                            <a href="#">
                                <img src="{{ Storage::url($item['productInfo']->image) }}" style="width:100%">
                            </a>
                        </td>
                        <td class="product-name">
                            <a
                                href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                        </td>
                        <td class="product-price">
                            <span
                                class="unit-amount"><strong>{{number_format($item["productInfo"]->price)}}</strong><sup>vnđ</sup></span>
                        </td>
                        <td>
                            <input type="number" id="change_item_input_{{$productid}}" value="{{$item['amount']}}" />
                            <button class="btn btn-primary" onclick="saveItemListCart({{$productid}},{{Session('cart')->totalamount}})">Cập nhật</button>
                        </td>
                        <td>
                            <strong>{{number_format($item["price"])}}</strong><sup>vnđ</sup>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="deleteListCart({{$productid}})">Xóa</i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan='4'>
                            <h4>Thành tiền</h4>
                        </td>
                        <td colspan='2'>
                            <h4><span>{{number_format(Session('cart')->totalPrice)}}<sup>vnđ</sup></span></h4>
                            <a class="btn btn-warning" href="{{route('getCheckout')}}" style="color:red"><strong>Tiến
                                    hành thanh toán</strong></a>
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

</script>