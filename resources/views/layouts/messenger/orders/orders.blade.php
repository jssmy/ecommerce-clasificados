@php
    $orders = collect($orders)->sortBy('distance');
@endphp
<li class="in">
    <div class="card-option-item">
        <div class="card-option-item-content">
            <ul>
                @foreach($orders as $order)
                    @php
                        // $item = collect(collect($order->items)->pluck('cart_item'));
                    @endphp
                    <li>{{$order->code}} -  total: {{$item->total}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</li>

