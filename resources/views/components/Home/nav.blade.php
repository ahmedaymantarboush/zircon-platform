<div class="preloader">
    <div class="atom">
        <div class="electron"></div>
        <div class="electron-alpha"></div>
        <div class="electron-omega"></div>
    </div>
</div>
<nav class="myNav">
    <div class="navProgress">
        <span class='navProgChild'></span>
    </div>
    <div class="customeContainer">
        <div class="right">
            <a href="{{ route('home') }}">
                <div class=" navAtom">
                    <img src="{{ URL::asset('imgs/logoAtom.png') }}" alt="">


                </div>
            </a>
            <a href="{{ route('home') }}">
                <div class="logoBrand">البري</div>
            </a>
            <div class="sunMoon">
                <div class="sun activeSvg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle fill="#FECA57" cx="12" cy="12" r="5" />
                        <g stroke="currentColor">
                            <line x1="12" y1="1" x2="12" y2="3" />
                            <line x1="12" y1="21" x2="12" y2="23" />
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                            <line x1="1" y1="12" x2="3" y2="12" />
                            <line x1="21" y1="12" x2="23" y2="12" />
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                        </g>
                    </svg>
                </div>
                <div class="moon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#4FB8E2"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <mask id="mask">
                            <rect x="0" y="0" width="100%" height="100%" fill="white" />
                            <circle cx="12" cy="4" r="9" fill="black" />
                        </mask>
                        <circle fill="#4FB8E2" cx="12" cy="12" r="9" mask="url(#mask)" />

                    </svg>
                </div>

            </div>
        </div>
        <div class='bigLeft '>
            <button class='toggleBarBtn'>
                <span class='topLine'></span>
                <span class='middleLine'></span>
                <span class='bottomLine'></span>

            </button>
            <div class="left ">
                @auth
                {{-- <div class="register">
                    <div class="login">
                        <a href="javascript:{}" onclick="window.logoutFrm.submit()" class="regItem">
                            <form id="logoutFrm" action="{{ route('logout') }}" method="post">
                @csrf
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                <span class="regIcon">
                    <img src="{{ URL::asset('imgs/drop.png') }}" alt="">
                </span>
                <span class="regType">
                    تسجيل <span class='d-blueColor'>الخروج</span>
                </span>
                </form>
                </a>
            </div>
        </div> --}}
        <form class="search mainSearch" action="{{ route('search') }}">
            <input type="search" name="q" value="{{ request()->q }}">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
        </form>
        <div class="studentInfo">
            <div class="studentBtn">
                <button role="button" type="button" class="btn ftu-btn lineParent" data-toggle="dropdown">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class='studentIcon'>
                        <i class="fa-solid fa-user-graduate"></i>
                    </span>
                    <span class='studentName'>{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu navDrop">
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{ route('home') }}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class="fa-solid fa-table-columns"></i>
                            </span>
                            الصفحة الرئيسية
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{ route('user.profile') }}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class="fa-solid fa-house-chimney-user"></i>

                            </span>
                            الملف الشخصي
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{ route('lectures.ownedLectures') }}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            محاضراتي
                        </a>
                    </li>
                    <li>
                        <a href="javascript:{}" onclick="window.logoutFrm.submit()"
                            class="dropdown-item navDropItem lineParent">
                            <form id="logoutFrm" action="{{ route('logout') }}" method="post">
                                @csrf
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class='navDropIcon'>
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                <span class="">تسجيل الخروج</span>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mobDetails">
                <div class="studentImage">
                    <a href="{{ route('user.profile') }}">
                        <img src="{{ Auth::user()->image }}" alt="">
                    </a>
                </div>
                <h3 class='studentNameMob'>{{ Auth::user()->name }}</h3>
                <form class="search mobSearch" action="{{ route('search') }}">
                    <input type="search" name="q" value="{{ request()->q }}">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </form>
                <ul class=" navDrop">
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{route('home')}}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class='fa fa-user'></i>
                            </span>
                            الصفحة الرئيسية
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{ route('user.profile') }}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class='fa fa-user'></i>
                            </span>
                            الملف الشخصي
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item navDropItem lineParent" href="{{route('lectures.ownedLectures')}}">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class='navDropIcon'>
                                <i class='fa fa-user'></i>
                            </span>
                            محاضراتي
                        </a>
                    </li>
                    <li>
                        <a href="javascript:{}" onclick="window.logoutFrm.submit()"
                            class="dropdown-item navDropItem lineParent">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class='navDropIcon'>
                                    <i class='fa fa-user'></i>
                                </span>
                                <span class="">تسجيل الخروج</span>
                                </span>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <form class="search" action="{{ route('search') }}">
            <input type="search" name="q" value="{{ request()->q }}">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
        </form>
        <div class="register">
            <div class="signup">
                <a href="{{ route('register') }}" class="regItem">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="regIcon">
                        <img src="{{ URL::asset('imgs/apple.png') }}" alt="">
                    </span>
                    <span class="regType">
                        أنشئ حساب <span class='d-redColor'>جديد</span>
                    </span>
                </a>
            </div>
            <div class="login">
                <a href="{{ route('login') }}" class="regItem">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="regIcon">
                        <img src="{{ URL::asset('imgs/drop.png') }}" alt="">
                    </span>
                    <span class="regType">
                        تسجيل <span class='d-blueColor'>الدخول</span>
                    </span>
                </a>
            </div>
        </div>
        @endauth

    </div>
    </div>
    </div>
</nav>