<header class="header1">
    <nav class="navbar navbar-default navbar-static-top fluid_header centered">
        <div class="container">
            <div class="col-md-2 col-sm-6 col-xs-8 nopadding">
                <a class="navbar-brand nomargin" href="{{ url('/') }}"><img src="{{ asset('assets/images/img/logo.png') }}" alt="logo"></a>
            </div>
            <div class="col-md-10 col-sm-6 col-xs-4 nopadding">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle toggle-menu menu-right push-body" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="main-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li class="mobile-title">
                            <h4>main menu</h4>
                        </li>
                        <li class="simple-menu">
                            <a href="{{ url('howtosend') }}">How to send</a>
                        </li>
                        <li class="simple-menu">
                            <a href="{{ url('faq') }}">FAQ</a>
                        </li>
                        <li class="simple-menu">
                            <a href="{{ url('contactus') }}">Contact</a>
                        </li>
                        
                        @guest
                            <li class="menu-item login-btn1">
                                <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-lock"></i> SIGN in</a>
                            </li>
                            <li class="menu-item login-btn1">
                                <a href="{{ route('register') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> SIGN up</a>
                            </li>
                        @else
                            <li class="menu-item login-btn1">
                                <a href="{{ route('profile.show') }}" class="btn btn-primary"><i class="fa fa-user"></i> {{ Auth::user()->firstname }}</a>
                            </li>
                            <li class="menu-item login-btn1">
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" style="background: none; border: none; cursor: pointer;"><i class="fa fa-sign-out"></i> SIGN out</button>
                                </form>
                            </li>
                        @endguest
                        
                        <li class="menu-item">
                            <a href="#"><img src="{{ asset('assets/images/fr.png') }}" alt="French" class="img-fluid"></a>
                        </li>
                        <li class="menu-item">
                            <a href="#"><img src="{{ asset('assets/images/en.png') }}" alt="English" class="img-fluid"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
