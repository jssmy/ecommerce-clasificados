<div class="header-ctn">
    <!-- Wishlist -->
    <div>
        <a href="#">
            <i class="fa fa-comment"></i>
            <span>Mensajes</span>
            <div class="qty">2</div>
        </a>
    </div>

    <div>
        <a href="#">
            <i class="fa fa-heart"></i>
            <span>Mis Favoritos</span>
            <div class="qty">2</div>
        </a>
    </div>

    <!-- /Wishlist -->

    <!-- Cart -->
    <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-shopping-cart"></i>
            <span>Mi carrito</span>
            <div class="qty">3</div>
        </a>
        <div class="cart-dropdown">
                <div class="cart-list">
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{URL::asset('public/img/product01.png')}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                        </div>
                        <button class="delete"><i class="fa fa-close"></i></button>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{URL::asset('public/img/product02.png')}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                        </div>
                        <button class="delete"><i class="fa fa-close"></i></button>
                    </div>
                </div>
                <div class="cart-summary">
                    <small>3 Item(s) selected</small>
                    <h5>SUBTOTAL: $2940.00</h5>
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
