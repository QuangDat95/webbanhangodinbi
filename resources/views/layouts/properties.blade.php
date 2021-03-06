@extends('layouts.master')
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
						<img src="{{ Storage::url($product->image) }}" alt="{{ Storage::url($product->image) }}">
					</div>
				</div>
			</div>
			<!-- /Product main img -->
			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">
				<div id="product-imgs">
					<div class="product-preview">
						<img src="{{ Storage::url($product->image) }}" alt="{{ Storage::url($product->image) }}">
					</div>
				</div>
			</div>
			<!-- /Product thumb imgs -->
			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">{{ $product->name }}</h2>
					<div>
						<h3 class="product-price"><strong>{{ number_format($product->price) }}</strong><sup>vnđ</sup></h3>

					</div>
					<div class="add-to-cart">
						<a href="javascript:void"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
						<input type="hidden" id="add_cart" value="{{$product->id}}">
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
						<div style="text-align:left; font-weight:bold;margin-top:-30px">{!!$product->description!!}</div>
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