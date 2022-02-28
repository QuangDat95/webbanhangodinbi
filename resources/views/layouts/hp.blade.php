@extends('layouts.master')
@section('title')
Hp
@endsection
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<div class="aside">
					<h3 class="aside-title">Hàng bán chạy</h3>
					@foreach ($sellests as $sellest)
					<div class="product-widget">
						<div class="product-img">
							<img src="{{Storage::url($sellest->product->image)}}" alt="">
						</div>
						<div class="product-body">
							<p class="product-category"></p>
							<h3 class="product-name"><a href="{{route('properties',$sellest->product->id)}}">{{$sellest->product->name}}</a></h3>
							<h4 class="product-price">{{number_format($sellest->product->price)}}<sup>đ</sup></h4>
						</div>
					</div>
					@endforeach
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->
			<!-- STORE -->
			<div id="store" class="col-md-9">
				<div class="store-filter clearfix">
					<div style="float:left">
						{{$products->links()}}
					</div>
				</div>

				<!-- store products -->
				<div class="row" id="option_change">
					<!-- product -->
					@foreach($products as $product)
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<a href="{{route('properties',$product->id)}}">
								<div class="product-img">
									<img src="{{Storage::url($product->image)}}" alt="{{$product->image}}">
								</div>
							</a>
							<div class="product-body">
								<p class="product-category">{{$product->category->name}}</p>
								<h3 class="product-name"><a href="{{route('properties',$product->id)}}">{{$product->name}}</a></h3>
								<h4 class="product-price">{{number_format($product->price)}}<sup>đ</sup></h4>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /product -->
				</div>
				<!-- /store products -->
				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					{{$products->links()}}
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection
</script>