@extends('layouts.main')
@section('title','Bienvenido')

@section('content')
    @include('layouts.partials.product.main-new-products')
    @include('layouts.partials.main-list-top-sell')
@endsection
@section('scripts')
    <script src="{{URL::asset('public/js/home.js')}}"></script>
@endsection
