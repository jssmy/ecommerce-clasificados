<div class="header-ctn">
    <!-- Wishlist -->
    <!-- /Wishlist -->

    <!-- Cart -->
    <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-shopping-cart"></i>
            <span>Mi carrito</span>
            <div class="qty">{{$items->sum('quatity')}}</div>
        </a>
        <div class="cart-dropdown">
                <div class="cart-list">
                    @forelse($items as $item)
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{URL::asset($item->product->img_url_1)}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">{{$item->name}}</a></h3>
                            <h4 class="product-price"><span class="qty">{{$item->quatity}} x</span>{{$item->quatity*$item->product->price_with_discount}}</h4>
                        </div>
                        <button data-url="{{route('delete-from-cart',$item)}}" class="delete"><i class="fa fa-close"></i></button>
                    </div>
                    @empty
                        Aún no agregó productos :)
                    @endforelse
                </div>
                <div class="cart-summary">
                    <small>{{$items->sum('quatity')}} producto(s) seleccionados</small>
                    <!---
                    <h5>SUBTOTAL: $2940.00</h5>
                    --->
                </div>
                <div class="cart-btns">
                    <a href="#">Ver detalles</a>
                    <a href="#">Pagar  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
    <!-- /Cart -->
    <!-- Menu Toogle -->
    <div class="menu-toggle">
        <a href="#">
            <i class="fa fa-bars"></i>
            <span>Menu</span>
        </a>
    </div>
    <!-- /Menu Toogle -->
</div>
