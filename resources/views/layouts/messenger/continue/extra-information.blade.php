<div style='width:100%' class='extra-data hide'>
    <div class="card-option-conent">
        <div class="card-option">
            <!-- card option --->
            <div class="card-option-item">
                <div style='min-height: 76%; font-weight: 400;' class="card-option-item-content">
                    <label>Datos de envío <i class="fa fa-paper-plane" aria-hidden="true"></i></label>
                    <div class='form-group'>
                        <input style='height:30px' placeholder='Nombres y Apellidos' value='{{auth()->user()->name}}' name='name' class='input required'>
                    </div>
                    <div style='display: flex; align-items: center;' class='form-group'>
                        <input style='height:30px;' placeholder='Dirección de envío' value='' name='direction' class='input input-direction required' >
                        <button data-out=".input-direction" class='btn btn-order-compra btn-localization'><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <!----./card option---->
        </div>
    </div>
</div>
