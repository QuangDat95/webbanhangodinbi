@extends('frontend.index')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Order Details -->
			<div class="col-md-12 order-details">
				<div class="section-title text-center">
					<h2 class="title">Liên hệ</h2><br><br>
					<h2 style="color:blue">SIÊU THỊ ĐIỆN MÁY XANH</h2><br>
					<h5>Địa chỉ: Số 257 Lê Duẩn, Phường 5, Đông Hà, Quảng Trị<br><br>
						Hotline: 18001061<br><br>Bản đồ</h5>
				</div>
				<div style="margin-left:6cm"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.1894550230063!2d107.10624191417978!3d16.81695482343338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3140e5f4b2a549fb%3A0xbe3a8d7874c4eff9!2zU2nDqnUgdGjhu4sgxJBp4buHbiBtw6F5IFhhbmg!5e0!3m2!1svi!2s!4v1622642704022!5m2!1svi!2s" width="700" height="550" style="border:0;" allowfullscreen="on" loading="lazy"></iframe></div>
				<a href="{{route('home')}}" class="primary-btn order-submit">Trở về trang chủ</a>
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection