<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')|Star bug Market</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/style.css')}}"/>

    @yield('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
@include('layouts.partials.main-header')
@include('layouts.partials.navigation.main-navigation')
<div id="content" class="section">
    @yield('content')
</div>
@include('layouts.partials.main-footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{URL::asset('public/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/js/slick.min.js')}}"></script>
<script src="{{URL::asset('public/js/nouislider.min.js')}}"></script>
<script src="{{URL::asset('public/js/jquery.zoom.min.js')}}"></script>
<script src="{{URL::asset('public/js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
