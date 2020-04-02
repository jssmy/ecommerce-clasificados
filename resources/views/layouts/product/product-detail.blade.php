<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    @if($product->img_url_1)
                        <div class="product-preview">
                            <img src="{{ URL::asset($product->img_url_1) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_2)
                        <div class="product-preview">
                            <img src="{{ URL::asset($product->img_url_2) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_3)
                        <div class="product-preview">
                            <img src="{{ URL::asset($product->img_url_3) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_7)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_7)}}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_8)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_8)}}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_4)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_4)}}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_5)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_5) }} " alt="">
                        </div>
                    @endif
                    @if($product->img_url_6)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_6) }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    @if($product->img_url_1)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_1)}}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_2)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_2) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_3)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_3) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_7)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_7) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_8)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_8) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_4)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_4) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_5)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_5) }}" alt="">
                        </div>
                    @endif
                    @if($product->img_url_6)
                        <div class="product-preview">
                            <img src="{{URL::asset($product->img_url_6) }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><a data-title="MI FAVORITO" href="#"><i  class="fa fa-heart-o"></i></a> {{$product->name ?? '[[_name_]]'}}</h2>
                    <!---
                    <div>
                        <a class="review-link" href="#"><i class="fa fa-eye"></i> 10 visitas recibidas</a>
                    </div>
                    --->
                    <div>
                        <h3 class="product-price">S/. {{$product->price_with_discount ?? '[[_price_with_discount_]]' }} <del class="product-old-price">{{$product->price ?? '[[_price_]]'}}</del></h3>
                        <span class="product-available">DISPONIBLE</span>
                    </div>
                    <p>{{$product->description ?? '[[_description_]]' }}</p>
                    <div class="box">
                        <hr>
                        <div style="padding-top:10px;" class="row">
                            <div class="col-sm-12">
                                <button data-url="{{route('cart.add-cart',$product)}}" class="add-to-cart-btn btn-circule btn btn-danger btn-block"><i class="fa fa-shopping-cart"></i> AGREGAR</button>
                            </div>
                        </div>
                    </div>
                    <!------
                    <div class="box">
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a data-title="Ver perfil del usuario" href="#">Joset Manihuari</a> hizo esta publicación
                                <span class="pull-right">{{$product->date_publication ?? '[[_human_date_publication_]]'}}</span>
                            </div>
                        </div>
                        <div style="padding-top:10px;" class="row">
                            <div class="col-sm-12">
                                <button class="btn-circule btn btn-danger btn-block"><i class="fa fa-send"></i> ECRIBIR AL VENDEDOR</button>
                            </div>
                        </div>
                    </div>
                    ------->

                    <ul class="product-links">
                        <li>Compartir:</li>
                        <li data-title="Facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li data-title="Twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li data-title="Whatsapp"><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <li data-title="Copiar link"><a href="#"><i class="fa fa-link"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->

            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<script>
    $(document).ready(function () {
        var zoomMainProduct = document.getElementById('product-main-img');
        if (zoomMainProduct) {
            $('#product-main-img .product-preview').zoom();
        }
        $('#product-main-img').slick({
            infinite: true,
            speed: 300,
            dots: false,
            arrows: true,
            fade: true,
            asNavFor: '#product-imgs',
        });

        $('#product-imgs').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            centerMode: true,
            focusOnSelect: true,
            centerPadding: 0,
            vertical: true,
            asNavFor: '#product-main-img',
            responsive: [{
                breakpoint: 991,
                settings: {
                    vertical: false,
                    arrows: false,
                    dots: true,
                }
            },
            ]
        });
    });

</script>
