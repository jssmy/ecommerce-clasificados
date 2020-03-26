@include('layouts.partials.main-hot-deals')
@include('layouts.product.main-new-products')
@if(request()->ajax())
    <script src="{{URL::asset('public/js/main.js')}}"></script>
@endif
