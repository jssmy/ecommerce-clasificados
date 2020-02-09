<div class="product">
    <div class="product-img">
        <img src="{{URL::asset($product->img_url_1)}}" alt="">
        @if($product->with_discount)
            <div class="product-label">
                <span class="sale">-{{$product->discount}}%</span>
            </div>
        @endif
    </div>
    <div class="product-body">
        <p class="product-category">Category</p>
        <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
        <h4 class="product-price">S/. {{$product->price_with_discount}} <del class="product-old-price">S/. {{$product->price}}</del></h4>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Mi favorito</span></button>
            <button data-section_title="{{$section_title ?? 'TITLE'}}" data-detail='@json($product)' data-url="{{route('product.detail',$product)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver detalles</span></button>
        </div>
    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Agregar</button>
    </div>
</div>
