<div style='' class="card-option-item">
    <div style='min-height: 76%;' class="card-option-item-content">
        <div class='card-accion'>
            <button data-action='remove'
                    data-url="{{route('cart.add-cart',$product->id)}}"
                    class='btn btn-remove-product update-cart-quantity'><i class="fa fa-minus" aria-hidden="true"></i>
            </button>
            <div class='card-input-quatity'>{{$product->item_cart ? $product->item_cart->quatity : 0}}</div>
            <button data-action='add'
                    data-url="{{route('cart.add-cart',$product->id)}}"
                    class='btn btn-plus-product update-cart-quantity'><i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </div>
        <div>
            <img style='width:100px; max-width:215px; max-height: 100px' src="{{URL::asset($product->img_url_1)}}">
        </div>
    </div>
    <div style='cursor:auto; flex-direction: column; margin-top:0px;font-weight: 500; font-size:10px' class="card-option-item-footer">
        <div >
            s/. {{$product->price_with_discount}}
        </div>
        <div style='margint-top:5px;'>{{$product->short_description}}</div>
    </div>
</div>
