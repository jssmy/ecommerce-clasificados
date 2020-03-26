<style>
    .title-active{
        font-weight: bold;
        color: black !important;
    }
    .billing-details .section-title a{
        color: #0f6674;
    }
    .billing-details .section-active{
        display: inline !important;
    }
    .billing-details .section-content{
        display: none;
    }

</style>
<div class="billing-details">
    <div style="margin: 10px; padding-bottom: 10px; font-size: 16px;" class="section-title">
        <a id="btn-login" data-form="#form-login" class="btn-account title-active" href="#"><span class="pull-left">INICIAR SESIÓN</span></a>
        <a id="btn-register" data-form="#form-register" class="btn-account" href="#"><span  class="pull-right">NO TENGO UNA CUENTA</span></a>
    </div>
    <div id="form-login" style="margin: 10px; padding-bottom: 10px; padding-top: 15px;" class="section-content section-active">
        <form method="post" action="{{ route('login') }}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input class="input @error('email') is-invalid @enderror"  value="{{ old('email') }}" type="email" name="email" placeholder="Dirección email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="input @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}" name="password" placeholder="Contraseña">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button style="background-color: #aeae37; color: white" class="btn btn-block btn-circule">INICIAR SESIÓN</button>
            </div>
        </form>
    </div>
    <div id="form-register" style="margin: 10px; padding-bottom: 10px; padding-top: 15px;" class="section-content ">
        <form method="POST" action="{{ route('register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input class="input @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" name="name"  placeholder="Nombres y apellidos">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="input @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Dirección email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input class="input" type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button style="background-color: #aeae37; color: white" class="btn btn-block btn-circule">CREAR CUENTA</button>
            </div>
        </form>
    </div>
    <div class="section-footer">
        <!---
        <span style="margin: 5px; font-size: 13">Otras opciones</span>
        <div style="margin: 5px;" class="row">
            <button class="btn btn-block btn-circule bg-primary"><i class="fa fa-facebook-official"></i> Iniciar con Facebook</button>
        </div>
        <div style="margin: 5px; padding-top: 10px;" class="row">
            <button class="btn btn-block btn-danger btn-circule" style="color: white"><i class="fa fa-google-plus-square"></i> Iniciar con Google</button>
        </div>
        -->
        <div style="margin: 5px; font-size: 13px; padding-top: 10px;" class="row">
            <span>Continúa si aceptas los </span><a href="#">términos y condiciones y política de privacidad de {{config('app.name')}}</a>
        </div>
    </div>
</div>
<script>
    $(".btn-account").click(function () {
        if(!$(this).hasClass('title-active')){
            $('.title-active').removeClass('title-active');
            $(this).addClass('title-active');
            $(".section-active").removeClass('section-active');
            $($(this).data('form')).addClass('section-active');
        }
        localStorage.setItem('modal_loaded',$(this).attr('id'));
    });
</script>

@if(Session::has('errors'))
    <script>
        $(document).ready(function () {
            function modalCheck(){
                if(localStorage.getItem('modal_loaded')){
                    $("#"+localStorage.getItem('modal_loaded')).trigger('click');
                }
                $("#btn-login-account").trigger('click');
            }
            setTimeout(modalCheck(),2);

        });
    </script>
@endif
