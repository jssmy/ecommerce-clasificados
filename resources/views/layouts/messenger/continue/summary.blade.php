<div style="width: 100%" class="summary hide">
    <div class="card-option-conent">
        <div class="card-option">
            <!-- card option --->
            <div class="card-option-item">
                <div style='min-height: 76%; font-weight: 400; font-size: 13px' class="card-option-item-content">
                    <label>Confirmar orden de compra <i class="fa fa-opencart" aria-hidden="true"></i></label>
                    <div style="display:flex;"><span style="font-weight: bold; color: #263426; padding-right: 5px">Nombres: </span><p style="text-align: left" id="order-name"> {{auth()->user()->name}}</p></div>
                    <div style="display: flex"><span style="font-weight: bold;color: #263426; padding-right: 5px">Dirección: </span><p class="order-address"> cargando...</p></div>
                    <div style="display:flex;">
                        <span style="font-weight: bold;color: #263426; padding-right: 5px">Compra: </span>
                        <p class="order-price">cargando...</p>
                        <span style="font-weight: bold;color: #263426; padding-left: 5px">Envío: </span>
                        <p id="order-price"> S/ 5.00</p>
                    </div>
                    <div style="display: flex"><span style="font-weight: bold;color: #263426; padding-right: 5px">Total: </span><p class="order-total"> cargando...</p></div>
                    <div class="hide" style="display:flex;"><span style="font-weight: bold;color: #263426; padding-right: 5px">Código de orden: </span><p class="order-code"></p></div>
                </div>
            </div>
            <!----./card option---->
        </div>
    </div>
</div>
