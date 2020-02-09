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
                <li><a id="btn-user-account" href="{{route('auth.login')}}"><i class="fa fa-user-o"></i>
                        @if(Auth::check())
                            {{auth()->user()->name}}
                        @else
                            Ingresar
                        @endif
                    </a>
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
                    <div data-url="{{route('home')}}" class="header-logo">
                        <a href="#" class="logo">
                            <!--
                            <img src="{{URL::asset('public/img/logo.png')}}" alt="">
                            -->
                            <h1>{{config('app.name')}}.com</h1>
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
                <div class="col-md-4 clearfix">
                    @includeWhen(auth()->check(),'layouts.partials.direct-access')
                    @includeWhen(!auth()->check(),'layouts.partials.direct-accsess-disabled')

                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
