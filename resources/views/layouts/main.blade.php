<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')|{{config('app.name')}}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/bootstrap.min.css')}}"/>


    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{URL::asset('public/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/css/style.css')}}"/>
    <link type="text/css" rel="stylesheet"  href="{{URL::asset('public/css/lunar.css')}}">
    <link type="text/css" rel="stylesheet"  href="{{URL::asset('public/css/animate.min.css')}}">
    <script src="{{URL::asset('public/js/jquery.min.js')}}"></script>
    @yield('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .is-invalid{
            border-color: red !important;
        }
        .invalid-feedback{
            color: red !important;
            font-size: 11px !important;
        }
    </style>
</head>
<body>
<!-- HEADER -->
@include('layouts.partials.main-header')
@include('layouts.navigation.main-navigation')
@yield('breadcrumb')
<div id="content">
    @yield('content')
</div>
@include('layouts.partials.main-footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->

<script src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('public/js/slick.min.js')}}"></script>
<script src="{{URL::asset('public/js/nouislider.min.js')}}"></script>
<script src="{{URL::asset('public/js/jquery.zoom.min.js')}}"></script>
<script src="{{ URL::asset('/public/js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('/public/js/jquery-validation/dist/localization/messages_es.js') }}"></script>
<script src="{{URL::asset('public/js/main.js')}}"></script>
<script>
    $(document).on('click','a',function (e) {
        console.log($(this).attr('href'));
        if($(this).attr('href')=='#'){
            e.preventDefault();
        }
    });
    function msg_alert_422(msg){

        var msgs = '';
        $.each(msg, function(k, v){
            msgs += "<li>" + v + "</li>";
        });

        var alert = "<div class=\"alert alert-warning alert-dismissible\" style='margin-top: 20px; margin-bottom: 10px;'>\n" +
            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>\n" +
            "<h4><i class=\"icon fa fa-warning\"></i> Alerta!</h4>\n" +
            msgs +
            "</div>"

        return alert;
    }

    function format_numeric(value) {
        return /^\d*[.]?\d{0,2}$/.test(value);
    }

    function format_digits(value) {
        return /^\d*?$/.test(value);
    }

    function format_text(value) {
        return /^[áéíóúñÁÉÍÓÚÑa-zA-Z ]*\s*$/.test(value);
    }

    function format_digits_sometext(value) {
        return /^[cCxXkK0-9]*\s*$/.test(value);
    }

    function format_text_digits(value) {
        return /^[a-zA-Z0-9-_]*\s*$/.test(value);
    }
    $(document).ready(function () {

        $(document).on("keypress", "form", function (event) {
            return event.keyCode != 13;
        });

        /* Show error request
           ------------------ */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            error: function (err) {

                if (err.status == 401) {
                    bootbox.dialog({
                        title: 'Alerta',
                        message: "<h4>¡" + err.responseJSON + "!</h4>",
                        buttons: {
                            ok: {
                                label: "ACEPTAR",
                                className: 'btn-info',
                                callback: function () {
                                }
                            }
                        }
                    });
                }

                if (err.status == 403) {
                    bootbox.dialog({
                        title: 'Alerta',
                        message: "<h4>¡" + err.responseJSON + "!</h4>",
                        buttons: {
                            ok: {
                                label: "ACEPTAR",
                                className: 'btn-info',
                            }
                        }
                    });
                }

                if (err.status == 422) {
                    console.log(err.responseJSON.errors);
                    if (err.responseJSON.errors.numero_empresas != undefined) {
                        $(".notify-message:last").html(msg_alert_422(err.responseJSON.errors));
                    } else {
                        $(".notify-message:last").html(msg_422(err.responseJSON.errors));
                    }

                    $("html, body").animate({
                        scrollTop:$(".notify-message:last").scrollTop()
                    }, 600);
                }

                if (err.status == 404) {
                    $(".notify-message:last").html(msg_404(err.responseJSON));
                }


                if (err.status == 500) {
                    console.log('Hubo un problema al realizar esta acción. Por favor vuelva a intentarlo.');
                    ///toastr["error"]('Hubo un problema al realizar esta acción. Por favor vuelva a intentarlo.');
                }

            }
        });


        /* Format input allow
           ------------------ */
        (function ($) {
            $.fn.inputFilter = function (inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    }
                });
            };
        }(jQuery));

        /*Numeros con decimal*/
        $(".input-numeric").inputFilter(function (value) {
            return format_numeric(value);
        });
        /*Numeros sin decimal*/
        $(".input-digits").inputFilter(function (value) {
            return format_digits(value);
        });
        /*Solo letras*/
        $(".input-text").inputFilter(function (value) {
            return format_text(value);
        });

        /*Solo letras y numeros para código de reclamo*/
        $(".input-text-digits").inputFilter(function (value) {
            return format_text_digits(value);
        });

        /*Solo numeros y algunas letras para nro de servicio y cuentas*/
        $(".input-digits-sometext").inputFilter(function (value) {
            return format_digits_sometext(value);
        });

        /* Jquery Validation extends methods
           --------------------------------- */
        jQuery.validator.setDefaults({
            debug: true
        });

        jQuery.validator.addMethod("length", function (value, element, params) {
            return $(element).val().length == params;
        }, "Por favor, ingresar un valor de {0} de longitud.");

        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[\w]+$/i.test(value);
        }, "Por favor, ingresar solo letras y números.");

        jQuery.validator.addMethod("emailCustomize", function (value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_Ññ.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
        }, "Por favor, ingresar una dirección de correo válida.");

        jQuery.validator.addMethod("celular", function (value, element) {
            return this.optional(element) || /^[9][0-9]{8}$/i.test(value);
        }, "Por favor, ingresar un número de celular valido de 9 digitos y que empiece con 9.");

        jQuery.validator.addMethod("decimal", function (value, element) {
            return this.optional(element) || /^\d*[.]?\d{0,2}$/.test(value);
        }, "Por favor, ingresar un número valido hasta 2 decimales (9.99).");
    });
</script>
<script src="{{URL::asset('public/js/lunar.js')}}"></script>
@yield('scripts')

</body>
</html>
