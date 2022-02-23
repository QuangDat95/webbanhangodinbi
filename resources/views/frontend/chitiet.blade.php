@extends('frontend.index')
@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="{{ Storage::url($sanpham->hinh_anh) }}" alt="{{ Storage::url($sanpham->hinh_anh) }}">
					</div>
				</div>
			</div>
			<!-- /Product main img -->
			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{ Storage::url($sanpham->hinh_anh) }}" alt="{{ Storage::url($sanpham->hinh_anh) }}">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->
			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{ $sanpham->ten_sp }}</h2>
					<div>
						<h3 class="product-price"><strong>{{ number_format($sanpham->gia_sp) }}</strong><sup>vnđ</sup></h3>

					</div>
					<div class="add-to-cart">
						<a onclick="AddCart('{{$sanpham->id}}')" href="javascript:"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
					</div>
				</div>
			</div>
			<!-- /Product details -->
			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li><a data-toggle="tab" href="#tab2">Chi tiết sản phẩm</a></li>
					</ul>
					<ul>
						<div style="text-align:center">{{$sanpham->mo_ta}}</div>
					</ul>
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->
@endsection
<script>
	function AddCart(id) {
		$.ajax({
			url: "{{route('addCart',$sanpham->id)}}",
			type: "GET",
		}).done(function(response) {
			RenderCart(response);
			alertify.success('Đã thêm sản phẩm thành công!');
		});
	}

	function RenderCart(response) {
		$('.header-ctn').empty();
		$('.header-ctn').html(response);
	}
</script>