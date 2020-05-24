@php
    $orders = collect($orders)->sortBy('distance');
@endphp
<li class="in">
    <div class="card-option-item">
        <div class="card-option-item-content">
            <ul>
                @foreach($orders as $order)
                    <li>{{$order->code}} - {{$order->total}}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</li>

