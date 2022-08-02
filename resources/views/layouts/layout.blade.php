<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />


    <!-- font awesome -->
    <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}">


    <!--swiper-->
    <link rel="stylesheet" href="{{URL::asset('css/swiper.bundle.min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{URL::asset('css/home.css')}} " class="rel">
    <link rel="stylesheet" href="{{URL::asset('css/home-responsive.css')}} " class="rel">

</head>

<body>

    <nav class="myNav">
        <div class="navProgress">
            <span class='navProgChild'></span>
        </div>
        <div class="customeContainer">
            <div class="right">
                <div class=" navAtom">
                    <img src="{{URL::asset('imgs/logoAtom.png')}}" alt="">


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
                            <a href="#" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{URL::asset('imgs/apple.png')}}" alt="">
                                </span>
                                <span class="regType">
                                    أنشئ حساب <span class='d-redColor'>جديد</span>
                                </span>
                            </a>
                        </div>
                        <div class="login">
                            <a href="#" class="regItem">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="regIcon">
                                    <img src="{{URL::asset('imgs/drop.png')}}" alt="">
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
