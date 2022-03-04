   <!-- Cart -->
   <div class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
           <i class="fa fa-shopping-cart"></i>
           <span>Giỏ hàng</span>
           @if(Session::has('cart') != null)
           <div class="qty" id="total-quanty-show">{{Session('cart')->totalamount}}</div>
           @else
           <div class="qty" id="total-quanty-show">0</div>
           @endif
       </a>
       <div class="cart-dropdown">
           <div class="cart-list">
               @if(Session::has('cart') != null)
               @foreach(Session('cart')->products as $item)
               <div class="product-widget">
                   <div class="product-img">
                       <i class="fa fa-window-close" aria-hidden="true" data-id="{{$item['productInfo']->id}}" style="color:red"></i>
                       <img src="{{Storage::url($item['productInfo']->image)}}" />
                   </div>
                   <div class="product-body">
                       <h3 class="product-name"><a
                               href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                       </h3>
                       <h4 class="product-price"><span
                               class="qty">{{$item["amount"]}}x</span>{{number_format($item["productInfo"]->price)}}<sup>đ</sup>
                       </h4>
                   </div>
               </div>
               @endforeach
           </div>
           <div class="cart-summary">
               <strong>{{Session('cart')->totalamount}} sản phẩm đã chọn</strong>
               <br>
               <h5>Tổng tiền: {{number_format(Session::get('cart')->totalPrice)}}<sup>đ</sup>
               </h5>
           </div>
           <div class="cart-btns">
               <a href="{{route('getcart')}}">Xem giỏ hàng</a>
               <a href="{{route('getcheckout')}}">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
           </div>
           @else
           <h4 style="color:green; text-align: center;">Giỏ hàng trống!</h4>
       </div>
       @endif
   </div>
   <!-- /Cart -->
   <!-- Menu Toogle -->
   <div class="menu-toggle">
       <a href="#">
           <i class="fa fa-bars"></i>
           <span>Menu</span>
       </a>
   </div>
   <!-- /Menu Toogle -->
   <script src="{{asset('main/layouts.js')}}"></script>