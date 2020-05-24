@php
    $items = collect($cardOption->items);
@endphp

@if($items->count()>1)
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
                class='btn btn-warning-off btn-message-send {{$item->footer}}'>{{$item->content}} {!! $item->header !!}
            </button>
        @endforeach
    </div>
</li>
@else
    <li class="in">
        <div  style="justify-content: center" class="card-option-conent">
            <div class="card-option">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>desde</th>
                            <th>hasta</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: 500; font-size: 12px">
                        @foreach($items as $item)
                            {!! $item->content !!}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </li>
@endif
