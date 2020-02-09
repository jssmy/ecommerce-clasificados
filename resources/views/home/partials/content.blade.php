@include('layouts.product.main-new-products')
@include('layouts.partials.main-hot-deals')
@include('layouts.partials.main-top-selling')
@if(request()->ajax())
    <script src="{{URL::asset('public/js/main.js')}}"></script>
@endif
