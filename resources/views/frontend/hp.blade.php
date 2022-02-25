@extends('frontend.index')
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
					@foreach ($banchays as $banchay)
					<div class="product-widget">
						<div class="product-img">
							<img src="{{Storage::url($banchay->san_pham->hinh_anh)}}" alt="">
						</div>
						<div class="product-body">
							<p class="product-category"></p>
							<h3 class="product-name"><a href="{{route('chitiet',$banchay->san_pham->id)}}">{{$banchay->san_pham->ten_sp}}</a></h3>
							<h4 class="product-price">{{number_format($banchay->san_pham->gia_sp)}}<sup>đ</sup></h4>
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
						{{$sanphams->links()}}
					</div>
				</div>

				<!-- store products -->
				<div class="row" id="option_change">
					<!-- product -->
					@foreach($sanphams as $sanpham)
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<a href="{{route('chitiet',$sanpham->id)}}">
								<div class="product-img">
									<img src="{{Storage::url($sanpham->hinh_anh)}}" alt="{{$sanpham->hinh_anh}}">
								</div>
							</a>
							<div class="product-body">
								<p class="product-category">{{$sanpham->the_loai->the_loai}}</p>
								<h3 class="product-name"><a href="{{route('chitiet',$sanpham->id)}}">{{$sanpham->ten_sp}}</a></h3>
								<h4 class="product-price">{{number_format($sanpham->gia_sp)}}<sup>đ</sup></h4>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /product -->
				</div>
				<!-- /store products -->
				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					{{$sanphams->links()}}
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