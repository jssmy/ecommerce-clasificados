@php
    $items = collect($cardOption->items);
@endphp
<li class="in">
    @if($items->count()>1)
        <button class="btn card-option-move-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
    @endif
    <div class="card-option-conent">
        <div class="card-option">
            @each('layouts.card-option.card-option-item',$items,'item','no-items')
        </div>
    </div>
    @if($items->count()>1)
        <button class="btn card-option-move-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
    @endif
</li>
