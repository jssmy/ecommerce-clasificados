@php
    $orders = collect($orders)->sortBy('distance');
@endphp
@if($orders->isNotEmpty())
    <li class="in">
        <div class="card-option-item">
            <div class="card-option-item-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Código</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 12px; font-weight: 500">
                    @foreach($orders as $order)
                        <!---$item = collect(collect($order->items)->pluck('cart_item'));--->
                        <tr>
                            <td>{{Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                            <td>{{$order->code}}</td>
                            <td>S/ {{$order->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </li>
@else
    <li style='margin-bottom:0px;' class="in">
        <div class="card-option-conent">
            <div style='justify-content: center;' class="card-option">
                <img style='width:200px;' src='https://www.scholarswing.in/resources/images/empty-cart.png'>
            </div>
        </div>
    </li>
    <li class='in'>
        <button class='btn btn-warning-off'> No ha generado orden de compra <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
    </li>
@endif
