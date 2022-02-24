<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Giỏ hàng</span>
        @if(Session::has('cart') != null)
        <div class="qty">{{Session::get('cart')->totalamount}}</div>
        @else
        <div class="qty">0</div>
        @endif
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @if(Session::has('cart') != null)
            @foreach(Session('cart')->products as $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{Storage::url($item['productInfo']->image)}}" />
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a></h3>
                    <h4 class="product-price"><span class="qty">{{$item["quanty"]}}x</span>{{number_format($item['productInfo']->price)}}<sup>đ</sup></h4>
                </div>
            </div>
            @endforeach
        </div>
        <div class="cart-summary">
            <strong>{{Session::get('cart')->totalamount}} sản phẩm đã chọn</strong><br>
            <h5>Tổng tiền: {{number_format(Session::get('cart')->totalPrice)}}<sup>đ</sup></h5>
            <input id="total_quanty_cart" hidden type="number" value="{{Session::get('cart')->totalamount}}">
        </div>
        <div class="cart-btns">
            <a href="{{route('getCart')}}">Xem giỏ hàng</a>
            <a href="{{route('getCheckout')}}">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        @else
        <h4 style="color:green; text-align: center;">Giỏ hàng trống!</h4>
    </div>
    @endif
</div>