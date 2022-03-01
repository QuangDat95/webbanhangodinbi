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
            <a href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
        </td>
        <td class="product-price">
            <span
                class="unit-amount"><strong>{{number_format($item["productInfo"]->price)}}</strong><sup>vnđ</sup></span>
        </td>
        <td>
            <input type="number" class="change_item_input_{{$productid}}" name="quanty" value="{{$item['amount']}}" />
            <button class="btn btn-primary updateitemlistcart" id-product="{{$productid}}">Cập nhật</button>
            <input type="hidden" class="updateitem_cart" name="id" value="{{$productid}}">
        </td>
        <td>
            <strong>{{number_format($item["price"])}}</strong><sup>vnđ</sup>
        </td>
        <td>
            <button class="btn btn-danger" id="deletelistcart">Xóa</button>
            <input type="hidden" id="delete_listcart" value="{{$productid}}">
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan='4'>
            <h4>Thành tiền</h4>
        </td>
        <td colspan='2'>
            <h4><span>{{number_format(Session('cart')->totalPrice)}}<sup>vnđ</sup></span></h4>
            <a class="btn btn-warning" href="{{route('getcheckout')}}" style="color:red"><strong>Tiến
                    hành thanh toán</strong></a>
        </td>
    </tr>
</tbody>
@else
<h1 style="color:red; text-align:center">Không có sản phẩm nào trong giỏ hàng!</h1>
@endif
<script src="{{asset('main/main.js')}}"></script>