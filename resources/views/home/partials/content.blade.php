@include('layouts.product.main-new-products')
@include('layouts.partials.main-list-top-sell')
@if(request()->ajax())
    <script src="{{URL::asset('public/js/main.js')}}"></script>
@endif
