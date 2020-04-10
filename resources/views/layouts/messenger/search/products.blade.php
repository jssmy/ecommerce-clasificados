<li class="in">
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
</li>

