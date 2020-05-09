@php
    $items = collect($items->my_cart);
@endphp
@if($items->isNotEmpty())
<li style='margin-bottom:0px;' class="in">
    <form class="order-form">
        <div style='pading:0px' class='list-product active'>
            @if($items->count()>1)
                <button class="btn card-option-move-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
            @endif
            <div class="card-option-conent">
                <div class="card-option">
                    @each('layouts.messenger.my-cart-items',$items,'item','layouts.messenger.no-items')
                </div>
            </div>
            @if($items->count()>1)
                <button class="btn card-option-move-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            @endif
        </div>
        @includeWhen(auth()->check(),'layouts.messenger.continue.extra-information')
        @includeWhen(auth()->check(),'layouts.messenger.continue.summary')
    </form>
</li>
@if(auth()->check())
    <li class='in'>
        <button class='btn btn-warning-off hide btn-prev-step'>Volver</button>
        <button
            data-url_load_summary_information="{{route('bot.load-summary-information')}}"
            class='btn btn-warning-off btn-next-step'>Continuar compra
        </button>
        <a style="min-width: 250px" href="https://www.culqi.com/" target="_blank" class='btn btn-warning-off hide  btn-end-shopp'>Realizar pago</a>
    </li>
@endif
@else
<li style='margin-bottom:0px;' class="in">
    <div class="card-option-conent">
        <div style='justify-content: center;' class="card-option">
			<img style='width:200px;' src='https://www.scholarswing.in/resources/images/empty-cart.png'>
        </div>
    </div>
</li>
<li class='in'>
	<button class='btn btn-warning-off'>Agregue productos a su carrito <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
</li>

@endif
