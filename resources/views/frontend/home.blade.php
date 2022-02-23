@extends('frontend.index')
@section('content')
<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Tất cả sản phẩm</h3>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">                    
                                    @foreach($sanphams as $sanpham)
										<div class="product">
                                        <a href="{{route('chitiet',$sanpham->id)}}"><div class="product-img">
												<img src="{{ Storage::url($sanpham->hinh_anh) }}">
											</div></a>
											<div class="product-body">
												<h5 class="product-category">{{$sanpham->the_loai->the_loai}}</h5>
												<h3 class="product-name"><a href="{{route('chitiet',$sanpham->id)}}">{{$sanpham->ten_sp}}</a></h3>
                                                <h4 class="product-price"><strong>{{number_format($sanpham->gia_sp)}}</strong><sup>vnđ</sup></h4>		
											</div>
										</div>
                                    @endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection