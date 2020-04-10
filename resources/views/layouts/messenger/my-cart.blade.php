@if($items->isNotEmpty())
<li style='margin-bottom:0px;' class="in">
    <div style='pading:0px' class='list-product active'>
		@if($items->count()>1)
			<button class="btn card-option-move-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
		@endif
		<div class="card-option-conent">
			<div class="card-option">
				@each('layouts.messenger.my-cart-items',$items,'item','layouts.messenger.no-items')
			</div>
		</div>
		@if($items->count()>1)
			<button class="btn card-option-move-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
		@endif
	</div>
	<div style='width:100%' class='extra-data hide'>
		<div class="card-option-conent">
			<div class="card-option">
				<!-- card option --->
				<div class="card-option-item">
					<div style='min-height: 76%; font-weight: 400;' class="card-option-item-content">
							<label>Datos de envío <i class="fa fa-paper-plane" aria-hidden="true"></i></label>
							<div class='form-group'>
								<input style='height:30px' placeholder='Nombres y Apellidos' value='{{auth()->user()->name}}' name='name' class='input'>
							</div>
							<div style='display: flex; align-items: center;' class='form-group'>
								<input style='height:30px;' placeholder='Dirección de envío' value='' name='direction' class='input input-direction' >
								<button data-out=".input-direction" class='btn btn-localization'><i class="fa fa-map-marker" aria-hidden="true"></i></button>
							</div>
					</div>
				</div>
			<!----./card option---->
			</div>
		</div>
	</div>

</li>
<li class='in'>
	<button class='btn btn-warning-off hide btn-prev-step'>Volver</button>
	<button class='btn btn-warning-off btn-next-step'>Continuar compra</button>
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
	<button class='btn btn-warning-off'>Agregue productos a su carrito <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
</li>

@endif
