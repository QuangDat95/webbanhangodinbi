<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-9 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Liên Hệ</h3>
						<p>Cửa hàng áo quần, phụ kiện thời trang</p>
						<ul class="footer-links">
							<li><a href="https://goo.gl/maps/J2GV7fng5oFAJFKf8"><i class="fa fa-map-marker"></i>61 Lê Thế Hiếu, Phường 1, Đông Hà, Quảng Trị</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+(84) 18001061</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>fashionshe@email.com</a></li>
						</ul>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#home').click(function() {
		$('#content').load("{{route('home')}}")
    });
});
</script>