<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> {{config('app.phone')}}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> {{config('app.email')}}</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> {{config('app.addres')}}</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>
                    @if(auth()->check())
                        <div class="dropdown">
                            <a style="cursor: pointer" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user-o"></i>
                                {{auth()->user()->name}}
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-summary">
                                    <h5>{{auth()->user()->email}}</h5>
                                    <small>Último inicio de sesión: {{auth()->user()->created_at}}</small>
                                </div>
                                <div class="cart-btns">
                                    <a style="width: 100% !important;" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        CERRAR SESIÓN
                                        <i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a id="btn-login-account" href="#" data-toggle="modal" data-target="#mdl-login-form">
                            <i class="fa fa-user-o"></i>
                            Ingresar
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('home')}}" class="logo">
                            <!--
                            <img src="{{URL::asset('public/img/logo.png')}}" alt="">
                            -->
                            <h1 style="color: #aeae37">{{config('app.name')}}.com</h1>
                        </a>
                    </div>-
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-5">
                    <div class="header-search">
                        <form>
                            <input name="key" class="input" placeholder="Escribe aquí">
                            <button class="search-btn"><i class="fa fa-search"></i> Buscar</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="cart-list-item col-md-4 clearfix">
                    @includeWhen(auth()->check() ,'layouts.cart.direct-access')
                    @includeWhen(!auth()->check() ,'layouts.cart.direct-accsess-disabled')
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
@includeWhen(!auth()->check(),'layouts.partials.modal-login-form')
