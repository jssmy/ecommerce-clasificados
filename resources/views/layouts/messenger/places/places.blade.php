<li class="in">
    <div class="card-option-item">
        <div class="card-option-item-content">
            <ul>
                @foreach($places as $place)
                    <li><a href="{{$place->link}}" target="_blank"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{$place->name}} - {{$place->distance}} km</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</li>

