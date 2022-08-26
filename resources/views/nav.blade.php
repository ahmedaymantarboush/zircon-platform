<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet" />


    <!-- font awesome -->
    <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}">


    <!--bootstrap-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-rtl.min.css')}}">

    <!-- css file -->
    <link rel="stylesheet" href="{{URL::asset('css/nav.css')}} " class="rel">

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
                    <form class="search  mainSearch">
                        <input type="search" name="navSearch">
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
                                <span class='studentName'>علي علاء الدين السيد</span>
                            </button>
                            <ul class="dropdown-menu navDrop">
                                <li>

                                    <a class="dropdown-item navDropItem lineParent" href="#">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class='navDropIcon'>
                                            <i class="fa-solid fa-house-chimney-user"></i>
                                        </span>
                                        الصفحة الرئيسية
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item navDropItem lineParent" href="#">
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
                                                <i class='fa fa-user'></i>
                                            </span>
                                            <span class="">

                                                تسجيل الخروج</span>
                                            </span>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mobDetails">
                            <div class="studentImage">
                                <img src="{{URL::asset('imgs/user.png')}}" alt="">
                            </div>
                            <h3 class='studentNameMob'>علي علاء الدين السيد</h3>
                            <form class="search mobSearch">
                                <input type="search" name="navSearch">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>

                            </form>
                            <ul class=" navDrop">
                                <li>

                                    <a class="dropdown-item navDropItem lineParent" href="#">
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
                                    <a class="dropdown-item navDropItem lineParent" href="#">
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
                                        <form id="logoutFrm" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class='navDropIcon'>
                                                <i class='fa fa-user'></i>
                                            </span>
                                            <span class="">

                                                تسجيل الخروج</span>
                                            </span>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!--font awesome-->
    <script src="{{URL::asset('js/all.min.js')}}"></script>


    <!--jquery js-->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>


    <!-- main js file -->
</body>

</html>