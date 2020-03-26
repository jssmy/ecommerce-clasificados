@extends('layouts.main')
@section('title','Bienvenido')

@section('content')
    @include('layouts.product.product-detail')
@endsection
@section('scripts')
    <script id="tpl-detail-product" type="text/template">
        @include('layouts.partials.breadcrumb')
        @include('layouts.product.product-detail')
    </script>
    <script src="{{URL::asset('public/js/home.js')}}"></script>
@endsection
