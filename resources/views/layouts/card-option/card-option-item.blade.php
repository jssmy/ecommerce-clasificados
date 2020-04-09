<div class="card-option-item">
    <div style="background-image: url('{{   $item->header_background }}')" class="card-option-item-header">
        {!! $item->header !!}
    </div>
    <div class="card-option-item-content">{!! $item->content !!}</div>
    @if($item->footer)
        <div data-message="{{$item->message}}" class="card-option-item-footer">
            {!! $item->footer !!}
        </div>
    @endif
</div>