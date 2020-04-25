<li class="in">
    <div class="chat-img">
        <img alt="Avtar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTPGUQ8T9FBmGrMxWa3WbFx5a7JWezwtoSP7LpKI9p8zG30Kb4r">
    </div>
    <div class="chat-body">
        <div class="chat-message">
            <p>{{$message}}</p>
            <div class="chat-message-info">
                @include('layouts.messenger.check')
            </div>
        </div>
    </div>
</li>
@includeWhen(isset($items->products),'layouts.messenger.search.products',['items'=>$items])
@includeWhen(isset($items->my_cart),'layouts.messenger.my-cart',['items'=>$items])
@includeWhen(isset($items->schedule),'layouts.card-option.card-option',['cardOption'=>$items->schedule ?? null])
