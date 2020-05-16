@php
    $products = collect($items->products);
@endphp
@if($products->count())
<li style='margin-bottom:0px;' class="in">
        <form class="order-form">
            <div style='pading:0px' class='list-product active'>
                @if($products->count()>1)
                    <button class="btn card-option-move-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                @endif
                    <div class="card-option-conent">
                        <div class="card-option">
                            @each('layouts.messenger.search.product-item',$products,'product','layouts.messenger.no-items')
                        </div>
                    </div>
                @if($products->count()>1)
                    <button class="btn card-option-move-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                @endif
            </div>
            @includeWhen(auth()->check(),'layouts.messenger.continue.extra-information')
            @includeWhen(auth()->check(),'layouts.messenger.continue.summary',['items'=>$products])
        </form>
</li>
<li data-message="ver mi carrito" class='in'>
    <button
        class='btn btn-warning-off btn-message-send'>Continuar compra
    </button>
</li>
@endif
