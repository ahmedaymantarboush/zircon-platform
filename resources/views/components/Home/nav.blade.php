<nav class="myNav">
    <div class="navProgress">
        <span class='navProgChild'></span>
    </div>
    <div class="customeContainer">
        <div class="right">
            <div class=" navAtom">
                <img src="{{ URL::asset('imgs/logoAtom.png') }}" alt="">


            </div>
            <div class="logoBrand">البري</div>
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
                <form class="search" action="{{route('search')}}">
                    <input type="search" name='q' name="navSearch">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </form>
                @auth('web')
                    <div class="register">
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
                    </div>
                @else
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
