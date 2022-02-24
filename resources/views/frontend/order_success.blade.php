@extends('frontend.index')
@section('content')
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 order-details">
				<div class="section-title text-center">
					<h2 class="title" style="color:green">Thanh toán thành công!</h2>
					<p>Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi</p>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Sản phẩm</strong></div>
						<div><strong>Tổng</strong></div>
					</div>
					<div class="order-products">
					@foreach(Session::get('cart')->products as $key => $value)
							<div class="order-col">
								<div><strong>{{$value["amount"]}}</strong>x<strong>{{$value["productInfo"]->name}}</strong></div>
								<div><strong>{{number_format($value["price"])}}</strong><sup>đ</sup></div>
							</div>
					@endforeach
					</div>
					<div class="order-col">
						<div>Phí vận chuyển</div>
						<div><strong>Miễn phí</strong></div>
					</div>
					<div class="order-col">
						<div><strong>Tổng cộng</strong></div>
						<div><strong class="order-total">{{number_format(Session::get('cart')->totalPrice)}}<sup>đ</sup></strong></div>
					</div>
				</div>
				<a href="{{route('returnHome')}}" class="primary-btn order-submit">Trở về trang chủ</a>
			</div>
		</div>
	</div>
</div>
@endsection