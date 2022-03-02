<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="{{URL::asset('css1/stylesheets.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="header">
        <div style="width:100%">
            <marquee style="color:red">
                <h4>THÀNH ĐẠT SHOP CHUYÊN MUA BÁN LAPTOP XIN KÍNH CHÀO QUÝ KHÁCH</h4>
            </marquee>
        </div>

    </div>
</body>
@include('dashboards.menu')
@yield('content')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#change_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image_product").change(function() {
        readURL(this);
    });
    </script>
</body>

</html>