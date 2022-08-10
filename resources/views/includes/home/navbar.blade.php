<body>
    @yield('beforeNav')
    <nav>
        <div class="container">
            <div class="c-navbar">
                <div class="logo">
                    <a href="#">
                        <div class="nav-image">
                            <img src="{{asset('homeAssets/assets/imgs/Logo.png')}}" alt="" />
                        </div>
                        <span class="c-nav-brand">ZIRCON ims</span>
                    </a>
                </div>
                <div class="menu">
                    <div class="search">
                        <form action="{{ route('search.index') }}">
                            <input value="{{ request()->q }}" type="search" name="q"/>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </form>
                    </div>
                    <ul class="links">
                        <li class="navbar-item">
                            <a href="#">تواصل معنا</a>
                        </li>
                        <li class="navbar-item"><a href="#">المدونة</a></li>
                        <li class="navbar-item">
                            <a href="#">المراحل</a>
                        </li>
                        <li class="navbar-item active">
                            <a href="#" class="">الرئيسية</a>
                        </li>
                    </ul>
                    @auth
                        @include('includes.home.authenticatedNav')
                    @else
                        @include('includes.home.anonymousNav')
                    @endauth

                    <div class="close">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </div>
                </div>
                <div class="open-menu">
                    <i class="fa-solid fa-sliders"></i>
                </div>
            </div>
        </div>
    </nav>
@auth
@else
    <div class="overlay"></div>
    @include('components.home.loginForm')
    @include('components.home.signupForm')
@endauth
