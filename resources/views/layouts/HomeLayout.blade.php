<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!--fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />


    <!-- font awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">


    <!--bootstrap-->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-rtl.min.css') }}">

    @yield('css')

</head>

<body>

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
                    <div class="search">
                        <input type="search" name="navSearch">
                        <span><i class="fa-solid fa-magnifying-glass"></i></span>

                    </div>
                    <div class="register">
                        <div class="signup">
                            <a href="{{route('register')}}" class="regItem">
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
                            <a href="{{route('login')}}" class="regItem">
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

                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    <footer class=' '>
        <div class="waves wave1">
            <svg width="100%" height="290px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">



                </linearGradient>
                <path fill="rgba(130,222,221)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106

          V 359
          H 0
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="15s" attributeType="XML"
                        values="
            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,-40
              1222,283
              1920,136

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 973,260
              1722,-53
              1920,120

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>
        <div class="waves wave2">
            <svg width="100%" height="310px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">

                </linearGradient>
                <path fill="rgba(130,222,221,.6)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106

          V 359
          H 0
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="10s" attributeType="XML"
                        values="
            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,-40
              1222,283
              1920,136

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 973,260
              1722,-53
              1920,120

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>
        <div class="waves wave2">
            <svg width="100%" height="330px" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">

                </linearGradient>
                <path fill="rgba(130,222,221,.4)" d="
          M0 67
          C 273,183
            822,-40
            1920.00,106

          V 359
          H 0
          V 67
          Z">
                    <animate repeatCount="indefinite" fill="url(#grad1)" attributeName="d" dur="6s" attributeType="XML"
                        values="
            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,-40
              1222,283
              1920,136

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 973,260
              1722,-53
              1920,120

            V 359
            H 0
            V 67
            Z;

            M0 77
            C 473,283
              822,-40
              1920,116

            V 359
            H 0
            V 67
            Z
            ">
                    </animate>
                </path>
            </svg>
        </div>

        <div class='ontop' style='display: flex;
    flex-direction: column;
    align-items: center;'>
            <div class="footerIcon">
                <a class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a class="youtube"><i class="fa-brands fa-youtube"></i></a>
                <a class="telegram"><i class="fa-brands fa-telegram"></i></a>
            </div>
            <div class="copyRight">
                <div class='crParent'>
                    <p class='crTeacher'>جميع الحقوق محفوظة لمستر محمد البري 2022</p>
                    <span class='space'>|</span>
                    <p style='direction:ltr'>
                        Made with
                        <span class='heart'><i class="fa-solid fa-heart"></i></span>
                        By
                        <a href="#">Zircon Tech</a>
                    </p>
                </div>
            </div>
        </div>

    </footer>

    <!--font awesome-->
    <script src="{{ URL::asset('js/all.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

    <!--jquery js-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <!--bootstrap js-->
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js"
        integrity="sha512-+VS2+Nl1Qit71a/lbncmVsWOZ0BmPDkopw5sXAS2W+OfeceCEd9OGTQWjgVgP5QaMV4ddqOIW9XLW7UVFzkMAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('javascript')
</body>

</html>