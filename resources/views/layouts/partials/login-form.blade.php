@include('layouts.partials.breadcrumb')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Cuenta de usuario</h3>
                    </div>
                    <ul class="main-nav nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-login">Iniciar sesión</a></li>
                        <li><a data-toggle="tab" href="#tab-create-account">Nueva cuenta</a></li>
                    </ul>
                    <div style="min-height: 300px;" class="tab-content">
                        <div id="tab-login" class="tab-pane fade in active">
                            <div class="form-group">
                                <input class="input required" type="email" name="email" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <input class="input required" type="password" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div id="tab-create-account" class="tab-pane fade">
                            <div class="form-group">
                                <input class="input required" type="text" name="first-name" placeholder="Nombres">
                            </div>
                            <div class="form-group">
                                <input class="input required" type="text" name="last-name" placeholder="Apellidos">
                            </div>
                            <div class="form-group">
                                <input class="input required" type="email" name="email" placeholder="Correo">
                            </div>
                            <div class="form-group">
                                <input class="input required" type="text" name="address" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <input class="input required" type="tel" name="phone" placeholder="Teléfono / Celular">
                            </div>
                            <div style="padding-top:10px;" class="form-group">
                                <button class="btn btn-block btn-success btn-circule">CREAR CUENTA</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-circule bg-primary"><i class="fa fa-facebook-official"></i> Iniciar con Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-block btn-danger btn-circule" style="color: white"><i class="fa fa-google-plus-square"></i> Iniciar con Google</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Continúa si aceptas los </span><a href="#">términos y condiciones y política de privacidad de {{config('app.name')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
