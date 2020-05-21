@php
    $items = collect($cardOption->items);
@endphp
<li class="in">
    <div style="display: flex; flex-direction: column; width: 80%" class="card-option-conent">
        @foreach($items as $item)
                <button
                    data-message="{{$item->message}}"
                    style="margin-top: 2px;
                    margin-bottom: 2px;
                    padding-left: 15px;
                    padding-right: 25px;
                    display: flex;
                    justify-content: space-between"
                    class='btn btn-warning-off btn-message-send'>{{$item->content}} {!! $item->header !!}
                </button>

        @endforeach
    </div>
</li>
