@extends('layouts.main')
@section('title','Bienvenido')

@section('content')
    @include('home.partials.search-results')
@endsection
@section('scripts')
    <script id="tpl-detail-product" type="text/template">
        @include('layouts.partials.breadcrumb')
    </script>
    <script>
        var url_updat_lista_cart = "{{route('cart.detail-items')}}" ;
    </script>
    <script src="{{URL::asset('public/js/home.js')}}"></script>
@endsection
