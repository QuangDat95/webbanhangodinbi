<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:18001061"><i class="fa fa-phone"></i>+(84)18001061</a></li>
                    <li><a href=""><i class="fa fa-envelope-o"></i> fashionshe@email.com</a></li>
                    <li><a href="https://goo.gl/maps/J2GV7fng5oFAJFKf8"><i class="fa fa-map-marker"></i>61 Lê Thế
                            Hiếu-Phường 1-Đông Hà-Quảng Trị</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <!-- <li><a href="#"><i class="fa fa-dollar"></i>VND</a></li> -->
                    <li><a href="{{route('category.index')}}"><i class="fa fa-user-o"></i>Quản lý</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{URL::asset('img/sb-blog-programming_800x450.jpg')}}" style="height:80px">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="" method="GET">
                                <input class="input" placeholder="Nhập từ khóa" name="search">
                                <button class="search-btn">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        @if(request()->route()->getName() != 'getcart' && request()->route()->getName() != 'getcheckout' && request()->route()->getName() != 'ordersuccess')
                        <div class="header-ctn">
                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Giỏ hàng</span>
                                    @if(Session::has('cart') != null)
                                    <div class="qty" id="total-quanty-show">{{Session('cart')->totalamount}}</div>
                                    @else
                                    <div class="qty" id="total-quanty-show">0</div>
                                    @endif
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @if(Session::has('cart') != null)
                                        @foreach(Session('cart')->products as $item)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <i class="fa fa-window-close" aria-hidden="true"
                                                    data-id="{{$item['productInfo']->id}}" style="color:red"></i>
                                                <img src="{{Storage::url($item['productInfo']->image)}}" />
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a
                                                        href="{{route('properties',$item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                                                </h3>
                                                <h4 class="product-price"><span
                                                        class="qty">{{$item["amount"]}}x</span>{{number_format($item["productInfo"]->price)}}<sup>đ</sup>
                                                </h4>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="cart-summary">
                                        <strong>{{Session('cart')->totalamount}} sản phẩm đã chọn</strong>
                                        <br>
                                        <h5>Tổng tiền: {{number_format(Session::get('cart')->totalPrice)}}<sup>đ</sup>
                                        </h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{route('getcart')}}">Xem giỏ hàng</a>
                                        <a href="{{route('getcheckout')}}">Thanh toán<i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    @else
                                    <h4 style="color:green; text-align: center;">Giỏ hàng trống!</h4>
                                </div>
                                @endif
                            </div>
                            <!-- /Cart -->
                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                        @endif
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="{{route('dell')}}">DELL</a></li>
                    <li><a href="{{route('asus')}}">ASUS</a></li>
                    <li><a href="{{route('hp')}}">HP</a></li>
                    <li><a href="{{route('lenovo')}}">LENOVO</a></li>
                    <li><a href="{{route('acer')}}">ACER</a></li>
                    <li><a href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    @yield('content')

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
                                <li><a href="https://goo.gl/maps/J2GV7fng5oFAJFKf8"><i class="fa fa-map-marker"></i>61
                                        Lê Thế Hiếu, Phường 1, Đông Hà, Quảng Trị</a></li>
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
    <script src="{{asset('main/layouts.js')}}"></script>
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
    <script>
 
    </script>

</body>

</html>