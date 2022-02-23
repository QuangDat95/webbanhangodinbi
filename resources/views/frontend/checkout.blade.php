@extends('frontend.index')
@section('content')
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Trang chủ</a></li>
							<li class="active">Thanh toán</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
			<form action="{{route('saveOrder')}}" method="POST">
				@csrf
				<!-- row -->
				<div class="row">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">	
								<h3 class="title">Địa chỉ nhận hàng</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="Ten_khach_hang" placeholder="Nhập tên">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="dia_chi" placeholder="Nhập địa chỉ">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="so_dt" placeholder="Nhập số điện thoại">
							</div>
						</div>
					</div>
					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>SẢN PHẨM</strong></div>
								<div><strong>TỔNG</strong></div>
							</div>
							<div class="order-products">
								@foreach(Session::get('cart')->products as $key => $value)
								<div class="order-col">
									<div><strong>{{$value["quanty"]}}x{{$value["productInfo"]->ten_sp}}</strong></div>
									<div>{{$value["price"]}}</div>
								</div>
								@endforeach
							</div>
							<div class="order-col">
								<div>Phí ship</div>
								<div><strong>Miễn phí</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TỔNG</strong></div>
								<div><strong class="order-total">{{number_format(Session::get('cart')->totalPrice)}}</strong></div>
							</div>
						</div>	
						<button type="submit" class="primary-btn order-submit">Đặt hàng</button>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</form>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection