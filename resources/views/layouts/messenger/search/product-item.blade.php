<div style='' class="card-option-item">
    <div style='min-height: 76%;' class="card-option-item-content">
			<div>
				<img style='width:100px; max-width:215px' src="{{URL::asset($product->img_url_1)}}">
			</div>
	</div>
	<div style='cursor:auto; flex-direction: column; margin-top:0px;font-weight: 500; font-size:10px' class="card-option-item-footer">
		<div >
			s/. {{$product->price_with_discount}} 
		</div>
		<div style='margint-top:5px;'>{{$product->shortName}}</div>
	</div>
</div>
